<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductVariantRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductVariantResource;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * index
     *
     * @param  ProductService $service
     * @return object
     */
    public function index(ProductService $service)
    {
        $data = $service->getIndexData();
        return ProductResource::collection($data);
    }

    /**
     * create
     *
     * @param  ProductRequest $request
     * @param  ProductService $service
     * @return object
     */
    public function create(ProductRequest $request,ProductService $service)
    {
        $data = $service->create($request->all());
        return new ProductResource($data);
    }

    /**
     * update
     *
     * @param  ProductRequest $request
     * @param  ProductService $service
     * @return object
     */
    public function update(ProductRequest $request, ProductService $service)
    {
        $data = $service->update($request->all());
        return new ProductResource($data);
    }

    public function updateVariant(ProductVariantRequest $request, ProductService $service)
    {
        $data = $service->updateVariant($request->all());
        return new ProductVariantResource($data);
    }
}
