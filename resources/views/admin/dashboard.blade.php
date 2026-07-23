@extends('admin.layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Dashboard - NiceAdmin Bootstrap Template</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('admin/assets/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->


        <!-- =======================================================
                                                              * Template Name: NiceAdmin
                                                              * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
                                                              * Updated: Apr 20 2024 with Bootstrap v5.3.3
                                                              * Author: BootstrapMade.com
                                                              * License: https://bootstrapmade.com/license/
                                                              ======================================================== -->
    </head>

    <body>

        <!-- ======= Header ======= -->

        <!-- ======= Sidebar ======= -->

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">

                    <!-- Left side columns -->
                    <div class="col-lg-8">
                        <div class="row">

                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item"
                                                    href="{{ url('/dashboard?filter=today') }}">Today</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=month') }}">This
                                                    Month</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=year') }}">This
                                                    Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Sales Order <span>| {{ $filterLabel }}</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-cart"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $ordersCount }}</h6>
                                                <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                    class="text-muted small pt-2 ps-1">increase</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Revenue Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card revenue-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item"
                                                    href="{{ url('/dashboard?filter=today') }}">Today</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=month') }}">This
                                                    Month</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=year') }}">This
                                                    Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Revenue <span>| {{ $filterLabel }}</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-currency-dollar"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $revenue }}</h6>
                                                <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                    class="text-muted small pt-2 ps-1">increase</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->

                            <!-- Customers Card -->
                            <div class="col-xxl-4 col-xl-12">

                                <div class="card info-card customers-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item"
                                                    href="{{ url('/dashboard?filter=today') }}">Today</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=month') }}">This
                                                    Month</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=year') }}">This
                                                    Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Customers <span>| {{ $filterLabel }}</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $CustomerCount }}</h6>
                                                <span class="text-muted small">Registered Customers</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div><!-- End Customers Card -->

                            <!-- Reports -->
                            <div class="col-12">
                                <div class="card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item"
                                                    href="{{ url('/dashboard?filter=today') }}">Today</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=month') }}">This
                                                    Month</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=year') }}">This
                                                    Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Reports <span>/ {{ $filterLabel }}</span></h5>

                                        <!-- Line Chart -->
                                        <div id="reportsChart"></div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                new ApexCharts(document.querySelector("#reportsChart"), {

                                                    series: [{
                                                            name: 'Orders',
                                                            type: 'area',
                                                            data: @json($orderData)
                                                        },
                                                        {
                                                            name: 'Products Sold',
                                                            type: 'area',
                                                            data: @json($productData)
                                                        },
                                                        {
                                                            name: 'Revenue',
                                                            type: 'line',
                                                            data: @json($revenueData),
                                                        }
                                                    ],
                                                    chart: {
                                                        height: 350,
                                                        type: 'area',
                                                        toolbar: {
                                                            show: true,
                                                            tools: {
                                                                download: true,
                                                                zoom: true,
                                                                pan: true,
                                                                reset: true
                                                            }
                                                        }
                                                    },
                                                    markers: {
                                                        size: 4
                                                    },
                                                    colors: [
                                                        '#0d6efd', // Orders
                                                        '#20c997', // Products Sold
                                                        '#ffc107' // Revenue
                                                    ],
                                                    fill: {
                                                        type: "gradient",
                                                        gradient: {
                                                            shadeIntensity: 1,
                                                            opacityFrom: 0.3,
                                                            opacityTo: 0.4,
                                                            stops: [0, 90, 100]
                                                        }
                                                    },
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    stroke: {
                                                        curve: 'smooth',
                                                        width: [2, 2, 4]
                                                    },
                                                    yaxis: [
{
    title: {
        text: 'Orders / Products'
    }
},
{
    opposite: true,
    title: {
        text: 'Revenue (EGP)'
    }
}
],
                                                    xaxis: {
                                                        categories: @json($labels)
                                                    },
                                                    tooltip: {
                                                        shared: true,
                                                        intersect: false,
                                                        y: {
                                                            formatter: function(value, {
                                                                seriesIndex
                                                            }) {
                                                                if (seriesIndex === 2) {
                                                                    return value.toLocaleString() + " EGP";
                                                                }
                                                                return value;
                                                            }
                                                        }
                                                    }
                                                }).render();
                                            });
                                        </script>
                                        <!-- End Line Chart -->

                                    </div>

                                </div>
                            </div><!-- End Reports -->

                            <!-- Recent Sales -->
                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item"
                                                    href="{{ url('/dashboard?filter=today') }}">Today</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=month') }}">This
                                                    Month</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=year') }}">This
                                                    Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Recent Orders <span>| {{ $filterLabel }}</span></h5>


                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $item)
                                                    <tr>
                                                        <th scope="row"><a href="#">{{ $item->id }}</a></th>
                                                        <td>{{ $item->user->name }}</td>
                                                        <td><a href="#"
                                                                class="text-primary">{{ $item->total }}</a>
                                                        </td>
                                                        <td><span class="badge bg-success">{{ $item->status }}</span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div><!-- End Recent Sales -->

                            <!-- Top Selling -->
                            <div class="col-12">
                                <div class="card top-selling overflow-auto">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item"
                                                    href="{{ url('/dashboard?filter=today') }}">Today</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=month') }}">This
                                                    Month</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/dashboard?filter=year') }}">This
                                                    Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body pb-0">
                                        <h5 class="card-title">Top Selling <span>| {{ $filterLabel }}</span></h5>

                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>

                                                    <th scope="col">image</th>
                                                    <th scope="col">Product name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($topProducts as $item)
                                                    <tr>
                                                        <th scope="row"> <img
                                                                src="{{ url($item->product->imagepath) }}" width="40"
                                                                height="40" alt=""></th>
                                                        <td><a href="#"
                                                                class="text-primary fw-bold">{{ $item->product->name }}
                                                            </a></td>
                                                        <td>{{ $item->product->price }}</td>
                                                        <td class="fw-bold">{{ $item->total_sold }}</td>
                                                        <td>${{ $item->total_revenue }}</td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div><!-- End Top Selling -->

                        </div>
                        
                    </div><!-- End Left side columns -->
                    <!-- Right side columns -->
                    <div class="col-lg-4">

                        <!-- Recent Activity -->
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                                <div class="activity">

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">32 min</div>
                                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                        <div class="activity-content">
                                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo
                                                officiis</a> beatae
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">56 min</div>
                                        <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                        <div class="activity-content">
                                            Voluptatem blanditiis blanditiis eveniet
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">2 hrs</div>
                                        <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                        <div class="activity-content">
                                            Voluptates corrupti molestias voluptatem
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">1 day</div>
                                        <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                        <div class="activity-content">
                                            Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati
                                                voluptatem</a> tempore
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">2 days</div>
                                        <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                        <div class="activity-content">
                                            Est sit eum reiciendis exercitationem
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">4 weeks</div>
                                        <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                        <div class="activity-content">
                                            Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                        </div>
                                    </div><!-- End activity item-->

                                </div>

                            </div>
                        </div><!-- End Recent Activity -->

                        <!-- Budget Report -->
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                                <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                            legend: {
                                                data: ['Allocated Budget', 'Actual Spending']
                                            },
                                            radar: {
                                                // shape: 'circle',
                                                indicator: [{
                                                        name: 'Sales',
                                                        max: 6500
                                                    },
                                                    {
                                                        name: 'Administration',
                                                        max: 16000
                                                    },
                                                    {
                                                        name: 'Information Technology',
                                                        max: 30000
                                                    },
                                                    {
                                                        name: 'Customer Support',
                                                        max: 38000
                                                    },
                                                    {
                                                        name: 'Development',
                                                        max: 52000
                                                    },
                                                    {
                                                        name: 'Marketing',
                                                        max: 25000
                                                    }
                                                ]
                                            },
                                            series: [{
                                                name: 'Budget vs spending',
                                                type: 'radar',
                                                data: [{
                                                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                        name: 'Allocated Budget'
                                                    },
                                                    {
                                                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                                                        name: 'Actual Spending'
                                                    }
                                                ]
                                            }]
                                        });
                                    });
                                </script>

                            </div>
                        </div><!-- End Budget Report -->

                        <!-- Website Traffic -->
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        echarts.init(document.querySelector("#trafficChart")).setOption({
                                            tooltip: {
                                                trigger: 'item'
                                            },
                                            legend: {
                                                top: '5%',
                                                left: 'center'
                                            },
                                            series: [{
                                                name: 'Access From',
                                                type: 'pie',
                                                radius: ['40%', '70%'],
                                                avoidLabelOverlap: false,
                                                label: {
                                                    show: false,
                                                    position: 'center'
                                                },
                                                emphasis: {
                                                    label: {
                                                        show: true,
                                                        fontSize: '18',
                                                        fontWeight: 'bold'
                                                    }
                                                },
                                                labelLine: {
                                                    show: false
                                                },
                                                data: [{
                                                        value: 1048,
                                                        name: 'Search Engine'
                                                    },
                                                    {
                                                        value: 735,
                                                        name: 'Direct'
                                                    },
                                                    {
                                                        value: 580,
                                                        name: 'Email'
                                                    },
                                                    {
                                                        value: 484,
                                                        name: 'Union Ads'
                                                    },
                                                    {
                                                        value: 300,
                                                        name: 'Video Ads'
                                                    }
                                                ]
                                            }]
                                        });
                                    });
                                </script>

                            </div>
                        </div><!-- End Website Traffic -->

                        <!-- News & Updates Traffic -->
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                                <div class="news">
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('admin/assets/img/news-1.jpg') }}" alt="">
                                        <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                                        <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="{{ asset('admin/assets/img/news-2.jpg') }}" alt="">
                                        <h4><a href="#">Quidem autem et impedit</a></h4>
                                        <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...
                                        </p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="{{ asset('admin/assets/img/news-3.jpg') }}" alt="">
                                        <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                        <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...
                                        </p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="{{ asset('admin/assets/img/news-4.jpg') }}" alt="">
                                        <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                        <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...
                                        </p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="{{ asset('admin/assets/img/news-5.jpg') }}" alt="">
                                        <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                        <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos
                                            eius...</p>
                                    </div>

                                </div><!-- End sidebar recent posts-->

                            </div>
                        </div><!-- End News & Updates -->

                    </div><!-- End Right side columns -->

                </div>
            </section>

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/quill/quill.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js') }}"></script>

        <!-- Template Main JS File -->

    </body>

    </html>
@endsection
