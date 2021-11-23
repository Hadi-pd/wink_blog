<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $block = Block::where('blocked_id', Auth::user()->id)->pluck('blocker_id');
        $blocked = Block::where('blocker_id', Auth::user()->id)->pluck('blocked_id');
        $blocked_users = User::whereIn('id', $blocked)->get();
        $users = User::whereNotIn('id', $block)->whereNotIn('id',$blocked)->get();
        $messages = Message::all();
        return view('user.dashboard', compact('users', 'messages','blocked_users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::find($user_id);
        return view('user.message_form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $users = User::find($user);
        $users->suspend = $request->suspend;
        $users->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $users = User::find($user);
        $users->delete();
        return redirect()->back();
    }

    public function block(Request $request)
    {
        $details = Block::create([
            'blocker_id' => $request->blocker_id,
            'blocked_id' => $request->blocked_id,
        ]);
        return redirect()->back();
    }
    public function removeBlock($user_id)
    {
        $users = Block::where('blocked_id' , $user_id)->where('blocker_id' , Auth::user()->id);
        $users->delete();
        return redirect()->back();
    }
    // public function check_block($user=null){
    //     $blocked_user = Block::where('blocker_id' , Auth::user() )->get();
    //     return $blocked_user;
    //     //if(Block::where('blocker_id',))
    // }
}
