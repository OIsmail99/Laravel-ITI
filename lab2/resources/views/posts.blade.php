<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>ITI Blog Post</title>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
   <!-- Navigation -->
   <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
       <div class="container">
           <a class="navbar-brand fw-semibold" href="#">ITI Blog Post</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                   <li class="nav-item">
                       <a class="nav-link active border-bottom border-primary" href="#">All Posts</a>
                   </li>
               </ul>
           </div>
       </div>
   </nav>

   <!-- Container -->
   <div class="container py-4">
       <div class="text-center">
           <a href="#" class="btn btn-success">
               Create Post
           </a>
       </div>

       <!-- Table Component -->
       <div class="mt-4 card">
           <div class="table-responsive">
               <table class="table table-striped">
                   <thead>
                       <tr>
                           <th>#</th>
                           <th>Title</th>
                           <th>Posted By</th>
                           <th>Created At</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td>1</td>
                           <td>Mark</td>
                           <td>Otto</td>
                           <td>@mdo</td>
                           <td>
                               <a href="#" class="btn btn-info btn-sm text-white">View</a>
                               <a href="#" class="btn btn-primary btn-sm">Edit</a>
                               <a href="#" class="btn btn-danger btn-sm">Delete</a>
                           </td>
                       </tr>
                       <tr>
                           <td>2</td>
                           <td>Mark</td>
                           <td>Otto</td>
                           <td>@mdo</td>
                           <td>
                               <a href="#" class="btn btn-info btn-sm text-white">View</a>
                               <a href="#" class="btn btn-primary btn-sm">Edit</a>
                               <a href="#" class="btn btn-danger btn-sm">Delete</a>
                           </td>
                       </tr>
                   </tbody>
               </table>
           </div>

           <!-- Pagination -->
           <div class="card-footer">
               <nav aria-label="Page navigation">
                   <ul class="pagination justify-content-end mb-0">
                       <li class="page-item">
                           <a class="page-link" href="#" aria-label="Previous">
                               <span aria-hidden="true">&laquo;</span>
                           </a>
                       </li>
                       <li class="page-item"><a class="page-link" href="#">1</a></li>
                       <li class="page-item active"><a class="page-link" href="#">2</a></li>
                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                       <li class="page-item"><a class="page-link" href="#">4</a></li>
                       <li class="page-item">
                           <a class="page-link" href="#" aria-label="Next">
                               <span aria-hidden="true">&raquo;</span>
                           </a>
                       </li>
                   </ul>
               </nav>
           </div>
       </div>
   </div>

   <!-- Bootstrap JS Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>