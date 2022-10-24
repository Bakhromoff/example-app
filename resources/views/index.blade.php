@extends('app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="text-center">Barcha mahsulotlar</h1>
          <div class="form-group">
            <a class="btn btn-success" href="{{route('product.create')}}">Add new</a>
          </div>
        </div>
        <div class="col-12">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Unit</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->unit}}</td>
                <td>
                  <img width="100" class="img img-thumbnail" src="{{$product->getImagePath()}}" alt="">
                </td>
                <td>{{$product->status == "1" ? "Active" : "Inactive"}}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="{{route('product.edit', $product->id)}}">Edit</a>
                    <form method="POST" action="{{route('product.delete',$product->id)}}">
                      @method('DELETE')
                      @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                  </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection

@section('title')
    <title>Home</title>
@endsection
