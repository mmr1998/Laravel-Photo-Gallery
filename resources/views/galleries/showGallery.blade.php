@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Photo</div>
				<div class="card-body">
					<div class="row">
						
							@foreach($photos as $photo)
								<div class="col-md-4">
									<a href="{{route('showPhoto', $photo->id)}}"><img src="{{asset('public/galleries/photos/' . $photo->photo)}}" alt="{{$photo->caption}}" width="100%"></a>
								</div>
							@endforeach						
					</div>
					<br><br>
					<div class="card-header">Description</div>
					<br>
					<p>{{$gallery->desc}}</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">{{$gallery->title}}</div>
				<div class="card-body">
					<img src="{{asset('public/galleries/' . $gallery->cover)}}" alt="cover" width="100%">
					<br><br>
					<a href="{{route('photoUpload', $gallery->id)}}" class="btn btn-primary btn-block">Add Photo</a>
					<a href="{{route('editGallery', $gallery->id)}}" class="btn btn-success btn-block">Edit Gallery</a>
					<a href="{{route('deleteGallery', $gallery->id)}}" class="btn btn-danger btn-block">Remove Gallery</a>
				</div>
			</div>
		</div>
	</div>
@endsection