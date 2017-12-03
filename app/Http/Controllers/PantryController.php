<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;

class PantryController extends BaseController
{
    use RestControllerTrait;
    
    const MODEL = 'App\Models\Pantry';
    protected $validationRules = [
        'expiration_date' => 'required',
        'quality'   =>  'required'
    ];

    public function discount($product_id, $user_id, Request $request)
    {
        $m = self::MODEL;
    	if(!$m::where('product_id', $product_id)->where('user_id', $user_id)->exists())
        {
            return $this->notFoundResponse();   
        }

        $data = $m::where('product_id', $product_id)->where('user_id', $user_id)->where('expiration_date', $request->expiration_date)->get();
        
        return $this->showResponse($data);
    }

    public function count($id)
    {
        $m = self::MODEL;
    	if(!$m::where('code', $barcode)->exists())
        {
            return $this->notFoundResponse();   
        }

        $data = $m::where('code', $barcode)->get();
        
        return $this->showResponse($data);
    }
}