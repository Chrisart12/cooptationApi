<?php

namespace App\Http\Controllers;

use App\Http\Request\LikeRequest;
use App\Http\Resources\Like\LikeResource;
use App\Http\Resources\Like\LikeCollection;
use App\Model\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return LikeCollection::collection(Like::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLike(Request $request)
    {
         // On crée une instance de Like
         $like = new Like;

         $like->user_id = $request->input('user_id');
         $like->story_id = $request->input('story_id');
 
         $like->save();
 
         return Like::where('likes.user_id', '=', $like->user_id)
                     ->where('likes.story_id', '=', $like->story_id)
                     ->first();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
       
        return new LikeResource($like);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function allProfilLike($id)
    {
        //return new LikeResource($id);
        $likes = Like::select('likes.id', 'likes.user_id', 'likes.story_id', 'stories.story', 'stories.picture_path', 
                              'stories.bg_position_x', 'stories.bg_position_y', 'users.lastname', 'users.firstname')
                       ->where('likes.user_id', '=', $id)
                       ->join('stories', 'stories.id', '=', 'likes.story_id')
                       ->join('users', 'users.id', '=', 'stories.user_id')
                       ->get();
        return $likes;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function deleteLike($id)
    {
        $like = Like::find($id);
        $like->delete();
    }
}
