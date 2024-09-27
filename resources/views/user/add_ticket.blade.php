{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Ticketing System</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{asset('theme/img/kaiadmin/favicon.ico')}}"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="{{asset('theme/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{asset('theme/assets/css/fonts.min.css')}}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('theme/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/assets/css/kaiadmin.min.css')}}" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="{{asset('theme/assets/img/kaiadmin/logo_light.svg')}}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item inactive">
                <a
                  href="{{url('/home')}}"
                >
                  <i class="fas fa-home"></i>
                  <p>All Tickets</p>
                </a>
              </li>
              <li class="nav-item active">
                <a
                  href="{{url('/add_ticket')}}"
                >
                  <i class="icon-pencil"></i>
                  <p>Add Ticket</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="{{asset('theme/assets/img/kaiadmin/logo_light.svg')}}"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">


                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="{{asset('theme/assets/img/profile_customer.jpg')}}"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold">{{$data->name}}</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="{{asset('theme/assets/img/profile_customer.jpg')}}"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>{{$data->name}}</h4>
                            <p class="text-muted">{{$data->email}}</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <input type="submit" value="Logout !" style="border-radius: 10px; border: none;">
                        </form>
                        {{-- <a class="dropdown-item" href="{{ url('logout') }}">Logout</a> --}}
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2">
                <div>
                    <h3 class="fw-bold mb-3">Add Ticket</h3>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-6 offset-3">
                        <form action="{{url('ticket_entry')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="priority">Priority</label>
                                <select
                                  class="form-select form-control"
                                  id="priority"
                                  name="priority"
                                >
                                <option value="Low" selected>Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                                </select>
                              </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input required type="text" name="title" placeholder="Enter Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Details</label>
                                <textarea class="form-control" rows="5" name="description">
                                </textarea>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit" id="alert_demo_3_3">Add ticket</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
                <div class="copyright">
                  2024, made by
                  <a href="https://netcoden.com/">NetCoden Inc.</a>
                </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('theme/assets/js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('theme/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('theme/assets/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('theme/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('theme/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset('theme/assets/js/kaiadmin.min.js')}}"></script>
  </body>
</html>
