<?php
namespace App\Http\Services;

use App\Exceptions\DataEmptyException;
use App\Models\Store;
use Exception;

class StoreService {

    public function getIndexData()
    {
        $data = Store::where('user_id','=', auth()->user()->id)
                        ->paginate(\Request::get('per_page'));
        if ($data->total() == 0) {
            throw new DataEmptyException();
        }
        return $data;
    }

    public function create($attributes)
    {
        $result = Store::create([
            'store' => $attributes['store'],
            'user_id' => auth()->user()->id,
        ]);

        return $result;
    }

    public function update($attributes)
    {
        $result = Store::where('id','=', $attributes['id'])
                        ->where('user_id','=',auth()->user()->id)
                        ->first();
        if (empty($result)) {
            throw new DataEmptyException();
        }

        $result->update([
            'store' => $attributes['store'],
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return $result;
    }

    public function delete($id)
    {
        $result = Store::where('id','=', $id)
                        ->where('user_id','=',auth()->user()->id)
                        ->first();

        if (empty($result)) {
            throw new DataEmptyException();
        }
        $result->delete();
        return response()->json([
            'data' => [],
            'message' => 'Data successfully to delete',
            'status' => 200
        ], 200);
    }
}
