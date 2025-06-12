@extends('layout.master')
@section('main-content')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-dark">
                <div>
                    <h5 class="card-title text-white">User List</h5>
                </div>

            </div>

            <table id="myTable" class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Attachment</th>
                        <th>Blog</th>
                        <th>Register on</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->attachment }}</td>
                            <td>{{ $user->blog->name }}</td>
                            <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$users->withQueryString()->links()}}
    </div>
@endsection
