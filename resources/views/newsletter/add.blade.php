@extends('layout.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
@endpush
@section('main-content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap pt-4 pb-4">
                    <div class="card-title">
                        <div class="row align-items-center">
                            <div class="col-md-12 my-md-0">
                                <h4>Add Newsletter</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <a class="btn btn-sm  mr-10" href="{{ route('admin.atypical-blog') }}">Cancel</a>
                        <a class="btn btn-sm  btn btn-sm -primary font-weight-bolder"
                           onclick="document.getElementById('form').submit();">Save</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="form"
                          data-parsley-validate="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-form-label">Enter title <span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" value="{{ old('title') }}" class="form-control"
                                               name="title">

                                        @error('title')
                                        <span class="error-msg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-form-label">Enter Subject <span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" value="{{ old('subject') }}" class="form-control"
                                               name="subject">

                                        @error('Subject')
                                        <span class="error-msg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-form-label">Select File</label>
                                    <div class="">
                                            <input type="file" name="thumbnail" id="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-form-label">Enter date <span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" value="{{ old('date') }}" class="form-control"
                                               name="date" id="date">

                                        @error('date')
                                        <span class="error-msg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-form-label">Enter Slug <span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" value="{{ old('slug') }}" class="form-control"
                                               name="slug">

                                        @error('slug')
                                        <span class="error-msg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="content">Content <span class="text-danger">*</span></label>
                                    <textarea class="form-control wysiwyg" name="content" id="content"></textarea>

                                    @error('content')
                                    <span class="error-msg">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        function deleteFile(fileurl) {
            $.ajax({
                data: {
                    _token: '{{ csrf_token() }}',
                    fileurl: fileurl
                },
                type: "POST",
                dataType: 'json',
                url: "{{ route('editor.image.delete') }}",
                success: function (status) {
                    // console.log(status);
                }
            });
        }

        function uploadFile(file) {
            data = new FormData();
            data.append("file", file);

            data.append('_token', '{{ csrf_token() }}');

            $.ajax({
                data: data,
                type: "POST",
                url: "{{ route('editor.image.upload') }}",
                cache: false,
                contentType: false,
                processData: false,
                success: function (url) {
                    var image = $('<img>').attr('src', url);
                    $('#content').summernote("insertNode", image[0]);
                }
            });
        }

        const token = document.querySelector('meta[name="csrf-token"]').content;
        ClassicEditor.create(document.querySelector('.wysiwyg'), {
            link: {
                decorators: {
                    openInNewTab: {
                        mode: 'manual',
                        label: 'Open in a new tab',
                        defaultValue: true,
                        attributes: {
                            target: '_blank',
                            rel: 'nofollow noreferrer'
                        }
                    }
                }
            },
            licenseKey: '',
            mediaEmbed: {
                previewsInData: true
            },
            simpleUpload: {
                uploadUrl: '/admin/upload',
                withCredentials: true,
                headers: {
                    "X-CSRF-TOKEN": `${token}`,
                    // Authorization: 'Bearer <JSON Web Token>'
                }
            }
        }).then(editor => {
            // window.editor = editor;
        }).catch(error => {
            console.error('Oops, something went wrong!');
        });

        $('#date').datepicker({
            format: "yyyy-mm-dd"
        });

        var avatar1 = new KTImageInput('kt_image_1');
    </script>
@endpush
