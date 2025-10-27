@extends('layouts.master')

@section('content')

<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Page header -->
  <div class="content-header">
    <!-- <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Kitchen Panel</h1>
        </div>
      </div>
    </div> -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card shadow-sm rounded-lg">
            <div class="card-header bg-primary text-white">
              <h3 class="card-title"> Orders DataTable</h3>
            </div>
            <div class="card-body">
              <!-- Success Message -->
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
              <!-- /.Success message -->

              <div class="table-responsive">
                <table id="dishes" class="table table-bordered table-striped text-center">
                  <thead class="table-dark text-center">
                    <tr>
                      <th>Order Name</th>
                      <th>Table Number</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach ($orders as $order)
                      <tr>
                        <td>{{ $order->dish->name }}</td>
                        <td>Table {{ $order->table_id }}</td>
                        <td>{{ $status[$order->status]}}</td>
                        <td>
                          <div class="d-flex justify-content-center flex-wrap gap-1">
                            <a href="/order/{{ $order->id }}/approve" class="btn btn-warning btn-sm" style="margin-right: 10px;">
                              <i class="fas fa-check-circle me-1"></i> Approve
                            </a>
                            <a href="/order/{{ $order->id }}/cancel" class="btn btn-danger btn-sm" style="margin-right: 10px;">
                              <i class="fas fa-times-circle me-1"></i> Cancel
                            </a>
                            <a href="/order/{{ $order->id }}/ready" class="btn btn-success btn-sm">
                              <i class="fas fa-check-double me-1"></i> Ready
                            </a>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

<script src="plugins/jquery/jquery.min.js"></script>
<script> $(function () {
    $('#dishes').DataTable({
      "paging": true,
      "pageLength": 7,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });</script>
