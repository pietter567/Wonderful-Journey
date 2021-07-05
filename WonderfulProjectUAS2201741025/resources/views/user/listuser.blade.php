@extends('layouts.app')

@section('content')
<div class="container w-50">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('List Users') }}
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @if($user->role == 'User')
                            <tr>
                                <td style="vertical-align:middle;width: 30%;">
                                <a href="{{ url('users/'.$user->id) }}">{{ $user->name }}</a>
                                </td>
                                <td style="vertical-align:middle;width: 50%;">
                                <label>{{ $user->email }}</label>
                                </td>
                                <td style="vertical-align:middle;width: 20%;">
                                    <form method="POST" action="{{ url('users/'.$user->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection