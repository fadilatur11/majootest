<?php
namespace App\Http\Services;

use App\Exceptions\DataEmptyException;
use App\Http\Repositories\StoreRepository;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;

class ProductService {

    function __construct()
    {
        $this->repository = new StoreRepository;
    }

    public function getIndexData()
    {
        $store = $this->repository->getSingleStore(\Request::segment(2));
        $result = Product::where('store_id','=',$store->id)
                        ->paginate(\Request::get('per_page'));

        if ($result->total() == 0) {
            throw new DataEmptyException();
        }

        return $result;
    }

    public function create($attributes)
    {
        $store = $this->repository->getSingleStore(\Request::segment(2));

        $result = Product::create([
            'store_id' => $store->id,
            'name' => $attributes['name'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if (!empty($attributes['variant'])) {
           $sort = 0;
            foreach ($attributes['variant'] as $variant) {
                    ProductVariant::create([
                        'parent_id' => $result->id,
                        'name' => $variant['name'][$sort]
                    ]);
            $sort++;
            }
        }

        return $result;
    }

    public function update($attributes)
    {
        $store = $this->repository->getSingleStore(\Request::segment(2));

        $result = Product::where('id','=',$attributes['id'])
                            ->where('store_id','=', $store->id)
                            ->first();

        if (empty($result)) {
            throw new DataEmptyException();
        }

        $result->update([
            'name' => $attributes['name'],
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return $result;
    }

    public function updateVariant($attributes)
    {
        $result = ProductVariant::find($attributes['id']);
        $result->parent_id = $attributes['parent_id'];
        $result->name = $attributes['name'];
        $result->save();
        return $result;
    }
}
