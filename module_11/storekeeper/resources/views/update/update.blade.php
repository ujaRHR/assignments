<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Update Products - StoreKeeper</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{route('admin')}}">StoreKeeper v1.0</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
        class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
          aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="#!">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{route('admin')}}">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>

            <a class="nav-link" href="{{route('add-products')}}">
              <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
              Add Product
            </a>
            <a class="nav-link" href="{{route('update-products')}}">
              <div class="sb-nav-link-icon"><i class="fas fa-pen"></i></div>
              Update Product
            </a>
            <a class="nav-link" href="{{route('delete-products')}}">
              <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
              Delete Product
            </a>
            <a class="nav-link" href="{{route('product-sell')}}">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Product Sell
            </a>
            <a class="nav-link" href="{{route('transactions')}}">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list"></i></div>
              Transactions History
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Reajul Hasan Raju
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Update Products</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Products</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              @if(session('success'))
              <div class="alert alert-success">
                <b>{{ session('success') }}</b>
              </div>
              @endif
              <table class="table table-striped">
                <thead>
                  <tr class="bg-dark text-white">
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price (BDT)</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr id="row_{{ $product->id }}">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                      <button class="btn btn-sm btn-danger edit-btn" data-id="{{ $product->id }}" data-toggle="modal"
                        data-target="#editModal">Update</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>


              <div class="modal" id="editModal">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                      <h4 class="modal-title">Update Product</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="editForm">
                        @csrf <!-- Add CSRF token for security -->
                        <input type="hidden" id="editId" name="editId">
                        <div class="form-group">
                          <label for="editName">Name:</label>
                          <input type="text" class="form-control" id="editName" name="editName">
                        </div>
                        <div class="form-group">
                          <label for="editSlug">Slug:</label>
                          <input type="text" class="form-control" id="editSlug" name="editSlug">
                        </div>
                        <div class="form-group">
                          <label for="editPrice">Price:</label>
                          <input type="text" class="form-control" id="editPrice" name="editPrice">
                        </div>
                        <div class="form-group">
                          <label for="editQuantity">Quantity:</label>
                          <input type="text" class="form-control" id="editQuantity" name="editQuantity">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-sm btn-success">Save Changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">No Copyright &copy; 2023</div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function () {
      $('.edit-btn').click(function () {
        var rowId = $(this).data('id');
        var name = $('#row_' + rowId + ' td:nth-child(1)').text();
        var slug = $('#row_' + rowId + ' td:nth-child(2)').text();
        var price = $('#row_' + rowId + ' td:nth-child(3)').text();
        var quantity = $('#row_' + rowId + ' td:nth-child(4)').text();

        $('#editId').val(rowId);
        $('#editName').val(name);
        $('#editSlug').val(slug);
        $('#editPrice').val(price);
        $('#editQuantity').val(quantity);
      });
    });
  </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('js/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/chart-bar-demo.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
  <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>