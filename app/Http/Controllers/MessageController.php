<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'message' => 'required|min:5|string',
        ]);
        
        // $block = Block::where('blocked_id', Auth::user()->id)->pluck('blocker_id');
        // dd( property_exists($block, Auth::user()->id));

        // if(!in_array(Auth::user()->id,$block)){
            $details = Message::create([
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
            ]);
            return redirect('dashboard');
        // }
        // echo "You Blocked";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($message)
    {
        $messages = Message::find($message);
        if ($messages->sender_id == Auth::user()->id) {
            $messages->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
