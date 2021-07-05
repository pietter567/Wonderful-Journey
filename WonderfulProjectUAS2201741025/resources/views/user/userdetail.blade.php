@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ $user->name }}'s {{ __('Profile') }}
                </div>

                <div class="card-body">
                    <div class="row">
                        <label for="name" class="col-md-2 col-form-label">{{ __('Name :') }}</label>
                        <label for="name" class="col-md-10 col-form-label">{{ $user->name }}</label>
                    </div>
                    
                    <div class="row">
                        <label for="email" class="col-md-2 col-form-label">{{ __('E-Mail :') }}</label>
                        <label for="name" class="col-md-10 col-form-label ">{{ $user->email }}</label>
                    </div>

                    <div class="row">
                        <label for="phone" class="col-md-2 col-form-label">{{ __('Phone :') }}</label>
                        <label for="name" class="col-md-10 col-form-label">{{ $user->phone }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection