@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container mb-5">

                    @foreach($articles as $article)
                            @if($loop->index % 3 === 0)
                                <div class="row row-cols-3 my-3">
                            @endif

                        <div class="px-2">
                            <div class="card">

                                <a href="{{ url('articles/'.$article->id) }}">
                                    <img src="{{ asset('storage/images/'.$article->image) }}" class="card-img-top" style="width: 100%; height: 200px">
                                </a>

                                <div class="card-body">
                                    <h1 class="card-title">{{$article->title}}</h1>

                                    @guest
                                        <p class="font-weight-bold mt-2">Created by : {{$article->user->name}}</p>
                                    @else
                                        @if(Auth::user()->role == 'User')
                                            <p class="font-weight-bold mt-2">Created by : {{$article->user->name}}</p>
                                        @else
                                            <p><a href = "{{ url('users/'.$article->user->id) }}" class="font-weight-bold mt-2">By {{$article->user->name}}</a></p>
                                        @endif
                                    @endguest

                                    {{ \Illuminate\Support\Str::limit($article->description, 100, $end='') }}
                                    <a href="{{ url('articles/'.$article->id) }}">{{ __('...full story') }}</a> <br>
                                    <p>Category : <a href = "{{ url('categories/'.$article->category->id) }}">{{$article->category->name}}</a></p>

                                    @guest

                                    @else
                                        @if(Auth::user()->role == 'User')

                                        @else
                                        <form method="POST" action="{{ url('articles/'.$article->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    {{ __('Delete') }}
                                                </button>
                                        </form>
                                        @endif
                                    @endguest


                                </div>
                                
                            </div>

                            @if($loop->iteration % 3 === 0 || $loop->last)
                                </div>
                            @endif
                        </div>
                            
                    @endforeach
                    
        </div>
    </div>
</div>
@endsection
