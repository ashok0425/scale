@extends('frontend.layout.app')
@section('content')
<main class="-mt-[90px]">
  <section class="custom-section">
    <div class="custom-container">
      <div class="custom-content">
        <h1 class="dh-1 mb-4">🎁 Get Your Free Resource</h1>
        <p class="mb-6">Tell us your name and where to send it - and it’s yours.
            <br>
            We respect your inbox and your time. (No spam. No noise)
        </p>
        <form method="POST" class="flex flex-col" action="{{route('link.attachment.save')}}">
            <input type="hidden" value="{{$attachment->uuid}}" name="attachment_id">
          @csrf
           <input
              class="w-full @error('name') border-red-300 @enderror"
              type="text"
              placeholder="Enter full name"
              name="name"
              value="{{ old('name') }}"
            />
            @error('name')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

            <input
              class="w-full mt-5 @error('email') border-red-300 @enderror"
              type="email"
              placeholder="Email address"
              name="email"
              value="{{ old('email') }}"
            />
            @error('email')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror
             <label class=" mt-3  gap-1">
              <input
                type="checkbox"
                name="terms"
                value="1"
                {{ old('terms') ? 'checked' : '' }}
                class="@error('terms') border-red-300 @enderror"
              >
              &nbsp;
              <small class="text-white">
                By continuing, I confirm that I’ve read and accept <a href="/priority-access-refund-policy" class="underline">ScaleDux’s Refund Policy</a>, <a href="/privacy-policy" class="underline">Privacy Policy</a>, and <a href="/priority-access-refund-policy" class="underline">Terms of Service</a>.
              </small>
            </label>
            @error('terms')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror
          <button type="submit" class="custom-button mt-2">Download</button>
        </form>
      </div>
    </div>
  </section>
</main>
@endsection


@push('style')
    <style>
        /* Container styles */
.custom-container {
  width: 100%;
  max-width: 900px;
  margin-left: auto;
  margin-right: auto;
  padding: 0 1rem;
  box-sizing: border-box;
}

/* Responsive width */
@media (min-width: 900px) {
  .custom-container {
    width: 50%;
  }
}

/* Section styles */
.custom-section {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh; /* full viewport height */
  padding-top: 150px;
  padding-bottom: 24px;
  position: relative;
  background-size: cover;
  background-position: center;
  /* opacity: 0.4; */
}

/* Overlay to darken background */
.custom-section::before {
  content: "";
  position: absolute;
  inset: 0;
  /* background: rgba(0,0,0,0.4); */
  z-index: 0;
}

/* Content wrapper */
.custom-content {
  position: relative;
  z-index: 1;
  /* background: rgba(255, 255, 255, 0.85); */
  padding: 2rem;
  border-radius: 12px;
  /* box-shadow: 0 0 15px rgba(0,0,0,0.2); */
  text-align: center;
}

/* Input styles */
.custom-input {
  width: 100%;
  padding: 12px 16px;
  margin-bottom: 1rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 1rem;
  box-sizing: border-box;
  transition: border-color 0.3s ease;
}

.custom-input:focus {
  border-color: #7c3aed; /* purple */
  outline: none;
  box-shadow: 0 0 5px #7c3aed;
}

/* Button styles */
.custom-button {
  width: 100%;
  padding: 12px 16px;
  background-color: #7c3aed; /* purple */
  color: white;
  font-weight: 600;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 1rem;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.custom-button:hover {
  background-color: #5b21b6; /* darker purple */
  box-shadow: 0 4px 8px rgba(92,33,182,0.5);
}

    </style>
@endpush
