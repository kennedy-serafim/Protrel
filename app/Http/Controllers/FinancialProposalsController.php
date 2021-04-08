<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\FinancialProposalCreateRequest;
use App\Http\Requests\FinancialProposalUpdateRequest;
use App\Repositories\FinancialProposalRepository;
use App\Validators\FinancialProposalValidator;

/**
 * Class FinancialProposalsController.
 *
 * @package namespace App\Http\Controllers;
 */
class FinancialProposalsController extends Controller
{
    /**
     * @var FinancialProposalRepository
     */
    protected $repository;

    /**
     * @var FinancialProposalValidator
     */
    protected $validator;

    /**
     * FinancialProposalsController constructor.
     *
     * @param FinancialProposalRepository $repository
     * @param FinancialProposalValidator $validator
     */
    public function __construct(FinancialProposalRepository $repository, FinancialProposalValidator $validator)
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
        $financialProposals = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $financialProposals,
            ]);
        }

        return view('financialProposals.index', compact('financialProposals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FinancialProposalCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(FinancialProposalCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $financialProposal = $this->repository->create($request->all());

            $response = [
                'message' => 'FinancialProposal created.',
                'data'    => $financialProposal->toArray(),
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
        $financialProposal = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $financialProposal,
            ]);
        }

        return view('financialProposals.show', compact('financialProposal'));
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
        $financialProposal = $this->repository->find($id);

        return view('financialProposals.edit', compact('financialProposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FinancialProposalUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(FinancialProposalUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $financialProposal = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'FinancialProposal updated.',
                'data'    => $financialProposal->toArray(),
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
                'message' => 'FinancialProposal deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'FinancialProposal deleted.');
    }
}
