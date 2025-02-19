@extends('layouts.main') 
@section('content')
	<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('patch')
		<div class="mb-3">
			<label for="title" class="form-label">Title</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
		</div>
		<div class="mb-3">
			<label for="content" class="form-label">Content</label>
			<textarea class="form-control" id="content" rows="3" name="content">{{ $post->content }}</textarea>
		</div>
		<div class="mb-3">
			<label for="image" class="form-label">Image</label>
			<input type="text" class="form-control" id="image" name="image" value="{{ $post->image }}">
		</div>
		<div class="mb-3 form-group">
			<label for="category" class="form-label">Category</label>
			<select class="form-select" id="category" name="category_id">
				@foreach ($categories as $category)
					<option {{ $category->id === $post->category_id ? ' selected' : ''}} value="{{ $category->id }}">
						{{ $category->title }}
					</option>
				@endforeach				
			</select>
		</div>
		<div class="mb-3 form-group">
			<label for="tags" class="form-label">Tags</label>
			<select class="form-select" multiple name="tags[]" id="tags">
				@foreach ($tags as $tag)
					<option @foreach ($post->tags as $postTag) {{ $tag->id === $postTag->id ? ' selected' : ''}} @endforeach
						value="{{ $tag->id }}">{{ $tag->title }}
					</option>
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Изменить</button>
	</form>
@endsection