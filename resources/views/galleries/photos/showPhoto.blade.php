@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Action</div>
				<div class="card-body">
					<a href="{{route('changePhoto', $photo->id)}}" class="btn btn-success btn-block">Edit Photo</a>
					<a href="{{route('deletePhoto', $photo->id)}}" class="btn btn-danger btn-block">Delete Photo</a>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{$photo->caption}}</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<img src="{{asset('public/galleries/photos/' . $photo->photo)}}" alt="{{$photo->caption}}" width="100%">
						</div>				
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection