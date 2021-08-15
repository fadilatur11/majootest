<?php
namespace App\Exceptions;

use Illuminate\Http\Response;

/**
*
*/
class StoreEmptyException extends \Exception
{
	public function ErrorResponse()
	{
		return Response()->json(
	        [
	            'error' => [
	                'message' => 'Data store is not found, please create store before !',
	                'status' => 404,
                    'error' => 1
	            ]
	        ],
	    404);
	}
}
