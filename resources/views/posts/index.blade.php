@extends('layouts.main') 
@section('content')
	<div class="mb-3">
		<a href="{{ route('posts.create') }}" class="btn btn-primary" role="button">Создать пост</a>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered table-sm">
			<thead>
				<tr class="table-warning">
					<th scope="col">#</th>
					<th scope="col">Title</th>
					<th scope="col">Content</th>
					<th scope="col">Image</th>
					<th scope="col">Likes</th>
					<th scope="col">Is published</th>
					<th scope="col">Category</th>
					<th scope="col">Tags</th>
					<th scope="col">Управление</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
						<td>{{ $post->content }}</td>
						<td>{{ $post->image }}</td>
						<td>{{ $post->likes }}</td>
						<td>{{ $post->is_published }}</td>
						<td>{{ $post->category->title }}</td>
						<td>
							<ul>
								@foreach($post->tags as $tag) <li>{{ $tag->title }}</li> @endforeach
							</ul>
						</td>
						<td>
							<a class="btn btn-outline-success" role="button" href="{{ route('posts.edit', $post->id) }}">
								<i class="bi bi-pencil"></i>
							</a>
							<form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection