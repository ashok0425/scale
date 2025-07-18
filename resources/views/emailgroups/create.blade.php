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
                <div class="card-header d-flex align-items-center justify-content-between bg-dark text-white">
                        <h5 class="text-white">Create Group</h5>

                </div>

                <div class="card-body">
                    <form id="form" action="{{route('admin.emailgroups.store')}}" method="POST" data-parsley-validate>
                        @csrf
                        <label for="" class="h5">Group Name</label>
                        <input type="text" name="name" placeholder="Group Name" class="form-control" value="{{old('name')}}" required>

                        <div>
                            <button class="btn btn-sm  btn btn-sm -info mt-2 px-4">save</button>
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
