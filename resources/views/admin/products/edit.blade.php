<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
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
                        <h2 class="mb-0">Update product</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.update',$product)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="5" >{{$product->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image">upload file:</label>
                                <input type="file" name="image" class="form-control">
                            </div>    
                            <label for="categories">Categories:</label>
                                    @foreach($categories as $category)
                                     <div class="form-check">
                                     <input name="categories_ids[]" class="form-check-input" type="checkbox" value="{{$category->id}}" id="flexCheckChecked{{$category->id}}"
                                         @if(in_array($category->id, $product->categories->pluck('id')->toArray())) checked @endif>
                                     <label class="form-check-label" for="flexCheckChecked{{$category->id}}">
                                         {{$category->name}}
                                    </div>      
                                    @endforeach
                                </label>  
        
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Update product</button>
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