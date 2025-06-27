@extends('frontend.layout.app')
@section('content')
<main class="-mt-[90px]">
  <section
    class="bg-hero-bg relative isolate flex items-center justify-center overflow-hidden bg-cover pt-[150px] pb-6 before:absolute before:inset-0 before:[background-image:url('/images/hero-bg-effect.png')] before:bg-cover before:opacity-40"
  >
    <div class="z-20 container space-y-12">
      <div class="space-y-5">
        <h1 class="dh-1">Priority access</h1>
        <p>
          Tired of WhatsApp Groups, LinkedIn DMs, and 'Friend of a Friend' Networking? Try
          ScaleDux.
        </p>
      </div>

      <form method="POST" >
        @csrf

        <div class="flex max-w-[1043px] flex-col gap-6 sm:flex-row">
          <div class="flex-1 space-y-6">

            <input
              class="w-full @error('full_name') border-red-300 @enderror"
              type="text"
              placeholder="Enter full name"
              name="full_name"
              value="{{ old('full_name') }}"
            />
            @error('full_name')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

            <input
              class="w-full @error('email') border-red-300 @enderror"
              type="email"
              placeholder="Email address"
              name="email"
              value="{{ old('email') }}"
            />
            @error('email')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

            <input
              class="w-full @error('phone') border-red-300 @enderror"
              type="number"
              placeholder="Phone Number"
              name="phone"
              value="{{ old('phone') }}"
            />
            @error('phone')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

            <select  class="w-full @error('role') border-red-300 @enderror" name="role">
              <option value="">Select your role</option>
              <option value="founder" {{ old('role') == 'founder' ? 'selected' : '' }}>Founder/Aspiring Founder</option>
              <option value="freelancer" {{ old('role') == 'freelancer' ? 'selected' : '' }}>Freelancer/Agency</option>
              <option value="investor" {{ old('role') == 'investor' ? 'selected' : '' }}>Investor</option>
              <option value="mentor" {{ old('role') == 'mentor' ? 'selected' : '' }}>Mentor</option>
            </select>
            @error('role')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

            <input
              class="w-full @error('linkedin') border-red-300 @enderror"
              type="text"
              placeholder="LinkedIn profile URL (optional)"
              name="linkedin"
              value="{{ old('linkedin') }}"
            />
            @error('linkedin')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

            <select  class="w-full @error('country') border-red-300 @enderror" name="country">
              <option value="">Country</option>
              <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
            </select>
            @error('country')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

            <select  class="w-full @error('city') border-red-300 @enderror" name="city">
              <option value="">City</option>
              @foreach (App\Models\Crm::getCity() as $city)
                <option value="{{ $city }}" {{ old('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
              @endforeach
            </select>
            @error('city')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

          </div>

          <div class="flex-1">

            <textarea
              class="@error('message') border-red-300 @enderror"
              name="message"
              placeholder="When you need to find freelancers/investors/business partners, what usually goes wrong? Tell us all the pain points you are facing now..."
            >{{ old('message') }}</textarea>
            @error('message')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

            <label class="flex items-center gap-1">
              <input
                type="checkbox"
                name="terms"
                value="1"
                {{ old('terms') ? 'checked' : '' }}
                class="@error('terms') border-red-300 @enderror"
              >
              &nbsp;
              <p class="b4 text-white">
                By continuing, I confirm that I’ve read and accept <a href="/priority-access-refund-policy" class="underline">ScaleDux’s Refund Policy</a>, <a href="/privacy-policy" class="underline">Privacy Policy</a>, and <a href="/priority-access-refund-policy" class="underline">Terms of Service</a>.
              </p>
            </label>
            @error('terms')
              <p class="error-text text-sm mt-1">{{ $message }}</p>
            @enderror

            <br>

            <div class="flex items-center gap-1">
              <img src="{{ asset('frontend/images/lock.png') }}" alt="" />
              <p class="b4 text-white">
                Your information is confidential - We’ll never share your details without permission
              </p>
            </div>

            <button type="submit"
              class="btn-primary hover:shadow-brand-purple/60 group mt-6 mb-3 h-fit w-full hover:shadow-lg"
            >
              <span class="inner-wrapper inline-flex h-6 overflow-hidden">
                <span class="inner flex flex-col duration-200 group-hover:-translate-y-full">
                  <span class="text">Proceed to pay</span>
                  <span class="text">Proceed to pay</span>
                </span>
              </span>
            </button>

            <span class="b4 !leading-[0]">
              Have Questions? Email us directly at {{ cms()->email1 }}. We personally read every message.
            </span>
          </div>
        </div>
      </form>
    </div>
  </section>
</main>
@endsection
