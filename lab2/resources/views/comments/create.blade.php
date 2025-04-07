<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="max-width: 700px;">
        <div class="card mt-5">
            <div class="card-header bg-white">
                <h4 class="mb-0 text-dark">Add a Comment</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('comments.store', $post->id) }}">
                    @csrf
                    <!-- Content Field -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Comment</label>
                        <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            Submit Comment
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-3">
            <a href="{{ route('comments.index', $post->id) }}" class="btn btn-secondary">Back to Comments</a>
        </div>
    </div>
</body>

</html>
