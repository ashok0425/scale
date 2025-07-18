@extends('layout.master')

@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="card-title text-white mb-0">Add SEO Record</h5>
            </div>

            <form action="{{ route('seos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="page">Page</label>
                        <input type="text" name="page_url" id="page" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="title">SEO Title</label>
                        <input type="text" name="meta_title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Meta Description</label>
                        <textarea name="meta_description" id="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="keyword">Meta Keywords</label>
                        <input type="text" name="meta_keywords" id="keyword" class="form-control">
                    </div>

                 <div class="mb-3 col-md-4">
                        <label class="form-label">Thumbnail</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input
                                name="file"
                                type="file"
                                class="file-upload-field"
                                value=""
                            />
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('seos.index') }}" class="btn btn-sm  btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>Back</a>
                    <button type="submit" class="btn btn-sm  btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
