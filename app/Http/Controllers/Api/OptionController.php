<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmailResource;
use App\Http\Resources\FilterResource;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function filter(){
        $option=Option::find(1);
        if($option){
            return response()->json(['filter'=>new FilterResource($option)]);
        }
        return response()->json(['status'=>'error']);
    }

    public function mails(){
        $option=Option::find(1);
        if($option){
            return response()->json(['mails'=>new EmailResource($option)]);
        }
        return response()->json(['status'=>'error']);
    }
}
