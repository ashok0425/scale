@extends('layout.master')

@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="card-title text-white mb-0">Add Faq</h5>
            </div>

            <form action="{{ route('faqs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="page">Page</label>
                        <input type="text" name="page_url" id="page" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Question</label>
                        <input type="text" name="question" id="question" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Answer</label>
                        <textarea name="answer" id="answer" class="form-control" rows="3"></textarea>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('faqs.index') }}" class="btn btn-sm  btn btn-sm -secondary">Faq</a>
                    <button type="submit" class="btn btn-sm  btn btn-sm -primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
