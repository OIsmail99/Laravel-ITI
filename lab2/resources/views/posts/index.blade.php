<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="text-center my-4">
        <a href="{{route('posts.create')}}" class="btn btn-success">
            Create Post
        </a>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Posted By</th>
                            <th>Created At</th>
                            <th>image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post['id'] }}</td>
                                <td>{{ $post['title'] }}</td>
                                <td>{{ $post['slug'] }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->created_at->format('y-m-d') }}</td>
                                <td> {{ $post->image }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->slug) }}"
                                        class="btn btn-sm btn-info text-white">View</a>

                                    <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('posts.delete', $post['id']) }}" method="POST"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        {{-- csrf vulnerability --}}
                                        @method('DELETE')
                                        {{-- http spoofing --}}
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('posts.soft', $posts) }}" class="btn btn-sm btn-danger">View deleted posts</a>
            </div>
            <!-- Pagination -->
            <div class="card-footer d-flex justify-content-end">
                {{ $posts->links() }}
            </div>

            {{-- one post has many comments, one user has many comments --}}
            {{-- comments : user_id, post_id --}}

        </div>
    </div>

</body>

</html>