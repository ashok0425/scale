@extends('layout.master')
@section('main-content')
    @php
        define('PAGE', 'setting');
    @endphp

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-dark">
                <div>
                    <h5 class="card-title text-white">Banner List</h5>
                </div>
                <div>
                    <a href="{{ route('banners.create',['type'=>request()->query('type')]) }}" class="btn btn-info btn-sm">
                        <o class="fas fa-plus"></o>
                        Add Banner
                    </a>
                </div>
            </div>

            <table id="myTable" class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>#</th>

                        <th>Banner Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ getImage($item->thumbnail) }}" alt="" width="70" /></td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <a class="badge bg-success">Publish</a>
                                @else
                                    <a class="badge bg-danger">Draft</a>
                                @endif
                            </td>
                            <td>

                                <a
                                    href="{{ route('banners.edit', $item) }}"
                                    class="btn btn-primary"
                                >
                                    <i class="far fa-edit"></i>
                                </a>
                                <a
                                    href="{{ route('banners.destroy',$item) }}"
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
@endsection
