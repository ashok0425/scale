@php
    $pages=App\Models\Page::limit(3)->get();
@endphp
<footer>
      <div id="waitlistSection"
        class="before:bg-brand-purple after:bg-triangles relative isolate overflow-clip py-11 before:absolute before:-top-14 before:-left-14 before:z-20 before:size-72 before:rounded-full before:blur-[130px] after:absolute after:top-0 after:left-0 after:z-10 after:aspect-square after:h-full after:bg-no-repeat sm:py-16 md:py-[3.125rem]"
      >
        <div class="container"  id="waitlist-Section">
          <div
            class="before:brand-gradient relative rounded-lg bg-gradient-to-r from-[#100548] to-[#1c0441] px-6 py-[60px] before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg"
          >
            <div class="isolate z-10 overflow-hidden">
              <img
                src="{{ asset('frontend/images/cta-logo-2.png') }}"
                alt=""
                class="absolute top-0 left-0 -z-10 object-contain"
              />
              <img
                src="{{ asset('frontend/images/cta-slash-2.png') }}"
                alt=""
                class="absolute right-0 -z-10 max-md:bottom-0 md:top-0"
              />
              <div class="mx-auto max-w-[80ch] space-y-3 text-center">
                <h1 class="dh-1">Join our waitlist</h1>
                <p class="b1 text-white">
                  Be the first among the ones who get access to our exclusive marketplace
                </p>
              </div>
              <div class="mx-auto mt-6 sm:w-fit">
             <form id="" class="flex flex-col flex-wrap items-center justify-center gap-3 sm:flex-row" method="POST" action="{{ route('waitlist.store.footer') }}">
  @csrf

  <input
    class="max-sm:w-full sm:max-w-[224px] @error('footer_full_name') border-red-300 @enderror"
    type="text"
    name="footer_full_name"
    placeholder="Enter full name"
    value="{{ old('footer_full_name') }}"
  />

  <input
    class="max-sm:w-full sm:max-w-[224px] @error('footer_email') border-red-300 @enderror"
    type="email"
    name="footer_email"
    placeholder="Enter your email"
    value="{{ old('footer_email') }}"
  />

  <select class="max-sm:w-full sm:max-w-[224px] @error('footer_role') border-red-300 @enderror" name="footer_role">
    <option value="">Select your role</option>
    <option value="founder" {{ old('footer_role') == 'founder' ? 'selected' : '' }}>Founder/Aspiring Founder</option>
    <option value="freelancer" {{ old('footer_role') == 'freelancer' ? 'selected' : '' }}>Freelancer/Agency</option>
    <option value="investor" {{ old('footer_role') == 'investor' ? 'selected' : '' }}>Investor</option>
    <option value="mentor" {{ old('footer_role') == 'mentor' ? 'selected' : '' }}>Mentor</option>
  </select>

  <button id=""
    type="submit"
    class="btn-primary hover:shadow-brand-purple/60 group hover:shadow-lg max-sm:w-full"
  >
    <span class="inner-wrapper inline-flex h-6 overflow-hidden">
      <span class="inner flex flex-col duration-200 group-hover:-translate-y-full">
        <span class="text">Join our Waitlist</span>
        <span class="text">Join our Waitlist</span>
      </span>
    </span>
  </button>
</form>

              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="hr" />
      <div class="relative pt-12 pb-7 sm:pt-20 sm:pb-12">
        <div class="container">
          <div class="flex gap-8 max-sm:flex-col sm:items-end-safe sm:gap-20 md:gap-28">
            <div class="flex-1 space-y-4">
              <div class="space-y-1">
                <img src="{{getImage(cms()->logo)}}" alt="" class="h-[33px]" />
                <!-- <p class="text-body-2 b3">© 2024 ScaleDux. All rights reserved.</p> -->
              </div>
              <div class="space-y-2">
                <h6>About us</h6>
                <p class="b4 text-body-2">
                  ScaleDux is India's first integrated marketplace connecting startups with verified
                  freelancers, investors, and business resources - all designed to transform
                  fragmented growth journeys into streamlined success stories.
                </p>
              </div>
              <div class="space-y-2">
                <h6 class="dh-6" id="">Subscribe to our Newsletter</h6>
                <form class="flex flex-wrap gap-3" id="subscriber-email" method="POST" action="{{route('subscribe.store')}}">
                    @csrf
                  <input
                    type="email"
                    name="subscriber_email"
                    placeholder="Enter your email"
                    class="max-sm:w-full @error('subscriber_email') border-red-300 @enderror"
                  />
                  <button type="submit" class="btn-primary">Subscribe</button>
                </form>
              </div>
            </div>
            <ul class="flex-[1.5] space-y-3">
                {{-- @foreach ($pages as $page)
                     <li>
                <a
                  href="{{url($page->slug)}}"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >{{Str::title($page->name)}}</a
                >
              </li>
                @endforeach --}}

              <li>
                <a
                  href="{{route('investor')}}"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >Investors</a
                >
              </li>
              <li>
                <a
                  href="{{route('blog')}}"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >Blogs</a
                >
              </li>
              <li>
                <a
                  href="{{route('founder')}}"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >Founders</a
                >
              </li>
              <li>
                <a
                  href="{{route('freelancer')}}"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >Freelancers</a
                >
              </li>
            </ul>
          </div>
        </div>
        <img
          src="{{ asset('frontend/images/footer-right.png') }}"
          alt=""
          class="absolute right-0 bottom-0 max-sm:size-56"
        />
      </div>
      <hr class="hr" />
      <div class="container py-7 sm:py-12">
        <h1 class="dh-1 base-heading text-center">Connecting Growth Opportunities.</h1>
      </div>
      <hr class="hr" />
      <div class="container flex items-center justify-between gap-4 py-6 max-sm:flex-col">
        <div class="flex gap-[9px]">
          <a href="{{cms()->twitter}}" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/twitter.svg') }}" alt="" class="size-6" />
          </a>
          <a href="{{cms()->linkedin}}" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/linkedin.svg') }}" alt="" class="size-6" />
          </a>
          <a href="{{cms()->instagram}}" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/instagram.svg') }}" alt="" class="size-6" />
          </a>
          <a href="{{cms()->facebook}}" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/facebook.svg') }}" alt="" class="size-6" />
          </a>
          {{-- <a href="reddit.com" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/reddit.svg') }}" alt="" class="size-6" />
          </a> --}}
          <a href="{{cms()->url}}" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/youtube.svg') }}" alt="" class="size-6" />
          </a>
        </div>
        <div class="b2 flex items-center gap-1 max-sm:flex-wrap max-sm:justify-center">
          <span>&copy; {{date('Y')}} ScaleDux</span>
           @foreach ($pages as $page)
                   <span>|</span>
          <span><a href="/{{$page->slug}}" class="hover:text-gray-300">{{Str::title($page->name)}}</a></span>
           @endforeach
          <!-- <span>|</span>
          <span><a href="#">Cookies</a></span> -->
        </div>
      </div>
    </footer>
