<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .btn-primary {
            background-color: #000f93;
            border-color: #000f93;
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: #000a6b;
            border-color: #000a6b;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Create New product</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="5" ></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image">upload file:</label>
                                <input type="file" name="image" class="form-control">
                            </div>    
                            <div class="form-group">
                                <label for="categories">Categories</label>
                                @foreach($categories as $category)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
                                        <label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Create product</button>
                                <a href="{{route('products.index')}}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>