@extends('layouts.app')

@section('title', 'Posts Index')

@section('content')
    <div class="m-5 text-center">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    </div>

    <div class="table-responsive" style="max-width: 800px; margin:auto;">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Title</th>
                    <th>description</th>
                    <th>Posted by</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('هل أنت متأكد من الحذف؟')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            {{ $posts->links() }}
@endsection
