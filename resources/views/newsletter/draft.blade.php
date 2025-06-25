@extends('layout.master')
@section('main-content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header card-header d-flex align-items-center justify-content-bewteen bg-dark text-white">
                   <div>
                    <h5 class="text-white">Draft campaign</h5>
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
                                    <td>{{ $newsletter->title }}</td>
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
