@extends('layout.master')
@section('main-content')
    <div class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-between bg-dark">
                <div>
                    <h5 class="card-title text-white">Subsciber Email List</h5>
                </div>
            </div>
            <table id="myTable" class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Is Unsubscribe</th>
                        <th>Subscribe At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{!! $user->is_unsubscribe?"<span class='badge bg-danger'>unsubscribed</span>":'' !!}
                           <br>
                                {{$user->reason}}
                            <br>
                            {{$user->other_reason}}

                            </td>

                            <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y g:i:s A') }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
