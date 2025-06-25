@extends('layout.master')
@section('main-content')

    <div class="container">
          <form action="" class="mb-3 card">
            <div class="row card-body">
                <input type="hidden" value="{{request()->query('type')}}" name="type">
                <div class="col-md-3 mb-2 ml-auto">
                    <input type="search" name="keyword" value="{{request()->query('keyword')}}" class="form-control" placeholder="search...">
                </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                     <div class="col-md-1">
                        <button class="btn btn-success" name="export" value="1"><i class="fas fa-file-excel"></i></button>
                    </div>
            </div>
        </form>
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
                            <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y g:i:s A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$users->withQueryString()->links()}}
    </div>
@endsection
