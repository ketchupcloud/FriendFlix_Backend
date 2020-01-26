<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Episode; 

class EpisodeController extends Controller
{
    public function createEpisode(Request $request)
    {
		$episode = new Episode();
		
		$episode->title = $request->title;
        $episode->synopsis = $request->synopsis;
        $episode->ep_image = $request->ep_image;
        $episode->season = $request->season;
        $episode->ep_number = $request->ep_number;
        $episode->release_date = $request->release_date;
        $episode->series_id = $request->series_id;
		$episode->save();
		
		return response()->json([$episode]);
    }

    public function listEpisodes()
    {
	 	$episode = Episode::all(); 
	 	return response()->json([$episode]);
    }
    
     public function getEpisode($id)
    {
	 	$episode = Episode::findOrFail($id);
	 	return response()->json([$episode]);
	 }

    public function updateEpisode(Request $request, $id)
    {
		$episode = Episode::find($id);
        if($episode)
        {
            if($request->title){
                $episode->title = $request->title;
            }
            if($request->synopsis){
                $episode->synopsis = $request->synopsis;
            }
            if($request->ep_image){
                $episode->ep_image = $request->ep_image;
            }
            if($request->season){
                $episode->season = $request->season;
            }
            if($request->$ep_number){
                $episode->ep_number = $request->ep_number;
            }
            if($request->release_date){
                $episode->release_date = $request->release_date;
            }
            $episode->save();
            return responde()->json([$episode]);
        }
    }
    
    public function deleteEpisode($id){
        Episode::destroy($id);
        return responde()->json(['Episodio deletado.']);
    }
}
