@extends('app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="text-center">Mahsulotni tahrirlash</h1>
        </div>
        <div class="offset-3 col-6">
          <form method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="form-group mb-2">
            @if($errors->has('name'))
          <div class="alert alert-danger">{{ $errors->first('name') }}</div>
          @endif
            <input class="form-control" type="text" name="name" placeholder="Name" value="{{old('name', $product->name)}}">
          </div>
          <div class="form-group mb-2">
            @if($errors->has('price'))
          <div class="alert alert-danger">{{ $errors->first('price') }}</div>
          @endif
            <input class="form-control" type="number" name="price" placeholder="Price" value="{{old('price',$product->price)}}">
          </div>
          <div class="form-group mb-2">
            Unit<select class="form-control" name="unit" >
              <option value="kg"{{$product->unit == "kg" ? "selected" : ""}}>Kg</option>
              <option value="dona"{{$product->unit == "dona" ? "selected" : ""}}>Dona</option>
              <option value="l"{{$product->unit == "l" ? "selected" : ""}}>Litr</option>
              <option value="pochka"{{$product->unit == "pochka" ? "selected" : ""}}>Pochka</option>
            </select>
          </div>
          <div class="form-group mb-2">
            <img width="100" class="img img-thumbnail" src="{{$product->getImagePath()}}" alt="">
            <input class="form-control" type="file" name="image" >
          </div>
          <div class="form-group mb-2">
            Status<select class="form-control" name="status" >
              <option value="1" {{$product->status == "1" ? "selected" : ""}}>Active</option>
              <option value="0" {{$product->status == "0" ? "selected" : ""}}>Inactive</option>
            </select>
          </div>
          <div class="form-group mb-2">
            <input class="btn btn-primary form-control" type="submit" value="Submit" name="submit" >
          </div>
          </form>
        </div>

      </div>
    </div>
@endsection

@section('title')
    <title>Edit</title>
@endsection