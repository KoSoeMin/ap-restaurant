<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant | Order Form</title>
    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <!-- order creating error message -->
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <!-- /.order creating error message -->
            <div class="row">
                <div class="col-12">
                    <h4>Orders Form</h4>
                </div>
            </div>
    <!-- ./row -->
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order List</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            
                            <form action="{{ route('order.submit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @foreach ($dishes as $dish)
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ url('/images/'.$dish->image) }}" width="100" height="100"><br><br>
                                                    <label>{{ $dish->name }}</label>
                                                    <input type="number" name="{{ $dish->id }}" min="0" value="0"><br>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- for choose tables -->
                                <div class="form-group">
                                    <label for="table" class="form-label fw-bold">Select Table</label>
                                    <select name="table" id="table" class="form-control" required>
                                        <option value="">Choose a Table</option>
                                        @foreach ($tables as $table)
                                            <option value="{{ $table->id }}">Table {{ $table->number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.for choose tables -->
                                <input type="submit" class="btn btn-success" value="Submit">
                            </form>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <table class="table table-bordered table-striped">
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
                                            <a href="/order/{{ $order->id }}/serve" class="btn btn-sm btn-outline-warning mx-1 shadow-sm">
                                                <i class="fas fa-check-circle me-1"></i> Serve
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.row -->
        </div>
    </div>
</body>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</html>