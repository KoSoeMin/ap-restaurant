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
            <h3 class="card-title">DataTable of Order</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <!-- dish creating error message -->
          @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          <!-- /.dish creating error message -->
            <table id="dishes" class="table table-bordered table-striped">
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
                        <td>{{ $order->table_id }}</td>
                        <td>{{ $status[$order->status]}}</td>
                          <!-- <td>
                            @if ($order->status == 0)
                              <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                            @elseif ($order->status == 1)
                              <span class="badge bg-success px-3 py-2">Approved</span>
                            @elseif ($order->status == 2)
                              <span class="badge bg-danger px-3 py-2">Canceled</span>
                            @else
                              <span class="badge bg-secondary px-3 py-2">Unknown</span>
                            @endif
                          </td> -->
                        <td>
                          <div class="d-flex justify-content-center">
                            <a href="/order/{{ $order->id }}/approve" class="btn btn-sm btn-outline-warning mx-1 shadow-sm">
                              <i class="fas fa-check-circle me-1"></i> Approve
                            </a>
                            <a href="/order/{{ $order->id }}/cancel" class="btn btn-sm btn-outline-danger mx-1 shadow-sm">
                              <i class="fas fa-times-circle me-1"></i> Cancel
                            </a>
                            <a href="/order/{{ $order->id }}/ready" class="btn btn-sm btn-outline-success mx-1 shadow-sm">
                              <i class="fas fa-check-double me-1"></i> Ready
                            </a>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
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
<script src="plugins/jquery/jquery.min.js"></script>
<script> $(function () {
    $('#dishes').DataTable({
      "paging": true,
      "pageLength": 10,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });</script>