@extends('frontend.layout.app')
@section('content')
     <main class="pt-8">
      <div class="container">
        <div class="flex max-w-full items-center justify-between gap-6 overflow-auto">
          <div class="flex items-center gap-4">
             <a href="">
             <span
              class="bg-brand-purple font-inter cursor-pointer rounded-4xl px-3 py-2 text-xs whitespace-nowrap text-white"
            >
            View All
            </span>
           </a>
          @foreach ($categories as $category)
               <a href="">
             <span
              class="bg-brand-purple font-inter cursor-pointer rounded-4xl px-3 py-2 text-xs whitespace-nowrap text-white"
            >
            {{$category->name}}
            </span>
           </a>
          @endforeach

          </div>
          <div class="gradient-border overflow-clip rounded-md">
            <select
              class="font-inter cursor-pointer border-none py-2 !pr-10 pl-3 text-xs whitespace-nowrap"
            >
              <option value="">Sort By</option>
              <option value="latest">Latest</option>
              <option value="oldest">Oldest</option>
            </select>
          </div>
        </div>
      </div>
      <section class="container my-10 sm:my-16 md:my-[100px]">
        @if ($featureBlog)
         <div class="flex flex-col gap-8 sm:flex-row">
          <div class="fex-1">
            <div class="blog-card-wrapper">
              <a href="{{route('blog.detail',['slug'=>$featureBlog->slug])}}">
                <div class="blog-card-thumbnail">
                  <img
                    src="{{ getImage($featureBlog->thumbnail) }}"
                    alt=""
                    class="w-full object-cover sm:min-h-[410px]"
                  />
                </div>
                <div class="blog-card-body">
                  <div
                    class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-4"
                  >
                    <p class="b3 w-fit font-semibold text-white uppercase">{{$featureBlog->category->name}}</p>
                    <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                    <p class="b3 text-body-2 w-fit font-medium uppercase">{{$featureBlog->read_time}} Min Read</p>
                  </div>
                  <h5 class="dh-5 my-3">
                    {{$featureBlog->title}}
                  </h5>
                  <p class="b3 text-light">
                    {{$featureBlog->short_description}}

                  </p>
                </div>
              </a>
            </div>
          </div>
          <div class="fex-1 flex flex-col gap-8">
            <h2 class="heading-2 border-brand-purple border-b">Featured posts</h2>
            @foreach ($featuresPost as $post)
                  <div class="blog-card-wrapper">
              <a href="{{route('blog.detail',['slug'=>$post->slug])}}">
                <div class="blog-card-body">
                  <div
                    class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-4"
                  >
                    <p class="b3 w-fit font-semibold text-white uppercase">{{$post->category->name}}</p>
                    <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                    <p class="b3 text-body-2 w-fit font-medium uppercase">{{$post->read_time}} Min Read</p>
                  </div>
                  <h5 class="dh-5 my-3">
{{$post->title}}                  </h5>
                  <p class="b3 text-light">
                    {{$post->short_description}}
                  </p>
                </div>
              </a>
            </div>
            @endforeach


          </div>
        </div>
        @endif

        <div
          class="my-7 grid grid-cols-1 gap-x-8 gap-y-7 sm:my-12 sm:grid-cols-2 sm:gap-y-12 md:grid-cols-4"
        >
        @foreach ($features as $feature)
            <div class="blog-card-wrapper">
            <a href="{{route('blog.detail',['slug'=>$feature->slug])}}">
              <div class="blog-card-thumbnail">
                <img src="{{ getImage($feature->thumbnail) }}" alt="" class="aspect-[3/2] w-full object-cover" />
              </div>
              <div class="blog-card-body">
                <div
                  class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-4"
                >
                  <p class="b3 w-fit font-semibold text-white uppercase">{{$feature->category->name}}</p>
                  <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                  <p class="b3 text-body-2 w-fit font-medium uppercase">{{$feature->read_time}} Min Read</p>
                </div>
                <h5 class="dh-5 my-3">
                 {{$feature->title}}
                </h5>
                <p class="b3 text-light">
                 {{$feature->short_description}}
                </p>
              </div>
            </a>
          </div>
        @endforeach

        </div>

        @foreach ($categories as $category)
        @if ($loop->odd)

             <div class="my-7 space-y-12 sm:my-12">
          <div class="border-brand-purple flex items-center justify-between gap-4 border-b">
            <h2 class="heading-2">{{$category->name}}</h2>
            <a href="#" class="heading-2 duration-200 hover:text-white/70">See More</a>
          </div>
          <div class="has-divide grid grid-cols-1 gap-x-8 gap-y-7 sm:gap-y-12 md:grid-cols-3">
            @foreach ($category->blogs()->where('status',1)->latest()->limit(2)->get() as $blog)
                 <div class="blog-card-wrapper">
              <a href="{{route('blog.detail',['slug'=>$featureBlog->slug])}}">
                <div class="blog-card-body">
                  <div
                    class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-4"
                  >
                    <p class="b3 w-fit font-semibold text-white uppercase">{{$category->name}}</p>
                    <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                    <p class="b3 text-body-2 w-fit font-medium uppercase">{{$blog->read_time}} Min Read</p>
                  </div>
                  <h5 class="dh-5 my-3">
                    {{$blog->title}}
                  </h5>
                  <p class="b3 text-light">
            {{$blog->short_description}}
                  </p>
                </div>
              </a>
            </div>
            @endforeach

            <div
              class="gradient-border before:bg-brand-purple after:bg-triangles relative isolate row-span-2 flex items-center justify-center overflow-hidden rounded-3xl p-6 before:absolute before:top-0 before:left-0 before:z-10 before:aspect-square before:size-1/3 before:bg-repeat before:blur-3xl after:absolute after:top-0 after:left-0 after:z-10 after:aspect-square after:size-1/2 after:bg-repeat"
            >
              <div class="isolate z-10 overflow-hidden">
                <div class="mx-auto max-w-[80ch] space-y-3 text-center">
                  <h3 class="dh-3">Join our waitlist</h3>
                  <p class="b1 leading-[33px] font-normal text-white">
                    Be the first among the ones who get access to our exclusive marketplace.
                  </p>
                </div>
                <div class="mx-auto mt-6 w-full">
                  <from method="POST" action="{{route('waitlist.store')}}"
                    class="flex w-full flex-col flex-wrap items-center justify-center gap-3 sm:flex-row"
                  >
                  @csrf
                    <input class="w-full" type="text" required placeholder="Enter full name" name="full_name"/>
                    <input class="w-full" type="email" required placeholder="Enter your email" name="email"/>
                    <select class="w-full min-w-[250px]" required name="rol">
                      <option value="">Select your role</option>
                      <option value="founder">Founder/Aspiring Founder</option>
                      <option value="freelancer">Freelancer/Agency</option>
                      <option value="investor">Investor</option>
                      <option value="mentor">Mentor</option>
                    </select>
                    <button
                      type="submit"
                      class="btn-primary hover:shadow-brand-purple/60 group w-full hover:shadow-lg"
                    >
                      <span class="inner-wrapper inline-flex h-6 overflow-hidden">
                        <span
                          class="inner flex flex-col duration-200 group-hover:-translate-y-full"
                        >
                          <span class="text">Get Priority Access</span>
                          <span class="text">Get Priority Access</span>
                        </span>
                      </span>
                    </button>
                  </from>
                </div>
              </div>
            </div>

              @foreach ($category->blogs()->where('status',1)->latest()->skip(2)->limit(2)->get() as $blog)
                 <div class="blog-card-wrapper">
              <a href="{{route('blog.detail',['slug'=>$featureBlog->slug])}}">
                <div class="blog-card-body">
                  <div
                    class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-4"
                  >
                    <p class="b3 w-fit font-semibold text-white uppercase">{{$category->name}}</p>
                    <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                    <p class="b3 text-body-2 w-fit font-medium uppercase">{{$blog->read_time}} Min Read</p>
                  </div>
                  <h5 class="dh-5 my-3">
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
        @else


        <div class="my-7 space-y-12 sm:my-12">
          <div class="border-brand-purple flex items-center justify-between gap-4 border-b">
            <h2 class="heading-2">{{$category->name}}</h2>
            <a href="#" class="heading-2 duration-200 hover:text-white/70">See More</a>
          </div>
          <div
            class="has-divide grid grid-cols-1 gap-x-8 gap-y-7 sm:grid-cols-2 sm:gap-y-12 md:grid-cols-3"
          >
  @foreach ($category->blogs()->where('status',1)->latest()->limit(6)->get() as $blog)
                 <div class="blog-card-wrapper">
              <a href="{{route('blog.detail',['slug'=>$featureBlog->slug])}}">
                <div class="blog-card-body">
                  <div
                    class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-4"
                  >
                    <p class="b3 w-fit font-semibold text-white uppercase">{{$category->name}}</p>
                    <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                    <p class="b3 text-body-2 w-fit font-medium uppercase">{{$blog->read_time}} Min Read</p>
                  </div>
                  <h5 class="dh-5 my-3">
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
        @endif

        @endforeach

      </section>

      <section class="bg-[#12002B] py-[72px]">
        <div class="container">
          <div class="mb-8 space-y-3 text-center">
            <h3 class="text-text-light text-2xl font-semibold sm:text-3xl md:text-4xl">
              Explore more topics
            </h3>
            <p class="b3 text-light">Here you will find more topics</p>
          </div>
          <div class="swiper explore-topics">
            <div
              id="explore-next"
              class="swiper-button-next border-primary text-primary aspect-square !size-7 rounded-full border after:!hidden"
            >
              <i data-lucide="arrow-right" class="!size-4"></i>
            </div>
            <div
              id="explore-prev"
              class="swiper-button-prev border-primary text-primary aspect-square !size-7 rounded-full border after:!hidden"
            >
              <i data-lucide="arrow-left" class="!size-4"></i>
            </div>
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                     <div class="swiper-slide space-y-3">
                <img src="{{ getImage($category->thumbnail) }}" alt="" class="aspect-[3/2] w-full object-cover" />
                <h5 class="heading-5 text-center">{{$category->name}}</h5>
              </div>
                @endforeach
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
