<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;

class CategoryController extends BaseController
{
    use RestControllerTrait;
    
    const MODEL = 'App\Models\Category';
    protected $validationRules = [
        'name' => 'required',
    ];
}