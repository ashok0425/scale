@extends('layout.master')
@section('main-content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header card-header d-flex align-items-center justify-content-end bg-dark text-white">
                    <div>
                       <form action="" method="get" class="mx-2">
                                    <div class="input-icon">
                                        <input type="text" name="keyword" class="form-control" placeholder="Search..."
                                           value="{{request()->query('keyword')}}"  />
                                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                                    </div>
                                </form>
                    </div>

                    <div>
                        <a href="{{ route('admin.campaigns.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> New Campaign</a>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Total User</th>
                                <th>Total Deliver</th>
                                <th>Total Seen</th>
                                <th>CreatedAt</th>
                                <th>Schedule At</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsletters as $newsletter)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $newsletter->title }}</td>
                                    <td> <a href="{{route('admin.campaigns.show',['campaign'=>$newsletter->id])}}">{{ $newsletter->total_email_count }}</a></td>
                                    <td> <a href="{{route('admin.campaigns.show',['campaign'=>$newsletter->id,'deliver_at'=>1])}}">{{ $newsletter->deliver_email_count }}</a></td>
                                    <td> <a href="{{route('admin.campaigns.show',['campaign'=>$newsletter->id,'seen_at'=>1])}}">{{ $newsletter->seen_email_count }}</a></td>

                                    <td>{{ Carbon\Carbon::parse($newsletter->created_at)->format('d/m/Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($newsletter->publish_date)->format('d/m/Y g:i:s A') }}</td>

                                    <td>
                                        <a href="{{route('admin.campaigns.edit',$newsletter)}}" class="btn btn-primary"><i class="fas fa-copy"></i></a>
                                           <a  onclick="return confirm('Are you sure you want to delete this campaign?');" href="{{route('admin.campaigns.status',$newsletter)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

@endpush
