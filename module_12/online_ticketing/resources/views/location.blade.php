<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Locations - Tiki Online Ticketing</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{route('admin')}}">Tiki Ticketing</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
        class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-y3 my-2 my-md-0">
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
                  <a class="nav-link" href="{{route('admin')}}">
                      <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                      Dashboard
                  </a>

                  <a class="nav-link" href="{{route('cb')}}">
                      <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                      Buses
                  </a>
                  <a href="{{ route('locations') }}" class="nav-link">
                      <div class="sb-nav-link-icon"><i class="fas fa-pen"></i></div>
                      Locations
                  </a>
                  <a class="nav-link" href="{{ route('routes') }}">
                      <div class="sb-nav-link-icon"><i class="fas fa-pen"></i></div>
                      Routes
                  </a>
                  <a class="nav-link" href="">
                      <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                      Users
                  </a>
                  <a class="nav-link" href="{{ route('trips') }}">
                      <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                      Trips
                  </a>
                  <a class="nav-link" href="">
                      <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                      History
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
          <h1 class="mt-4">Manage Locations</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Locations</li>
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
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="locationName" class="form-label fw-bold">Location Name</label>
                      <input type="text" class="form-control" id="locationName" name="locationName" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="mb-3">
                      <button type="submit" class="btn btn-sm btn-success fw-bold">Add Location</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Available Locations
              </div>
              <div class="card-body">
                <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Location Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($locations as $location)
                    <tr>
                      <td><span class="row_{{ $location->id }}_name fw-bold btn btn-sm btn-warning">{{ $location->location_name }}</span></td>
                      <td>
                        <button class="delete-btn btn btn-sm btn-danger" data-id="{{ $location->id }}"><i
                            class="fas fa-trash-alt"></i></button>
                        &nbsp;
                        <button class="update-btn btn btn-sm btn-primary" data-id="{{ $location->id }}"><i
                            class="fas fa-edit"></i></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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

  <div class="modal" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h4 class="modal-title">Update Location Info</h4>
          <button type="button" class="close" id="modalClose" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="editLocationName" class="fw-bold">Location Name:</label>
            <input type="text" class="form-control" id="editLocationName" name="editLocationName">
          </div>
          <br>
          <button type="submit" class="save-btn btn btn-sm btn-success">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>


    $(document).on('click', '.delete-btn', function () {
      let id = $(this).data('id');
      let token = $('meta[name="csrf-token"]').attr('content');
      let $clickedButton = $(this);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': token
        }
      });

      $.ajax({
        url: `/delete-location/${id}`,
        type: 'POST',
        success: function (response) {
          $clickedButton.closest('tr').remove();
          alert('Location Deleted Successfully!');
        },
        error: function (xhr) {
          console.error(xhr.responseJSON.error);
        }
      });
    });


    $(document).ready(function () {
      $('#modalClose').on('click', function () {
        $('#editModal').modal('hide');
      });

      $('.update-btn').click(function () {
        $('#editModal').modal('show');
        let $clickedButton = $(this);

        var rowId = $(this).data('id');
        var locationName = $(`.row_${rowId}_name:nth-child(1)`).text();

        $('#editLocationName').val(locationName);
        let locationId = localStorage.setItem("locationId", rowId);
      });
    });

    $(document).ready(function () {
      $('.save-btn').click(function () {
        let token = $('meta[name="csrf-token"]').attr('content');
        let locationId = localStorage.getItem("locationId");

        let updatedLocationData = {
          'locationName': $('#editLocationName').val(),
        }

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': token
          }
        });

        $.ajax({
          url: `/update-location/${locationId}`,
          type: 'POST',
          data: updatedLocationData,
          success: function (response) {
            $('#editModal').modal('hide');
            alert('Informations Updated Successfully!');
            location.reload();
          },
          error: function (xhr) {
            console.error(xhr.responseJSON.error);
          }
        });
      });
    });


  </script>

  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
  <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>