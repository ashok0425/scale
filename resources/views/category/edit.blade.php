@extends('layout.master')
@section('main-content')
    <div class="card">
        <div class="card-header d-flex justify-content-between bg-dark">
            <div>
                <h5 class="card-title text-white">Edit category</h5>
            </div>
        </div>

        <div class="card-body">
            <form
                action="{{ route('categories.update', $category) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Category</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Category"
                            value="{{ $category->name }}"
                        />
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Status</label>
                        <select name="status" id="" class="form-control form-select" required>
                            <option value="">select status</option>
                            <option value="1" {{ $category->status ? 'selected' : '' }}>
                                Publish
                            </option>
                            <option value="0" {{ ! $category->status ? 'selected' : '' }}>
                                Draft
                            </option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Thumbnail</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input
                                name="thumbnail"
                                type="file"
                                class="file-upload-field"
                                value=""
                            />
                        </div>
                        <br />
                        <img
                            src="{{ getImage($category->thumbnail) }}"
                            alt="{{ $category->name }}"
                            width="100"
                        />
                    </div>
                </div>
                   @if (Request::segment(2))
                    {{-- Means there is something after /resource --}}
                    <a
                        href="/{{ Request::segment(1) }}?type={{ request()->query('type') }}"
                        class="btn btn-secondary btn-sm"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                @endif
                <button type="submit" class="btn btn-sm  btn btn-sm btn-primary">update</button>
            </form>
        </div>
    </div>
@endsection
