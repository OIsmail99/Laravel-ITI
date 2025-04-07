<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- post and comments passed successfully -->

    <div class="container py-4">
        <h2 class="mb-4 text-center">Comments
        </h2>

        <!-- Create Comment Button -->
        <div class="text-end mb-4">
            <a href="{{ route('comments.create', $post->id) }}" class="btn btn-success">
                + Add Comment
            </a>
        </div>


        @if($comments->isEmpty())
            <div class="alert alert-warning text-center">No comments found for this post.</div>
        @else
            @foreach ($comments as $comment)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-2">{{ $comment->user->name }}</h5>
                        <p class="card-text text-secondary">{{ $comment->content }}</p>
                        <p class="card-text">
                            <small class="text-muted">Commented on {{ $comment->created_at->format('M d, Y h:i A') }}</small>
                        </p>

                        <!-- Edit & Delete Buttons -->
                        <div class="d-flex gap-2">
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary">Edit</a>

                            <form action="{{ route('comments.delete', [$comment->id]) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>


                    </div>
                </div>
            @endforeach
        @endif

        <!-- Back Button -->
        <div class="mt-4">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
