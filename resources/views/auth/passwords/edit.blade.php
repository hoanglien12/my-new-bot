@extends('client.layouts.master')
@section('title','Edit Password')
@section('content')
    <div class="container" style="width: 60%; margin-left: 30%">
        <h3 style="text-align: center; color: blue; padding-bottom: 40px;">{{ __('Change Password') }}</h3>

        @if($errors->has('message'))
            <div class="col-sm-7 mb-4">
                <span class="alert alert-success">{{ __($errors->first('message')) }}</span>
            </div>
        @endif

        {!! Form::model($user, [
            'method' => 'PUT',
            'url' => route('updatePass'),
            'class' => 'from-horizontal',
        ]) !!}

            <div class="form-group row">
                {!! Form::label(__('Old Password'), null, ['class' => 'form-label col-sm-3']) !!}
                <div class="col-sm-5">
                    {!! Form::password('oldPassword', ['class' => 'form-control']) !!}
                </div>
                @if($errors->has('oldPassword'))
                <div class="offset-sm-3 col-sm-5">
                    <span class=" text-danger">{{ __($errors->first('oldPassword')) }}</span>
                </div>
                @endif
            </div>

            <div class="form-group row">
                {!! Form::label(__('New Password'), null, ['class' => 'form-label col-sm-3']) !!}
                <div class="col-sm-5">
                    {!! Form::password('newPassword', ['class' => 'form-control']) !!}
                </div>
                @if($errors->has('newPassword'))
                <div class="offset-sm-3 col-sm-5">
                    <span class=" text-danger">{{ __($errors->first('newPassword')) }}</span>
                </div>
                @endif
            </div>

            <div class="form-group row">
                {!! Form::label(__('Confirm Password'), null, ['class' => 'form-label col-sm-3']) !!}
                <div class="col-sm-5">
                    {!! Form::password('confirmPassword', ['class' => 'form-control']) !!}
                </div>
                @if($errors->has('confirmPassword'))
                <div class="offset-sm-3 col-sm-5">
                    <span class=" text-danger">{{ __($errors->first('confirmPassword')) }}</span>
                </div>
                @endif
            </div>

            <div class="form-group row">
                <div class="col-sm-5 offset-sm-3"> 
                    <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    
@endsection
