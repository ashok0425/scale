@extends('layout.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
    <style>
        #step-email-editor { display: none; }
    </style>
@endpush
@section('main-content')
<div id="app">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header card-header d-flex align-items-center justify-content-between bg-dark text-white">
                    <div class="card-title">
                        <h6 class="text-white">Edit Group</h6>
                    </div>

                </div>

                <div class="card-body">
                    <form id="form" action="{{route('admin.emailgroups.update',$emailgroup)}}" method="POST" data-parsley-validate>
                        @csrf
                        @method('PATCH')
                        <label for="" class="h5">Group Name</label>
                        <input type="text" name="name" placeholder="Group Name" required class="form-control" value="{{old('name',$emailgroup->name)}}">

                        <div class="mt-2">
                            <button class="btn btn-sm  btn btn-sm btn-info px-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')

@endpush
