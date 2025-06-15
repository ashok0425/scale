<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Hubot+Sans:ital,wdth,wght@0,75..125,200..900;1,75..125,200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />
    <title>Get Priority access</title>
    <script type="module" crossorigin src="/assets/main-Cu9PM_HM.js"></script>
    <link rel="stylesheet" crossorigin href="/assets/main-DcrkH9N-.css">
  </head>
  <body>
    <header class="header">
      <div class="container">
        <a href="/">
          <img src="/logo.svg" alt="" />
        </a>
        <ul class="nav">
          <li>
            <a href="/startup-founder" class="nav-item">Founder</a>
          </li>
          <li>
            <a href="/freelancers" class="nav-item">Freelancers</a>
          </li>
          <li>
            <a href="/investors" class="nav-item">Investor</a>
          </li>
          <li>
            <a href="/blog" class="nav-item">Blogs</a>
          </li>
        </ul>
        <div class="flex items-center justify-end gap-6">
          <div class="flex flex-wrap items-center gap-6">
            <button class="btn-outline max-md:hidden">Join the waitlist</button>
            <a
              href="/priority-access"
              class="btn-primary hover:shadow-brand-purple/60 group hover:shadow-lg"
            >
              <span class="inner-wrapper inline-flex h-6 overflow-hidden">
                <span class="inner flex flex-col duration-200 group-hover:-translate-y-full">
                  <span class="text">Get Priority Access</span>
                  <span class="text">Get Priority Access</span>
                </span>
              </span>
            </a>
          </div>
          <button class="group nav-toggler hidden cursor-pointer max-lg:block">
            <span class="ham">
              <i data-lucide="align-justify"></i>
            </span>
            <span class="x hidden">
              <i data-lucide="x"></i>
            </span>
          </button>
        </div>
      </div>
    </header>

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
          <div class="flex max-w-[1043px] flex-col gap-6 sm:flex-row">
            <div class="flex-1 space-y-6">
              <input class="w-full" type="text" placeholder="Enter full name" />
              <input class="w-full" type="email" placeholder="Email address" />
              <input class="w-full" type="number" placeholder="Phone Number" />
              <select class="w-full">
                <option value="">Select your role</option>
                <option value="founder">Founder/Aspiring Founder</option>
                <option value="freelancer">Freelancer/Agency</option>
                <option value="investor">Investor</option>
                <option value="mentor">Mentor</option>
              </select>
              <input class="w-full" type="text" placeholder="LinkedIn profile URL (optional)" />
              <select class="w-full">
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
                id=""
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
                onclick="document.getElementById('success').showModal()"
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
                >Have Questions? Email us directly at founding@scaledux.com. We personally read
                every message.</span
              >
            </div>
          </div>
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

    <footer>
      <div class="relative pt-12 pb-7 sm:pt-20 sm:pb-12">
        <div class="container">
          <div class="flex gap-8 max-sm:flex-col sm:items-end-safe sm:gap-20 md:gap-28">
            <div class="flex-1 space-y-4">
              <div class="space-y-1">
                <img src="/logo.svg" alt="" class="h-[33px]" />
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
                <h6 class="dh-6">Subscribe to our Newsletter</h6>
                <form class="flex flex-wrap gap-3">
                  <input
                    type="email"
                    required
                    placeholder="Enter your email"
                    class="max-sm:w-full"
                  />
                  <button type="submit" class="btn-primary">Subscribe</button>
                </form>
              </div>
            </div>
            <ul class="flex-[1.5] space-y-3">
              <li>
                <a
                  href="#"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >Terms & Conditions</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >Privacy policy</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >Investors</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >Blogs</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-body-2 hover:text-text-light text-base leading-[24px] duration-200"
                  >Founders</a
                >
              </li>
              <li>
                <a
                  href="#"
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
          <a href="twitter.com" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/twitter.svg') }}" alt="" class="size-6" />
          </a>
          <a href="linkedin.com" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/linkedin.svg') }}" alt="" class="size-6" />
          </a>
          <a href="instagram.com" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/instagram.svg') }}" alt="" class="size-6" />
          </a>
          <a href="facebook.com" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/facebook.svg') }}" alt="" class="size-6" />
          </a>
          <a href="reddit.com" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/reddit.svg') }}" alt="" class="size-6" />
          </a>
          <a href="youtube.com" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/images/youtube.svg') }}" alt="" class="size-6" />
          </a>
        </div>
        <div class="b2 flex items-center gap-1 max-sm:flex-wrap max-sm:justify-center">
          <span>&copy; 2025 ScaleDux</span>
          <span>|</span>
          <span><a href="#" class="hover:text-gray-300">Terms</a></span>
          <span>|</span>
          <span><a href="#" class="hover:text-gray-300">Privacy</a></span>
          <!-- <span>|</span>
              <span><a href="#">Cookies</a></span> -->
        </div>
      </div>
    </footer>


  </body>
</html>
