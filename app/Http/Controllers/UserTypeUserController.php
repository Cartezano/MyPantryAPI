<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;

class UserTypeController extends BaseController
{
    use RestControllerTrait;
    
    const MODEL = 'App\Models\UserType';
    protected $validationRules = [
        'name' => 'required',
    ];
}