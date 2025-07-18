@extends('layout.master')
@section('main-content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header card-header d-flex align-items-center justify-content-between bg-dark text-white">
<div>
    <h6 class="text-white">Email Group</h6>
</div>
                                 <div>
                        <a href="{{ route('admin.emailgroups.create') }}" class="btn btn-sm  btn btn-sm -info mx-2"><i class="fas fa-plus"></i> Add Group</a>
                    </div>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email Count</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $group->name }}</td>
                                    <td>  <a href="{{route('admin.emails.show',['id'=>$group->id])}}" >{{ count($group?->email_ids??[]) }} </a></td>

                                    <td>
                                        <div>
                                            @if ($group->id!=1)

                                            <a href="{{ route('admin.emailgroups.edit', $group) }}"
                                            class="btn btn-sm  btn btn-sm -icon btn btn-sm -light btn btn-sm -hover-primary btn btn-sm -sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <!--begin::Svg Icon | path:/metronic/themes/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Write.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <path
                                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) " />
                                                        <path
                                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>
                                  <a
                                    href="{{ route('admin.emailgroups.destroy',$group) }}"
                                    class="btn btn-sm  btn btn-sm -danger delete_btn btn-sm "
                                >
                                    <i class="fas fa-trash"></i>
                                </a>
                                        @endif

                                        <a href="{{route('admin.emails.index',['group_id'=>$group->id])}}" class="btn btn-sm  btn btn-sm -info btn btn-sm -sm">Add Emails</a>
                                        </div>
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
    {{-- @include('common.delete-modal',['method'=>'DELETE']) --}}
@endsection

@push('scripts')
    <script>
        $("#kt_datatable").KTDatatable({
            data: { saveState: false },
            search: { input: $("#kt_datatable_search_query"), key: "generalSearch" },
        });
    </script>
@endpush
