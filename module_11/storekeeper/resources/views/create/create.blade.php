<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Add Products - StoreKeeper</title>
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
          <h1 class="mt-4">Add Products</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Products</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              <form method="POST">
                @csrf

                @if(session('success'))
                <div class="alert alert-success">
                  <b>{{ session('success') }}</b>
                </div>
                @endif

                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="productName" class="form-label">Name</label>
                      <input type="text" class="form-control" id="productName" name="productName">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="productSlug" class="form-label">Slug</label>
                      <input type="text" class="form-control" id="productSlug" name="productSlug">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="productPrice" class="form-label">Price (BDT)</label>
                      <input type="number" step="0.01" class="form-control" id="productPrice" name="productPrice">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="productQuantity" class="form-label">Quantity</label>
                      <input type="number" class="form-control" id="productQuantity" name="productQuantity">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Add Product</button>
                  </div>
                </div>
              </form>
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