<?php

namespace App\Http\Repositories;

use App\Exceptions\DataEmptyException;
use App\Models\Store;

class StoreRepository
{

    public function getSingleStore($store)
    {
        $data = Store::where('user_id','=', auth()->user()->id)
                        ->where('store','=',$store)
                        ->first();

        if (empty($data)) {
            throw new DataEmptyException();
        }
        return $data;
    }
}

