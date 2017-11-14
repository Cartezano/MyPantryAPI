<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;
use App\Models\Category;

class CategoryProductController extends BaseController
{
    use RestControllerTrait;

    public function index($id){
        if($data = Category::find($id)){
            return $this->listResponse($data->products);
        }
        return $this->notFoundResponse();
    }
}