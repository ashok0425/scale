@extends('frontend.layout.app')
@section('content')
     <main class="-mt-[90px]">
      <section
        class="bg-hero-bg relative isolate flex items-center justify-center overflow-hidden bg-cover pt-[150px] pb-6 before:absolute before:inset-0 before:[background-image:url('/images/hero-bg-effect.png')] before:bg-cover before:opacity-40"
      >
        <div class="z-20 container space-y-12">
          <div class="space-y-5">
            <h1 class="dh-1">Priority access</h1>
            <p class="">
              Tired of WhatsApp Groups, LinkedIn DMs, and 'Friend of a Friend' Networking? Try
              ScaleDux.
            </p>
          </div>
          <form  method="POST">
            @csrf
          <div class="flex max-w-[1043px] flex-col gap-6 sm:flex-row">
            <div class="flex-1 space-y-6">
              <input class="w-full" type="text" placeholder="Enter full name" name="full_name" required/>
              <input class="w-full" type="email" placeholder="Email address" name="email" required/>
              <input class="w-full" type="number" placeholder="Phone Number" name="phone" required />
              <select class="w-full" name="role" required>
                <option value="">Select your role</option>
                <option value="founder">Founder/Aspiring Founder</option>
                <option value="freelancer">Freelancer/Agency</option>
                <option value="investor">Investor</option>
                <option value="mentor">Mentor</option>
              </select>
              <input class="w-full" type="text" placeholder="LinkedIn profile URL (optional)" name="linkedin" />
              <select class="w-full" name="country" required>
                <option value="">Country</option>
                <option value="India">India</option>
              </select>
             <select class="w-full" name="city" required>
                <option value="">City</option>
                @foreach (App\Models\Crm::getCity() as $city)
                <option value="{{$city}}">{{$city}}</option>

                @endforeach

              </select>

            </div>
            <div class="flex-1">
              <textarea
                name="message"
                required
                placeholder="When you need to find freelancers/investors/business partners, what usually goes wrong? Tell us all the pain points you are facing now..."
              ></textarea>
                <label class="flex items-center gap-1">
                <input type="checkbox" name="term" id="" required>
                <p class="b4 text-white">
                 I agree to the Terms of Service and Privacy Policy of ScaleDux.
                </p>
              </label>
              <br>
              <div class="flex items-center gap-1">
                <img src="{{ asset('frontend/images/lock.png') }}" alt="" />
                <p class="b4 text-white">
                  Your information is confidential - We’ll never share your details without
                  permission
                </p>
              </div>
              <button
                class="btn-primary hover:shadow-brand-purple/60 group mt-6 mb-3 h-fit w-full hover:shadow-lg"
              >
                <span class="inner-wrapper inline-flex h-6 overflow-hidden">
                  <span class="inner flex flex-col duration-200 group-hover:-translate-y-full">
                    <span class="text">Join our waitlist</span>
                    <span class="text">Join our waitlist</span>
                  </span>
                </span>
              </button>
              <span class="b4 !leading-[0]"
                >Have Questions? Email us directly at {{cms()->email1}}. We personally read
                every message.</span
              >
            </div>
          </div>
          </form>

        </div>
      </section>

    </main>
@endsection
