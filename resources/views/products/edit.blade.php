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
                    <a href="{{ route('product.index') }}" class="btn btn-dark ">Back</a>
            </div>
        </div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="card border-0 shadow-lg my-4">
            <div class="card-header bg-dark text-white">
              <h3>Edit Product</h3>
            </div>
            <form enctype="multipart/form-data" action="{{ route('product.update', $product->id) }}" method="post">
            @method('put')
            @csrf
            <div class="card-body">
              <div class="mb-3 ">
                <label for="" class="form-label h5">Name</label>
                <input type="text" value="{{ old('name', $product->name)}}" class="@error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name" name="name">
                @error('name')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3 ">
                <label for="" class="form-label h5">SKU</label>
                <input type="text" value="{{ old('sku', $product->sku)}}" class="@error('sku') is-invalid @enderror form-control form-control-lg" placeholder="Sku" name="sku">
                @error('sku')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3 ">
                <label for="" class="@error('price') is-invalid @enderror form-label h5">Price</label>
                <input type="text" value="{{ old('price', $product->price)}}" class="form-control form-control-lg" placeholder="Price" name="price">
                @error('price')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3 ">
                <label for="" class="form-label h5">Description</label>
                <textarea name="description" value="{{ old('description', $product->description)}}" class="form-control form-control-lg" placeholder="Description" cols="50" rows="5"></textarea>
              </div>
              <div class="mb-3 ">
                <label for="" class="form-label h5">Image</label>
                <input type="file" class="form-control form-control-lg" name="image">
                @if ($product->image != "")
                    <img class="w-50 h-50 my-3" src="{{ asset('uploads/products/'.$product->image)}}" alt="">
                @endif
              </div>
              <div class="d-grid">
                <button class="btn btn-lg btn-primary">Update</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>