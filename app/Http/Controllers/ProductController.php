<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;

class ProductController extends BaseController
{
    use RestControllerTrait;
    
    const MODEL = 'App\Models\Product';
    protected $validationRules = [
        'name' => 'required'
    ];

    public function check($barcode)
    {
        $m = self::MODEL;
    	if(!$m::where('code', $barcode)->exists())
        {
            return $this->notFoundResponse();
        }

        $data = $m::where('code', $barcode)->first();
        
        return $this->showResponse($data);
    }
}