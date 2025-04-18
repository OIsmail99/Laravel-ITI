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
        <span class="btn btn-danger"> Deleted Posts </span>
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
                            <th>Deleted At</th>
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
                                <td>{{ $post->deleted_at }}</td>
                                <td>
                                    <form action="{{ route('posts.restore', $post['id']) }}" method="POST"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('Are you sure you want to restore this post?');">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger">Restore</button>
                                    </form>

                                    <a href="{{ route('posts.show', $post->slug) }}"
                                        class="btn btn-sm btn-info text-white">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    Back to All Posts
                </a>
            </div>

            <!-- Pagination -->
            <div class="card-footer d-flex justify-content-end">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

</body>

</html>
