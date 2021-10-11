<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use Illuminate\Support\Facades\Validator;


class DashboardStoreController extends Controller
{
    public function sports(Request $request)
    {
       $input = $request->all();
       //dd($input);
       $rules = [
        'name' => 'required',
        'description' => 'required|max:1000',
        'img_path' => 'max:2000',
        'icon_path' => 'max:3000'
       ];

       $validator = Validator::make($input, $rules);
       if ($validator->fails()) {
           //dd($validator);
           return redirect()->back()
          ->withErrors($validator)
          ->withInput();
       } else {
            
            $slug = str_replace(' ', '_', strtolower($input['name']));
            $sport = Sport::create([
                'name' => $slug,
                'display_name' => $input['name'],
                'description' => $input['description']                
            ]);
        return redirect()->route('sport.index');
       }
    }

    public function league(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $rules = [
         'league_name' => 'required',
         'email' => 'required|email',
         'description' => 'max:1000',
         'icon_path' => 'max:3000',
         'numero_equipos' => 'required'
        ];
 
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            //dd($validator);
            return redirect()->back()
           ->withErrors($validator)
           ->withInput();
        } else {
             
             $slug = str_replace(' ', '_', strtolower($input['name']));
             $sport = Sport::create([
                 'name' => $slug,
                 'display_name' => $input['name'],
                 'description' => $input['description']                
             ]);
         return redirect()->route('sport.index');
    }
}
