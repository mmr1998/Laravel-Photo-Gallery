@extends('layouts.app')
@section('content')
    <div class="jumbotron home">
        <h1>Welcome to My gallery</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus massa dolor, finibus sit amet facilisis eu, venenatis ac dui. Sed vel molestie ligula, in pharetra sapien. Nulla facilisi. Aliquam rutrum odio id convallis rhoncus. Sed rhoncus ultricies neque, egestas blandit augue hendrerit a. Curabitur viverra diam vestibulum, tristique sapien id, venenatis tellus. Integer at dui rhoncus, finibus orci quis, ullamcorper sapien. Nunc mollis cursus erat sit amet venenatis.</p>
        <div class="row">
        	@foreach($all as $one)
        		<div class="col-md-4">
        			<img src="{{asset('public/galleries/' . $one->cover)}}" alt="{{$one->title}}" width="100%">
        			<div class="caption">
        				<a href="#">{{$one->title}}</a>
        			</div>
        		</div>
        	@endforeach
        </div>
    </div>

@endsection