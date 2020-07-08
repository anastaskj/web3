<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Intervention\Image\ImageManagerStatic as Image;

class FoodController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin', ['except' =>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food =  Food::orderBy('name', 'desc')->paginate(10);
        return view('food.index') -> with('food', $food);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'description' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $food = new Food;
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->category = $request->input('category');
        $food->description = $request->input('description');
        if($request->hasFile('avatar')) 
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(500, 500)->save( public_path('/storage/avatars/' . $filename ) );
            $food->avatar = $filename;
        }   

        $food->save();
        return redirect('/food')-> with('success', 'Product added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);
        return view('food.show') -> with('food', $food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('food.edit') -> with('food', $food);
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
            'name' => 'required|unique:products',
            'price' => 'required|numeric',
            'category' => 'required',
            'description' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        

        $food = Food::find($id);
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->category = $request->input('category');
        $food->description = $request->input('description');
        
        if($request->hasFile('avatar')) 
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(500, 500)->save( public_path('/storage/avatars/' . $filename ) );
            $food->avatar = $filename;
        }   

        $food->save();
        return redirect('/food')-> with('success', 'Product updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Food::find($id);
        $product->delete();
        return redirect('/food')-> with('success', 'Product deleted.');
    }


}
