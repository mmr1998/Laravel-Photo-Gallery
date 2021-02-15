@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Change Photo
				</div>
				<div class="card-body">
					<form action="{{route('updatePhoto', $photo->id)}}" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-6">
								<label>Caption</label>
								<input type="text" name="caption" value="{{$photo->caption}}" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Photo</label>
								<input type="file" name="photo" class="form-control">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-4">
								<label>Current Photo</label>
								<img src="{{asset('public/galleries/photos/' . $photo->photo)}}" alt="{{$photo->caption}}" width="100%">
							</div>
						</div>
						<br>
						<input type="hidden" name="gallery_id" value="{{$photo->id}}">
						<br>
						<div class="text-center">
							<button class="btn btn-primary " type="submit">Update Photo</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection