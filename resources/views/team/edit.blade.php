@extends('layout.master')

@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="card-title text-white mb-0">Edit Team</h5>
            </div>

            <form action="{{ route('teams.update',$team) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="page">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{old('name',$team->name)}}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Position</label>
                        <input type="text" name="position" id="position" class="form-control" value="{{old('position',$team->position)}}">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="title">Linkedin</label>
                        <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{old('linkedin',$team->linkedin)}}">
                    </div>


                   <div class=" col-md-6 mb-5">
                        <label class="form-label">Thumbnail (w-400Xh-400)</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input name="thumbnail" type="file" class="file-upload-field" value="" />
                        </div>
                        <img src="{{ getImage($team->thumbnail) }}" alt="" width="100">
                    </div>
                </div>
                </div>

                <div class="card-footer">
 @if (Request::segment(2))
                    {{-- Means there is something after /resource --}}
                    <a
                        href="/{{ Request::segment(1) }}?type={{ request()->query('type') }}"
                        class="btn btn-secondary btn-sm"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                @endif                    <button type="submit" class="btn btn-sm  btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
