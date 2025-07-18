@extends('layout.master')
@section('main-content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
   <div class="card-header pt-2">
    <p class="text-dark">Email List</p>
                         <div>
                            <a href="{{ route('admin.emailgroups.index') }}" class="btn btn-sm  btn btn-sm -primary font-weight-bolder mr-3">Back</a>
                         </div>

                    </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emails as $email)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $email->email }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$emails->links()}}
        </div>
    </div>
@endsection


