@extends('administrator.administrator_master')
@section('title','Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </nav>
        @if (Session::has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-1" style="margin-right: 5px"></i>
            <strong style="font-weight: bolder">{{session::get('success')}}</strong> {{ __('You are logged in as Administrator!!') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h2>
        <?php  date_default_timezone_set('Asia/Manila');
            echo "Today is " . date("l, m-d-Y. h:i a");?>
        </h2>

    
    </div><!-- End Page Title -->

    <div class="col-lg-12">
        <div class="row">

          <h1 style="font-size: 100px; text-align: center; margin-top: 50px; margin-bottom: 230px"> Welcome! You are Login as Administrator!</h1>

        </div>
    </div>

@endsection
