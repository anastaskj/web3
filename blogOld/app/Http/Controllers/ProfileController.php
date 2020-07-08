<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index') -> with('user', $user);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $user = Auth::user();
        return view('profile.edit')->with('user', $user);
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

        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = Auth::user();
        $filename; 
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            if ($request->input('grayscale') && $request->input('pixelized'))
            {
                Image::make($avatar)->resize(500, 500)->pixelate(10)->greyscale()->save( public_path('/storage/avatars/' . $filename ) );
            }
            else if($request->input('grayscale'))
            {
                Image::make($avatar)->resize(500, 500)->greyscale()->save( public_path('/storage/avatars/' . $filename ) );
            }
            else if($request->input('pixelized'))
            {
                Image::make($avatar)->resize(500, 500)->pixelate(10)->save( public_path('/storage/avatars/' . $filename ) );
            }
            else
            {
                Image::make($avatar)->resize(500, 500)->save( public_path('/storage/avatars/' . $filename ) );
            }
        }
        
        //Update Profile
        $user->name = $request->input('name');
        $user->age = $request->input('age');
        $user->phone = $request->input('phone');
        $user->line1 = $request->input('line1');
        $user->line2 = $request->input('line2');
        $user->city = $request->input('city');
        $user->postcode = $request->input('postcode');
        if($request->hasFile('avatar')) 
        {
            $user->avatar = $filename;
        }   
        $user->save();

        return redirect('/profile')->with('success', 'Profile Updated');
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
