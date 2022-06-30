@extends('layouts.veterinarian')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<style>
    body{
    color: #6c757d;
    background-color: #f5f6f8;
    margin-top:20px;
    }
    .card-box {
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #e7eaed;
        padding: 1.5rem;
        margin-bottom: 24px;
        border-radius: .25rem;
    }
    .avatar-xl {
        height: 6rem;
        width: 6rem;
    }
    .rounded-circle {
        border-radius: 50%!important;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #1abc9c;
    }
    .nav-pills .nav-link {
        border-radius: .25rem;
    }
    .navtab-bg li>a {
        background-color: #f7f7f7;
        margin: 0 5px;
    }
    .nav-pills>li>a, .nav-tabs>li>a {
        color: #6c757d;
        font-weight: 600;
    }
    .mb-4, .my-4 {
        margin-bottom: 2.25rem!important;
    }
    .tab-content {
        padding: 20px 0 0 0;
    }
    .progress-sm {
        height: 5px;
    }
    .m-0 {
        margin: 0!important;
    }
    .table .thead-light th {
        color: #6c757d;
        background-color: #f1f5f7;
        border-color: #dee2e6;
    }
    .social-list-item {
        height: 2rem;
        width: 2rem;
        line-height: calc(2rem - 4px);
        display: block;
        border: 2px solid #adb5bd;
        border-radius: 50%;
        color: #adb5bd;
    }

    .text-purple {
        color: #6559cc!important;
    }
    .border-purple {
        border-color: #6559cc!important;
    }

    .timeline {
        margin-bottom: 50px;
        position: relative;
    }
    .timeline:before {
        background-color: #dee2e6;
        bottom: 0;
        content: "";
        left: 50%;
        position: absolute;
        top: 30px;
        width: 2px;
        z-index: 0;
    }
    .timeline .time-show {
        margin-bottom: 30px;
        margin-top: 30px;
        position: relative;
    }
    .timeline .timeline-box {
        background: #fff;
        display: block;
        margin: 15px 0;
        position: relative;
        padding: 20px;
    }
    .timeline .timeline-album {
        margin-top: 12px;
    }
    .timeline .timeline-album a {
        display: inline-block;
        margin-right: 5px;
    }
    .timeline .timeline-album img {
        height: 36px;
        width: auto;
        border-radius: 3px;
    }
    @media (min-width: 768px) {
        .timeline .time-show {
            margin-right: -69px;
            text-align: right;
        }
        .timeline .timeline-box {
            margin-left: 45px;
        }
        .timeline .timeline-icon {
            background: #dee2e6;
            border-radius: 50%;
            display: block;
            height: 20px;
            left: -54px;
            margin-top: -10px;
            position: absolute;
            text-align: center;
            top: 50%;
            width: 20px;
        }
        .timeline .timeline-icon i {
            color: #98a6ad;
            font-size: 13px;
            position: absolute;
            left: 4px;
        }
        .timeline .timeline-desk {
            display: table-cell;
            vertical-align: top;
            width: 50%;
        }
        .timeline-item {
            display: table-row;
        }
        .timeline-item:before {
            content: "";
            display: block;
            width: 50%;
        }
        .timeline-item .timeline-desk .arrow {
            border-bottom: 12px solid transparent;
            border-right: 12px solid #fff !important;
            border-top: 12px solid transparent;
            display: block;
            height: 0;
            left: -12px;
            margin-top: -12px;
            position: absolute;
            top: 50%;
            width: 0;
        }
        .timeline-item.timeline-item-left:after {
            content: "";
            display: block;
            width: 50%;
        }
        .timeline-item.timeline-item-left .timeline-desk .arrow-alt {
            border-bottom: 12px solid transparent;
            border-left: 12px solid #fff !important;
            border-top: 12px solid transparent;
            display: block;
            height: 0;
            left: auto;
            margin-top: -12px;
            position: absolute;
            right: -12px;
            top: 50%;
            width: 0;
        }
        .timeline-item.timeline-item-left .timeline-desk .album {
            float: right;
            margin-top: 20px;
        }
        .timeline-item.timeline-item-left .timeline-desk .album a {
            float: right;
            margin-left: 5px;
        }
        .timeline-item.timeline-item-left .timeline-icon {
            left: auto;
            right: -56px;
        }
        .timeline-item.timeline-item-left:before {
            display: none;
        }
        .timeline-item.timeline-item-left .timeline-box {
            margin-right: 45px;
            margin-left: 0;
            text-align: right;
        }
    }
    @media (max-width: 767.98px) {
        .timeline .time-show {
            text-align: center;
            position: relative;
        }
        .timeline .timeline-icon {
            display: none;
        }
    }
    .timeline-sm {
        padding-left: 110px;
    }
    .timeline-sm .timeline-sm-item {
        position: relative;
        padding-bottom: 20px;
        padding-left: 40px;
        border-left: 2px solid #dee2e6;
    }
    .timeline-sm .timeline-sm-item:after {
        content: "";
        display: block;
        position: absolute;
        top: 3px;
        left: -7px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #fff;
        border: 2px solid #1abc9c;
    }
    .timeline-sm .timeline-sm-item .timeline-sm-date {
        position: absolute;
        left: -104px;
    }
    @media (max-width: 420px) {
        .timeline-sm {
            padding-left: 0;
        }
        .timeline-sm .timeline-sm-date {
            position: relative !important;
            display: block;
            left: 0 !important;
            margin-bottom: 10px;
        }
    }
</style>
<div class="container">
<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card-box text-center">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

            <h4 class="mb-0">Nama Pet</h4>
            <p class="text-muted">Kucing/Anjing</p>

            <div class="text-left mt-3">
                <p class="text-muted mb-2 font-13"><strong>Nama:</strong> <span class="ml-2">Nik G. Patel</span></p>

                <p class="text-muted mb-2 font-13"><strong>BOD :</strong><span class="ml-2">(123)
                        123 1234</span></p>

                <p class="text-muted mb-2 font-13"><strong>Ras :</strong> <span class="ml-2 ">user@email.domain</span></p>

                <p class="text-muted mb-1 font-13"><strong>Berat :</strong> <span class="ml-2">USA</span></p>
                <p class="text-muted mb-1 font-13"><strong>Gender :</strong> <span class="ml-2">USA</span></p>
                <p class="text-muted mb-1 font-13"><strong>Warna :</strong> <span class="ml-2">USA</span></p>
            </div>
        </div> <!-- end card-box -->

        <div class="card-box">
            <h4 class="header-title">Pet lain yang di miliki</h4>

            <div class="pt-1">
                <a href="">
                   <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle avatar-xl img-thumbnail mb-1 mt-1" alt="profile-image">
                </a> 
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle avatar-xl img-thumbnail mb-1 mt-1" alt="profile-image">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle avatar-xl img-thumbnail mb-1 mt-1" alt="profile-image">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle avatar-xl img-thumbnail mb-1 mt-1" alt="profile-image">
            </div>
        </div> <!-- end card-box-->

    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg">
                <li class="nav-item">
                    <a href="#about-me" data-toggle="tab" aria-expanded="true" class="nav-link ml-0 active">
                        <i class="mdi mdi-face-profile mr-1"></i>Profil Pet
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                
                <div class="tab-pane show active" id="about-me">

                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                        Jadwal Berkunjung</h5>

                    <ul class="list-unstyled timeline-sm">
                        <li class="timeline-sm-item">
                            <span class="timeline-sm-date">2015 - 19</span>
                            <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                        </li>
                        <li class="timeline-sm-item">
                            <span class="timeline-sm-date">2012 - 15</span>
                            <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                        </li>
                        <li class="timeline-sm-item">
                            <span class="timeline-sm-date">2010 - 12</span>
                            <h5 class="mt-0 mb-1">Graphic Designer</h5>
                        </li>
                    </ul>

                    <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                        Tabel Kunjungan</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Keperluan</th>
                                    <th>Gejala</th>
                                    <th>Penanangan</th>
                                    <th>Hari Kunjungan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>App design and development</td>
                                    <td>01/01/2015</td>
                                    <td>10/15/2018</td>
                                    <td><span class="badge badge-info">Work in Progress</span></td>
                                    <td>Halette Boivin</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Coffee detail page - Main Page</td>
                                    <td>21/07/2016</td>
                                    <td>12/05/2018</td>
                                    <td><span class="badge badge-success">Pending</span></td>
                                    <td>Durandana Jolicoeur</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Poster illustation design</td>
                                    <td>18/03/2018</td>
                                    <td>28/09/2018</td>
                                    <td><span class="badge badge-pink">Done</span></td>
                                    <td>Lucas Sabourin</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Drinking bottle graphics</td>
                                    <td>02/10/2017</td>
                                    <td>07/05/2018</td>
                                    <td><span class="badge badge-purple">Work in Progress</span></td>
                                    <td>Donatien Brunelle</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Landing page design - Home</td>
                                    <td>17/01/2017</td>
                                    <td>25/05/2021</td>
                                    <td><span class="badge badge-warning">Coming soon</span></td>
                                    <td>Karel Auberjo</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- end timeline content-->

            </div> <!-- end tab-content -->
        </div> <!-- end card-box-->

    </div> <!-- end col -->
</div>
</div>
@endsection