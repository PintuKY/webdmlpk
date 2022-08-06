<!DOCTYPE html>
<html lang="en">


<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seller Panel HOME</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('seller/css/adminlte.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('seller/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
  <style type="text/css">
    .required{
      color: red;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('seller/home')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form> 
        </li>
      </ul>
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('seller/home')}}" class="brand-link">
  <!--    <img src="seller/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    
      <span class="brand-text font-weight-light">Subbisky</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('seller/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}} </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('seller/home')}}" class="nav-link {{ request()->is('seller/home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                   Dashboard
                
              </p>
            </a>
    
          </li>
      <?php
                    $user = \Illuminate\Support\Facades\Auth::user();
                    $seller = \App\Models\Seller::where('user_id', $user->id)->first();
                    $service = \App\Models\Service::find($seller->service_parent_id);
                    ?>
          @if($service->type=="ecom")
                    <li class="nav-header">Shop Management</li>
                    @elseif($service->type=="education")
                        <li class="nav-header">Institution Management</li>
                    @elseif($service->type=="health")
                        <li class="nav-header">Health Management</li>
                    @elseif($service->type=="service")
                        <li class="nav-header">Shop Management</li>
                    @elseif($service->type=="professional")
                        <li class="nav-header">Office Management</li>
				    @elseif($service->type=="pd")
                        <li class="nav-header">Transport Management</li>
                        @else
                        <li class="nav-header">Shop Management</li>
                        @endif
          <li class="nav-item">
            <a href="{{ route('seller.shop.index') }}" class="nav-link {{ request()->is('seller/shops') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
             @if($service->type=="ecom")
                                <p>
                                    My Shop
                                </p>
                    @elseif($service->type=="education")
                                <p>
                                    My Institute
                                </p>
                    @elseif($service->type=="health")
                                <p>
                                    My Hospital
                                </p>
                    @elseif($service->type=="services")
                                <p>
                                    My Shop
                                </p>
                    @elseif($service->type=="professional")
                                <p>
                                    My Office
                                </p>
				@elseif($service->type=="pd")
                                <p>
                                    My Agency
                                </p>
                    @else
                                <p>
                                    My Shop
                                </p>
                    @endif
            </a>
          </li>
			
                    @if($service->type=="ecom")
          <li class="nav-item {{ request()->is('seller/categories') ? 'has-treeview menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('seller/categories') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('seller/categories')}}" class="nav-link {{ request()->is('seller/categories') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    All Categories
                  </p>
                </a>
              </li>
            </ul>
          </li>

          
              
                        <li class="nav-item {{ request()->is('seller/products') ? 'has-treeview menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('seller/products') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Products
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('seller/products')}}"
                                       class="nav-link {{ request()->is('seller/products') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Products
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    
                     @elseif($service->type=="staybooking")
          <li class="nav-item {{ request()->is('seller/hotels') ? 'has-treeview menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('seller/hotels') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Hotels
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('seller/hotels')}}"
                           class="nav-link {{ request()->is('seller/hotels') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                All Hotels
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
			@else
                        <li class="nav-item {{ request()->is('seller/services') ? 'has-treeview menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('seller/services') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Services
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('seller/services')}}"
                                       class="nav-link {{ request()->is('seller/services') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Services
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
        @endif
          <li class="nav-item {{ request()->is('seller/orders') ? 'has-treeview menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('seller/orders') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                 @if($service->type=="ecom")
                                Order Management
                                @elseif($service->type=="education")
                                    Fees Management
                                @elseif($service->type=="health")
                                    Appointments
                                @elseif($service->type=="service")
                                    Bookings
                                @elseif($service->type=="professional")
                                    Service Management
                                @else
                                    Order Management
				  @endif
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('seller/orders')}}" class="nav-link {{ request()->is('seller/orders') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                     @if($service->type=="ecom")
                                 All Order 
                                @elseif($service->type=="education")
                                    All Details
                                @elseif($service->type=="health")
                                   All Appointments
                                @elseif($service->type=="service")
                                    All Bookings
                                @elseif($service->type=="professional")
                                    All Service 
                                @else
                                    All Order
					  @endif
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('seller/wallets')}}" class="nav-link {{ request()->is('seller/wallets') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Wallets
              </p>
            </a>
          </li>
			<li class="nav-item">
                <a href="{{url('seller/sellerQuotes')}}" class="nav-link {{ request()->is('seller/sellerQuotes') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quotes
                    </p>
                </a>
            </li>
    </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@yield('content')

<footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="{{ url('/') }}" target="_blank">Subbisky</a>.</strong>
      All rights reserved.
      <br>
      </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('seller/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('seller/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('seller/js/pages/dashboard.js')}}"></script>



<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{ asset('seller/js/demo.js')}}"></script>
<!-- Page specific script -->


<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'Sales',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120]
        },
        {
          label               : 'Loan',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [200, 210, 220, 230, 240, 250, 260, 270, 280, 290, 300, 310, 320]
        },
       {
          label               : 'Interior',
          backgroundColor     : 'rgba(255, 153, 255, 1)',
          borderColor         : 'rgba(255, 153, 255, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(255, 153, 255, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [400, 410, 420, 420, 430, 440, 450, 460, 470, 480, 490, 500, 510, 520]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Total Lead',
          'Total Employees',
          'Total Assigned Lead',
          'Interested',
          'Not Interested',
          'Fallow up',
      ],
      datasets: [
        {
          data: [200,20,200,150,30,20],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

</body>


</html>
