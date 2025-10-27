@extends('layouts.master')

@section('content')

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <!-- <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kitchen Panel</h1>
                </div> -->
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Dish DataTable Card -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm rounded-lg">
                        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center p-3 rounded-top shadow-sm">
                            <!-- Left side: Title -->
                            <h3 class="card-title mb-0 fw-bold" style="letter-spacing: 0.5px; font-size: 1.2rem;"> Dishes Table</h3>
                        </div>
                        
                        <div class="card-body">
                             <a href="/dish/create" class="btn btn-success btn-sm fw-semibold shadow-sm" style="border-radius: 0.375rem;">
                                <i class="fas fa-plus me-1"></i> Create New
                            </a>
                            <!-- Success Message -->
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle"></i> {{ session('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            <!-- Dishes Table -->
                            <div class="table-responsive">
                                <table id="dishes" class="table table-bordered table-striped text-center">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th>Dish Name</th>
                                            <th>Category Name</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dishes as $dish)
                                        <tr>
                                            <td>{{ $dish->name }}</td>
                                            <td>{{ $dish->category->name }}</td>
                                            <td>{{ $dish->created_at->format('l, d F Y, h:i A') }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center flex-wrap gap-1">
                                                    <!-- Edit Button -->
                                                    <a href="/dish/{{ $dish->id }}/edit" class="btn btn-warning btn-sm flex-grow-1" style="height: 30px; margin-right: 10px; min-width: 80px;">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <form action="/dish/{{ $dish->id }}" method="POST" class="flex-grow-1" style="min-width: 80px;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm w-100" style="height: 30px;">
                                                            <i class="fas fa-trash-alt me-1"></i> Delete
                                                        </button>
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
                </div>
            </div>
            <!-- /.Dish Card -->

        </div>
    </div>
    <!-- /.Main Content -->
</div>
<!-- /.Content Wrapper -->

@endsection

<script src="plugins/jquery/jquery.min.js"></script>
<script> $(function () {
    $('#dishes').DataTable({
      "paging": true,
      "pageLength": 10,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });</script>
