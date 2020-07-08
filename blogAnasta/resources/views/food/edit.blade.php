@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Product Edit</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Form::open(array('action' => array('FoodController@update', $food->id), 'method'=> 'POST', 'files' => true)) }}

                    <div class="form-group">
                            {{Form::label('name', 'Name')}}
                            {{Form::text('name', $food->name,['class' => 'form-control', 'placeholder' => 'Name' ])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('avatar', 'Picture')}}
                        <div class = "row">
                            <div class = "col-md-9">
                                <p>{{Form::file('avatar')}}</p>
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>
                            <div class="form-group col-md-2">
                                    {{Form::label('category', 'Category')}}
                                    {{Form::select('category', array('Drink' => 'Drink', 'Main Course' => 'Main Course', 'Extra' => 'Extra', 'Dessert' => 'Dessert'), $food->category)}}    
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                            {{Form::label('description', 'Description')}}
                            {{Form::textarea('description', $food->description,['class' => 'form-control', 'placeholder' => 'Description of the product' ])}}
                    </div>

                     <div class="form-row">
                        
                        <div class="form-group col-md-5">
                                {{Form::label('price', 'Price')}}
                                {{Form::text('price',number_format($food->price, 2), ['class' => 'form-control','placeholder' => 'Price' ])}}
                        </div>
                    </div>  
                          <hr>
                        <div class="form-row">
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Submit', ['class'=>'btn btn-primary btn-lg btn-block'])}}
                        </div>
                    {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection