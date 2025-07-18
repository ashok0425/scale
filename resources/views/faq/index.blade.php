@extends('layout.master')

@section('main-content')
    <div class="container">
        <div class="card">
       <div class="card-header d-flex justify-content-between bg-dark">
                <div>
                    <h5 class="card-title text-white">Faq List</h5>
                </div>
                <div>
                    <a href="{{ route('faqs.create') }}" class="btn btn-sm  btn btn-sm -info btn btn-sm -sm">
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
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $faq)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faq->page_url }}</td>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->answer }}</td>
                                <td>{{ \Carbon\Carbon::parse($faq->created_at)->format('d/m/Y') }}</td>
                                <td>
                                        <a
                                        href="{{ route('faqs.edit', $faq) }}"
                                        class="btn btn-sm  btn btn-sm -primary"
                                    >
                                        <i class="far fa-edit"></i>
                                    </a>

                                        <a
                                        id="delete"
                                        href="{{ route('faqs.destroy', $faq) }}"
                                        class="btn btn-sm  btn btn-sm -danger delete_btn btn-sm ">
                                        <i class="fas fa-trash"></i>
                                        </a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No Faq records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
