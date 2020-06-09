<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Mission
use Illuminate\Support\Facades\DB;

class MissionRepository
{
    public function getCountDays($id)
    {
        $scope = Mission::select(sum(ct_days))->where('clients_id', $id);
        dd($scopre);
        return $scope;
    }
}