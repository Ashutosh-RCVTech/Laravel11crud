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
              <h3>Create Product</h3>
            </div>
            <form enctype="multipart/form-data" action="{{ route('product.store') }}" method="post">
              @csrf
            <div class="card-body">
              <div class="mb-3 ">
                <label for="" class="form-label h5">Name</label>
                <input type="text" value="{{ old('name')}}" class="@error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name" name="name">
                @error('name')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3 ">
                <label for="" class="form-label h5">SKU</label>
                <input type="text" value="{{ old('sku')}}" class="@error('sku') is-invalid @enderror form-control form-control-lg" placeholder="Sku" name="sku">
                @error('sku')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3 ">
                <label for="" class="@error('price') is-invalid @enderror form-label h5">Price</label>
                <input type="text" value="{{ old('price')}}" class="form-control form-control-lg" placeholder="Price" name="price">
                @error('price')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3 ">
                <label for="" class="form-label h5">Description</label>
                <textarea name="description" value="{{ old('description')}}" class="form-control form-control-lg" placeholder="Description" cols="50" rows="5"></textarea>
              </div>
              <div class="mb-3 ">
                <label for="" class="form-label h5">Image</label>
                <input type="file" class="form-control form-control-lg" name="image">
              </div>
              <div class="d-grid">
                <button class="btn btn-lg btn-primary">Submit</button>
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