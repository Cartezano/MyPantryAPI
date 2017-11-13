<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;

class PantryController extends BaseController
{
    use RestControllerTrait;
    
    const MODEL = 'App\Models\Pantry';
    protected $validationRules = [
        'name' => 'required',
    ];
}