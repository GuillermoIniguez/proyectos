<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matches;

class MatchesController extends Controller
{
    public function list() {
        $Matchh =  Matches::all();
        $list = [];
        foreach($Matchh as $Match) {
            $object = [
                "id" => $Match->id,
                "User_id" => $Match->user,
                "Created" => $Match->updated_at,
                "Updated" => $Match->updated_at

            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $Matchh =  Matches::where('id', '=', $id)->first();
        $object = [
            "id" => $Matchh->id,
                "User_id" => $Matchh->user_id,
                "Created" => $Matchh->updated_at,
                "Updated" => $Matchh->updated_at

        ];
        return response()->json($object);
    }
    public function create(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|integer',
          
            
        ]);
        $Match = Matches::create([
            'user_id'=>$data['user_id'],
            
          
        ]);
        if ($Match) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $Match,
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
         
        ]);

        $Matches =  Matches::where('id', '=', $data['id'])->first();

        $Matches->user_id = $data['user_id'];
       
     
        if ($Matches->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $Matches,
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
