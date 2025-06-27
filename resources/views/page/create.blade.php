@extends('layout.master')
@section('main-content')

<div class="card">
  <div class="card-header d-flex justify-content-between bg-dark">
    <div>
      <h5 class="card-title text-white">Add New Page</h5>
    </div>
  </div>

  <div class="card-body">
    <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row">

        <div class="mb-3 col-md-4">
          <label class="form-label" for="type">Type</label>
          <select name="type" id="type" class="form-control form-select" required>
            <option value="page" {{ old('type') == 'page' ? 'selected' : '' }}>Page</option>
            <option value="template" {{ old('type') == 'template' ? 'selected' : '' }}>Template</option>
          </select>
        </div>

        <!-- Name input text (for page) -->
        <div class="mb-3 col-md-4" id="name-text-container">
          <label class="form-label" for="name-text">Name</label>
          <input
            type="text"
            name="name"
            id="name-text"
            class="form-control"
            placeholder="Page name"
            value="{{ old('name') }}"
          />
        </div>

        <!-- Name dropdown (for template) -->
        <div class="mb-3 col-md-4 d-none" id="name-dropdown-container">
          <label class="form-label" for="name-dropdown">Name</label>
          <select name="name" id="name-dropdown" class="form-control form-select">
            <option value="">Select Name</option>
            <option value="access" {{ old('name') == 'access' ? 'selected' : '' }}>Access</option>
            <option value="waitlist" {{ old('name') == 'waitlist' ? 'selected' : '' }}>Waitlist</option>
          </select>
        </div>

        <div class="mb-3 col-md-4" id="slug-container">
          <label class="form-label" for="slug">Slug</label>
          <input
            type="text"
            name="slug"
            id="slug"
            class="form-control"
            placeholder="Page slug"
            value="{{ old('slug') }}"
          />
        </div>

        <div class="mb-3 col-md-12 px-5">
          <label class="form-label" for="description">Long Description</label>
          <textarea
            name="description"
            id="summernote"
            class="form-control"
            placeholder="Post Description"
            required
          >{{ old('description') }}</textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const typeSelect = document.getElementById('type');
    const nameTextContainer = document.getElementById('name-text-container');
    const nameDropdownContainer = document.getElementById('name-dropdown-container');
    const slugContainer = document.getElementById('slug-container');

    function toggleFields() {
      const selectedType = typeSelect.value;

      if (selectedType === 'page') {
        nameTextContainer.classList.remove('d-none');
        nameDropdownContainer.classList.add('d-none');
        slugContainer.classList.remove('d-none');
      } else if (selectedType === 'template') {
        nameTextContainer.classList.add('d-none');
        nameDropdownContainer.classList.remove('d-none');
        // slugContainer.classList.add('d-none'); // Hide slug if you want
      } else {
        // Default: show both inputs hidden or text name visible, slug visible
        nameTextContainer.classList.add('d-none');
        nameDropdownContainer.classList.add('d-none');
        slugContainer.classList.remove('d-none');
      }
    }

    // Initialize on page load
    toggleFields();

    // Listen to changes
    typeSelect.addEventListener('change', toggleFields);
  });
</script>

@endsection
