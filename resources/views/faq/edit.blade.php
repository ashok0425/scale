@extends('layout.master')

@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="card-title text-white mb-0">Edit Faq</h5>
            </div>

            <form action="{{ route('faqs.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="page">Page</label>
                        <input type="text" name="page_url" id="page" value="{{ old('page_url', $faq->page_url) }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Question</label>
                        <input type="text" name="question" id="title" value="{{ old('question', $faq->question) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Answer</label>
                        <textarea name="answer" id="answer" class="form-control" rows="3">{{ old('answer', $faq->answer) }}</textarea>
                    </div>

                </div>

                <div class="card-footer text-right">
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
                <button type="submit" class="btn btn-sm  btn btn-sm btn-success">Update SEO</button>
                </div>
            </form>
        </div>
    </div>
@endsection
