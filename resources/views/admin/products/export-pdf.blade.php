<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style-print.css') }}"> --}}
    <style>
        h1 ,table {
            text-align: center;
        }
        table {
            width: 100%;
        }
        table, th, td {
            border: 1px solid;
        }
    </style>

  </head>
  <body>
    <h1 class="text-center">{{ $title }}</h1>

    <table class="table table-bordered table-striped mt-5">
        <thead>
            <tr>
                <th>No</th>
                {{-- <th>ID</th> --}}
                <th>Category</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $key=>$product)
                <tr>
                    <td>{{ $key+1 }}</td>
                    {{-- <td>{{ $product->id }}</td> --}}
                    <td>
                        @if ($product->category)
                        {{ $product->category->name }}
                            
                        @else
                            No Category
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->status == '1' ? 'Hidden':'Visible' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No Product Available</td>
                </tr>
                
            @endforelse
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>