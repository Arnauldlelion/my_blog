@extends('layouts.app')

@section('content')

<div class="controller">
    <div class="text-right mb-3">
        <a href="{{ route('admin.posts.create') }}"
            class="btn btn-primary">Create New</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>
                    <img src="{{ $post->cover_image }}"  
                        class="img-thumbnail" style="width: 3rem"/>
                </td>
                <td>{{ $post->title}}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" 
                        class="d-inline"
                        method="post">
                        @csrf 
                        @method('delete')

                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </thead>
    </table>

</div>
@endsection