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
                <a href="{{ url('articles/create') }}" class="btn btn-outline-primary text-primary">{{ __('+ Create Blog') }}</a>
                </div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td style="vertical-align:middle;width: 50%;">
                                <a href="{{ url('articles/'.$article->id) }}">{{ $article->title }}</a>
                                </td>
                                <td style="vertical-align:middle;width: 50%;">
                                    <form method="POST" action="{{ url('articles/'.$article->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection