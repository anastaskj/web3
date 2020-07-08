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
            'age' => 'numeric',
            'phone' => 'numeric',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = Auth::user();
        $filename; 
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $img = Image::make($avatar)->resize(500, 500);
            
            if($request->input('grayscale'))
            {
                $img->greyscale();
            }
            if($request->input('pixelized'))
            {
                $img->pixelate(10);
            }

            $watermark = Image::make(public_path('/storage/avatars/watermark.png'));     
            $watermarkSize = $img->width() - 20; //size of the image minus 20 margins
            $watermarkSize = $img->width() / 2; //half of the image size
            $resizePercentage = 30;
            $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); 
            $watermark->resize($watermarkSize, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->insert($watermark, 'center'); 
               
            $img->save( public_path('/storage/avatars/' . $filename ));
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
