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
}