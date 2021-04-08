<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ContestCreateRequest;
use App\Http\Requests\ContestUpdateRequest;
use App\Repositories\ContestRepository;
use App\Validators\ContestValidator;

/**
 * Class ContestsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ContestsController extends Controller
{
    /**
     * @var ContestRepository
     */
    protected $repository;

    /**
     * @var ContestValidator
     */
    protected $validator;

    /**
     * ContestsController constructor.
     *
     * @param ContestRepository $repository
     * @param ContestValidator $validator
     */
    public function __construct(ContestRepository $repository, ContestValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $contests = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contests,
            ]);
        }

        return view('contests.index', compact('contests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContestCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ContestCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $contest = $this->repository->create($request->all());

            $response = [
                'message' => 'Contest created.',
                'data'    => $contest->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contest = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contest,
            ]);
        }

        return view('contests.show', compact('contest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contest = $this->repository->find($id);

        return view('contests.edit', compact('contest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContestUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ContestUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $contest = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Contest updated.',
                'data'    => $contest->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Contest deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Contest deleted.');
    }
}
