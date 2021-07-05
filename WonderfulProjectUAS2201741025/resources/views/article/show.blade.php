@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container mb-5" style="background-color:#F9F9F9">
            <div class="row p-0">

                    <div class="col-md-6 p-0">
                        <img src="{{ asset('storage/images/'.$article->image) }}" style="width: 100%; height: auto"> 
                    </div>    

                    <div class="col-md-6 p-0">
                        <div class = "card p-2" style="background-color: rgba(245, 245, 245, 0); border: none;">
                            <div class="card-body">
                                <h1 class="font-weight-bold mt-2">{{$article->title}}</h1>


                                @guest
                                    <p class="font-weight-bold mt-2">Created by : {{$article->user->name}}</p>
                                @else
                                    @if(Auth::user()->role == 'User')
                                        <p class="font-weight-bold mt-2">Created by : {{$article->user->name}}</p>
                                    @else
                                        <p><a href = "{{ url('users/'.$article->user->id) }}" class="font-weight-bold mt-2">By {{$article->user->name}}</a></p>
                                    @endif
                                @endguest

                                <p>{{$article->description}}</p>

                                <a class= "btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
                            </div>
                        </div>
                    </div>

            </div>
                
            
        </div>
    </div>
</div>
@endsection
