@extends('layout.master')
@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-dark">
                <div>
                    <h5 class="card-title text-white">Pages List</h5>
                </div>
                <div>
                    <a href="{{ route('pages.create') }}" class="btn btn-info btn-sm">
                        <o class="fas fa-plus"></o>
                        Add Page
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="table table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Page</th>
                            <th>Type</th>
                            <th>Path</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $page->name }}</td>
                                <td>{{ $page->type==1?'Page':'Email Template' }}</td>

                                <td>{{ $page->slug }}</td>

                                <td>
                                    <a
                                        href="{{ route('pages.edit', $page) }}"
                                        class="btn btn-primary"
                                    >
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a
                                    href="{{ route('pages.destroy',$page->id) }}"
                                    class="btn btn-danger delete_btn"
                                >
                                    <i class="fas fa-trash"></i>
                                </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
