@extends('layout.master')

@section('main-content')
    <div class="container">
        <div class="card">
       <div class="card-header d-flex justify-content-between bg-dark">
                <div>
                    <h5 class="card-title text-white">Team List</h5>
                </div>
                <div>
                    <a href="{{ route('teams.create') }}" class="btn btn-sm  btn btn-sm btn-info btn btn-sm btn-sm">
                        <o class="fas fa-plus"></o>
                        Add Team
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $team)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $team->name }}</td>
                                <td><img src="{{getImage($team->thumbnail)}}" alt="" width="60"></td>
                                <td>{{ $team->position }}</td>
                                <td>
                                        <a
                                        href="{{ route('teams.edit', $team) }}"
                                        class="btn btn-sm  btn btn-sm btn-primary"
                                    >
                                        <i class="far fa-edit"></i>
                                    </a>

                                        <a
                                        id="delete"
                                        href="{{ route('teams.destroy', $team) }}"
                                        class="btn btn-sm  btn btn-sm btn-danger delete_btn btn-sm ">
                                        <i class="fas fa-trash"></i>
                                        </a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No Team records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
