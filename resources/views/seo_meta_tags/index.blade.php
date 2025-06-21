@extends('layout.master')

@section('main-content')
    <div class="container">
        <div class="card">
       <div class="card-header d-flex justify-content-between bg-dark">
                <div>
                    <h5 class="card-title text-white">Seo List</h5>
                </div>
                <div>
                    <a href="{{ route('seos.create') }}" class="btn btn-info btn-sm">
                        <o class="fas fa-plus"></o>
                        Add New
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Page</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Keyword</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($seos as $seo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $seo->page_url }}</td>
                                <td>{{ $seo->meta_title }}</td>
                                <td>{{ $seo->meta_description }}</td>
                                <td>{{ $seo->meta_keywords }}</td>
                                <td>{{ \Carbon\Carbon::parse($seo->created_at)->format('d/m/Y') }}</td>
                                <td>
                                        <a
                                        href="{{ route('seos.edit', $seo) }}"
                                        class="btn btn-primary"
                                    >
                                        <i class="far fa-edit"></i>
                                    </a>

                                        <a
                                        id="delete"
                                        href="{{ route('seos.destroy', $seo) }}"
                                        class="btn btn-danger delete_btn">
                                        <i class="fas fa-trash"></i>
                                        </a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No SEO records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
