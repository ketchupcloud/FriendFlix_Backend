<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series; //SEMPRE ACRESCENTAR O PATH

class SeriesController extends Controller
{
    public function createSeries(Request $request)
    {
		$series = new Series();
		
		$series->name = $request->name;
        $series->synopsis = $request->synopsis;
		$series->image = $request->image;
		$series->year_release = $series->year_release;
		$series->ending = $series->year_end;
        
		$series->save();
		
		return response()->json([$series]);
    }

    public function listSeries()
    {
		$series = Series::all();
		return response()->json($series);
    }
    
    public function seriesId($id)
    {
		$series = Series::findOrFail($id);
		return response()->json([$series]);
	}

    
    public function updateSeries(request $request, $id){
        //NOTA: ao fazer request no postman para update, usar a aba BODY URLENCODED!
        $series = Series::find($id);
        
        if($series)
        {
			if($request->name){
				$series->name = $request->name;
			}
			if($series->image){
				$series->image = $request->image;
			}
			if($request->synopsis){
				$series->synopsis = $request->synopsis;
            }
            //else problematico aqui, usar IF ($REQUEST...? TO-DO verificar o input de parametro
			$series->save();
			return response()->json([$series]);
		}
		else{
			return response()->json(['Esta serie nao existe.']);
		}
	}
    
    public function deleteSeries($id){
        Series::destroy($id);
        return response()->json(['Serie deletada.']);
    }
}
