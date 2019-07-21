<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class ClubeController extends Controller
{
	public function listTeam(){
		return Team::all();
	}
	public function showTeam($id){
		$team = Team::find($id);

        if($team){
        	return response()->success($team);
        } else{
        	$data = "Not found, check the id");
			return response()->error($data,400);
        }
	}
	public function createTeam(Request $request){
		$team = new Team;

		$team->name = $request->name;
		$team->main_color = $request->main_color;
		$team->nickname = $request->nickname;
		$team->mascot = $request->mascot;
		$team->origin_country = $request->origin_country;
		$team->save();

		return response()->success($team);
	}
	public function updateTeam(Request $request,$id){

		$team = Team::findOrFail($id);

		if($request->name)
			$team->name = $request->name;

        if($request->main_color)
			$team->main_color = $request->main_color;	
		if($request->nickname)
			$team->nickname = $request->nickname;
		if($request->mascot)
			$team->mascot = $request->mascot;
		if($request->origin_country)
			$team->origin_country = $request->origin_country;

		return response()->success($team);

	}

	public function deleteTeam($id){
        Team::destroy($id);
        return response()->success('Team Deleted');
	}


}
