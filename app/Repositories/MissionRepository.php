<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Mission;
use App\Client;
use Illuminate\Support\Facades\DB;

class MissionRepository
{
    public function getCountDays($id)
    {
        $scope = Mission::where('clients_id', '=', $id)->sum('ct_days');
        return $scope;
    }
    public function getCountFactures($id)
    {
    	$total = 0;
        $all_missions = Mission::where('clients_id', '=', $id)->get();
        
        foreach($all_missions as $all_mission) {
			$adr = Mission::where('id', '=', $all_mission->id)->first('adr');
			//dd($adr);
			$days = Mission::where('id', '=', $all_mission->id)->first('ct_days');
			$total_mission = $adr->adr * $days->ct_days;
			$total = $total + $total_mission;
        }
        
        return $total;
    }
    public function getLastMission($id, $client)
    {
		$last_mission = Mission::where('clients_id', '=', $id)->orderBy('end_date', 'desc')->first('end_date');
		//dd($last_mission->end_date);
		if(empty($last_mission)) {
			return false;
		}
		else {
        	return $last_mission->end_date;
		}
    }
}