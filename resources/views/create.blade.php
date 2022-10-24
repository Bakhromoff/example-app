@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center">Yangi qo'shish</h1>
    </div>
    <div class="offset-3 col-6">
      <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
          @if($errors->has('name'))
          <div class="alert alert-danger">{{ $errors->first('name') }}</div>
          @endif
          <input class="form-control" type="text" value="{{old('name')}}" name="name" placeholder="Name">
        </div>
        <div class="form-group mb-2">
          @if($errors->has('price'))
          <div class="alert alert-danger">{{ $errors->first('price') }}</div>
          @endif
          <input class="form-control" type="number" value="{{old('price')}}" name="price" placeholder="Price">
        </div>
        <div class="form-group mb-2">
          @if($errors->has('unit'))
          <div class="alert alert-danger">{{ $errors->first('unit') }}</div>
          @endif
          Unit<select class="form-control" name="unit" >
            <option value="kg">Kg</option>
            <option value="dona">Dona</option>
            <option value="l">Litr</option>
            <option value="pochka">Pochka</option>
          </select>
        </div>
        <div class="form-group mb-2">
          @if($errors->has('image'))
          <div class="alert alert-danger">{{ $errors->first('image') }}</div>
          @endif
          <input class="form-control" type="file" name="image" >
        </div>
        <div class="form-group mb-2">
          @if($errors->has('status'))
          <div class="alert alert-danger">{{ $errors->first('status') }}</div>
          @endif
          Status<select class="form-control" name="status" >
            <option value="1">Active</option>
            <option value="0">Inactive</option>
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
<title>Create</title>
@endsection