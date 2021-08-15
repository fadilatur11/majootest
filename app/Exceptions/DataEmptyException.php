<?php
namespace App\Exceptions;

use Illuminate\Http\Response;

/**
*
*/
class DataEmptyException extends \Exception
{
	public function ErrorResponse()
	{
		return Response()->json(
	        [
	            'error' => [
	                'message' => 'Data not found !',
	                'status' => 404,
                    'error' => 1
	            ]
	        ],
	    404);
	}
}
