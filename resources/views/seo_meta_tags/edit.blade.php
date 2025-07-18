@extends('layout.master')

@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="card-title text-white mb-0">Edit SEO Record</h5>
            </div>

            <form action="{{ route('seos.update', $seo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="page">Page</label>
                        <input type="text" name="page_url" id="page" value="{{ old('page_url', $seo->page_url) }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="title">SEO Title</label>
                        <input type="text" name="meta_title" id="title" value="{{ old('meta_title', $seo->meta_title) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Meta Description</label>
                        <textarea name="meta_description" id="description" class="form-control" rows="3">{{ old('meta_description', $seo->meta_description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="keyword">Meta Keywords</label>
                        <input type="text" name="meta_keyword" id="keyword" value="{{ old('meta_keyword', $seo->meta_keywords) }}" class="form-control">
                    </div>

                 <div class="mb-3 col-md-12">
                        <label class="form-label">Thumbnail</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input
                                name="file"
                                type="file"
                                class="file-upload-field"
                                value=""
                            />
                        </div>
                        <img src="{{getImage($seo->thumbnail)}}" alt="" width="100">
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('seos.index') }}" class="btn btn-sm  btn btn-sm btn-secondary"><i class="fas fa-arrow-left"> </i> Back</a>
                    <button type="submit" class="btn btn-sm  btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
