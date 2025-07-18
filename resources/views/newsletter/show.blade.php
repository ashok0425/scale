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
                                               value="{{ request()->query('keyword') }}" />
                                        @foreach (request()->except('keyword') as $key => $value)
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}" />
                                        @endforeach
                                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-toolbar">
                        <a href="{{ route('admin.campaigns.index') }}" class="btn btn-sm  btn btn-sm btn-primary font-weight-bolder mr-3">Cancel</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Delivered At</th>
                                <th>Seen At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emails as $email)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $email->subscription->email }}</td>
                                    <td>{{ $email->deliver_at ? Carbon\Carbon::parse($email->deliver_at)->format('d M Y H:i') : 'Not Delivered' }}</td>
                                    <td>{{ $email->seen_at ? Carbon\Carbon::parse($email->seen_at)->format('d M Y H:i') : 'Not Seen' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $emails->withQueryString()->links() }}
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
