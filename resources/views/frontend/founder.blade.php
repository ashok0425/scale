@extends('frontend.layout.app')
@section('content')
      <main class="-mt-[90px]">
      <section
        class="bg-hero-bg relative isolate flex items-center justify-center overflow-hidden bg-cover pt-32 pb-52 before:absolute before:inset-0 before:[background-image:url('/images/hero-bg-effect.png')] before:bg-cover before:opacity-40 md:pt-[290px] md:pb-[294px]"
      >
        <div class="z-20 container">
          <div class="mx-auto max-w-[82ch] space-y-[18px]">
            <h1 class="dh-1 text-center">
              ScaleDux, built specifically for founder success at every stage
            </h1>
            <p class="text-center">
              Why juggle 7+ platforms when ScaleDux can connect you with freelancers, investors,
              mentors, and launch opportunities? Your startup journey, simplified.
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
                      <h6 class="dh-5 text-white">Founders</h6>
                    </div>
                    <p>
                      Got big dreams but don’t know where to start? We connects you with the right
                      people instantly!
                    </p>
                  </div>
                  <img
                    src="{{ asset('frontend/images/founder.png') }}"
                    alt=""
                    class="mx-auto aspect-[3/2] max-h-300 object-cover"
                  />
                </div>
              </div>
              <div class="space-y-4 sm:space-y-6">
                <div class="space-y-0.5">
                  <h4 class="dh-4">Who we help on the</h4>
                  <h2 class="dh-2">Founder Side</h2>
                </div>
                <p class="b1 font-semibold text-white">ScaleDux supports builders at every stage</p>
                <div class="flex flex-wrap gap-4">
                  <div
                    class="before:brand-gradient relative rounded-lg bg-[#090118] p-3 before:!absolute before:-inset-[1px] before:-z-10 before:rounded-lg"
                  >
                    <p>First Time Founders</p>
                  </div>
                  <div
                    class="before:brand-gradient relative rounded-lg bg-[#090118] p-3 before:!absolute before:-inset-[1px] before:-z-10 before:rounded-lg"
                  >
                    <p>Early-Stage Startup Founders</p>
                  </div>
                </div>
                <div class="flex flex-wrap gap-4">
                  <div
                    class="before:brand-gradient relative rounded-lg bg-[#090118] p-3 before:!absolute before:-inset-[1px] before:-z-10 before:rounded-lg"
                  >
                    <p>Established Business Owners</p>
                  </div>
                  <div
                    class="before:brand-gradient relative rounded-lg bg-[#090118] p-3 before:!absolute before:-inset-[1px] before:-z-10 before:rounded-lg"
                  >
                    <p>Small Companies</p>
                  </div>
                </div>
                <p class="b2 font-semibold text-white">
                  Whatever stage you're at, we connect you with the right talent, mentors, and
                  investors to move forward - without the endless searching and cold outreach.
                </p>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="container mb-[53px]">
            <h2 class="dh-1 mv-3 mx-auto max-w-[24ch] text-center">
              Your Biggest Startup Challenges Solved on ScaleDux Today
            </h2>
            <p class="b1 mx-auto max-w-[54ch] text-center font-semibold text-white">
              We've eliminated the biggest hurdles in your startup journey. Simple. Seamless.
              ScaleDux.
            </p>
          </div>
          <div class="container-sm">
            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 sm:gap-4 md:grid-cols-3 md:gap-6">
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/solution.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">One Stop Solution</h3>
                  <p class="b2 text-white">
                    Find top talent, investors, mentors, and tools all in one trusted platform
                  </p>
                </div>
              </div>
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/smart-matching.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">Instant Smart Matching</h3>
                  <p class="b2 text-white">
                    Stop wasting hours finding the right people - our AI delivers perfect
                    personalised matches instantly
                  </p>
                </div>
              </div>
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/discover.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">Verified Trusted Network</h3>
                  <p class="b2 text-white">
                    Every service provider and investor is vetted and reviewed, you can collaborate
                    with confidence
                  </p>
                </div>
              </div>
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/grow.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">Business Growth Resources</h3>
                  <p class="b2 text-white">
                    Access exactly what you need to know, when you need to know it- Guides,
                    templates, and expert advice on demand
                  </p>
                </div>
              </div>
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/tag-filled.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">Launch Your Product</h3>
                  <p class="b2 text-white">
                    Get your product in front of the right audience with built-in launch tools and
                    targeted exposure
                  </p>
                </div>
              </div>
              <div class="space-y-5 px-3 pt-6 pb-9">
                <img src="{{ asset('frontend/images/discover.svg') }}" alt="" class="size-9 object-contain" />
                <div class="space-y-1">
                  <h3 class="heading-3 text-white">Network Growth</h3>
                  <p class="b2 text-white">
                    Connect with founders who've been where you are and experts who can take you
                    where you're going
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
        <h5 class="accordion-title">Don’t have a product or MVP yet. Can I still join ScaleDux?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="" class="icon" />
      </div>
      <p class="accordion-content">
        Absolutely — that’s exactly when you should join. You don’t need a deck, a dev team, or even a logo.
        If you’ve got an idea you believe in — even if it’s just a note on your phone — ScaleDux is the right
        place to start.<br><br>
        We’re built for the full journey. From refining your idea and validating the market, to finding
        co-founders, building your prototype, and preparing for launch — you’ll find the right people,
        tools, and guidance at every step.<br><br>
        So if you’re at “I think this could work,” that’s more than enough. We’ll help you figure out
        the rest — one smart connection at a time.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">What kind of freelancers, service providers, or mentors can I find on ScaleDux?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="" class="icon" />
      </div>
      <p class="accordion-content">
        From startup mentors to full-stack developers — ScaleDux brings together the people who help you move forward.<br><br>
        You’ll find:<br>
        • Tech talent — developers, product managers, UI/UX designers<br>
        • Growth experts — marketers, brand strategists, GTM specialists<br>
        • Business pros — legal, compliance, finance, and fundraising support<br>
        • Mentors — not just for advice, but for real startup-building<br><br>
        This isn’t surface-level guidance or 15-minute calls. We’re redefining what mentorship means for founders.
        Personalized, hands-on support to help you figure out whatever you’re stuck on — GTM strategy,
        tech stack decisions, building your first team, refining your product roadmap, or choosing the right AI model.<br><br>
        Whatever you’re building — and wherever you are in the journey — you’ll find people who’ve been
        there, who get it, and who are ready to walk with you.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">Can ScaleDux help me connect with investors?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="" class="icon" />
      </div>
      <p class="accordion-content">
        Yes — and you don’t need a pitch deck on day one to start that journey.<br><br>
        ScaleDux helps founders connect with early-stage investors in a smarter, more intentional way.
        You can opt in when you’re ready — whether that’s at idea stage, MVP, or after launch.<br><br>
        We guide you through it step-by-step:<br>
        • Preparing your profile and pitch<br>
        • Matching with relevant investors based on stage and sector<br>
        • Creating a warm, trust-first connection — not cold DMs<br><br>
        When you’re ready to raise, ScaleDux helps you show up prepared and seen.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">How does ScaleDux ensure trust and safety?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="" class="icon" />
      </div>
      <p class="accordion-content">
        We built ScaleDux around one core principle: not everyone gets in. And that’s a good thing.<br><br>
        Every founder, freelancer, investor, or mentor must pass a mandatory verification process — not just
        their email, but their identity, business legitimacy, and intent to build or contribute meaningfully.<br><br>
        • Verified IDs and business documents<br>
        • Trust badges for top contributors<br>
        • Escrow-protected payments (coming soon)<br>
        • Peer reviews that actually matter<br><br>
        We’re not building a crowd. We’re building a curated network you can rely on.
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">Do I need to have a registered company to use ScaleDux?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="" class="icon" />
      </div>
      <p class="accordion-content">
        Not at all. You don’t need a company, pitch deck, or fancy website to get started here.<br><br>
        If you're obsessing over a problem and believe it needs solving — that’s more than enough to belong.<br><br>
        ScaleDux supports you across every step of the journey:<br>
        • Idea validation and market research<br>
        • Finding your first teammate or freelancer<br>
        • Fundraising, scaling, and beyond
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">What makes ScaleDux better than LinkedIn, Upwork, and WhatsApp?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="" class="icon" />
      </div>
      <p class="accordion-content">
        You’re not doing it wrong. You’re just doing too much.<br><br>
        If your startup stack includes 7 tabs and a prayer... we get it.<br>
        LinkedIn for talent, Upwork for projects, WhatsApp for convos, Google Sheets for tracking... chaos.<br><br>
        ScaleDux replaces that mess with one platform built for real startup workflows:<br>
        • Verified talent, mentors, and investors — all in one place<br>
        • Smart matching that saves 20+ hours/week<br>
        • Built-in collaboration, feedback, and (soon) escrow<br>
        • A trust-first ecosystem with no noise or spam
      </p>
    </div>

    <div class="accordion group cursor-pointer">
      <div class="accordion-trigger">
        <h5 class="accordion-title">What happens after I join the waitlist?</h5>
        <img src="{{ asset('frontend/images/plus.svg') }}" alt="" class="icon" />
      </div>
      <p class="accordion-content">
        You’ll receive a confirmation and welcome email — and a quiet thank you for being early.<br><br>
        You’ll also get:<br>
        • Behind-the-scenes updates<br>
        • Private Slack invite<br>
        • A chance to shape what ScaleDux becomes<br><br>
        This isn’t just a mailing list. It’s your backstage pass to help build the future of startup support.
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
                    <p class="b2 text-light mt-1 font-medium">Lifetime Subscription discount*</p>
                  </div>
                  <div
                    class="bg-deep-indigo relative flex-1 rounded-xl px-4 py-6 duration-200 before:absolute before:-inset-[2px] before:-z-10 before:rounded-xl before:bg-gradient-to-b before:from-[#0C0C0E] before:to-[#272727] hover:bg-transparent"
                  >
                    <h4 class="dh-4 font-stretch-condensed">30%</h4>
                    <p class="b2 text-light mt-1 font-medium">
                      Lifetime reduction on Marketplace fees*
                    </p>
                  </div>
                  <div
                    class="bg-deep-indigo relative flex-1 rounded-xl px-4 py-6 duration-200 before:absolute before:-inset-[2px] before:-z-10 before:rounded-xl before:bg-gradient-to-b before:from-[#0C0C0E] before:to-[#272727] hover:bg-transparent"
                  >
                    <h4 class="dh-4 font-stretch-condensed">No platform fee</h4>
                    <p class="b2 text-light mt-1 font-medium">Platform access for six months</p>
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div
                  class="before:brand-gradient relative h-full flex-1 rounded-lg bg-[#090118] p-6 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
                >
                  <h5 class="heading-5">VIP Support Channel</h5>
                  <p class="b2 mt-1 mb-3 text-white">Along with exclusive Founding member badge</p>
                  <img src="{{ asset('frontend/images/icon-bordered.svg') }}" alt="" class="size-24" />
                </div>
                <div
                  class="before:brand-gradient relative h-full flex-1 rounded-lg bg-[#090118] p-6 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
                >
                  <h5 class="heading-5">Fast-track your Startup Journey</h5>
                  <ul class="mt-6 space-y-6">
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>Instant Verification and Launch</span>
                    </li>
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>Investor fast track program</span>
                    </li>
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>VIP Support Channel</span>
                    </li>
                  </ul>
                </div>
                <div
                  class="before:brand-gradient relative h-full flex-1 rounded-lg bg-[#090118] p-6 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg before:p-3"
                >
                  <h5 class="heading-5">Exclusive Founders' Resources</h5>
                  <ul class="mt-6 space-y-6">
                    <li
                      class="gradient-border b4 relative flex h-full flex-1 items-center gap-[10px] rounded-lg p-6 px-4 py-3 font-semibold text-white"
                    >
                      <img src="{{ asset('frontend/images/sun.svg') }}" alt="" class="size-4" />
                      <span>Elite resource vault</span>
                    </li>
                    <li
                      class="gradient-border b4 relative flex h-full flex-1 items-center gap-[10px] rounded-lg p-6 px-4 py-3 font-semibold text-white"
                    >
                      <img src="{{ asset('frontend/images/sun.svg') }}" alt="" class="size-4" />
                      <span>Spotlight package</span>
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
      "name": "I don’t have a product or MVP yet. Can I still join ScaleDux?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely — that’s exactly when you should join. You don’t need a deck, a dev team, or even a logo. If you’ve got an idea you believe in — even if it’s just a note on your phone — ScaleDux is the right place to start. We’re built for the full journey. From refining your idea and validating the market, to finding co-founders, building your prototype, and preparing for launch — you’ll find the right people, tools, and guidance at every step. So if you’re at “I think this could work,” that’s more than enough. We’ll help you figure out the rest — one smart connection at a time."
      }
    },
    {
      "@type": "Question",
      "name": "What kind of freelancers, service providers, or mentors can I find on ScaleDux?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "From startup mentors to full-stack developers — ScaleDux brings together the people who help you move forward. You’ll find: Tech talent — developers, product managers, UI/UX designers; Growth experts — marketers, brand strategists, GTM specialists; Business pros — legal, compliance, finance, and fundraising support; Mentors — not just for advice, but for real startup building. This isn’t surface-level guidance or 15-minute calls. We’re redefining what mentorship means for founders. Personalized, hands-on support to help you figure out whatever you’re stuck on: GTM strategy, tech stack decisions, building your first team, refining your product roadmap, or choosing the right AI model. Whatever you’re building — and wherever you are in the journey — you’ll find people who’ve been there, who get it, and who are ready to walk with you. Every profile is verified. Every connection is built on trust. This is startup support, the way it should be."
      }
    },
    {
      "@type": "Question",
      "name": "Can ScaleDux help me connect with investors?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — and you don’t need a pitch deck on day one to start that journey. ScaleDux helps founders connect with early-stage investors in a smarter, more intentional way. You can opt in when you’re ready — whether that’s at idea stage, MVP, or after launch. We guide you through it step-by-step: Preparing your profile and pitch; Matching with relevant investors based on stage and sector; Creating a warm, trust-first connection — not cold DMs. When you’re ready to raise, ScaleDux helps you show up prepared and seen. Investor discovery shouldn’t feel like a numbers game. Here, it’s about the right fit — for both founders and investors."
      }
    },
    {
      "@type": "Question",
      "name": "How does ScaleDux ensure trust and safety?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We built ScaleDux around one core principle: not everyone gets in. And that’s a good thing. Unlike open marketplaces where anyone can sign up and start bidding or posting, ScaleDux is intentionally gated. Every founder, freelancer, investor, or mentor must pass a mandatory verification process — not just their email, but their identity, their business legitimacy, and their intent to build or contribute meaningfully. If you're here to grow, we welcome you. If you're here to spam, extract, or fake credibility — you're out before you begin. Verified IDs and business documents; Trust badges for top contributors; Escrow-protected payments (coming soon); Peer reviews that actually matter — because they come from verified users, not fake accounts. We’re not building a crowd. We’re building a curated network you can rely on. Because in the startup world, one wrong connection can cost more than money — it can cost momentum, trust and growth. ScaleDux is here to protect that."
      }
    },
    {
      "@type": "Question",
      "name": "Do I need to have a registered company to use ScaleDux?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Not at all. You don’t need a company, pitch deck, or fancy website to get started here. All you need is the intention to build — and the courage to take the first step. If you're obsessing over a problem and believe it needs solving — that’s more than enough to join ScaleDux. Because we know real founders don’t start with paperwork. They start with a spark — and a lot of questions. That’s why ScaleDux is built to support you across every step of the journey: From idea validation and market research; To finding your first teammate or freelancer; All the way to fundraising, scaling, and beyond. So no, you don’t need a company. But if you have a dream and you're ready to take action — you’re already in the right place."
      }
    },
    {
      "@type": "Question",
      "name": "What makes ScaleDux better than managing everything on LinkedIn, Upwork, and WhatsApp?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You might be thinking — why switch from what I already know? LinkedIn for networking, Upwork for hiring, WhatsApp for follow-ups. But if your startup stack includes 7 tabs and a prayer... we get it. You start on LinkedIn to find talent or investors, switch to Upwork to post a project, juggle conversations on WhatsApp, and chase updates across emails, DMs, and spreadsheets. Before you know it, you're managing tools more than your actual startup. ScaleDux replaces that chaos with one platform — built for real-world startup workflows. Verified talent, mentors, and investors — in one place; Because searching ≠ qualifying ≠ collaborating — we bridge all three; Smart matching that saves 20+ hours/week; In-platform collaboration, feedback, and (soon) escrow payments; A trust-first ecosystem: no noise, no spam, no shady profiles. We're not just aggregating services. We’re designing the infrastructure founders actually need — from idea to funding — without the friction."
      }
    },
    {
      "@type": "Question",
      "name": "What happens after I join the waitlist?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You’ll receive a confirmation and welcome email in your inbox — along with a quiet thank you for being early. Then, we’ll keep you in the loop with early updates, behind-the-scenes progress, and real stories from the journey. We’ll also invite you to join our private Slack channel, where early users hang out, share feedback, and stay close to everything as it unfolds. This isn’t just a mailing list. It’s an invitation to help shape what ScaleDux becomes. Have thoughts? Ideas? Frustrations with other platforms? We want to hear them. Your input could directly influence what we build next. So what happens after you join? You become part of the crew building something better — together."
      }
    }
  ]
}
</script>

@endsection
