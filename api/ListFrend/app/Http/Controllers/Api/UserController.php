<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        $list = [];
        foreach ($users as $user) {
            $object = [
                "id" => $user->id,
                "Nombre" => $user->name,
                "Apellido" => $user->surname,
                "Email" => $user->email,
                "Celular" => $user->phone,
                "Correo_verificado_en" => $user->email_verified_at,
                "Status" => $user->status,
                "Nivel" => $user->level,
                "Imagen" => $user->image,
                "Remember_token" => $user->remember_token,
                "Created" => $user->updated_at,
                "Updated" => $user->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id)
    {
        $user = User::findOrFail($id);
        $object = [
            "id" => $user->id,
            "Nombre" => $user->name,
            "Apellido" => $user->surname,
            "Email" => $user->email,
            "Celular" => $user->phone,
            "Correo_verificado_en" => $user->email_verified_at,
            "Imagen" => $user->image,
            "Remember_token" => $user->remember_token,
            "Created" => $user->updated_at,
            "Updated" => $user->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|numeric',
            'password' => 'required|string'
        ]);
        
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
        
        if ($user) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $user,
            ];
            return response()->json($object);
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.'
            ];
            return response()->json($object);
        }
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|int',
            'email' => 'required|string',
            'phone' => 'required|numeric',
            'status' => 'required|int',
            'level' => 'required|int',
            'image' => 'required|string',
        ]);

        $user = User::findOrFail($data['id']);
        
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->status = $data['status'];
        $user->level_id = $data['level_id'];
        $user->image = $data['image'];

        if ($user->save()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $user,
            ];
            return response()->json($object);
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.'
            ];
            return response()->json($object);
        }
    }
}
