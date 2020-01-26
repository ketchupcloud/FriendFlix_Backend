<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function createComment(Request $request){
        $comment = new Comment();

        $comment->post = $request->post;
        $comment->post_image = $request->post_image;
        $comment->user_id = $request->user_id;
        $comment = save();

        return responde()->json([$comment]);
    }

    public function updateComment(Request $request, $id)
    {
		$comment = Comment::find($id);
        if($comment)
        {
            if($request->title){
                $episode->name = $request->name;
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
                $episode->ep_number = $request->$ep_number;
            }
            if($request->release_date){
                $episode->release_date = $request->release_date;
            }
            $episode->save();
            return responde()->json([$episode]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
