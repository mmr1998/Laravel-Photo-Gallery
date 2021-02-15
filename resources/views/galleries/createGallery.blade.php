@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Create new gallery
				</div>
				<div class="card-body">
					<form action="{{route('storeGallery')}}" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-6">
								<label>Gallery Title</label>
								<input type="text" name="title" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Gallery cover</label>
								<input type="file" name="cover" class="form-control">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<label>Gallery Description</label>
								<textarea name="desc" rows="5" class="form-control"></textarea>
							</div>
						</div>
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