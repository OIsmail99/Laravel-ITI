<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i>Please fix the following errors:</h5>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="container" style="max-width: 800px;">
        <div class="card">
            <div class="card-header bg-white">
                <h2 class="h4 mb-0 text-dark">Edit Post</h2>
            </div>

            <div class="card-body">
                <form method="POST" action="{{route('posts.update', $post['id'])}}">
                    @csrf
                    @method('PUT')
                    <!-- Title Input -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input value="{{$post['title']}}" name="title" type="text" id="title" class="form-control">
                    </div>


                    <!-- Description Textarea -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control"
                            value="{{ $post->description }}"></textarea>
                    </div>


                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>