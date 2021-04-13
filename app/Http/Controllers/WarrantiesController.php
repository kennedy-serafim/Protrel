<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\WarrantyCreateRequest;
use App\Http\Requests\WarrantyUpdateRequest;
use App\Repositories\WarrantyRepository;
use App\Validators\WarrantyValidator;

/**
 * Class WarrantiesController.
 *
 * @package namespace App\Http\Controllers;
 */
class WarrantiesController extends Controller
{
    /**
     * @var WarrantyRepository
     */
    protected $repository;

    /**
     * @var WarrantyValidator
     */
    protected $validator;

    /**
     * WarrantiesController constructor.
     *
     * @param WarrantyRepository $repository
     * @param WarrantyValidator $validator
     */
    public function __construct(WarrantyRepository $repository, WarrantyValidator $validator)
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
        $warranties = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $warranties,
            ]);
        }

        return view('warranties.index', compact('warranties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WarrantyCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(WarrantyCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $warranty = $this->repository->create($request->all());

            $response = [
                'message' => 'Warranty created.',
                'data'    => $warranty->toArray(),
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
        $warranty = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $warranty,
            ]);
        }

        return view('warranties.show', compact('warranty'));
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
        $warranty = $this->repository->find($id);

        return view('warranties.edit', compact('warranty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  WarrantyUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(WarrantyUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $warranty = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Warranty updated.',
                'data'    => $warranty->toArray(),
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
                'message' => 'Warranty deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Warranty deleted.');
    }
}
