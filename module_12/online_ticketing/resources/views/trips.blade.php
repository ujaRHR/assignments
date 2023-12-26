<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Trips - Tiki Online Ticketing</title>
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
          <h1 class="mt-4">Manage Trips</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Trips</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              <form method="POST">
                @csrf

                @if(session('success'))
                <div class="alert alert-success">
                  <b>{{ session('success') }}</b>
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger">
                  <b>{{ session('error') }}</b>
                </div>
                @endif
                <div class="row">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label for="route" class="form-label fw-bold">Select a Route</label>
                      <select class="form-control" name="route" id="route" required>
                        @foreach($routes as $route)
                        <option value="{{ $route->id }}" data-id="{{ $route->ticket_price }}">
                          {{ $locations->find($route->from_location_id)->location_name }}
                          &rarr;
                          {{ $locations->find($route->to_location_id)->location_name }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="ticketPrice" class="form-label fw-bold">Ticket Price
                        (BDT)</label>
                      <input type="number" step="1" min="0" class="form-control" id="ticketPrice" name="ticketPrice"
                        readonly value="230.00">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="departureDate" class="form-label fw-bold">Departure Date</label>
                      <input type="datetime-local" class="form-control" id="departureDate" name="departureDate">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="assignedBus" class="form-label fw-bold">Assigned Bus</label>
                      <select class="form-control" name="assignedBus" id="assignedBus" required>
                        @foreach($buses as $bus)
                        <option value="{{ $bus->id }}">
                          {{ $bus->bus_name }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="mb-3">
                      <button type="submit" class="btn btn-sm btn-warning fw-bold">Create New
                        Trip</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Available Trips
              </div>
              <div class="card-body">
                <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Route</th>
                      <th>Ticket Price (BDT)</th>
                      <th>Assigned Bus</th>
                      <th>Departure Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($trips as $trip)
                    <tr>
                      <td>
                        {{ $locations->find(($routes->find($trip->route_id)->from_location_id))->location_name }}
                        &rarr;
                        {{ $locations->find(($routes->find($trip->route_id)->to_location_id))->location_name }}
                      </td>
                      <td>
                        {{ $routes->find($trip->route_id)->ticket_price }}
                      </td>
                      <td>
                        {{ $buses->find($trip->assigned_bus)->bus_name }}
                      </td>
                      <td>
                        {{ $trip->departure_date }}
                      </td>
                      <td>
                        <button class="delete-btn btn btn-sm btn-danger" data-id="{{ $trip->id }}"><i
                            class="fas fa-trash-alt"></i>
                          Delete</button>
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
        url: `/delete-trip/${id}`,
        type: 'POST',
        success: function (response) {
          $clickedButton.closest('tr').remove();
          alert('Trip Deleted Successfully!');
        },
        error: function (xhr) {
          console.error(xhr.responseJSON.error);
        }
      });
    });


    $(document).ready(function () {
      $('#route').change(function () {
        var selectedId = $(this).val();
        $('#ticketPrice').val($(this).find(':selected').data('id'));
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