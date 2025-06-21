@extends('layout.master')
@section('main-content')
    <div class="card">
        <div class="card-header d-flex justify-content-between bg-dark">
            <div>
                <h5 class="card-title text-white">Add New Post</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Post title"
                            value="{{ old('title') }}" required />
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Select Category</label>
                        <select name="category" id="" class="form-control form-select" required>
                            <option value="">select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="status">Post Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="status">Is Featured Post</label>
                        <select name="feature_post" id="feature_post" class="form-control">
                            <option value="0" {{ old('feature_post') == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('feature_post') == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Thumbnail</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input name="thumbnail" type="file" class="file-upload-field" value="" required />
                        </div>
                    </div>



                    <div class="mb-3 col-md-4">
                        <label class="form-label">Audio</label>
                        <input type="file" name="audio" class="form-control" placeholder="Audio"
                            value="{{ old('audio') }}" />
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Post Author"
                            value="{{ old('author') }}" required />
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Author Position</label>
                        <input type="text" name="author_position" class="form-control" placeholder="Author Position"
                            value="{{ old('author_position') }}" required />
                    </div>

                     <div class="mb-3 col-md-4">
                        <label class="form-label">User Photo </label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input name="cover" type="file" class="file-upload-field" value="" />
                        </div>
                    </div>


                    <div class="mb-3 col-md-12">
                        <label class="form-label">Short Description</label>
                        <textarea type="text" name="short_description" class="form-control" placeholder="Post Detail"
                            style="padding: 0;margin:0" required>
                              {{ old('short_description') }}
                          </textarea>
                    </div>

                    <div class="mb-3 col-md-12  px-5">
                        <label class="form-label">Long Description</label>
                        <textarea type="text" name="long_description" id="summernote" class="form-control"
                            placeholder="Post Description" required>
    {{ old('long_description') }}
                          </textarea>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="addPopupCheckbox" name="popup" value="1"
                        {{ old('popup') ? 'checked' : '' }}>
                    <label class="form-check-label" for="addPopupCheckbox">Add Popup</label>
                </div>
                <div id="popupFields" style="display: none;">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Popup Button Text</label>
                            <input type="text" name="button_text" class="form-control"
                                value="{{ old('button_text') }}" placeholder="Button Text" />
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Popup Button Link</label>
                            <input type="text" name="button_link" class="form-control"
                                value="{{ old('button_link') }}" placeholder="Button Link" />
                        </div>

                        {{-- <div class="mb-3 col-md-6">
            <label class="form-label">Popup Image</label>
            <input
                type="file"
                name="pop_thumbnail"
                class="form-control"
            />
        </div> --}}

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Popup Title</label>
                            <input type="text" name="text1" class="form-control" value="{{ old('text1') }}"
                                placeholder="Popup Text 1">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Popup Description</label>
                            <input type="text" name="text2" class="form-control" value="{{ old('text2') }}"
                                placeholder="Popup Text 2">
                        </div>
                        {{--
        <div class="mb-3 col-md-6">
            <label class="form-label">Popup Text 3</label>
            <input type="text" name="text3" class="form-control" value="{{ old('text3') }}" placeholder="Popup Text 3">
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Popup Text 4</label>
            <input type="text" name="text4" class="form-control" value="{{ old('text4') }}" placeholder="Popup Text 4">
        </div> --}}
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('addPopupCheckbox');
            const popupFields = document.getElementById('popupFields');

            function togglePopupFields() {
                popupFields.style.display = checkbox.checked ? 'block' : 'none';
            }

            checkbox.addEventListener('change', togglePopupFields);
            togglePopupFields(); // initialize on load
        });
    </script>
@endpush
