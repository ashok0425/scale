@extends('frontend.layout.app')
@section('content')

    <main class="-mt-[90px]">
      <section
        class="bg-hero-bg relative isolate flex items-center justify-center overflow-hidden bg-cover pt-32 pb-52 before:absolute before:inset-0 before:[background-image:url('/images/hero-bg-effect.png')] before:bg-cover before:opacity-40 md:pt-[290px] md:pb-[294px]"
      >
        <div class="z-20 container">
          <div class="mx-auto max-w-[85ch] space-y-[18px]">
            <h1 class="dh-1 text-center">
              Finally, A Platform Where <br class="max-md:hidden" />
              Skilled Professionals Come First
            </h1>
            <p class="text-center">
              Where quality clients find you, payments are guaranteed, and your skills earn what
              they deserve.
            </p>
          </div>
          <div class="mx-auto mt-6 sm:w-fit">
            <div class="flex flex-col flex-wrap items-center justify-center gap-3 sm:flex-row">
              <!-- <input class="max-sm:w-full" type="text" placeholder="Enter full name" />
              <input class="max-sm:w-full" type="email" placeholder="Enter your email" />
              <select class="min-w-[250px] max-sm:w-full">
                <option value="">Select your role</option>
                <option value="founder">Founder/Aspiring Founder</option>
                <option value="freelancer">Freelancer/Agency</option>
                <option value="investor">Investor</option>
                <option value="mentor">Mentor</option>
              </select> -->
              <button
                class="btn-primary hover:shadow-brand-purple/60 group hover:shadow-lg max-sm:w-full"
              >
                <span class="inner-wrapper inline-flex h-6 overflow-hidden">
                  <span class="inner flex flex-col duration-200 group-hover:-translate-y-full">
                    <span class="text">Join our waitlist</span>
                    <span class="text">Join our waitlist</span>
                  </span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <div class="absolute bottom-0 z-10 flex h-[256px] w-[1343px] justify-center">
          <!-- <img src="{{ asset('frontend/images/hero.svg') }}" alt="" class="h-full object-cover" /> -->
          <!-- class="hero-anim" -->

          <svg
            width="1343"
            height="256"
            viewBox="0 0 1343 256"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g clip-path="url(#clip0_1172_105659)">
              <g filter="url(#filter0_f_1172_105659)">
                <circle cx="645.5" cy="343.5" r="226.5" fill="#7400E8" />
              </g>
              <g filter="url(#filter1_f_1172_105659)">
                <circle cx="645.5" cy="343.5" r="226.5" fill="#7400E8" />
              </g>
              <g filter="url(#filter2_f_1172_105659)">
                <circle cx="475.5" cy="343.5" r="226.5" fill="#B2B2B2" />
              </g>
              <g filter="url(#filter3_f_1172_105659)">
                <circle cx="871.5" cy="368.5" r="226.5" fill="#BC79FF" />
              </g>
              <foreignObject x="-42.7186" y="18.8" width="1346.91" height="526.325"
                ><div
                  xmlns="http://www.w3.org/1999/xhtml"
                  style="
                    backdrop-filter: blur(33.6px);
                    clip-path: url(#bgblur_1_1172_105659_clip_path);
                    height: 100%;
                    width: 100%;
                  "
                ></div
              ></foreignObject>
              <path
                data-figma-bg-blur-radius="67.2"
                d="M24.4815 339.791C87.3656 260.98 177.253 195.974 284.974 151.407C392.695 106.839 514.396 84.3037 637.661 86.0995C760.926 87.8953 881.344 113.958 986.633 161.629C1091.92 209.3 1178.31 276.873 1236.99 357.456L937.465 477.925C907.458 436.717 863.28 402.162 809.439 377.785C755.598 353.407 694.02 340.08 630.986 339.161C567.952 338.243 505.718 349.767 450.633 372.558C395.547 395.348 349.582 428.59 317.424 468.892L24.4815 339.791Z"
                fill="#050027"
                fill-opacity="0.2"
              />
              <foreignObject x="-42.7186" y="47.8" width="1346.91" height="526.325"
                ><div
                  xmlns="http://www.w3.org/1999/xhtml"
                  style="
                    backdrop-filter: blur(33.6px);
                    clip-path: url(#bgblur_2_1172_105659_clip_path);
                    height: 100%;
                    width: 100%;
                  "
                ></div
              ></foreignObject>
              <path
                data-figma-bg-blur-radius="67.2"
                d="M24.4815 368.791C87.3656 289.98 177.253 224.974 284.974 180.407C392.695 135.839 514.396 113.304 637.661 115.1C760.926 116.895 881.344 142.958 986.633 190.629C1091.92 238.3 1178.31 305.873 1236.99 386.456L937.465 506.925C907.458 465.717 863.28 431.162 809.439 406.785C755.598 382.407 694.02 369.08 630.986 368.161C567.952 367.243 505.718 378.767 450.633 401.558C395.547 424.348 349.582 457.59 317.424 497.892L24.4815 368.791Z"
                fill="#050027"
                fill-opacity="0.2"
              />
              <foreignObject x="-42.7186" y="74.8" width="1346.91" height="526.325"
                ><div
                  xmlns="http://www.w3.org/1999/xhtml"
                  style="
                    backdrop-filter: blur(33.6px);
                    clip-path: url(#bgblur_3_1172_105659_clip_path);
                    height: 100%;
                    width: 100%;
                  "
                ></div
              ></foreignObject>
              <path
                data-figma-bg-blur-radius="67.2"
                d="M24.4815 395.791C87.3656 316.98 177.253 251.974 284.974 207.407C392.695 162.839 514.396 140.304 637.661 142.1C760.926 143.895 881.344 169.958 986.633 217.629C1091.92 265.3 1178.31 332.873 1236.99 413.456L937.465 533.925C907.458 492.717 863.28 458.162 809.439 433.785C755.598 409.407 694.02 396.08 630.986 395.161C567.952 394.243 505.718 405.767 450.633 428.558C395.547 451.348 349.582 484.59 317.424 524.892L24.4815 395.791Z"
                fill="#050027"
                fill-opacity="0.2"
              />
              <foreignObject x="-42.7186" y="103.8" width="1346.91" height="526.325"
                ><div
                  xmlns="http://www.w3.org/1999/xhtml"
                  style="
                    backdrop-filter: blur(33.6px);
                    clip-path: url(#bgblur_4_1172_105659_clip_path);
                    height: 100%;
                    width: 100%;
                  "
                ></div
              ></foreignObject>
              <path
                data-figma-bg-blur-radius="67.2"
                d="M24.4815 424.791C87.3656 345.98 177.253 280.974 284.974 236.407C392.695 191.839 514.396 169.304 637.661 171.1C760.926 172.895 881.344 198.958 986.633 246.629C1091.92 294.3 1178.31 361.873 1236.99 442.456L937.465 562.925C907.458 521.717 863.28 487.162 809.439 462.785C755.598 438.407 694.02 425.08 630.986 424.161C567.952 423.243 505.718 434.767 450.633 457.558C395.547 480.348 349.582 513.59 317.424 553.892L24.4815 424.791Z"
                fill="#050027"
                fill-opacity="0.2"
              />
              <foreignObject x="-45.7186" y="126.8" width="1346.91" height="526.325"
                ><div
                  xmlns="http://www.w3.org/1999/xhtml"
                  style="
                    backdrop-filter: blur(33.6px);
                    clip-path: url(#bgblur_5_1172_105659_clip_path);
                    height: 100%;
                    width: 100%;
                  "
                ></div
              ></foreignObject>
              <path
                data-figma-bg-blur-radius="67.2"
                d="M21.4815 447.791C84.3656 368.98 174.253 303.974 281.974 259.407C389.695 214.839 511.396 192.304 634.661 194.1C757.926 195.895 878.344 221.958 983.633 269.629C1088.92 317.3 1175.31 384.873 1233.99 465.456L934.465 585.925C904.458 544.717 860.28 510.162 806.439 485.785C752.598 461.407 691.02 448.08 627.986 447.161C564.952 446.243 502.718 457.767 447.633 480.558C392.547 503.348 346.582 536.59 314.424 576.892L21.4815 447.791Z"
                fill="#050027"
                fill-opacity="0.2"
              />
              <foreignObject x="-45.7186" y="163.8" width="1346.91" height="526.325"
                ><div
                  xmlns="http://www.w3.org/1999/xhtml"
                  style="
                    backdrop-filter: blur(33.6px);
                    clip-path: url(#bgblur_6_1172_105659_clip_path);
                    height: 100%;
                    width: 100%;
                  "
                ></div
              ></foreignObject>
              <path
                data-figma-bg-blur-radius="67.2"
                d="M21.4815 484.791C84.3656 405.98 174.253 340.974 281.974 296.407C389.695 251.839 511.396 229.304 634.661 231.1C757.926 232.895 878.344 258.958 983.633 306.629C1088.92 354.3 1175.31 421.873 1233.99 502.456L934.465 622.925C904.458 581.717 860.28 547.162 806.439 522.785C752.598 498.407 691.02 485.08 627.986 484.161C564.952 483.243 502.718 494.767 447.633 517.558C392.547 540.348 346.582 573.59 314.424 613.892L21.4815 484.791Z"
                fill="#050027"
                fill-opacity="0.2"
              />
            </g>
            <defs>
              <filter
                id="filter0_f_1172_105659"
                x="294.6"
                y="-7.4"
                width="701.8"
                height="701.8"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                <feGaussianBlur stdDeviation="62.2" result="effect1_foregroundBlur_1172_105659" />
              </filter>
              <filter
                id="filter1_f_1172_105659"
                x="294.6"
                y="-7.4"
                width="701.8"
                height="701.8"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                <feGaussianBlur stdDeviation="62.2" result="effect1_foregroundBlur_1172_105659" />
              </filter>
              <filter
                id="filter2_f_1172_105659"
                x="124.6"
                y="-7.4"
                width="701.8"
                height="701.8"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                <feGaussianBlur stdDeviation="62.2" result="effect1_foregroundBlur_1172_105659" />
              </filter>
              <filter
                id="filter3_f_1172_105659"
                x="520.6"
                y="17.6"
                width="701.8"
                height="701.8"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                <feGaussianBlur stdDeviation="62.2" result="effect1_foregroundBlur_1172_105659" />
              </filter>
              <clipPath id="bgblur_1_1172_105659_clip_path" transform="translate(42.7186 -18.8)">
                <path
                  d="M24.4815 339.791C87.3656 260.98 177.253 195.974 284.974 151.407C392.695 106.839 514.396 84.3037 637.661 86.0995C760.926 87.8953 881.344 113.958 986.633 161.629C1091.92 209.3 1178.31 276.873 1236.99 357.456L937.465 477.925C907.458 436.717 863.28 402.162 809.439 377.785C755.598 353.407 694.02 340.08 630.986 339.161C567.952 338.243 505.718 349.767 450.633 372.558C395.547 395.348 349.582 428.59 317.424 468.892L24.4815 339.791Z"
                />
              </clipPath>
              <clipPath id="bgblur_2_1172_105659_clip_path" transform="translate(42.7186 -47.8)">
                <path
                  d="M24.4815 368.791C87.3656 289.98 177.253 224.974 284.974 180.407C392.695 135.839 514.396 113.304 637.661 115.1C760.926 116.895 881.344 142.958 986.633 190.629C1091.92 238.3 1178.31 305.873 1236.99 386.456L937.465 506.925C907.458 465.717 863.28 431.162 809.439 406.785C755.598 382.407 694.02 369.08 630.986 368.161C567.952 367.243 505.718 378.767 450.633 401.558C395.547 424.348 349.582 457.59 317.424 497.892L24.4815 368.791Z"
                />
              </clipPath>
              <clipPath id="bgblur_3_1172_105659_clip_path" transform="translate(42.7186 -74.8)">
                <path
                  d="M24.4815 395.791C87.3656 316.98 177.253 251.974 284.974 207.407C392.695 162.839 514.396 140.304 637.661 142.1C760.926 143.895 881.344 169.958 986.633 217.629C1091.92 265.3 1178.31 332.873 1236.99 413.456L937.465 533.925C907.458 492.717 863.28 458.162 809.439 433.785C755.598 409.407 694.02 396.08 630.986 395.161C567.952 394.243 505.718 405.767 450.633 428.558C395.547 451.348 349.582 484.59 317.424 524.892L24.4815 395.791Z"
                />
              </clipPath>
              <clipPath id="bgblur_4_1172_105659_clip_path" transform="translate(42.7186 -103.8)">
                <path
                  d="M24.4815 424.791C87.3656 345.98 177.253 280.974 284.974 236.407C392.695 191.839 514.396 169.304 637.661 171.1C760.926 172.895 881.344 198.958 986.633 246.629C1091.92 294.3 1178.31 361.873 1236.99 442.456L937.465 562.925C907.458 521.717 863.28 487.162 809.439 462.785C755.598 438.407 694.02 425.08 630.986 424.161C567.952 423.243 505.718 434.767 450.633 457.558C395.547 480.348 349.582 513.59 317.424 553.892L24.4815 424.791Z"
                />
              </clipPath>
              <clipPath id="bgblur_5_1172_105659_clip_path" transform="translate(45.7186 -126.8)">
                <path
                  d="M21.4815 447.791C84.3656 368.98 174.253 303.974 281.974 259.407C389.695 214.839 511.396 192.304 634.661 194.1C757.926 195.895 878.344 221.958 983.633 269.629C1088.92 317.3 1175.31 384.873 1233.99 465.456L934.465 585.925C904.458 544.717 860.28 510.162 806.439 485.785C752.598 461.407 691.02 448.08 627.986 447.161C564.952 446.243 502.718 457.767 447.633 480.558C392.547 503.348 346.582 536.59 314.424 576.892L21.4815 447.791Z"
                />
              </clipPath>
              <clipPath id="bgblur_6_1172_105659_clip_path" transform="translate(45.7186 -163.8)">
                <path
                  d="M21.4815 484.791C84.3656 405.98 174.253 340.974 281.974 296.407C389.695 251.839 511.396 229.304 634.661 231.1C757.926 232.895 878.344 258.958 983.633 306.629C1088.92 354.3 1175.31 421.873 1233.99 502.456L934.465 622.925C904.458 581.717 860.28 547.162 806.439 522.785C752.598 498.407 691.02 485.08 627.986 484.161C564.952 483.243 502.718 494.767 447.633 517.558C392.547 540.348 346.582 573.59 314.424 613.892L21.4815 484.791Z"
                />
              </clipPath>
              <clipPath id="clip0_1172_105659">
                <rect width="1343" height="256" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </div>
      </section>
      <div class="relative">
        <img
          src="{{ asset('frontend/images/x.svg') }}"
          alt=""
          class="absolute top-[14%] left-0 -z-10 h-[84%] w-full opacity-55"
        />
        <section class="pt-14 pb-14 sm:pt-24 sm:pb-28 md:pt-20 md:pb-24">
          <div class="container-sm">
            <div class="flex flex-col gap-10 md:flex-row">
              <div
                class="before:brand-gradient relative max-w-[330px] rounded-lg bg-[#1d1c20] before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
              >
                <div class="relative isolate flex h-full flex-col justify-between overflow-clip">
                  <div
                    class="bg bg-brand-purple absolute top-1/2 -z-10 h-56 w-full -skew-y-[48deg] rounded-lg"
                  ></div>
                  <div class="space-y-2 p-6">
                    <div class="flex items-center gap-2">
                      <h6 class="dh-5 text-white">Freelancers</h6>
                    </div>
                    <p>
                      Tired of chasing leads and getting ghosted? We bring serious clients straight
                      to you.
                    </p>
                  </div>
                  <img
                    src="{{ asset('frontend/images/freelancer.png') }}"
                    alt=""
                    class="mx-auto aspect-[3/2] max-h-300 object-cover"
                  />
                </div>
              </div>
              <div class="space-y-4 sm:space-y-6">
                <div class="space-y-0.5">
                  <h4 class="dh-4">Who thrives on the</h4>
                  <h2 class="dh-2">Supply Side</h2>
                </div>
                <p class="b1 font-semibold text-white">
                  ScaleDux empowers service providers at every level
                </p>
                <div class="flex flex-wrap gap-4">
                  <div
                    class="before:brand-gradient relative rounded-lg bg-[#090118] p-3 before:!absolute before:-inset-[1px] before:-z-10 before:rounded-lg"
                  >
                    <p>Independent Freelancers</p>
                  </div>
                  <div
                    class="before:brand-gradient relative rounded-lg bg-[#090118] p-3 before:!absolute before:-inset-[1px] before:-z-10 before:rounded-lg"
                  >
                    <p>Small Agencies</p>
                  </div>
                </div>
                <div class="flex flex-wrap gap-4">
                  <div
                    class="before:brand-gradient relative rounded-lg bg-[#090118] p-3 before:!absolute before:-inset-[1px] before:-z-10 before:rounded-lg"
                  >
                    <p>Specialised Professionals</p>
                  </div>
                  <div
                    class="before:brand-gradient relative rounded-lg bg-[#090118] p-3 before:!absolute before:-inset-[1px] before:-z-10 before:rounded-lg"
                  >
                    <p>Service Firms</p>
                  </div>
                </div>
                <p class="b2 font-semibold text-white">
                  On ScaleDux, your expertise finds its perfect match. We connect you with verified
                  clients who value your work - without the endless pitching and payment
                  uncertainty.
                </p>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="container mb-[53px]">
            <h2 class="dh-1 mv-3 mx-auto max-w-[24ch] text-center">
              How ScaleDux solves Service Provider Struggles
            </h2>
            <p class="b1 mx-auto max-w-[54ch] text-center font-semibold text-white">
              We've eliminated the biggest hurdles in your service journey. Simple. Seamless.
              ScaleDux.
            </p>
          </div>
          <div class="container-sm">
            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 sm:gap-4 md:grid-cols-3 md:gap-6">
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/client-hunt.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">End the client hunt</h3>
                  <p class="b2 text-white">
                    Stop wasting hours searching for new clients— our AI delivers verified
                    opportunities directly to you
                  </p>
                </div>
              </div>
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/smart-matching.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">Escrow Protection</h3>
                  <p class="b2 text-white">
                    Eliminate Payment Uncertainty Secure your income with our escrow protection -
                    get paid on time, every time, guaranteed
                  </p>
                </div>
              </div>
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/shield.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">Remove Trust Barriers</h3>
                  <p class="b2 text-white">
                    Every client is verified and reviewed, so you can work with confidence
                  </p>
                </div>
              </div>
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/pm.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">Simplify Project Management</h3>
                  <p class="b2 text-white">
                    All your communications, deliverables, and payments in one secure environment
                  </p>
                </div>
              </div>
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/infinite.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">And More</h3>
                  <p class="b2 text-white">
                    Continuous platform updates, AI-powered growth tools, and exclusive resources
                    designed for service provider success
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="pt-20 pb-16 md:pt-[150px] md:pb-[100px]">
          <div class="relative container">
            <div class="space-y-3">
              <h2 class="dh-1 mx-auto max-w-[20ch] text-center">
                Curious about ScaleDux? Find Answers Here
              </h2>
              <div
                class="access-gradient before:brand-gradient relative -z-10 mb-1 h-px before:absolute before:bottom-0 before:left-1/2 before:h-[126px] before:w-[450px] before:-translate-x-1/2 before:rounded-full before:blur-[100px]"
              ></div>
              <p class="b1 text-center text-white">
                Cant find an answer? email us at contact@scaledux.com
              </p>
            </div>
          </div>
         <div class="container-sm mt-20">
  <div class="accordion-wrapper">

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">Who can join ScaleDux as a service provider?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="Toggle Icon" class="icon" />
      </div>
      <p class="accordion-content">
        If you're someone who offers services that help startups grow — you're welcome here. Whether you're a solo freelancer, part of a small agency, or run a specialized firm, ScaleDux is built for you. We work with experts across design, development, branding, marketing, legal, finance, operations, and more. You don’t need a big team or a fancy setup. If you're serious about your work and want to support serious founders — this is your platform.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">How does ScaleDux help me get work?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="Toggle Icon" class="icon" />
      </div>
      <p class="accordion-content">
        You don’t need to cold-message or bid against 50 people anymore. On ScaleDux, your skills are matched with serious, verified startup founders and business clients — people who are ready to work and value what you offer. We use smart matching to connect you based on your expertise, not just keywords. So you’re not chasing leads. The right ones come to you. Whether it’s a startup building their first product or a business that needs expert support — you’ll meet clients who are clear, committed, and actually want to get things done. No noise. No spam. Just real work, with people who respect your craft.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">How do payments work? Is it safe?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="Toggle Icon" class="icon" />
      </div>
      <p class="accordion-content">
        We know payment anxiety is real — and we’re building this platform with that in mind. At launch, every project begins with clear agreements, verified clients, and milestone-based commitments, so you always know what’s expected — and when you’ll be paid. We're also working on integrating an escrow system — so funds can be securely held and automatically released after work is approved. It’s not live yet, but it’s coming soon. In the meantime, we’re building workflows that protect your effort and keep things transparent, every step of the way. You focus on great work — we’ll keep working to make sure you always get paid for it.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">Do I need to pay to get listed or start working?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="Toggle Icon" class="icon" />
      </div>
      <p class="accordion-content">
        Nope — there’s no joining fee, no listing cost, and no hidden charges to get started. You can explore opportunities, create your profile, and start connecting — completely free. But if you join through priority access, you’ll unlock exclusive early adopter benefits like:<br>
        • 0% commission on your first project<br>
        • Early visibility when we go live<br>
        • Special pricing perks we won’t repeat later<br>
        When it comes to commissions, we keep it simple — and way lower than traditional platforms. Because we believe you should keep more of what you earn. No pay-to-play. Just get in, do great work, and grow with us.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">How is ScaleDux different from other freelance platforms?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="Toggle Icon" class="icon" />
      </div>
      <p class="accordion-content">
        Most platforms feel crowded and noisy. You spend hours sending proposals, competing with fake profiles, and hoping someone replies. We built ScaleDux to be different — and fair. Here’s how:<br>
        • Clients are verified — You only see real startup founders or teams who are ready to work.<br>
        • Payments are protected (coming soon) — We’re working on a secure system so your money is held safely and released only after your work is done.<br>
        • No bidding wars — You don’t have to fight to be the cheapest. We match you based on your skills and fit.<br>
        • No spam or fake projects — We check every project before it’s listed, so your time isn’t wasted.<br>
        • Helpful tools are coming — Like ready-made proposals and tips to help you talk to clients and get better projects.<br>
        We're building ScaleDux with you — not just for you. So you can do your best work, with the kind of clients you actually want.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">What kind of clients will I work with?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="Toggle Icon" class="icon" />
      </div>
      <p class="accordion-content">
        You’ll work with serious, verified clients — not random usernames behind blurry project briefs. Most of them are startup founders:<br>
        • Some just getting started, others already growing fast.<br>
        • They’re building real products and need real experts to help them do it.<br>
        • You might also connect with small businesses or early teams looking for trusted support — from design to legal, tech to marketing.<br>
        No spam. No fake leads. Just clear, professional clients who actually want to work with someone like you.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">What happens after I join the waitlist?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="Toggle Icon" class="icon" />
      </div>
      <p class="accordion-content">
        You’ll get a confirmation email right away — just to say you're in. As we get closer to launch, we’ll keep you updated with progress, sneak peeks, and important next steps. You’ll also be the first to know when it’s time to create your profile and start connecting with clients. If you’ve joined through priority access, you’ll unlock early adopter benefits — like extra visibility, commission perks, and early client invitations. More than that — you’ll be part of how this platform takes shape. We’ll ask for your thoughts, your feedback, and your ideas. ScaleDux is being built for you — but we’d love to build it with you.
      </p>
    </div>

  </div>
</div>

        </section>
      </div>
      <section
        class="dotted-gradient before:bg-deep-indigo after:bg-deep-indigo relative isolate overflow-clip py-11 before:absolute before:top-0 before:left-0 before:z-10 before:h-10 before:w-full after:absolute after:bottom-0 after:left-0 after:z-10 after:h-10 after:w-full sm:py-20 md:py-[100px]"
      >
        <div class="isolate container max-sm:mt-10">
          <div class="mx-auto max-w-[80ch] space-y-3 text-center">
            <h2 class="dh-2">Lock In These Privileges</h2>
            <p>Select your priority access according to your needs</p>
          </div>
          <div
            class="access-gradient before:brand-gradient relative -z-10 mt-7 mb-6 h-px before:absolute before:bottom-0 before:left-1/2 before:h-[126px] before:w-[450px] before:-translate-x-1/2 before:rounded-full before:blur-[100px]"
          ></div>
          <div class="mx-auto mt-16 max-w-[840px] space-y-6">
            <div
              class="before:brand-gradient relative flex flex-col gap-4 before:absolute before:top-1/2 before:left-1/2 before:size-[750px] before:-translate-1/2 before:rounded-full before:blur-[240px]"
            >
              <div
                class="before:brand-gradient relative rounded-lg bg-[#090118] p-6 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
              >
                <p class="b2 text-light">
                  <strong class="heading-5">Long term value, from day one:</strong> Enjoy long-term
                  savings every time you use ScaleDux
                </p>
                <div class="isolate mt-6 flex flex-col items-stretch gap-4 sm:flex-row md:gap-6">
                  <div
                    class="bg-deep-indigo relative flex-1 rounded-xl px-4 py-6 duration-200 before:absolute before:-inset-[2px] before:-z-10 before:rounded-xl before:bg-gradient-to-b before:from-[#0C0C0E] before:to-[#272727] hover:bg-transparent"
                  >
                    <h4 class="dh-4 font-stretch-condensed">30%</h4>
                    <p class="b2 text-light mt-1 font-medium">Lifetime Subscription discount</p>
                  </div>
                  <div
                    class="bg-deep-indigo relative flex-1 rounded-xl px-4 py-6 duration-200 before:absolute before:-inset-[2px] before:-z-10 before:rounded-xl before:bg-gradient-to-b before:from-[#0C0C0E] before:to-[#272727] hover:bg-transparent"
                  >
                    <h4 class="dh-4 font-stretch-condensed">100%</h4>
                    <p class="b2 text-light mt-1 font-medium">Payment protection</p>
                  </div>
                  <div
                    class="bg-deep-indigo relative flex-1 rounded-xl px-4 py-6 duration-200 before:absolute before:-inset-[2px] before:-z-10 before:rounded-xl before:bg-gradient-to-b before:from-[#0C0C0E] before:to-[#272727] hover:bg-transparent"
                  >
                    <h4 class="dh-4 font-stretch-condensed">Zero</h4>
                    <p class="b2 text-light mt-1 font-medium">
                      Commission for your first ten prjoects
                    </p>
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="flex flex-col gap-3">
                  <div
                    class="before:brand-gradient relative h-full flex-1 rounded-lg bg-[#090118] p-6 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
                  >
                    <h5 class="heading-5">Visibility and <br />Opportunities</h5>
                    <ul class="mt-6 space-y-4">
                      <li class="b3 flex gap-2 text-white">
                        <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                        <span>Client match accelerator</span>
                      </li>
                      <li class="b3 flex gap-2 text-white">
                        <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                        <span>Zero discoverability costs</span>
                      </li>
                      <li class="b3 flex gap-2 text-white">
                        <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                        <span>Algorithm priority status</span>
                      </li>
                      <li class="b3 flex gap-2 text-white">
                        <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                        <span>Smart client matching</span>
                      </li>
                      <li class="b3 flex gap-2 text-white">
                        <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                        <span>Multi project bidding</span>
                      </li>
                    </ul>
                  </div>
                  <div
                    class="before:brand-gradient relative flex h-fit gap-3 rounded-lg bg-[#090118] p-6 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
                  >
                    <img src="{{ asset('frontend/images/icon-bordered.svg') }}" alt="" class="size-6" />
                    <h5 class="heading-5">Priority verification and status with expert's badge</h5>
                  </div>
                </div>
                <div
                  class="before:brand-gradient relative h-full flex-1 rounded-lg bg-[#090118] p-6 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
                >
                  <h5 class="heading-5">
                    Trust, Support and <br />
                    Stability
                  </h5>
                  <ul class="mt-6 space-y-6">
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>30% Lifetime reduction on Marketplace fees</span>
                    </li>
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>VIP Support and payment priority</span>
                    </li>
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>Steady Pipeline Protection</span>
                    </li>
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>Zero client acquisition fees</span>
                    </li>
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>Trust Verification bundle</span>
                    </li>
                  </ul>
                </div>
                <div
                  class="before:brand-gradient relative h-full flex-1 rounded-lg bg-[#090118] p-6 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
                >
                  <h5 class="heading-5">Exclusive Founders' Resources</h5>
                  <ul class="mt-6 space-y-6">
                    <li
                      class="gradient-border b2 relative flex h-full flex-1 gap-[10px] rounded-lg p-6 px-4 py-3 font-semibold text-white"
                    >
                      <img src="{{ asset('frontend/images/sun.svg') }}" alt="" class="mt-1 size-4" />
                      <span>Search engine dominance package</span>
                    </li>
                    <li
                      class="gradient-border b2 relative flex h-full flex-1 gap-[10px] rounded-lg p-6 px-4 py-3 font-semibold text-white"
                    >
                      <img src="{{ asset('frontend/images/sun.svg') }}" alt="" class="mt-1 size-4" />
                      <span>Proposal spotlight</span>
                    </li>
                    <li
                      class="gradient-border b2 relative flex h-full flex-1 gap-[10px] rounded-lg p-6 px-4 py-3 font-semibold text-white"
                    >
                      <img src="{{ asset('frontend/images/sun.svg') }}" alt="" class="mt-1 size-4" />
                      <span>Skill certifications fast-track</span>
                    </li>
                    <li
                      class="gradient-border b2 relative flex h-full flex-1 gap-[10px] rounded-lg p-6 px-4 py-3 font-semibold text-white"
                    >
                      <img src="{{ asset('frontend/images/sun.svg') }}" alt="" class="mt-1 size-4" />
                      <span>Premium agency profile</span>
                    </li>
                  </ul>
                </div>
              </div>
              @include('frontend.inc.total_value')
            </div>
          </div>
        </div>
      </section>
    </main>

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Who can join ScaleDux as a service provider?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "If you're someone who offers services that help startups grow — you're welcome here. Whether you're a solo freelancer, part of a small agency, or run a specialized firm, ScaleDux is built for you. We work with experts across design, development, branding, marketing, legal, finance, operations, and more. You don’t need a big team or a fancy setup. If you're serious about your work and want to support serious founders — this is your platform."
      }
    },
    {
      "@type": "Question",
      "name": "How does ScaleDux help me get work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You don’t need to cold-message or bid against 50 people anymore. On ScaleDux, your skills are matched with serious, verified startup founders and business clients — people who are ready to work and value what you offer. We use smart matching to connect you based on your expertise, not just keywords. So you’re not chasing leads. The right ones come to you. Whether it’s a startup building their first product or a business that needs expert support — you’ll meet clients who are clear, committed, and actually want to get things done. No noise. No spam. Just real work, with people who respect your craft."
      }
    },
    {
      "@type": "Question",
      "name": "How do payments work? Is it safe?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We know payment anxiety is real — and we’re building this platform with that in mind. At launch, every project begins with clear agreements, verified clients, and milestone-based commitments, so you always know what’s expected — and when you’ll be paid. We're also working on integrating an escrow system — so funds can be securely held and automatically released after work is approved. It’s not live yet, but it’s coming soon. In the meantime, we’re building workflows that protect your effort and keep things transparent, every step of the way. You focus on great work — we’ll keep working to make sure you always get paid for it."
      }
    },
    {
      "@type": "Question",
      "name": "Do I need to pay to get listed or start working?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Nope — there’s no joining fee, no listing cost, and no hidden charges to get started. You can explore opportunities, create your profile, and start connecting — completely free. But if you join through priority access, you’ll unlock exclusive early adopter benefits like: 0% commission on your first project, early visibility when we go live, and special pricing perks we won’t repeat later. When it comes to commissions, we keep it simple — and way lower than traditional platforms. Because we believe you should keep more of what you earn. No pay-to-play. Just get in, do great work, and grow with us."
      }
    },
    {
      "@type": "Question",
      "name": "How is ScaleDux different from other freelance platforms?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most platforms feel crowded and noisy. You spend hours sending proposals, competing with fake profiles, and hoping someone replies. We built ScaleDux to be different — and fair. Here’s how: Clients are verified — You only see real startup founders or teams who are ready to work. Payments are protected (coming soon) — We’re working on a secure system so your money is held safely and released only after your work is done. No bidding wars — You don’t have to fight to be the cheapest. We match you based on your skills and fit. No spam or fake projects — We check every project before it’s listed, so your time isn’t wasted. Helpful tools are coming — Like ready-made proposals and tips to help you talk to clients and get better projects. We're building ScaleDux with you — not just for you. So you can do your best work, with the kind of clients you actually want."
      }
    },
    {
      "@type": "Question",
      "name": "What kind of clients will I work with?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You’ll work with serious, verified clients — not random usernames behind blurry project briefs. Most of them are startup founders: some just getting started, others already growing fast. They’re building real products and need real experts to help them do it. You might also connect with small businesses or early teams looking for trusted support — from design to legal, tech to marketing. No spam. No fake leads. Just clear, professional clients who actually want to work with someone like you."
      }
    },
    {
      "@type": "Question",
      "name": "What happens after I join the waitlist?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You’ll get a confirmation email right away — just to say you're in. As we get closer to launch, we’ll keep you updated with progress, sneak peeks, and important next steps. You’ll also be the first to know when it’s time to create your profile and start connecting with clients. If you’ve joined through priority access, you’ll unlock early adopter benefits — like extra visibility, commission perks, and early client invitations. But more than that — you’ll be part of how this platform takes shape. We’ll ask for your thoughts, your feedback, and your ideas. ScaleDux is being built for you — but we’d love to build it with you."
      }
    }
  ]
}
</script>

@endsection
