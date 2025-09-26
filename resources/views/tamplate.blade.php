<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - SB Admin</title>
    {{-- {{ asset('style.css') }} --}}
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Scripts -->
    <script src="http://daftar-obat2.test/js/app.js" defer=""></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        .container {
            padding: 2rem 0rem;
        }

        .table-image {

            thead {

                td,
                th {
                    border: 0;
                    color: #666;
                    font-size: 0.8rem;
                }
            }

            td,
            th {
                vertical-align: middle;
                text-align: center;

                &.qty {
                    max-width: 2rem;
                }
            }
        }

        .price {
            margin-left: 1rem;
        }

        .modal-footer {
            padding-top: 0rem;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    {{-- <div class="container">

    </div> --}}

    {{-- MODAL CART --}}
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Your Shopping Cart
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-image">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $subtotal = 0; ?>
                            @if (session('cart'))

                                @foreach (session('cart') as $id => $detail)
                                    <?php $subtotal += $detail['price'] * $detail['quantity']; ?>
                                    <tr>
                                        <td class="w-25">
                                            <img src="gambar/{{ $detail['photos'] }}" class="img-fluid img-thumbnail"
                                                alt="Sheep">
                                        </td>
                                        <td>{{ $detail['nama'] }}</td>
                                        <td>{{ $hasil_rupiah = number_format($detail['price'], 2, ',', '.') }}</td>
                                        <td class="qty"><input type="text" class="form-control" id="input1"
                                                value="{{ $detail['quantity'] }}"></td>
                                        <td>{{ $hasil_rupiah = number_format($detail['price'] * $detail['quantity'], 2, ',', '.') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteSession', $id) }}" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <h5>Total: <span
                                class="price text-success">{{ $hasil_rupiah = number_format($subtotal, 2, ',', '.') }}</span>
                        </h5>
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-success">Checkout</button> --}}
                    <a href="{{ route('checkOut') }}" class="btn btn-success">Checkout</a>
                </div>
            </div>
        </div>
    </div>

    {{-- END CART --}}

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Daftar Obat</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->

        <ul class="navbar-nav ml-auto ml-md-1">
            <a class="nav-link" id="cart" href="#" role="button" data-toggle="modal"
                data-target="#cartModal" aria-haspopup="true" aria-expanded="false"><i
                    class="fas fa-shopping-cart"></i></a>
        </ul>

        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                        class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
        </ul>

        {{-- calon cart --}}


    </nav>




    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="/home" onclick="showInfo()">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        @if (Auth::user()->roles_id != 3)


                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                                data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Produk
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/obat">Daftar Obat</a>
                                    <a class="nav-link" href="/kategori">Kategori</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                                data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                                User
                                <div class="sb-sidenav-collapse-arrow"><svg
                                        class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="angle-down" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                        </path>
                                    </svg><!-- <i class="fas fa-angle-down"></i> -->
                                </div>
                            </a>

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                                data-parent="#sidenavAccordion" style="">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="/buyer" aria-expanded="false"
                                        aria-controls="pagesCollapseAuth">
                                        Buyer
                                    </a>
                                    <a class="nav-link collapsed" href="/supplier" aria-expanded="false"
                                        aria-controls="pagesCollapseAuth">
                                        Supplier
                                    </a>
                            </div>

                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="/penjualan">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Transaksi
                            </a>
                            <a class="nav-link" href="/membership">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Membership
                            </a>

                            @if (Auth::user()->roles_id == 4)
                                {{-- <a class="nav-link" href="charts.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                                    Add Employee
                                </a> --}}
                            @endif
                        @else
                            {{-- Kalau User --}}
                            <a class="nav-link" href="/obat">
                                <div class="sb-nav-link-icon"><i class="fas fa-pills"></i></div>
                                Obat
                            </a>
                            <a class="nav-link" href="/pembelian">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-bag"></i></div>
                                Pembelian
                            </a>

                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="/profile">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></i></div>
                                Profile
                            </a>
                        @endif

                        <br><br><br>
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    {{-- <h1 class="mt-4">@yield('judul')</h1> --}}
                    {{-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">@yield('judul2')</li>
                    </ol> --}}
                    <div id="showinfo"></div>

                    @yield('kontens')

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    @yield('javascript');
</body>

</html>
