<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interest;

class InterestController extends Controller
{
    public function list() {
        $Interest =  Interest::all();
        $list = [];
        foreach($Interest as $Interest) {
            $object = [
                "id" => $Interest->id,
                "Nombre" => $Interest->name,
                "Categoria" => $Interest->category,
                "Created" => $Interest->updated_at,
                "Updated" => $Interest->updated_at

            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $Interest =  Interest::where('id', '=', $id)->first();
        $object = [
            "id" => $Interest->id,
            "Nombre" => $Interest->name,
            "Categoria" => $Interest->category,
            "Created" => $Interest->updated_at,
            "Updated" => $Interest->updated_at
        ];
        return response()->json($object);
    }
    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string'
            
        ]);
        $Interest = Interest::create([
            'name'=>$data['name'],
            'category'=>$data['category'],
          
        ]);
        if ($Interest) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $Interest,
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
        'name' => 'string',
        'category' => 'string',
     
    ]);

    $Interest =  Interest::where('id', '=', $data['id'])->first();

    $Interest->name = $data['name'];
    $Interest->category = $data['category'];
   
 
    if ($Interest->update()) {
        $object = [
            "response" => 'Success. Item saved correctly.',
            "data" => $Interest,
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
