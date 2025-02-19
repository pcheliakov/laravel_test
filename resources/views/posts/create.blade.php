@extends('layouts.main') 
@section('content')
	<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="mb-3">
			<label for="title" class="form-label">Title</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
			@error('title')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
		<div class="mb-3">
			<label for="content" class="form-label">Content</label>
			<textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>
			@error('content')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
		<div class="mb-3">
			<label for="image" class="form-label">Image</label>
			<input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
		</div>
		<div class="mb-3 form-group">
			<label for="category" class="form-label">Category</label>
			<select class="form-select" id="category" name="category_id">
				@foreach ($categories as $category)
					<option {{ old('category_id') == $category->id ? ' selected' : '' }} value="{{ $category->id }}">
						{{ $category->title }}
					</option>
				@endforeach				
			</select>
		</div>
		<div class="mb-3 form-group">
			<label for="tags" class="form-label">Tags</label>
			<select class="form-select" multiple name="tags[]" id="tags">
				@foreach ($tags as $tag)
					<option {{ (collect(old('tags'))->contains($tag->id)) ? ' selected' : '' }} value="{{ $tag->id }}">
						{{ $tag->title }}
					</option>
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Создать</button>
	</form>
@endsection