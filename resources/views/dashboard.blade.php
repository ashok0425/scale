@extends('layout.master')
@php

$totalBlog=App\Models\Blog::query()->count();
$blogs=App\Models\Blog::limit(5)->latest()->get();
$cms=App\Models\Crm::limit(5)->latest()->get();
$waitlists=App\Models\Crm::limit(5)->where('type',1)->latest()->get();
$waitlistCount=App\Models\Crm::where('type',1)->count();
$access=App\Models\Crm::limit(5)->where('type',2)->latest()->get();
$accessCount=App\Models\Crm::where('type',2)->count();
$pdfDownload=App\Models\Crm::where('type',3)->count();



@endphp

@section('main-content')
    <style>
        .card {
            border: 0;
            border-radius: 0;
            font-size: 14px;
        }

        .fa {
            font-size: 2.8rem;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<div class="container-fluid p-0">
    @php
    $hour = now()->hour;
    if ($hour < 12) {
        $greeting = 'Good Morning';
    } elseif ($hour < 17) {
        $greeting = 'Good Afternoon';
    } else {
        $greeting = 'Good Evening';
    }
@endphp

<div class="alert alert-success bg-success text-white p-2">
    {{ $greeting }}  &nbsp;<strong>{{Auth::user()->name}} </strong>, Welcome Back!
</div>


    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm stat-card border-0 rounded text-center">
                <a href="{{route('blogs.index')}}" class="text-decoration-none text-dark">
                    <div class="card-body py-4">
                        <div class="icon-circle mx-auto mb-3">
                            <i class="fas fa-copy fa-2x"></i>
                        </div>
                        <small class="text-muted h5">Total Posts</small>
                        <h4 class="fw-bold mt-1 h3">{{$totalBlog}}</h4>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card shadow-sm stat-card border-0 rounded text-center">
                <a href="{{route('crm',['type'=>1])}}" class="text-decoration-none text-dark">
                <div class="card-body py-4">
                    <div class="icon-circle mx-auto mb-3">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <small class="text-muted h5">Waitlist Count</small>
                    <h4 class="fw-bold mt-1 h3">{{$waitlistCount}}</h4>
                </div>
                </a>
            </div>
        </div>

          <div class="col-md-3">
            <div class="card shadow-sm stat-card border-0 rounded text-center">
                <a href="{{route('crm',['type'=>2])}}" class="text-decoration-none text-dark">
                <div class="card-body py-4">
                    <div class="icon-circle mx-auto mb-3">
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                    <small class="text-muted h5">Priority Access </small>
                    <h4 class="fw-bold mt-1 h3">{{$accessCount}}</h4>
                </div>
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm stat-card border-0 rounded text-center">
                <a href="{{route('crm',['type'=>3])}}" class="text-decoration-none text-dark">
                <div class="card-body py-4">
                    <div class="icon-circle mx-auto mb-3">
                        <i class="fas fa-copy fa-2x"></i>
                    </div>
                    <small class="text-muted h5">Pdf Download </small>
                    <h4 class="fw-bold mt-1 h3">{{$pdfDownload}}</h4>
                </div>
                </a>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Recent Post
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>
                                #
                            </th>
                            <th>Title</th>
                            <th>Thumbnail</th>

                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$blog->title}}</td>
                                <td><img src="{{getImage($blog->thumbnail)}}" alt="" width="30" class="rounded-circle" height="30"></td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Waitlist
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>
                                #
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </thead>
                        <tbody>
                            @foreach ($waitlists as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>


@endsection

