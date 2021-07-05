@extends('layouts.app')

@section('content')
<div class="container mb-5">

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create Blog') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('articles') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="title" class="col-form-label text-md-right">{{ __('Title') }}</label>

                            <div>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category_id" class="col-form-label text-md-right"><b>{{ __('Category :') }}</b></label>
                            
                                <select id="category_id" class="custom-select" name="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    
                        <div class="form-group row">
                            <label for="image" class="col-md-12 col-form-label"><b>{{ __('Photo :') }}</b></label>

                            <div class="col-md-12 text-center">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-form-label text-md-right">{{ __('Title') }}</label>

                            <div>
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" rows = "8" required autocomplete="description" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
         
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
