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

        .dashboard .fa {
            font-size: 2.8rem;
        }
    </style>
<div class=" dashboard">
<div class="row">

    <!-- Total Blog Posts -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Posts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBlog }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-copy fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Waitlist Count -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Waitlist</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $waitlistCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Priority Access -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Priority Access</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $accessCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF Downloads -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PDF Downloads</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pdfDownload }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-download fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
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

