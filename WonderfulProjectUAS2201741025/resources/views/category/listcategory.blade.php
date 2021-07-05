@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container mb-5">

                    <h1 class="text-center">Category: {{$category->name}}</h1>

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
                                    <p>By {{$article->user->name}}</p>
                                    {{ \Illuminate\Support\Str::limit($article->description, 100, $end='') }}
                                    <a href="{{ url('articles/'.$article->id) }}">{{ __('...full story') }}</a> <br>
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
