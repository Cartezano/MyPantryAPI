<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;

class UserController extends BaseController
{
    use RestControllerTrait;

    const MODEL = 'App\Models\User';
    protected $validationRules = [
        'name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];
}