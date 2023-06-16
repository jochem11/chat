<?php

namespace App\Http\Controllers\friends;

use App\Http\Controllers\Controller;
use App\Models\friends;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class friendsController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->whereNotIn('id', friends::where('user_id', auth()->id())->pluck('friend_id'))->whereNotIn('id', friends::where('friend_id', auth()->id())->pluck('user_id'))->get();
        $friends = friends::where('user_id', auth()->id())->orWhere('friend_id', auth()->id())->get();
        foreach ($friends as $friend) {
            if ($friend->user_id == auth()->id()) {
                $friend->name = User::where('id', $friend->friend_id)->pluck('name')->first();
            } else {
                $friend->name = User::where('id', $friend->user_id)->pluck('name')->first();
            }
        }
        return view('friends.friends', compact(['users', 'friends']));
    }

    public function store(Request $request)
    {
        $friends = new friends();
        //make new friend row in friends table
        $friends->user_id = auth()->id();
        $friends->friend_id = $request->friend_id;
        $friends->save();
        //navigate to friends
        return redirect('/friends');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');

        // Verwijder de rij met het opgegeven ID
        friends::destroy($id);

        // Navigeer naar de overzichtspagina
        return redirect('/friends');
    }

}
