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
                    {{ Form::open(array('action' => array('ProfileController@update', $user->id), 'method'=> 'POST', 'files' => true)) }}

                        <div class="form-group">
                                {{Form::label('name', 'Name')}}
                                {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name' ])}}
                        </div>
                            <div class="form-group">
                                {{Form::label('avatar', 'Avatar')}}
                                <div class = "row">
                                    <div class = "col-md-9">
                                        <p>{{Form::file('avatar')}}</p>
                                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                                    </div>
                                <div class = "col-md-3">
                                    <p>Grayscale {{Form::checkbox('grayscale', 'grayscale')}}</p>
                                    <p>Pixelized {{Form::checkbox('pixelized', 'pixelized')}}</p>
                                </div>
                                </div>
                            </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {{Form::label('phone', 'Phone')}}
                                {{Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Phone' ])}}
                            </div>
                            <div class="form-group col-md-2">
                                    {{Form::label('age', 'Age')}}
                                    {{Form::text('age', $user->age, ['class' => 'form-control','placeholder' => 'Age' ])}}
                            </div>
                        </div>
    
                        <div class="form-group">
                                {{Form::label('line1', 'Address')}}
                                {{Form::text('line1', $user->line1, ['class' => 'form-control', 'placeholder' => '1234 Main St' ])}}
                        </div>

                        <div class="form-group">
                                {{Form::label('line2', 'Address 2')}}
                                {{Form::text('line2', $user->line2, ['class' => 'form-control', 'placeholder' => 'Apartment, studio, or floor' ])}}                          
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    {{Form::label('city', 'City')}}
                                    {{Form::text('city', $user->city, ['class' => 'form-control', 'placeholder' => 'City' ])}}
                            </div>
                            <div class="form-group col-md-2">
                                    {{Form::label('postcode', 'Post Code')}}
                                    {{Form::text('postcode', $user->postcode, ['class' => 'form-control', 'placeholder' => 'eg. 4124 KG' ])}}
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