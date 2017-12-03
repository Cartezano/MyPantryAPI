<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\RestControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Exception;

class PantryController extends BaseController
{
    use RestControllerTrait;
    
    const MODEL = 'App\Models\Pantry';
    protected $validationRules = [
        'expiration_date' => 'required',
        'quality'   =>  'required'
    ];

    public function discount(Request $request)
    {
        $m = self::MODEL;
        
    	if($m::where('product_id', $request->product_id)->where('user_id', $request->user_id)->where('expiration_date', $request->expiration_date)->exists())
        {
            $request->quality = - $request->quality;
            $this->updateQuality($request);
        }
    }

    public function count(Request $request)
    {
        $m = self::MODEL;
        
    	if(!$m::where('product_id', $request->product_id)->where('user_id', $request->user_id)->where('expiration_date', $request->expiration_date)->exists())
        {
            $this->store($request);
        } else {
            $this->updateQuality($request);
        }
    }

    public function updateQuality(Request $request)
    {
        $m = self::MODEL;
        if(!$data = $m::where('product_id', $request->product_id)->where('user_id', $request->user_id)->where('expiration_date', $request->expiration_date)->first())
        {
            return $this->notFoundResponse();   
        }
        try
        {
            $v = Validator::make($request->all(), $this->validationRules);
            if($v->fails())
            {
                throw new Exception("ValidationException");
            }
            if(($data->quality + $request->quality) >= 0){
                $data->quality = $data->quality + $request->quality;
                $data->save();

                return $this->showResponse($data);
            }

            return $this->notFoundResponse(); 
        }catch(Exception $ex)
        {
            $data = ['form_validations' => $v->errors(), 'exception' => $ex->getMessage()];
            return $this->clientErrorResponse($data);
        }
    }
}