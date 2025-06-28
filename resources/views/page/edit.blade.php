@extends('layout.master')
@section('main-content')

<div class="card">
  <div class="card-header d-flex justify-content-between bg-dark">
    <div>
      <h5 class="card-title text-white">Edit Page</h5>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('pages.update',$page) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <div class="row">

        <div class="mb-3 col-md-4">
          <label class="form-label" for="type">Type</label>
          <select name="type" id="type" class="form-control form-select" required>
            <option value="1" {{ old('type', $page->type) == 1 ? 'selected' : '' }}>Page</option>
            <option value="2" {{ old('type', $page->type) == 2 ? 'selected' : '' }}>Template</option>
          </select>
        </div>

        <!-- Name as text input -->
        <div class="mb-3 col-md-4" id="name-text-container">
          <label class="form-label" for="name-text">Name</label>
          <input
            type="text"
            name="name"
            id="name-text"
            class="form-control"
            placeholder="Page name"
            value="{{ old('name', $page->name) }}"
          />
        </div>

        <!-- Name as dropdown -->
        <div class="mb-3 col-md-4 d-none" id="name-dropdown-container">
          <label class="form-label" for="name-dropdown">Name</label>
          <select name="template_name" id="name-dropdown" class="form-control form-select">
            <option value="">Select Name</option>
            <option value="access" {{ old('template_name', $page->name) == 'access' ? 'selected' : '' }}>Access</option>
            <option value="waitlist" {{ old('template_name', $page->name) == 'waitlist' ? 'selected' : '' }}>Waitlist</option>
          </select>
        </div>

        <!-- Slug as text input -->
        <div class="mb-3 col-md-4" id="slug-text-container">
          <label class="form-label" for="slug-text">Slug</label>
          <input
            type="text"
            name="slug"
            id="slug-text"
            class="form-control"
            placeholder="Page slug"
            value="{{ old('slug', $page->slug) }}"

          />
        </div>

        <!-- Slug as dropdown -->
        <div class="mb-3 col-md-4 d-none" id="slug-dropdown-container">
          <label class="form-label" for="slug-dropdown">Role</label>
          <select name="template_slug" id="slug-dropdown" class="form-control form-select" >
            <option value="">Select Role</option>
            <option value="founder" {{ old('template_slug', $page->slug) == 'founder' ? 'selected' : '' }}>Founder</option>
            <option value="freelancer" {{ old('template_slug', $page->slug) == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
            <option value="investor" {{ old('template_slug', $page->slug) == 'investor' ? 'selected' : '' }}>Investor</option>
            <option value="mentor" {{ old('template_slug', $page->slug) == 'mentor' ? 'selected' : '' }}>Mentor</option>
          </select>
        </div>

          <div class="mb-3 col-md-4">
                        <label class="form-label">Status</label>
                        <select name="status" id="" class="form-control form-select" required>
                            <option value="">select status</option>
                            <option value="1" {{ $page->status ? 'selected' : '' }}>
                                Publish
                            </option>
                            <option value="0" {{ ! $page->status ? 'selected' : '' }}>
                                Draft
                            </option>
                        </select>
                    </div>

                     <div class="mb-3 col-md-4">
                        <label class="form-label">Show on footer</label>
                        <select name="show_on_footer" id="" class="form-control form-select" required>
                            <option value="">select</option>
                            <option value="1" {{ $page->show_on_footer ? 'selected' : '' }}>
                                Yes
                            </option>
                            <option value="0" {{ ! $page->show_on_footer ? 'selected' : '' }}>
                                No
                            </option>
                        </select>
                    </div>
        <div class="mb-3 col-md-12 px-5">
          <label class="form-label" for="description">Long Description</label>
          <textarea
            name="description"
            id="summernote"
            class="form-control"
            placeholder="Post Description"
            required
          >{{ old('description', $page->description) }}</textarea>
        </div>

      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>


@endsection
@push('scripts')

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const typeSelect = document.getElementById('type');

    const nameTextContainer = document.getElementById('name-text-container');
    const nameDropdownContainer = document.getElementById('name-dropdown-container');

    const slugTextContainer = document.getElementById('slug-text-container');
    const slugDropdownContainer = document.getElementById('slug-dropdown-container');

    function toggleFields() {
      const selectedType = typeSelect.value;

      if (selectedType == 1) {
        nameTextContainer.classList.remove('d-none');
        nameDropdownContainer.classList.add('d-none');

        slugTextContainer.classList.remove('d-none');
        slugDropdownContainer.classList.add('d-none');
      } else if (selectedType ==2) {
        nameTextContainer.classList.add('d-none');
        nameDropdownContainer.classList.remove('d-none');

        slugTextContainer.classList.add('d-none');
        slugDropdownContainer.classList.remove('d-none');
      } else {
        // Hide all if no type selected
        nameTextContainer.classList.add('d-none');
        nameDropdownContainer.classList.add('d-none');

        slugTextContainer.classList.add('d-none');
        slugDropdownContainer.classList.add('d-none');
      }
    }

    toggleFields();

    typeSelect.addEventListener('change', toggleFields);
  });
</script>
@endpush
