<?php

namespace App\Http\Controllers;

use App\Models\SolicitudPropuesta;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Carbon\Carbon;

class GraficaSolicitudPropuestasController extends Controller
{
    public function index(Request $request)
    {
        $usermcount = [];
        $data_Arr = [];

        if ($request->tipo==0) {
            $users = SolicitudPropuesta::select('id', 'created_at')->where('empresa_id', $request->empresa_id)->where( SolicitudPropuesta::raw('YEAR(created_at)'), '=', $request->year)
                ->get()
                ->groupBy(function($date) {
                    //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                    return Carbon::parse($date->created_at)->format('W'); // grouping by months
                });
                
                foreach ($users as $key => $value) {
                    $usermcount[(int)$key] = count($value);
                }
                
                for($i = 1; $i <= 52; $i++){
                    if(!empty($usermcount[$i])){
                        $data_Arr[$i] = $usermcount[$i];    
                    }else{
                        $data_Arr[$i] = 0;    
                    }
                }
        }

        else {
            $users = SolicitudPropuesta::select('id', 'created_at')->where('empresa_id', $request->empresa_id)->where( SolicitudPropuesta::raw('YEAR(created_at)'), '=', $request->year)
                ->get()
                ->groupBy(function($date) {
                    //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                    return Carbon::parse($date->created_at)->format('m'); // grouping by months
                });
                
                foreach ($users as $key => $value) {
                    $usermcount[(int)$key] = count($value);
                }
                
                for($i = 1; $i <= 12; $i++){
                    if(!empty($usermcount[$i])){
                        $data_Arr[$i] = $usermcount[$i];    
                    }else{
                        $data_Arr[$i] = 0;    
                    }
                }
        }

        $year = ['2015','2016','2017','2018','2019','2021','2022','2023','2024','2025'];
    	return view('solicitud_propuesta.grafica')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($data_Arr,JSON_NUMERIC_CHECK));
    }
}
