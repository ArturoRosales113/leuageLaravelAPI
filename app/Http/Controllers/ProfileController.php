<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Http\Traits\ImageManagerTrait;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */

    //Manipulacion de assets
    use ImageManagerTrait;

    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function images(Request $request)
    {
        $input  = $request->all();
        //dd($request);

        if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
            if(auth()->user()->icon_path != null){
                $this->deleteAsset(auth()->user()->icon_path);
            }

            $iconFile = $request->file('icon_path');
            auth()->user()->update(['icon_path' => $this->createIcon($iconFile)]);

          }

        if (array_key_exists('img_path', $input) && $input['img_path'] != null) {

            if(auth()->user()->img_path != null){
                $this->deleteAsset(auth()->user()->img_path);
            }

            $img_path = $request->file('img_path');
            auth()->user()->update(['img_path' => $this->createIcon($img_path)]);

        }


        return back()->withImageStatus(__('Actualizado.'));
    }
}
