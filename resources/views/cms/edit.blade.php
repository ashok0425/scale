@extends('layout.master')
@section('main-content')

  <div class="card">
    <div class="card-header d-flex justify-content-between bg-dark">
        <div>
            <h5 class="card-title text-white">
                Cms info
            </h5>
        </div>

    </div>
    <div class="card-body">
      <div class="container">
        <form
          action="{{ route('cms.update',$cms) }}"
          method="POST"
          enctype="multipart/form-data"
        >
          @csrf
          @method('PATCH')
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Meta Title</label>
                <input
                  type="text"
                  name="meta_title"
                  class="form-control"
                  placeholder="Meta title"
                  value="{{ $cms->meta_title }}"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Meta Keyword</label>
                <input
                  type="text"
                  name="meta_keyword"
                  class="form-control"
                  placeholder="Meta Keyword"
                  value="{{ $cms->meta_keyword }}"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <input
                  type="text"
                  name="meta_description"
                  class="form-control"
                  placeholder="Meta Description"
                  value="{{ $cms->meta_description }}"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Url</label>
                <input
                  type="url"
                  name="url"
                  class="form-control"
                  placeholder="cms url"
                  value="{{ $cms->url }}"
                />
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Logo</label>
              <div class="file-upload-wrapper" data-text="Select your file!">
                <input name="logo" type="file" class="file-upload-field" value="" />
              </div>
              <br />
              <img src="{{ getImage($cms->logo) }}" width="70" alt="" />
            </div>

            <div class="mb-3  col-md-6">
              <label class="form-label">Fevicon</label>
              <div class="file-upload-wrapper" data-text="Select your file!">
                <input name="fevicon" type="file" class="file-upload-field" value="" />
              </div>
              <br />
              <img src="{{ getImage($cms->fevicon) }}" width="70" alt="" />
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Address</label>
                <input
                  type="text"
                  name="address"
                  class="form-control"
                  value="{{ $cms->address }}"
                />
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Email Address </label>
                <input
                  type="email"
                  name="email1"
                  class="form-control"
                  value="{{ $cms->email1 }}"
                />
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Phone </label>
                <input
                  type="text"
                  name="phone1"
                  class="form-control"
                  value="{{ $cms->phone1 }}"
                />
              </div>
            </div>



            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input
                  type="text"
                  name="facebook"
                  class="form-control"
                  value="{{ $cms->facebook }}"
                />
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Twitter</label>
                <input
                  type="text"
                  name="twitter"
                  class="form-control"
                  value="{{ $cms->twitter }}"
                />
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Instagram</label>
                <input
                  type="text"
                  name="instagram"
                  class="form-control"
                  value="{{ $cms->instagram }}"
                />
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Linkedin</label>
                <input
                  type="text"
                  name="linkedin"
                  class="form-control"
                  value="{{ $cms->linkedin }}"
                />
              </div>

                   <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Total Seat</label>
                <input
                  type="number"
                  name="total_seat"
                  class="form-control"
                  value="{{ $cms->total_seat }}"
                />
              </div>

                   <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Booked Seat</label>
                <input
                  type="number"
                  name="booked_seat"
                  class="form-control"
                  value="{{ $cms->booked_seat }}"
                />
              </div>

                            <input type="submit" value="update" class="btn btn-block btn-info" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
