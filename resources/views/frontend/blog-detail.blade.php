@extends('frontend.layout.app')
@section('content')
       <main class="relative py-9">
      <div class="container px-2">
        <div class="mb-7 space-y-6 md:mb-12">
          <div class="flex items-center gap-3">
            <a href="/" class="cursor-pointer text-white underline hover:text-gray-300">Home</a>
            <img src="{{ asset('frontend/images/arrow-right.svg') }}" alt="" />
            <a href="/blog" class="cursor-pointer text-white underline hover:text-gray-300"
              >Project management</a
            >
            <img src="{{ asset('frontend/images/arrow-right.svg') }}" alt="" />
            <span>Project accounting: Best practices, tools, and tips</span>
          </div>
          <h2 class="dh-2">Project accounting: Best practices, tools, and tips</h2>
          <p class="b2 text-light font-medium">March 11, 2025 - 10 min read</p>
          <div class="flex items-center justify-between gap-x-4">
            <div class="flex items-center gap-3">
              <div class="size-[52px] overflow-clip rounded-full bg-[#CFC3A7]">
                <img src="{{ asset('frontend/images/author.png') }}" alt="" class="size-[52px]" />
              </div>
              <div class="space-y-1">
                <p class="b2 text-light font-semibold">By John Doe</p>
                <p class="b3 text-light">Co-founder, ScaleDux</p>
              </div>
            </div>
            <button class="flex cursor-pointer items-center gap-3 duration-200 hover:opacity-80">
              <img src="{{ asset('frontend/images/share.svg') }}" alt="" class="size-6" />
              <span class="b3 text-light text-sm">Save</span>
            </button>
          </div>
        </div>
        <div
          class="mb-9 aspect-video max-h-[540px] w-full overflow-clip rounded-3xl [background-image:url(/images/blog-detail.png)] p-[90px] pb-[26px] sm:mb-16 md:mb-[100px]"
        >
          <h2
            class="max-w-[14ch] text-3xl leading-[1.31] font-bold text-balance sm:text-4xl md:text-5xl lg:text-6xl"
          >
            Project accounting: Best practices, tools, and tips View all
          </h2>
          <p class="mt-5">Written by: Vivin Richard</p>
          <div class="mt-10 flex justify-end">
            <span>Updated: 12.02.2027</span>
          </div>
          <!-- <img
            src="{{ asset('frontend/images/blog-detail.png') }}"
            alt=""
            class="aspect-video max-h-[540px] w-full object-cover"
          /> -->
        </div>
        <div class="relative isolate grid grid-cols-12 gap-8 md:gap-12">
          <!-- <div
            class="funky-gradient absolute -right-[280px] bottom-[10%] z-10 max-w-[340px] rounded-xl p-[2px]"
          >
            <div class="bg-deep-indigo rounded-xl p-6">
              <div class="isolate z-10 w-full space-y-6">
                <div class="space-y-3 text-center">
                  <h3 class="text-xl font-bold">Cheat Sheet</h3>
                  <p class="text-right text-sm text-white">
                    Be the first among the ones who get access to our exclusive marketplace
                  </p>
                </div>
                <button type="submit" class="btn-orange">Get Priority Access</button>
              </div>
            </div>
          </div> -->
          <div class="max-sm:hidden sm:col-span-4 md:col-span-3">
            <div class="sticky top-28 space-y-6">
              <h2 class="heading-2">Table of Content</h2>
              <div
                class="relative isolate space-y-6 before:absolute before:-z-10 before:h-full before:w-px before:bg-[#DEDEDE]"
              >
                <div class="content-group space-y-6">
                  <p class="b3 text-light border-brand-blue border-l px-3 font-semibold">
                    Organize your Contacts
                  </p>
                  <p class="b3 text-body-2 px-6">Organize your Contacts</p>
                </div>
                <div class="content-group space-y-6">
                  <p class="b3 text-light px-3 font-semibold">Organize your Contacts</p>
                  <p class="b3 text-body-2 px-6">Utilise multimedia features</p>
                  <p class="b3 text-body-2 px-6">Be mindful of privacy settings</p>
                  <p class="b3 text-body-2 px-6">Customize notifications</p>
                </div>
                <div class="content-group space-y-6">
                  <p class="b3 text-light px-3 font-semibold">Organize your Contacts</p>
                  <p class="b3 text-body-2 px-6">Embrace emojis and GIFss</p>
                  <p class="b3 text-body-2 px-6">Backup your conversations</p>
                  <p class="b3 text-body-2 px-6">Practice digital etiquette</p>
                </div>
              </div>
            </div>
          </div>
          <div
            class="[&_p]:b1 [&_p]:text-body-2 col-span-12 space-y-6 sm:col-span-7 md:col-span-8 [&_p]:leading-8 [&_p]:font-normal"
          >
            <div class="space-y-3">
              <audio controls class="w-full">
                <source src="" type="audio/mpeg" />
              </audio>
              <p class="b3 text-light text-center text-sm">Play audio transcript here</p>
            </div>
            <h2 class="heading-2">Organize your Contacts</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur. Libero dignissim ut nulla a orci tempor.
              Egestas ultricies ornare tellus risus. Egestas imperdiet nulla in facilisi. Tortor
              consectetur tortor morbi mauris diam elementum sed. Sem massa fermentum augue mattis
              netus. Egestas at fames magna pharetra consectetur lectus leo proin proin. Eu sem sem
              aenean adipiscing tincidunt. Ultrices odio congue tortor posuere eros facilisis eu
              diam sed. Nunc nulla ac tortor eleifend vitae placerat. Mauris viverra leo tellus
              porta sem adipiscing vestibulum odio morbi. Ut commodo ullamcorper consectetur sociis.
              Sodales non at eget porttitor fermentum. Commodo velit velit porta morbi eu elementum
              pretium massa platea. Facilisis facilisi eleifend auctor nec neque in molestie.
              Iaculis a porta neque sit. Adipiscing tempor nec pellentesque non scelerisque feugiat
              ut. Habitant porttitor amet enim risus ultrices nec. Ipsum malesuada rhoncus elit et
              blandit tempus nulla eget. Odio velit id quis arcu nibh felis. Ridiculus vel et
              tristique eros proin pellentesque. Curabitur luctus tempus nibh velit et mattis. Urna
              blandit id lorem facilisis. Commodo arcu pulvinar eu posuere non senectus vestibulum.
              Massa consectetur feugiat felis facilisi. Et a ac eget arcu quam condimentum. Dictum
              leo amet eu etiam morbi. Blandit ullamcorper egestas ultrices aliquet vel est. Lacinia
              molestie fermentum vivamus consequat consectetur habitasse id est. Tortor porta
              egestas curabitur euismod. Ut eu tincidunt bibendum feugiat at suscipit. Venenatis
              vitae pharetra pharetra lobortis tortor id mus nam. Tincidunt vitae lectus eget ut.
              Nisi sollicitudin massa arcu consequat feugiat. At neque vitae diam urna.
            </p>
            <div
              class="gradient-border before:top-corner-fade after:bg-triangles relative isolate flex items-center justify-center overflow-hidden rounded-3xl px-6 py-[50px] before:absolute before:top-0 before:-left-0 before:z-10 before:h-full before:w-1/2 before:bg-no-repeat before:blur-3xl after:absolute after:top-0 after:left-0 after:z-10 after:aspect-square after:h-full after:bg-no-repeat"
            >
              <div class="isolate z-10 overflow-hidden">
                <div class="mx-auto max-w-[80ch] space-y-3 text-center">
                  <h3 class="dh-4">Join our waitlist</h3>
                  <p class="b1 leading-[33px] text-white">
                    Be the first among the ones who get access to our exclusive marketplace.
                  </p>
                </div>
                <div class="mx-auto mt-6 sm:w-fit">
                  <from
                    class="flex flex-col flex-wrap items-center justify-center gap-3 sm:flex-row"
                  >
                    <input
                      class="max-sm:w-full"
                      type="text"
                      required
                      placeholder="Enter full name"
                    />
                    <input
                      class="max-sm:w-full"
                      type="email"
                      required
                      placeholder="Enter your email"
                    />
                    <button type="submit" class="btn-primary max-sm:w-full">
                      Get Priority Access
                    </button>
                  </from>
                </div>
              </div>
            </div>
            <h2 class="heading-2">Master the art of group chats</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur. Libero dignissim ut nulla a orci tempor.
              Egestas ultricies ornare tellus risus. Egestas imperdiet nulla in facilisi. Tortor
              consectetur tortor morbi mauris diam elementum sed. Sem massa fermentum augue mattis
              netus. Egestas at fames magna pharetra consectetur lectus leo proin proin. Eu sem sem
              aenean adipiscing tincidunt. Ultrices odio congue tortor posuere eros facilisis eu
              diam sed. Nunc nulla ac tortor eleifend vitae placerat. Mauris viverra leo tellus
              porta sem adipiscing vestibulum odio morbi. Ut commodo ullamcorper consectetur sociis.
              Sodales non at eget porttitor fermentum. Commodo velit velit porta morbi eu elementum
              pretium massa platea. Facilisis facilisi eleifend auctor nec neque in molestie.
              Iaculis a porta neque sit. Adipiscing tempor nec pellentesque non scelerisque feugiat
              ut. Habitant porttitor amet enim risus ultrices nec. Ipsum malesuada rhoncus elit et
              blandit tempus nulla eget. Odio velit id quis arcu nibh felis. Ridiculus vel et
              tristique eros proin pellentesque. Curabitur luctus tempus nibh velit et mattis. Urna
              blandit id lorem facilisis. Commodo arcu pulvinar eu posuere non senectus vestibulum.
              Massa consectetur feugiat felis facilisi. Et a ac eget arcu quam condimentum. Dictum
              leo amet eu etiam morbi. Blandit ullamcorper egestas ultrices aliquet vel est. Lacinia
              molestie fermentum vivamus consequat consectetur habitasse id est. Tortor porta
              egestas curabitur euismod. Ut eu tincidunt bibendum feugiat at suscipit. Venenatis
              vitae pharetra pharetra lobortis tortor id mus nam. Tincidunt vitae lectus eget ut.
              Nisi sollicitudin massa arcu consequat feugiat. At neque vitae diam urna.
            </p>
            <div
              class="before:brand-gradient relative rounded-lg bg-gradient-to-r from-[#100548] to-[#1c0441] px-14 py-8 before:!absolute before:-inset-[2px] before:-z-10 before:rounded-lg"
            >
              <div class="isolate z-10 overflow-hidden">
                <img
                  src="{{ asset('frontend/images/cta-slash.svg') }}"
                  alt=""
                  class="absolute right-0 -z-10 opacity-50 max-md:bottom-0 md:bottom-0"
                />
                <div class="max-w-[464px] space-y-4">
                  <h4 class="dh-4">Fast-track your Startup Journey</h4>
                  <ul class="grid grid-cols-1 gap-x-8 gap-y-3 sm:grid-cols-2">
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>Instant Verification and Launch</span>
                    </li>
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
                      <span>Investor fast track program</span>
                    </li>
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>VIP Support Channel</span>
                    </li>
                    <li class="b3 flex gap-2 text-white">
                      <img src="{{ asset('frontend/images/lock.svg') }}" alt="" class="size-6" />
                      <span>VIP Support Channel</span>
                    </li>
                  </ul>
                  <button
                    type="submit"
                    class="btn-primary hover:shadow-brand-purple/60 group w-full hover:shadow-lg sm:w-3/4"
                  >
                    <span class="inner-wrapper inline-flex h-6 overflow-hidden">
                      <span class="inner flex flex-col duration-200 group-hover:-translate-y-full">
                        <span class="text">Join our Waitlist</span>
                        <span class="text">Join our Waitlist</span>
                      </span>
                    </span>
                  </button>
                </div>
              </div>
            </div>
            <h2 class="heading-2">Master the art of group chats</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur. Libero dignissim ut nulla a orci tempor.
              Egestas ultricies ornare tellus risus. Egestas imperdiet nulla in facilisi. Tortor
              consectetur tortor morbi mauris diam elementum sed. Sem massa fermentum augue mattis
              netus. Egestas at fames magna pharetra consectetur lectus leo proin proin. Eu sem sem
              aenean adipiscing tincidunt. Ultrices odio congue tortor posuere eros facilisis eu
              diam sed. Nunc nulla ac tortor eleifend vitae placerat. Mauris viverra leo tellus
              porta sem adipiscing vestibulum odio morbi. Ut commodo ullamcorper consectetur sociis.
              Sodales non at eget porttitor fermentum. Commodo velit velit porta morbi eu elementum
              pretium massa platea. Facilisis facilisi eleifend auctor nec neque in molestie.
              Iaculis a porta neque sit. Adipiscing tempor nec pellentesque non scelerisque feugiat
              ut. Habitant porttitor amet enim risus ultrices nec. Ipsum malesuada rhoncus elit et
              blandit tempus nulla eget. Odio velit id quis arcu nibh felis. Ridiculus vel et
              tristique eros proin pellentesque. Curabitur luctus tempus nibh velit et mattis. Urna
              blandit id lorem facilisis. Commodo arcu pulvinar eu posuere non senectus vestibulum.
              Massa consectetur feugiat felis facilisi. Et a ac eget arcu quam condimentum. Dictum
              leo amet eu etiam morbi. Blandit ullamcorper egestas ultrices aliquet vel est. Lacinia
              molestie fermentum vivamus consequat consectetur habitasse id est. Tortor porta
              egestas curabitur euismod. Ut eu tincidunt bibendum feugiat at suscipit. Venenatis
              vitae pharetra pharetra lobortis tortor id mus nam. Tincidunt vitae lectus eget ut.
              Nisi sollicitudin massa arcu consequat feugiat. At neque vitae diam urna.
            </p>
            <img
              src="{{ asset('frontend/images/blog.png') }}"
              alt=""
              class="max-h-[290px] w-full rounded-3xl object-cover"
            />
            <h2 class="heading-2">Organize your Contacts</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur. Libero dignissim ut nulla a orci tempor.
              Egestas ultricies ornare tellus risus. Egestas imperdiet nulla in facilisi. Tortor
              consectetur tortor morbi mauris diam elementum sed. Sem massa fermentum augue mattis
              netus. Egestas at fames magna pharetra consectetur lectus leo proin proin. Eu sem sem
              aenean adipiscing tincidunt. Ultrices odio congue tortor posuere eros facilisis eu
              diam sed. Nunc nulla ac tortor eleifend vitae placerat. Mauris viverra leo tellus
              porta sem adipiscing vestibulum odio morbi. Ut commodo ullamcorper consectetur sociis.
              Sodales non at eget porttitor fermentum. Commodo velit velit porta morbi eu elementum
              pretium massa platea. Facilisis facilisi eleifend auctor nec neque in molestie.
              Iaculis a porta neque sit. Adipiscing tempor nec pellentesque non scelerisque feugiat
              ut. Habitant porttitor amet enim risus ultrices nec. Ipsum malesuada rhoncus elit et
              blandit tempus nulla eget. Odio velit id quis arcu nibh felis. Ridiculus vel et
              tristique eros proin pellentesque. Curabitur luctus tempus nibh velit et mattis. Urna
              blandit id lorem facilisis. Commodo arcu pulvinar eu posuere non senectus vestibulum.
              Massa consectetur feugiat felis facilisi. Et a ac eget arcu quam condimentum. Dictum
              leo amet eu etiam morbi. Blandit ullamcorper egestas ultrices aliquet vel est. Lacinia
              molestie fermentum vivamus consequat consectetur habitasse id est. Tortor porta
              egestas curabitur euismod. Ut eu tincidunt bibendum feugiat at suscipit. Venenatis
              vitae pharetra pharetra lobortis tortor id mus nam. Tincidunt vitae lectus eget ut.
              Nisi sollicitudin massa arcu consequat feugiat. At neque vitae diam urna.
            </p>
            <div
              class="gradient-border before:from-brand-purple/40 before:to-brand-blue/40 relative isolate overflow-hidden rounded-3xl px-[26px] py-6 before:absolute before:inset-0 before:bg-gradient-to-l before:opacity-50"
            >
              <div class="flex flex-col items-center gap-8 md:flex-row">
                <img src="{{ asset('frontend/images/scaledux-book.png') }}" alt="" class="w-[160px] shrink-0" />
                <div class="isolate z-10 w-full space-y-6">
                  <div class="space-y-3 text-center">
                    <h3 class="dh-3">Download our Manual</h3>
                    <p class="b1 text-white">
                      Be the first among the ones who get access to our exclusive marketplace
                    </p>
                  </div>
                  <button type="submit" class="btn-orange">Get Priority Access</button>
                </div>
              </div>
              <!-- <div class="w-[5%] max-md:hidden"></div> -->
            </div>
          </div>
        </div>

        <!-- <div class="funky-gradient rounded-xl p-[2px]">
          <div class="bg-deep-indigo rounded-xl p-10">
            <div class="isolate z-10 w-full space-y-6">
              <div class="space-y-3 text-center">
                <h3 class="dh-3">Download our Manual</h3>
                <p class="b1 text-right text-white">
                  Be the first among the ones who get access to our exclusive marketplace
                </p>
              </div>
              <button type="submit" class="btn-orange">Get Priority Access</button>
            </div>
          </div>
        </div> -->

        <hr class="border-body-2 my-12 border-t" />

        <div class="space-y-14">
          <div class="flex items-center justify-between gap-4">
            <h3 class="dh-3">Related Articles</h3>
            <div class="flex items-center gap-4">
              <button
                class="cursor-pointer rounded-lg border border-white/30 p-3 duration-200 hover:bg-white/10 active:ring-1 active:ring-white/50"
                onclick="document.getElementById('article-prev').click()"
              >
                <i data-lucide="chevron-left"></i>
              </button>
              <button
                class="cursor-pointer rounded-lg border border-white/30 p-3 duration-200 hover:bg-white/10 active:ring-1 active:ring-white/50"
                onclick="document.getElementById('article-next').click()"
              >
                <i data-lucide="chevron-right"></i>
              </button>
            </div>
          </div>
          <!-- class="grid grid-cols-1 gap-x-8 gap-y-7 sm:mt-12 sm:grid-cols-2 sm:gap-y-12 md:grid-cols-3" -->
          <div class="swiper related-articles">
            <div id="article-next" class="swiper-button-next !hidden"></div>
            <div id="article-prev" class="swiper-button-prev !hidden"></div>
            <div class="swiper-wrapper">
              <div class="blog-card-wrapper swiper-slide">
                <a href="/read-blog">
                  <div class="blog-card-thumbnail">
                    <img
                      src="{{ asset('frontend/images/blog-thumb.png') }}"
                      alt=""
                      class="aspect-[3/2] w-full object-cover"
                    />
                  </div>
                  <div class="blog-card-body">
                    <div
                      class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-6"
                    >
                      <p class="b3 w-fit font-semibold text-white uppercase">project management</p>
                      <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                      <p class="b3 text-body-2 w-fit font-medium uppercase">10 Min Read</p>
                    </div>
                    <h5 class="dh-5 mt-3">
                      Start up kinetic rolls out money for building their robotaxis
                    </h5>
                    <p class="b3 text-light">
                      Lorem ipsum dolor sit amet consectetur. Lacus nunc at massa nullam potenti
                      luctus facilisis cras cursus. Ut sem turpis
                    </p>
                  </div>
                </a>
              </div>
              <div class="blog-card-wrapper swiper-slide">
                <a href="/read-blog">
                  <div class="blog-card-thumbnail">
                    <img
                      src="{{ asset('frontend/images/blog-thumb.png') }}"
                      alt=""
                      class="aspect-[3/2] w-full object-cover"
                    />
                  </div>
                  <div class="blog-card-body">
                    <div
                      class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-6"
                    >
                      <p class="b3 w-fit font-semibold text-white uppercase">project management</p>
                      <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                      <p class="b3 text-body-2 w-fit font-medium uppercase">10 Min Read</p>
                    </div>
                    <h5 class="dh-5 mt-3">
                      Start up kinetic rolls out money for building their robotaxis
                    </h5>
                    <p class="b3 text-light">
                      Lorem ipsum dolor sit amet consectetur. Lacus nunc at massa nullam potenti
                      luctus facilisis cras cursus. Ut sem turpis
                    </p>
                  </div>
                </a>
              </div>
              <div class="blog-card-wrapper swiper-slide">
                <a href="/read-blog">
                  <div class="blog-card-thumbnail">
                    <img
                      src="{{ asset('frontend/images/blog-thumb.png') }}"
                      alt=""
                      class="aspect-[3/2] w-full object-cover"
                    />
                  </div>
                  <div class="blog-card-body">
                    <div
                      class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-6"
                    >
                      <p class="b3 w-fit font-semibold text-white uppercase">project management</p>
                      <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                      <p class="b3 text-body-2 w-fit font-medium uppercase">10 Min Read</p>
                    </div>
                    <h5 class="dh-5 mt-3">
                      Start up kinetic rolls out money for building their robotaxis
                    </h5>
                    <p class="b3 text-light">
                      Lorem ipsum dolor sit amet consectetur. Lacus nunc at massa nullam potenti
                      luctus facilisis cras cursus. Ut sem turpis
                    </p>
                  </div>
                </a>
              </div>
              <div class="blog-card-wrapper swiper-slide">
                <a href="/read-blog">
                  <div class="blog-card-thumbnail">
                    <img
                      src="{{ asset('frontend/images/blog-thumb.png') }}"
                      alt=""
                      class="aspect-[3/2] w-full object-cover"
                    />
                  </div>
                  <div class="blog-card-body">
                    <div
                      class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-6"
                    >
                      <p class="b3 w-fit font-semibold text-white uppercase">project management</p>
                      <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                      <p class="b3 text-body-2 w-fit font-medium uppercase">10 Min Read</p>
                    </div>
                    <h5 class="dh-5 mt-3">
                      Start up kinetic rolls out money for building their robotaxis
                    </h5>
                    <p class="b3 text-light">
                      Lorem ipsum dolor sit amet consectetur. Lacus nunc at massa nullam potenti
                      luctus facilisis cras cursus. Ut sem turpis
                    </p>
                  </div>
                </a>
              </div>
              <div class="blog-card-wrapper swiper-slide">
                <a href="/read-blog">
                  <div class="blog-card-thumbnail">
                    <img
                      src="{{ asset('frontend/images/blog-thumb.png') }}"
                      alt=""
                      class="aspect-[3/2] w-full object-cover"
                    />
                  </div>
                  <div class="blog-card-body">
                    <div
                      class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-6"
                    >
                      <p class="b3 w-fit font-semibold text-white uppercase">project management</p>
                      <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                      <p class="b3 text-body-2 w-fit font-medium uppercase">10 Min Read</p>
                    </div>
                    <h5 class="dh-5 mt-3">
                      Start up kinetic rolls out money for building their robotaxis
                    </h5>
                    <p class="b3 text-light">
                      Lorem ipsum dolor sit amet consectetur. Lacus nunc at massa nullam potenti
                      luctus facilisis cras cursus. Ut sem turpis
                    </p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
