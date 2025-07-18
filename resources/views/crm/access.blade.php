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
                        <button class="btn btn-sm  btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                     <div class="col-md-1">
                        <button class="btn btn-sm  btn btn-sm btn-success" name="export" value="1"><i class="fas fa-file-excel"></i></button>
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
                            <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
<br>
                                {{ Carbon\Carbon::parse($user->created_at)->format('g:i:s A') }}
                            </td>
                       <td>
                        @if ($user->payment_status==0)
                            <span class="badge bg-danger">Cancelled</span>
                        @endif
                        @if ($user->payment_status==1)
                            <span class="badge bg-success">Paid</span>
                        @endif

                        @if ($user->payment_status==2)
                            <span class="badge bg-danger text-white">Failed</span>
                        @endif
                        <br>
  <a href="{{ route('crm.delete', ['id' => $user->id]) }}"
     onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-sm  btn btn-sm btn-sm btn btn-sm btn-danger">
    <i class="fas fa-trash"></i>
  </a>
   <a href="{{ route('crm.edit', ['id' => $user,'type'=>request()->query('type')]) }}" class="btn btn-sm btn-primary"
    >
    <i class="fas fa-edit"></i>
  </a>
  <a href="{{ route('crm.show', ['id' => $user->id]) }}" class="btn btn-sm  btn btn-sm btn-sm btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$users->withQueryString()->links()}}
    </div>
@endsection
