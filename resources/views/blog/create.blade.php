@extends('layout.master')
@section('main-content')
    <div class="card">
        <div class="card-header d-flex justify-content-between bg-dark">
            <div>
                <h5 class="card-title text-white">Add New Post</h5>
            </div>
        </div>
        <div class="card-body">
            <form
                action="{{ route('blogs.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            placeholder="Post title"
                            value="{{ old('title') }}"
                            required
                        />
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Select Category</label>
                        <select name="category" id="" class="form-control form-select" required>
                           <option value="">select category</option>
                           @foreach ($categories as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="status">Post Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{old('status') == 1 ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ old('status')  == 0 ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>


                    <div class="mb-3 col-md-6">
                        <label class="form-label">Thumbnail</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input
                                name="thumbnail"
                                type="file"
                                class="file-upload-field"
                                value=""
                                required
                            />
                        </div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Cover Photo (optional)</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input
                                name="cover"
                                type="file"
                                class="file-upload-field"
                                value=""
                            />
                        </div>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Short Description</label>
                        <textarea
                            type="text"
                            name="short_description"
                            class="form-control"
                            placeholder="Post Detail"
                            style="padding: 0;margin:0"
                            required

                        >
                          {{ old('short_description') }}
                      </textarea
                        >
                    </div>

                    <div class="mb-3 col-md-12  px-5">
                        <label class="form-label">Long Description</label>
                        <textarea
                            type="text"
                            name="long_description"
                            id="summernote"
                            class="form-control"
                            placeholder="Post Description"
                            required
                        >
{{ old('long_description') }}
                      </textarea
                        >
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
