<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductTagCreateRequest;
use App\Http\Requests\ProductTagUpdateRequest;
use App\Repositories\ProductTagRepository;
use App\Validators\ProductTagValidator;

/**
 * Class ProductTagsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductTagsController extends Controller
{
    /**
     * @var ProductTagRepository
     */
    protected $repository;

    /**
     * @var ProductTagValidator
     */
    protected $validator;

    /**
     * ProductTagsController constructor.
     *
     * @param ProductTagRepository $repository
     * @param ProductTagValidator $validator
     */
    public function __construct(ProductTagRepository $repository, ProductTagValidator $validator)
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
        $productTags = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productTags,
            ]);
        }

        return view('productTags.index', compact('productTags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductTagCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProductTagCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $productTag = $this->repository->create($request->all());

            $response = [
                'message' => 'ProductTag created.',
                'data'    => $productTag->toArray(),
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
        $productTag = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productTag,
            ]);
        }

        return view('productTags.show', compact('productTag'));
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
        $productTag = $this->repository->find($id);

        return view('productTags.edit', compact('productTag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductTagUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductTagUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $productTag = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProductTag updated.',
                'data'    => $productTag->toArray(),
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
                'message' => 'ProductTag deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProductTag deleted.');
    }
}
