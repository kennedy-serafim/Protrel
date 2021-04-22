<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Repositories\CompanyRepository;
use App\Validators\CompanyValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class CompaniesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CompaniesController extends Controller
{
    protected $repository;
    protected $validator;

    /**
     * CompaniesController constructor.
     *
     * @param CompanyRepository $repository
     * @param CompanyValidator $validator
     */
    public function __construct(CompanyRepository $repository, CompanyValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->middleware('role:Administrador')->except([
            'index',
            'show'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app(RequestCriteria::class));
        $companies     = $this->repository->paginate(5);
        $companyStatus = ['Activo', 'Inactivo'];

        if (request()->wantsJson()) {

            return response()->json([
                'data' => [$companies, $companyStatus],
            ]);
        }

        return view('pages.companies.index', [
            'companies'         => $companies,
            'total'             => $this->repository->count(),
            'companyStatus'     => $companyStatus,

        ]);
    }

    /**
     * Show view to create resource
     */
    public function create()
    {
        return view('pages.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CompanyCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CompanyCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $company = $this->repository->create($request->all());

            $response = [
                'message' => 'Company created.',
                'data'    => $company->toArray(),
            ];

            if ($request->wantsJson()) {

                redirect()->back()->with('message', $response['message']);
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);

            // return redirect()->back()->with('message', $response['message']);
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
        $company = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $company,
            ]);
        }

        return view('pages.companies.show', compact('company'));
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
        $company = $this->repository->find($id);

        return view('pages.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompanyUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CompanyUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $company = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Company updated.',
                'data'    => $company->toArray(),
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
        $company = $this->repository->find($id);
        if ($company->id == auth()->user()->employee->company->id) {
            return redirect()->back()->with([
                'message'   => 'Não podes excluir o registo da companhia na qual fazes parte.',
                'type'      => 'warning'
            ]);
        } else if (count($company->employees) > 0) {
            return redirect()->back()->with([
                'message'   => 'A companhia não pode ser deletada porque existem funcionários cadastrados.',
                'type'      => 'danger'
            ]);
        } else {
            $deleted = $this->repository->delete($id);
            if (request()->wantsJson()) {

                return response()->json([
                    'message' => 'Companhia Excluída com Sucesso.',
                    'deleted' => $deleted,
                ]);
            }

            return redirect()->back()->with([
                'message'   => 'Companhia Excluída com Sucesso.',
                'type'      => 'success'
            ]);
        }
    }

    public function delete($id)
    {
        $company = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $company,
            ]);
        }

        return view('pages.companies.delete', compact('company'));
    }
}
