<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Resources\StoreCollection;
use App\Http\Resources\StoreResource;
use App\Http\Services\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index(StoreService $service)
    {
        $data = $service->getIndexData();
        return StoreResource::collection($data);
    }

    public function create(CreateStoreRequest $request, StoreService $service)
    {
        $data = $service->create($request->all());
        return new StoreResource($data);
    }

    public function update(UpdateStoreRequest $request, StoreService $service)
    {
        $data = $service->update($request->all());
        return new StoreResource($data);
    }

    public function delete($id, StoreService $service)
    {
        return $service->delete($id);
    }
}
