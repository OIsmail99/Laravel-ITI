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

    //TODO! use slots next time

    <div class="container mt-4">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Posted By</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post['id'] }}</td>
                                <td>{{ $post['title'] }}</td>
                                <td>{{ $post['posted_by'] }}</td>
                                <td>{{ $post['created_at'] }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post['id']) }}"
                                        class="btn btn-sm btn-info text-white">View</a>
                                    <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('posts.delete', $post['id']) }}" method="POST"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <!-- spoofing -->
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer d-flex justify-content-end">
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item">
                            <a class="page-link" href="#">«</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">»</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</body>

</html>
