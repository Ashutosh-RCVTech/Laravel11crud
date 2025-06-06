<!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Bootstrap demo</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    </head>
    <body>
      <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel 11 CRUD</h3>
      </div>
      <div class="container">
          <div class="row justify-content-center mt-4">
              <div class="col-md-10 d-flex justify-content-end">
                      <a href="{{ route('product.create') }}" class="btn btn-dark ">Create Product</a>
              </div>
          </div>
        <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          @if (Session::has('success'))
          <div class="alert alert-success mt-3">
              {{ Session::get('success') }}
          </div>
          @endif
        </div>

          <div class="col-md-10">
            <div class="card border-0 shadow-lg my-4">
              <div class="card-header bg-dark text-white">
                <h3>Product</h3>
              </div>
              <div class="card-body">
                  <table class="table">
                      <tr>
                          <th>iD</th>
                          <th></th>
                          <th>Name</th>
                          <th>SKU</th>
                          <th>Price</th>
                          <th>Created At</th>
                          <th>Action</th>
                      </tr>
                      @if ($products->isNotEmpty())
                      @foreach ($products as $product)
                      <tr>
                          <td>{{ $product->id }}</td>
                          <td>
                              @if ($product->image != "")
                                  <img width="50" height="50" src="{{ asset('uploads/products/'.$product->image)}}" alt="">
                              @endif
                          </td>
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->sku }}</td>
                          <td>${{ $product->price }}</td>
                          <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td>
                          <td>
                              <a href="{{ route('product.edit', $product->id) }}" class="btn btn-dark">Edit</a>
                              <a href="#" onclick="deleteProduct({{ $product->id }});" class="btn btn-danger">Delete</a>
                              <form id='delete-product-from-{{ $product->id }}' action="{{ route('product.delete', $product->id) }}" method='post'>
                                  @csrf
                                  @method('delete')
                              </form>
                          </td>
                      </tr>
                      @endforeach
                      @endif
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
  </html>


  <script>
      function deleteProduct(id){
          if(confirm("Are you sure you want to delete product?")){
              document.getElementById("delete-product-from-"+id).submit();
          }
      }
  </script>