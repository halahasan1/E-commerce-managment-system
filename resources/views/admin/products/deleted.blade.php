<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deleted products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 fade-in">
    <h1 class="mb-4">Deleted products</h1>
    <a href="{{route('products.index')}}">back</a>
    <br>
 
    <table class="table table-striped table-bordered mt-3">
        <thead class="thead-dark">
        <tr>
            <th>name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($deletedproducts as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                    <form action="{{ route('products.restore', $product->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm btn-animate">Restore</button>
                    </form>
                    <form action="{{ route('products.force.delete', $product->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-animate" onclick="return confirm('Are you sure?')">Delete for ever</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>