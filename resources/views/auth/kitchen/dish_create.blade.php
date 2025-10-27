@extends('layouts.master')

@section('content')

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kitchen Panel</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="/dish" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Create Dish Card -->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow-sm border-light">
                        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Create Delicious Dish</h3>
                        </div>
                        <div class="card-body">

                            <!-- Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <i class="fas fa-exclamation-circle"></i> Please fix the errors below.
                                    <ul class="mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <!-- Create Form -->
                            <form action="/dish" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Dish Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Dish Name">
                                </div>

                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="dish_image">Image</label>
                                    <input type="file" name="dish_image" class="form-control-file">
                                </div>

                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Submit
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Create Dish Card -->

        </div>
    </div>
    <!-- /.Main Content -->
</div>
<!-- /.Content Wrapper -->

@endsection
