@extends('layout.master')
@section('main-content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <div class="row align-items-center">
                            <div class="col-md-12 my-md-0">
                                <form action="" method="get">
                                    <div class="input-icon">
                                        <input type="text" name="keyword" class="form-control" placeholder="Search..."
                                           value="{{request()->query('keyword')}}"  />
                                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-toolbar">
                        <a href="{{ route('admin.campaigns.create') }}" class="btn btn-primary font-weight-bolder mr-3">Create New Campaign</a>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsletters as $newsletter)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $newsletter->subject }}</td>
                                    <td>
                                        <a href="{{route('admin.campaigns.edit',['campaign'=>$newsletter,'is_draft'=>1])}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('common.delete-modal') --}}
@endsection

@push('scripts')
    <script>
        $("#kt_datatable").KTDatatable({
            data: {
                saveState: false
            },
            search: {
                input: $("#kt_datatable_search_query"),
                key: "generalSearch"
            },
        });
    </script>
@endpush
