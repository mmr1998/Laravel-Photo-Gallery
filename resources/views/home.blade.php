@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        @foreach($galleries as $gallery)
                        <div class="col-md-4">
                            <a href="{{route('showGallery', $gallery->id)}}">
                                <img src="{{asset('public/galleries/' . $gallery->cover)}}" alt="cover" width="100%">
                            </a>
                            <p>{{ $gallery->title }}</p>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Create new gallery</div>
                <div class="card-body">
                    <a href="{{route('createGallery')}}" class="btn btn-success btn block">Create now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
