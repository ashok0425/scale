@extends('frontend.layout.app')
@section('content')
       <main class="relative py-9">
      <div class="container px-2">
        <div class="mb-7 space-y-6 md:mb-12">
          <div class="flex items-center gap-3">
            <a href="/" class="cursor-pointer text-white underline hover:text-gray-300">Home</a>
            <img src="{{ asset('frontend/images/arrow-right.svg') }}" alt="" />
            <a href="/blog" class="cursor-pointer text-white underline hover:text-gray-300"
              >{{$blog->category->name}}</a
            >
            <img src="{{ asset('frontend/images/arrow-right.svg') }}" alt="" />
            <span>{{$blog->title}}</span>
          </div>
          <h1 class="dh-2">{{$blog->title}}</h1>
          <p class="b2 text-light font-medium">{{Carbon\Carbon::parse($blog->created_at)->format('d M ,Y')}} - {{$blog->read_time}} min read</p>
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
          class="mb-9 aspect-video max-h-[540px] w-full overflow-clip rounded-3xl p-[90px] pb-[26px] sm:mb-16 md:mb-[100px]" style="background-image: url('{{ asset('frontend/images/blog-detail.png') }}') !important;"
>
          <h2
            class="max-w-[14ch] text-3xl leading-[1.31] font-bold text-balance sm:text-4xl md:text-5xl lg:text-6xl"
          >
            {{$blog->title}}
          </h2>
          <p class="mt-5">Written by: Vivin Richard</p>
          <div class="mt-10 flex justify-end">
            <span>Updated: {{Carbon\Carbon::parse($blog->created_at)->format('d.m.Y')}}</span>
          </div>

        </div>
        <div class="relative isolate grid grid-cols-12 gap-8 md:gap-12">

          <div class="max-sm:hidden sm:col-span-4 md:col-span-3">
            <div class="sticky top-28 space-y-6">
              <h2 class="heading-2">Table of Content</h2>
              <div
                class="relative isolate space-y-6 before:absolute before:-z-10 before:h-full before:w-px before:bg-[#DEDEDE]"
              >
                @foreach ($toc as $t)
                                      <a href="#{{$t['id']}}"><p class="b3 text-light px-3 font-semibold">{{$t['text']}}</p></a>

                @endforeach
              </div>
            </div>
          </div>
          <div
            class="[&_p]:b1 [&_p]:text-body-2 col-span-12 space-y-6 sm:col-span-7 md:col-span-8 [&_p]:leading-8 [&_p]:font-normal"
          >
            <div class="space-y-3">
              <audio controls class="w-full">
                <source src="{{getImage($blog->audio)}}" type="audio/mpeg" />
              </audio>
              <p class="b3 text-light text-center text-sm">Play audio transcript here</p>
            </div>
                {!! $blog->long_description !!}


          </div>
        </div>


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
          <div class="swiper related-articles">
            <div id="article-next" class="swiper-button-next !hidden"></div>
            <div id="article-prev" class="swiper-button-prev !hidden"></div>
            <div class="swiper-wrapper">
                 @foreach ($blogs as $blog)
                <div class="blog-card-wrapper swiper-slide">
                <a href="/read-blog">
                  <div class="blog-card-thumbnail">
                    <img
                      src="{{ getImage($blog->thumbnail) }}"
                      alt=""
                      class="aspect-[3/2] w-full object-cover"
                    />
                  </div>
                  <div class="blog-card-body">
                    <div
                      class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-6"
                    >
                      <p class="b3 w-fit font-semibold text-white uppercase">{{$blog->category->name}}</p>
                      <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                      <p class="b3 text-body-2 w-fit font-medium uppercase">{{$blog->read_time}} Min Read</p>
                    </div>
                    <h5 class="dh-5 mt-3">
                      {{$blog->title}}
                    </h5>
                    <p class="b3 text-light">
                      {{$blog->short_description}}
                    </p>
                  </div>
                </a>
              </div>

            @endforeach
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
@push('style')
    <style>
        html,body {
  scroll-behavior: smooth;
}
    </style>
@endpush
