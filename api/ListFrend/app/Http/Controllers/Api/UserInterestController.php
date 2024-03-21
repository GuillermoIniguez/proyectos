<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserInterest;

class UserInterestController extends Controller
{
    public function list() {
        $UserInterest =  UserInterest::all();
        $list = [];
        foreach($UserInterest as $UserInterest) {
            $object = [
                "id" => $UserInterest->id,
                "user_id" => $UserInterest->user_id,
                "interest_id" => $UserInterest->interest_id,
                "Created" => $UserInterest->updated_at,
                "Updated" => $UserInterest->updated_at

            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $UserInterest =  UserInterest::where('id', '=', $id)->first();
        $object = [
            "id" => $UserInterest->id,
                "user_id" => $UserInterest->user_id,
                "interest_id" => $UserInterest->interest_id,
                "Created" => $UserInterest->updated_at,
                "Updated" => $UserInterest->updated_at
        ];
        return response()->json($object);
    }
    public function create(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'interest_id' => 'required|integer'
            
        ]);
        $UserInterest = UserInterest::create([
            'user_id'=>$data['user_id'],
            'interest_id'=>$data['interest_id'],
        ]);
        if ($UserInterest) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $UserInterest,
            ];
            return response()->json($object);
        }else{
            $object = [
                "response" => 'Error: Something went wrong, please try again.'
            ];
            return response()->json($object);
        }
    }
   
    public function update( Request $request){
        $data = $request->validate([
            'user_id' => 'int',
            'interest_id' => 'int',
         
        ]);

        $UserInterest =  UserInterest::where('id', '=', $data['id'])->first();

        $UserInterest->user_id = $data['user_id'];
        $UserInterest->interest_id = $data['interest_id'];
       
     
        if ($UserInterest->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $UserInterest,
            ];
            return response()->json($object);
        }else{
            $object = [
                "response" => 'Error: Something went wrong, please try again.'
            ];
            return response()->json($object);
        }
    }
}