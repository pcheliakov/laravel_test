@extends('layouts.main') 
@section('content')
	<a class="btn btn-outline-success" role="button" href="{{ route('posts.edit', $post->id) }}">
		<i class="bi bi-pencil"></i>
	</a>
	<form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
	</form>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered table-sm">
			<tr class="table-info">
				<th>Названия</th>
				<th>Значения</th>
			</tr>
			<tr>
				<th>ID</th>
				<td>{{ $post->id }}</td>
			</tr>
			<tr>
				<th>Title</th>
				<td>{{ $post->title }}</td>
			</tr>
			<tr>
				<th>Content</th>
				<td>{{ $post->content }}</td>
			</tr>
			<tr>
				<th>Image</th>
				<td>{{ $post->image }}</td>
			</tr>
			<tr>
				<th>Likes</th>
				<td>{{ $post->likes }}</td>
			</tr>
			<tr>
				<th>Is published</th>
				<td>{{ $post->is_published }}</td>
			</tr>
			<tr>
				<th>Category</th>
				<td>{{ $post->category->title }}</td>
			</tr>
			<tr>
				<th>Tags</th>
				<td>
					<ul>
						@foreach($post->tags as $tag) <li>{{ $tag->title }}</li> @endforeach
					</ul>
				</td>
			</tr>
		</table>
	</div>
	<div class="mt-3">
		<a href="{{ route('posts.index') }}" class="btn btn-primary" role="button">Назад</a>
	</div>
@endsection