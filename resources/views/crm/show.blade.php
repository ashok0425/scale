@extends('layout.master')
@section('main-content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-white">User Details</h6>
            <a href="{{ route('crm',['type'=>2]) }}" class="btn btn-light btn-sm">Back to List</a>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="text-secondary">Basic Info</h5>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone }}</p>
                    <p><strong>City:</strong> {{ $user->city }}</p>
                </div>

                <div class="col-md-6">
                    <h5 class="text-secondary">Additional Info</h5>
                    <p><strong>Role:</strong> {{ $user->role }}</p>
                    <p><strong>LinkedIn:</strong>
                        @if($user->linkedin)
                            <a href="{{ $user->linkedin }}" target="_blank">{{ $user->linkedin }}</a>
                        @else
                            N/A
                        @endif
                    </p>
                    <p><strong>Message:</strong> {{ $user->message ?? '—' }}</p>
                    <p><strong>Registered On:</strong>
                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }} <br>
                        <small>{{ \Carbon\Carbon::parse($user->created_at)->format('g:i A') }}</small>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-secondary">Payment Status</h5>
                    @if ($user->payment_status == 1)
                        <span class="badge bg-success">Paid</span>
                    @elseif ($user->payment_status == 2)
                        <span class="badge bg-danger">Failed</span>
                    @else
                        <span class="badge bg-warning text-dark">Cancelled</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
