@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Add New Photo
				</div>
				<div class="card-body">
					<form action="{{route('storePhoto')}}" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-6">
								<label>Caption</label>
								<input type="text" name="caption" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Photo</label>
								<input type="file" name="photo" class="form-control">
							</div>
						</div>
						<br>
						<input type="hidden" name="gallery_id" value="{{$gallery->id}}">
						<br>
						<div class="text-center">
							<button class="btn btn-primary " type="submit">Create Gallery</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection