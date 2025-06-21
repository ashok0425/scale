@extends('layout.master')

@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="card-title text-white mb-0">Edit SEO Record</h5>
            </div>

            <form action="{{ route('seos.update', $seo->id) }}" method="POST">
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
                        <input type="text" name="meta_keyword" id="keyword" value="{{ old('meta_keyword', $seo->meta_keyword) }}" class="form-control">
                    </div>
                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('seos.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Update SEO</button>
                </div>
            </form>
        </div>
    </div>
@endsection
