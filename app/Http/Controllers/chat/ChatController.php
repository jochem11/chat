<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use App\Models\chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index($id)
    {
        $messages = Chat::with('user')->where('friends_id', $id)->get();
        return view('chat.chat', ['messages' => $messages, 'id' => $id]);
    }

    public function store(Request $request, $id)
    {
        //make new chat row in chat table
        $chat = new chat();
        $chat->friends_id = $id;
        $chat->user_id = auth()->id();
        $chat->message = $request->message;
        $chat->save();
        //navigate back
        return redirect()->back();
    }
}
