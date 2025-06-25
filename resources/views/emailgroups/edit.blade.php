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
                <div class="card-header flex-wrap pt-4 pb-4">
                    <div class="card-title">
                        <h4>Edit Group</h4>
                    </div>
                    <div class="card-toolbar">
                        <a class="btn mr-10" href="{{ route('admin.emailgroups.index') }}">Cancel</a>
                        <a class="btn btn-primary font-weight-bolder" onclick="document.getElementById('form').submit();">Save</a>

                    </div>
                </div>

                <div class="card-body">
                    <form id="form" action="{{route('admin.emailgroups.update',$emailgroup)}}" method="POST" data-parsley-validate>
                        @csrf
                        @method('PATCH')
                        <label for="" class="h5">Group Name</label>
                        <input type="text" name="name" placeholder="Group Name" required class="form-control" value="{{old('name',$emailgroup->name)}}">

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')

@endpush
