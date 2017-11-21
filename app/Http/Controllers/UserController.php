<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Exception;

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
    protected $validationLogin = [
        'email' => 'required',
        'password' => 'required'
    ];

    public function login(Request $request)
    {
        $m = self::MODEL;
        try
        {
            $v = Validator::make($request->all(), $this->validationLogin);
            if($v->fails())
            {
                throw new Exception("ValidationException");
            }
            $data = $m::where('email', $request->email)->get()->last();

            if($data != null && Hash::check($request->password, $data->password)){
                return $this->showResponse($data);
            }
            return $this->errorResponse();
        }catch(Exception $ex)
        {
            $data = ['form_validations' => $v->errors(), 'exception' => $ex->getMessage()];
            return $this->clientErrorResponse($data);
        }
        
    }

    public function register(Request $request)
    {
        $m = self::MODEL;
        try
        {
            $v = Validator::make($request->all(), $this->validationRules);
            if($v->fails())
            {
                throw new Exception("ValidationException");
            }
            $data = $m::create($request->all());
            return $this->createdResponse($data);
        }catch(Exception $ex)
        {
            $data = ['form_validations' => $v->errors(), 'exception' => $ex->getMessage()];
            return $this->clientErrorResponse($data);
        }
        
    }
}