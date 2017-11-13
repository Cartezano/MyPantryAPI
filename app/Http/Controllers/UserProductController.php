<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;
use App\Models\User;

class UserProductController extends BaseController
{
    use RestControllerTrait;

    public function index($id){
        if($data = User::find($id)){
            return $this->listResponse($data->pantries);
        }
        return $this->notFoundResponse();
    }
}