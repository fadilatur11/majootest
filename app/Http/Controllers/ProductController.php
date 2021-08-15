<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
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
}
