<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Post Info Card -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Post Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5>Title :- <span class="fw-normal">{{ $post['title'] }}</span></h5>
                        </div>
                        <div>
                            <h5>Description :-</h5>
                            <p class="text-secondary">{{$post->description}}</p>
                        </div>
                    </div>
                </div>

                <!-- Post Creator Info Card -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Post Creator Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5>Name :- <span class="fw-normal">{{$post->user->name}}</span></h5>
                        </div>
                        <div class="mb-3">
                            <h5>Email :- <span class="fw-normal">{{$post->user->email}}</span></h5>
                        </div>
                        <div>
                            <h5>Created At :- <span class="fw-normal">{{$post['created_at']}}</span></h5>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="text-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                        Back to All Posts
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
