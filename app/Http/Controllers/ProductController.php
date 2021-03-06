<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductVariantRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductVariantResource;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    /**
     * updateVariant
     *
     * @param  ProductVariantRequest $request
     * @param  ProductService $service
     * @return void
     */
    public function updateVariant(ProductVariantRequest $request, ProductService $service)
    {
        $data = $service->updateVariant($request->all());
        return new ProductVariantResource($data);
    }

    public function delete($store,$id, ProductService $service)
    {
        $data = $service->delete($id);
        return $data;
    }

    public function deleteVariant($store,$id, ProductService $service)
    {
        $data = $service->deleteVariant($id);
        return $data;
    }

    public function upload($store, Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048'
            ]);

            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

                $name = time().'_'.$request->file->getClientOriginalName();
                $path = url('/').'/storage/' . $filePath;


                return response()->json([
                    'data' => ['image' => $path],
                    'message' => 'Successfully to upload'
                    ]
                );
            }
    }

}
