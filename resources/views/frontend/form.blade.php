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
              <select class="w-full" name="city" required>
                <option value="">City</option>
                <option value="mumbai">Mumbai</option>
                <option value="delhi">Delhi</option>
                <option value="bangalore">Bangalore</option>
                <option value="kolkata">Kolkata</option>
                <option value="chennai">Chennai</option>
              </select>
            </div>
            <div class="flex-1">
              <textarea
                name="message"
                required
                placeholder="When you need to find freelancers/investors/business partners, what usually goes wrong? Tell us all the pain points you are facing now..."
              ></textarea>
              <div class="flex items-center gap-1">
                <img src="{{ asset('frontend/images/lock.png') }}" alt="" />
                <p class="b4 text-white">
                  Your information is confidential - We’ll never share your details without
                  permission
                </p>
              </div>
              <button
                {{-- onclick="document.getElementById('success').showModal()" --}}
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
      <dialog
        id="success"
        class="gradient-border fixed top-1/2 left-1/2 w-full max-w-[683px] -translate-1/2 flex-col justify-center space-y-6 rounded-3xl p-10 open:flex"
      >
        <img src="{{ asset('frontend/images/div.galaxy-logo-circle.svg') }}" alt="" class="mx-auto size-[73px]" />
        <h2 class="dh-2 text-center">Thanks for joining!</h2>
        <p class="b1 text-center font-normal">
          Welcome to the ScaleDux Family. You're officially one of our Founding Members. You'll
          receive a personal welcome email with your Founding Member kit and exclusive updates
          roadmap.
        </p>
        <button
          onclick="document.getElementById('success').close()"
          class="btn-primary hover:shadow-brand-purple/60 group mx-auto h-fit w-full hover:shadow-lg sm:max-w-2/3"
        >
          <span class="inner-wrapper inline-flex h-6 overflow-hidden">
            <span class="inner flex flex-col duration-200 group-hover:-translate-y-full">
              <span class="text">Close popup</span>
              <span class="text">Close popup</span>
            </span>
          </span>
        </button>
      </dialog>
    </main>
@endsection
