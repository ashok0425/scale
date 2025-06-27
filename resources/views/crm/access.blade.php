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
                        <th>User Detail</th>
                        <th>Role</th>
                        <th>City</th>
                        <th>Linkedin</th>
                        <th>Message</th>
                        <th>Register on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}
                               <br> {{ $user->email }}
                            <br>
                            {{ $user->phone }}
                            </td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->linkedin }}</td>
                            <td>{{ $user->message }}</td>
                            <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y g:i:s A') }}</td>
                       <td>
  <a href="{{ route('crm.delete', ['id' => $user->id]) }}"
     onclick="return confirm('Are you sure you want to delete this user?');">
    <i class="fas fa-trash"></i>
  </a>
</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$users->withQueryString()->links()}}
    </div>
@endsection
