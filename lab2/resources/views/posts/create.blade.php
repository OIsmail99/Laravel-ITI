<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="max-width: 800px;">
        <div class="card">
            <div class="card-header bg-white">
                <h2 class="h4 mb-0 text-dark">Create New Post</h2>
            </div>

            <div class="card-body">
                <form method="POST" action="/posts">
                    @csrf
                    <!-- Title Input -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" id="title" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Creator Email</label>
                        <select name="email" id="email" class="form-control">
                            <!-- <option value="">Select Email</option> -->
                            @foreach ($users as $user)
                                <option value="{{ $user->email }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Description Textarea -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                    </div>

                    <!-- Post Creator Select -->
                    <!-- <div class="mb-4">
                        <label for="creator" class="form-label">Post Creator</label>
                        <select name="posted_by" id="creator" class="form-control"> -->
                    <!-- <option value="">Select Creator</option> -->
                    <!-- @foreach ($users as $user)
                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div> -->

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
