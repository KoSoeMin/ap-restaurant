<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant | Order Form</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">

  <style>
      body {
          font-family: 'Poppins', sans-serif;
          background: #f4f6f9;
      }
      .card {
          border: none;
          border-radius: 12px;
          box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      }
      h4 {
          font-weight: 600;
          color: #343a40;
          margin-bottom: 20px;
      }
      .nav-tabs .nav-link.active {
          background-color: #28a745 !important;
          color: #fff !important;
          font-weight: 500;
          border-radius: 8px 8px 0 0;
      }
      .nav-tabs .nav-link {
          color: #555;
          border-radius: 8px 8px 0 0;
      }
      .card-body img {
          border-radius: 10px;
          box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      }
      .card-body label {
          font-weight: 500;
          margin-top: 8px;
          display: block;
      }
      input[type="number"] {
          width: 100%;
          border: 1px solid #ced4da;
          border-radius: 6px;
          padding: 5px 8px;
          margin-top: 5px;
          text-align: center;
      }
      .btn-success {
          background: linear-gradient(135deg, #28a745, #20c997);
          border: none;
          border-radius: 8px;
          font-weight: 500;
          padding: 10px 20px;
      }
      .btn-success:hover {
          background: linear-gradient(135deg, #20c997, #28a745);
      }
      select.form-control {
          border-radius: 8px;
          padding: 10px;
      }
      table {
          border-radius: 8px;
          overflow: hidden;
      }
      thead.table-dark th {
          background: #343a40 !important;
      }
      .alert-success {
          border-radius: 8px;
          background: #d4edda;
          color: #155724;
          font-weight: 500;
      }
      .dish-card:hover {
          transform: scale(1.03);
          transition: all 0.3s ease;
      }
  </style>
</head>
<body>
  <div class="container mt-4 mb-5">
    <div class="card p-3">
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

        <div class="row mb-3">
          <div class="col-12 text-center">
            <h4><i class="fas fa-utensils text-success"></i> Restaurant Order Form</h4>
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs justify-content-center" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                       href="#custom-tabs-one-home" role="tab"
                       aria-controls="custom-tabs-one-home" aria-selected="true">
                       <i class="fas fa-plus-circle"></i> New Order
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                       href="#custom-tabs-one-profile" role="tab"
                       aria-controls="custom-tabs-one-profile" aria-selected="false">
                       <i class="fas fa-list"></i> Order List
                    </a>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <!-- New Order Tab -->
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel">
                    <form action="{{ route('order.submit') }}" method="POST">
                      @csrf
                      <div class="row">

                        @foreach ($dishes as $dish)

                          <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card dish-card shadow-sm">
                              <div class="card-body text-center">
                                <img src="{{ url('/images/'.$dish->image) }}" width="100" height="100" alt="{{ $dish->name }}">
                                <label class="mt-2">{{ $dish->name }}</label>
                                <input type="number" name="{{ $dish->id }}" min="0" value="0">
                              </div>
                            </div>
                          </div>
                          
                        @endforeach
                      </div>

                      <div class="form-group mt-3">
                        <label for="table" class="fw-bold">Select Table</label>
                        <select name="table" id="table" class="form-control" required>
                          <option value="">Choose a Table</option>
                          @foreach ($tables as $table)
                            <option value="{{ $table->id }}">Table {{ $table->number }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="text-right mt-3">
                        <input type="submit" class="btn btn-success shadow-sm" value="Submit Order">
                      </div>
                    </form>
                  </div>

                  <!-- Order List Tab -->
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped text-center">
                        <thead class="table-dark">
                          <tr>
                            <th>Order Name</th>
                            <th>Table Number</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          @foreach ($orders as $order)
                            <tr>
                              <td>{{ $order->dish->name }}</td>
                              <td>Table {{ $order->table_id }}</td>
                              <td><span class="badge bg-success">{{ $status[$order->status]}}</span></td>
                              <td>
                                <a href="/order/{{ $order->id }}/serve"  class="btn btn-info btn-sm">
                                  <i class="fas fa-check-circle me-1"></i> Serve
                                </a>
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
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/dist/js/adminlte.min.js"></script>
  <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="/plugins/jszip/jszip.min.js"></script>
  <script src="/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>
</html>
