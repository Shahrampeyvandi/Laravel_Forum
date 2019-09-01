<?php

namespace LaravelForum\Http\Controllers;

use LaravelForum\Reply;
use Illuminate\Http\Request;
use LaravelForum\Disccussion;
use LaravelForum\Http\Requests\createDisccussionRequest;

class DisccussionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('disccussions.index' ,['disccussions' => Disccussion::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('disccussions.create');
    }


    public function Reply(Disccussion $disccussion , Reply $reply)
    {
        $disccussion->markAzBestReply($reply);

        session()->flash('success' , 'success!!!');
        
        return back();
    }

    
    public function store(Request $request)
    {
    //    $data=  $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //         'channel_id' => ' required'
    //     ]);
//   $validate=\Validator::make($request->all() , [
//         'title' => 'required',
//         'content' => 'required',
//         'channel_id' => ' required'
//      ]);
//         if($validate->fails()){
//             return back()->withErrors($validate);
//         }
       
       Disccussion::create([
            'title' => $request->name,
            'user_id' =>auth()->user()->id,
            'slug' => \str_slug($request->name),
            'content' => $request->content,
            'channel_id' => $request->channel
        ]);

        \session()->flash('success' , 'Discussion Created');
        return \redirect(route('disccussion.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Disccussion $disccussion)
    {
        return view('disccussions.show' , ['disccussion' => $disccussion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
