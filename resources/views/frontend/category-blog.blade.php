@extends('frontend.layout.app')
@section('content')
     <main class="pt-8">
         <div class="container">
        {{-- <div class="flex max-w-full items-center justify-between gap-6 overflow-auto"> --}}
          <div class="flex items-center gap-4">
             <a href="{{route('blog')}}">
             <span
              class=" {{request()->path()=='blogs'?'bg-brand-purple':'gradient-border '}} font-inter cursor-pointer rounded-4xl px-3 py-2 text-xs whitespace-nowrap text-white"
            >
            View All
            </span>
           </a>
          @foreach ($categories as $category)
               <a href="{{route('category',['slug'=>$category->slug])}}">
             <span
              class="{{request()->slug==$category->slug?'bg-brand-purple':'gradient-border '}} font-inter cursor-pointer rounded-4xl px-3 py-2 text-xs whitespace-nowrap text-white"
            >
            {{$category->name}}
            </span>
           </a>
          @endforeach

          </div>
        {{-- </div> --}}

          <div class="has-divide grid grid-cols-1 gap-x-8 spacey-5  my-10  sm:gap-y-12 md:grid-cols-3">
            @foreach ($category->blogs()->where('status',1)->latest()->limit(2)->get() as $blog)
                 <div class="blog-card-wrapper">
              <a href="{{route('blog.detail',['slug'=>$blog->slug])}}">
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

      </section>
    </main>
@endsection
