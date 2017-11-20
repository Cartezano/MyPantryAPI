<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Pantry;

class UserProductController extends BaseController
{
    use RestControllerTrait;

    protected $validationRules = [
        'expiration_date' => 'required',
        'quality' => 'required',
    ];

    public function index($id){
        if(!$data = User::find($id)){
            return $this->notFoundResponse();
        }
        return $this->showResponse($data->pantries);
    }

    public function store(Request $request, $user_id, $product_id){
        if(!$user = User::find($user_id)){
            return $this->notFoundResponse();
        }
        if(!$product = Product::find($product_id)){
            return $this->notFoundResponse();
        }

        try
        {
            $v = Validator::make($request->all(), $this->validationRules);
            if($v->fails())
            {
                throw new Exception("ValidationException");
            }
            $data = $request->all();
            $data['user_id'] = $user_id;
            $data['product_id'] = $product_id;
            $data = Pantry::create($data);
            return $this->createdResponse($data);
        }catch(Exception $ex)
        {
            $data = ['form_validations' => $v->errors(), 'exception' => $ex->getMessage()];
            return $this->clientErrorResponse($data);
        }
    }

    public function update(Request $request, $user_id, $product_id){
        if(!$user = User::find($user_id)){
            return $this->notFoundResponse();
        }
        if(!$product = Product::find($product_id)){
            return $this->notFoundResponse();
        }

        try
        {
            $v = Validator::make($request->all(), $this->validationRules);
            if($v->fails())
            {
                throw new Exception("ValidationException");
            }
            $pantry = Pantry::where('user_id', $user_id)->where('product_id', $product_id)->get()->last();
            $data = $pantry->fill($request->all());
            $data->save();

            return $this->createdResponse($data);
        }catch(Exception $ex)
        {
            $data = ['form_validations' => $v->errors(), 'exception' => $ex->getMessage()];
            return $this->clientErrorResponse($data);
        }
    }

    public function destroy($user_id, $product_id){
    	if(!$user = User::find($user_id))
        {
            return $this->notFoundResponse();   
        }

        if(!$product = Product::find($product_id)){
            return $this->notFoundResponse(); 
        }

        if(!$data = $user->pantries()->where('product_id', $product_id)->get()->last()){
            return $this->notFoundResponse(); 
        }

        $data->delete();
        return $this->deletedResponse();
    }
}