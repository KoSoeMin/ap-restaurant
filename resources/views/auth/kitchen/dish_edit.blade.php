@extends('layouts.master')

@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kitchen Pannel Page</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
           <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Dish</h3>
            <a href="/dish" class="btn btn-default" style="float: right;">Back</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/dish/{{ $dish->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ old('name', $dish->name) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $dish->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Image</label><br>
                    <img src="{{ url('/images/'.$dish->image) }}" width="100" height="100" alt="" srcset=""><br><br>
                    <input type="file" name="dish_image" class="form">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
