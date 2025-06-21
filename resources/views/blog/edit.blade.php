@extends('layout.master')
@section('main-content')
    <div class="card">
        <div class="card-header d-flex justify-content-between bg-dark">
            <div>
                <h5 class="card-title text-white">Edit Post</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('blogs.update', $post) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Post title"
                            value="{{ old('title', $post->title) }}" required />
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Select Category</label>
                        <select name="category" id="" class="form-control form-select" required>
                            <option value="">select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="mb-3 col-md-4">
                        <label class="form-label">Thumbnail</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input name="thumbnail" type="file" class="file-upload-field" value="" />
                        </div>
                        <img src="{{ getImage($post->thumbnail) }}" alt="" width="100">
                    </div>


                    <div class="mb-3 col-md-4">
                        <label class="form-label">Audio</label>
                        <input type="file" name="audio" class="form-control" placeholder="Audio"
                            value="{{ old('audio') }}" />
                        <a href="{{ getImage($post->audio) }}">Click</a>

                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Post Author"
                            value="{{ old('author', $post->author) }}" required />
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Author Position</label>
                        <input type="text" name="author_position" class="form-control" placeholder="Author Position"
                            value="{{ old('author_position', $post->author_post) }}" required />
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Author Photo </label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input name="cover" type="file" class="file-upload-field" value="" />
                        </div>
                        <img src="{{ getImage($post->cover) }}" alt="" width="100">

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control form-select">
                            <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="status">Is Featured Post</label>
                        <select name="feature_post" id="feature_post" class="form-control form-select">
                            <option value="1" {{ $post->feature_post == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $post->feature_post == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Enter Slug"
                            value="{{ old('slug', $post->slug) }}" required />
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Short Description</label>
                        <textarea name="short_description" id="short_description" class="form-control" placeholder="Post Detail" required
                            rows="2" maxlength="160" oninput="updateCharCount(this, 160)">{{ old('short_description', $post->short_description) }}</textarea>
                        <small id="char-count-msg" class="text-danger"></small>

                    </div>

                    <div class="mb-3 col-md-12 px-5">
                        <label class="form-label">Long Description</label>
                        <textarea type="text" name="long_description" id="summernote" class="form-control"
                            placeholder="Post Description" required>
    {{ old('long_description', $post->long_description) }}
                          </textarea>
                    </div>


                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="addPopupCheckbox" name="popup" value="1"
                        {{ old('popup', isset($popup) ? 'checked' : '') }}>
                    <label class="form-check-label" for="addPopupCheckbox">Add Popup</label>
                </div>

                <div id="popupFields" style="display: none;">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Popup Button Text</label>
                            <input type="text" name="button_text" class="form-control"
                                value="{{ old('button_text', $popup->button_text ?? '') }}" placeholder="Button Text" />
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Popup Button Link</label>
                            <input type="text" name="button_link" class="form-control"
                                value="{{ old('button_link', $popup->button_link ?? '') }}" placeholder="Button Link" />
                        </div>

                        {{-- <div class="mb-3 col-md-6">
            <label class="form-label">Popup Image</label>
            <input
                type="file"
                name="pop_thumbnail"
                class="form-control"
            />
            @if (!empty($popup?->image))
                <small class="text-muted">Current: <a href="{{getImage($popup->image)}}" target="_blank">View Image</a></small>
            @endif
        </div> --}}

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Popup Title</label>
                            <input type="text" name="text1" class="form-control"
                                value="{{ old('text1', $popup->text1 ?? '') }}">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Popup Description</label>
                            <input type="text" name="text2" class="form-control"
                                value="{{ old('text2', $popup->text2 ?? '') }}">
                        </div>
                        {{--
        <div class="mb-3 col-md-6">
            <label class="form-label">Popup Text 3</label>
            <input type="text" name="text3" class="form-control" value="{{ old('text3', $popup->text3 ?? '') }}">
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Popup Text 4</label>
            <input type="text" name="text4" class="form-control" value="{{ old('text4', $popup->text4 ?? '') }}">
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
            togglePopupFields(); // initialize based on current state
        });
    </script>

    <script>
        function updateCharCount(el, max) {
            const len = el.value.length;
            const msg = document.getElementById('char-count-msg');
            msg.textContent = `${len}/${max} characters`;
        }
    </script>
@endpush
