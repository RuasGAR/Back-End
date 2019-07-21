<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fan;

class OnlookerController extends Controller
{
	public function listFan(){
		return Fan::all();
	}
	public function showFan($id){
		$fan = Fan::find($id);
		
		if($fan){
        	return response()->success($fan);
        } else{
        	$data = "Not found, check the id");
			return response()->error($data,400);
        }
	}
	public function createFan(Request $request){
		$fan = new Fan;

		$fan->name = $request->name;
		$fan->cpf = $request->cpf;
		$fan->age = $request->age;
		$fan->email = $request->email;
		$fan->save();

		return response()->success($fan);
	}
	public function updateFan(Request $request,$id){

		$fan = Fan::findOrFail($id);

		if($request->name)
			$fan->name = $request->name;
        if($request->cpf)
			$fan->cpf = $request->cpf;	
		if($request->age)
			$fan->age = $request->age;
		if($request->email)
			$fan->email = $request->email;
		return response()->success($fan);

	}

	public function deleteFan($id){
        Fan::destroy($id);
        return response()->success('Fan Deleted');
	}

}
