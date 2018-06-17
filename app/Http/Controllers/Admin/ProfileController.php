<?php

namespace App\Http\Controllers;

use App;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update_avatar(Request $request)
    {
        // Upload player's avatar
        If($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ));

            $player = Auth::user();
            $player->avatar = $filename;
            $player->save();
        }

        return view('front.profile', array('player' => Auth::user()));
    }

}
