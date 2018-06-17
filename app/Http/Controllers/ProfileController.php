<?php

namespace App\Http\Controllers;

use App;
use App\Player;
use App\Player_profile;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{

    public function uprofile()
    {
        return view('front.profile', array('user' => Auth::user()));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update_avatar(Request $request)
    {
        // Upload user's avatar
        If($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('front.profile', array('user' => Auth::user()));
    }

    public function index(){
        $players = App\Player::all();
        return view('players.index', compact('players'));
    }

    public function show($id){
        $player = App\Player::find($id);
        return view('players.show', compact('player'));
    }

    public function update_player_avatar(Request $request)
    {
        // Upload player's avatar
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/avatars');
        $image->move($destinationPath, $input['imagename']);

        return view('players.show')->with('avatar', $input['imagename']);
    }

//    public function pprofile($player_id)
//    {
//        $players = Player::;
//        $player_profiles = Player_profile::where('player_id', $player_id)->get();
//        return view('front.pprofile', compact('players', 'player_profiles'));
//    }

//    public function players($team_id)
//    {
//        $team = Team::find($team_id);
//        $players = Player::where('team_id', $team_id)->get();
//        return view('front.players', compact('players', 'team'));
//    }

}
