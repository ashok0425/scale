@extends('frontend.layout.app')
@php
    $popup=$blog->popup
@endphp
@section('content')
<main class="relative py-9">
  <div class="container px-2">
    <div class="mb-7 space-y-6 md:mb-12">
      <div class="flex items-center gap-3 breadcrum">
        <a href="{{route('blog')}}" class="cursor-pointer text-white underline hover:text-gray-300">Blogs</a>
        <img src="{{ asset('frontend/images/arrow-right.svg') }}" alt="{{$blog->title}}" />
        <a href="{{route('category',['slug'=>$blog->category->slug])}}" class="cursor-pointer text-white underline hover:text-gray-300">{{$blog->category->name}}</a>
        <img src="{{ asset('frontend/images/arrow-right.svg') }}" alt="{{$blog->title}}" />
        <span>{{$blog->title}}</span>
      </div>
      <h1 class="dh-2">{{$blog->title}}</h1>
      <p class="b2 text-light font-medium">{{Carbon\Carbon::parse($blog->created_at)->format('d M ,Y')}} - {{$blog->read_time}} min read</p>
      <div class="flex items-center justify-between gap-x-4">
        <div class="flex items-center gap-3">
          <div class="size-[52px] overflow-clip rounded-full bg-[#CFC3A7]">
            <img src="{{ getImage($blog->author_image)??asset('frontend/images/author.png') }}" alt="{{$blog->title}}" class="size-[52px]" />
          </div>
          <div class="space-y-1">
            <p class="b2 text-light font-semibold">By {{$blog->author}}</p>
            <p class="b3 text-light">{{$blog->author_post}}</p>
          </div>
        </div>
       <div class="relative inline-block">
  <button id="shareBtn" class="flex cursor-pointer items-center gap-3 duration-200 hover:opacity-80">
    <img src="{{ asset('frontend/images/share.svg') }}" alt="{{ $blog->title }}" class="size-6" />
    <span class="b3 text-light text-sm">Share</span>
  </button>

  <div id="shareOptions" class="hidden absolute right-0 mt-2 bg-gray-800 rounded-lg shadow-lg p-3 space-y-2 z-50 w-40 transition-opacity duration-200" style="background:linear-gradient(90deg,#2407f8,#7f04ff) 0/150% 400%;width:160px">
    <button id="closeShare" aria-label="Close share options" class="absolute top-1 right-1 text-white hover:text-red-400">
      &times;
    </button>
    <a href="#" class="flex items-center gap-2 text-white hover:text-blue-500" target="_blank" id="facebookShare">
      <img src="{{ asset('frontend/images/facebook.svg') }}" alt="Facebook" class="w-5 h-5" /> Facebook
    </a>
    <a href="#" class="flex items-center gap-2 text-white hover:text-blue-400" target="_blank" id="twitterShare">
      <img src="{{ asset('frontend/images/twitter.svg') }}" alt="Twitter" class="w-5 h-5" /> Twitter
    </a>
    <a href="#" class="flex items-center gap-2 text-white hover:text-blue-700" target="_blank" id="linkedinShare">
      <img src="{{ asset('frontend/images/linkedin.svg') }}" alt="LinkedIn" class="w-5 h-5" /> LinkedIn
    </a>
    <a href="#" class="flex items-center gap-2 text-white hover:text-green-500" target="_blank" id="whatsappShare">
      <img src="{{ asset('frontend/images/whatsapp.svg') }}" alt="WhatsApp" class="w-5 h-5" /> WhatsApp
    </a>
    <a href="#" class="flex items-center gap-2 text-white hover:text-pink-500" target="_blank" id="instagramShare">
      <img src="{{ asset('frontend/images/instagram.svg') }}" alt="Instagram" class="w-5 h-5" /> Instagram
    </a>
  </div>
</div>

      </div>
    </div>

    <div class="mb-9 aspect-video max-h-[540px] w-full overflow-clip rounded-3xl p-[90px] pb-[26px] sm:mb-16 md:mb-[100px] pad" style="background-image: url('{{ getImage($blog->cover)?? asset('frontend/images/blog-detail.png') }}') !important;background-position:center center" >
      {{-- <h2 class="max-w-[14ch] text-3xl leading-[1.31] font-bold text-balance sm:text-4xl md:text-5xl lg:text-6xl">
        {{$blog->title}}
      </h2> --}}
      {{-- <p class="mt-5">Written by: Vivin Richard</p> --}}
      <div class="mt-10 flex justify-end updated">
        <span>Updated: {{Carbon\Carbon::parse($blog->created_at)->format('d.m.Y')}}</span>
      </div>
    </div>

    <div class="relative isolate grid grid-cols-12 gap-8 md:gap-12">
      <div class="max-sm:hidden sm:col-span-4 md:col-span-3">
        <div class="sticky top-28 space-y-6">
          <h2 class="heading-2">Table of Content</h2>
          <div class="relative isolate space-y-6 before:absolute before:-z-10 before:h-full before:w-px before:bg-[#DEDEDE]">
          @php
function renderToc($items, $level = 0) {
    $padding = $level * 15;
    foreach ($items as $item) {
        // Only main items (level 0) get the white border
        $borderClass = $level === 0 ? 'main-toc-link' : '';
        echo '<ul style="padding-left:' . $padding . 'px;">';
        echo '<li>';
        echo '<a href="#' . e($item['id']) . '" class="toc-link ' . $borderClass . ' block pl-3 py-1 transition" data-id="' . e($item['id']) . '">' . e($item['title']) . '</a>';
        if (!empty($item['children'])) {
            renderToc($item['children'], $level + 1);
        }
        echo '</li>';
        echo '</ul>';
    }
}
@endphp


            <div class="toc-wrapper relative pl-6" style="border-left: 4px solid white;">
    @php renderToc($toc); @endphp
    <div id="active-indicator"></div>
</div>
          </div>
        </div>
      </div>

      <div class="[&_p]:b1 [&_p]:text-body-2 col-span-12 space-y-6 sm:col-span-7 md:col-span-8 [&_p]:leading-8 [&_p]:font-normal">
        <div class="space-y-3">

      @if ($blog->audio&&getImage($blog->audio))
    <audio controls class="custom-audio">
        <source src="{{ getImage($blog->audio) }}" type="audio/mpeg" />
    </audio>
          <p class="b3 text-light text-center text-sm">Play audio transcript here</p>

@endif


        </div>
        <div class="blog-content">
            {!! $blogWithIds ?? $blog->long_description !!}
        </div>
      </div>
    </div>

    <hr class="border-body-2 my-12 border-t" />

    <div class="space-y-14">
      <div class="flex items-center justify-between gap-4">
        <h3 class="dh-3">Related Articles</h3>
        <div class="flex items-center gap-4">
          <button class="cursor-pointer rounded-lg border border-white/30 p-3 duration-200 hover:bg-white/10 active:ring-1 active:ring-white/50" onclick="document.getElementById('article-prev').click()">
            <i data-lucide="chevron-left"></i>
          </button>
          <button class="cursor-pointer rounded-lg border border-white/30 p-3 duration-200 hover:bg-white/10 active:ring-1 active:ring-white/50" onclick="document.getElementById('article-next').click()">
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
              <a href="{{route('blog.detail',['slug'=>$blog->slug])}}">
                <div class="blog-card-thumbnail">
                  <img src="{{ getImage($blog->thumbnail) }}" alt="{{$blog->title}}" class="aspect-[3/2] w-full object-cover" />
                </div>
                <div class="blog-card-body">
                  <div class="flex flex-col flex-wrap items-center gap-1 max-sm:items-start sm:flex-row sm:gap-x-6">
                    <p class="b3 w-fit font-semibold text-white uppercase">{{$blog->category->name}}</p>
                    <span class="size-1 rounded-full bg-white max-sm:hidden"></span>
                    <p class="b3 text-body-2 w-fit font-medium uppercase">{{$blog->read_time}} Min Read</p>
                  </div>
                  <h5 class="dh-5 mt-3">{{$blog->title}}</h5>
                  <p class="b3 text-light">{{$blog->short_description}}</p>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  @if ($popup)

 <div class="popup  flex justify-center" style="display: none">
  <div
    class="gradient-border before:from-brand-purple/40 before:to-brand-blue/40 relative isolate overflow-hidden rounded-3xl px-4 py-6 before:absolute before:inset-0 before:bg-gradient-to-l before:opacity-50 w-[200px]"
  >

<button id="popup-close"
    class="absolute  text-white text-2xl font-bold leading-none hover:text-gray-300"
    aria-label="Close popup"
>&times;</button>
    <div class="flex flex-col items-center gap-4">
      {{-- <img src="/images/scaledux-book.png" alt="{{$blog->title}}" class="w-[120px] shrink-0" /> --}}
      <div class="isolate z-10 w-full space-y-4 text-center">
        <h3 class="dh-3 text-white">{{$popup->text1}}</h3>
        <p class="b1 text-white text-sm">
          {{$popup->text2}}
        </p>
        <a href="{{$popup->button_link}}" class="btn-orange w-full">{{$popup->button_text}}</a>
      </div>
    </div>
  </div>
</div>
  @endif


</main>
@endsection

@push('style')
<style>
main{
    overflow: visible!important;
}
    .blog-content table,.blog-content tr,.blog-content td,.blog-content th{
          border: 1px solid #ffff!important;
          border-collapse: collapse !important;
    }
    .blog-content tr,.blog-content td,.blog-content th{
        padding: .6rem!important;
    }
    .blog-content table{
    overflow-x: auto;
 max-width: 90vw;
    }
   @media (max-width:670px){
   .aspect-video{
    background-repeat: no-repeat!important;
    background-size: cover!important;
    overflow: hidden;
   }
   main{
    overflow: hidden!important;
}

     .breadcrum{
        font-size: 12px;
    }
   }
    .blog-content ul{
        list-style: inherit!important;
    }

     .blog-content ol{
        list-style: decimal!important;
    }
.updated{
    line-height: 40;
}    #closeShare {
  position: absolute;
  top: 0.25rem;
  right: 0.25rem;
  font-size: 1.25rem;
  background: transparent;
  border: none;
  cursor: pointer;
  line-height: 1;
  padding: 0;
}
    .popup{
        position: fixed;
        bottom: 0px;
        right: 0px;
        z-index: 99999999;
        width: 300px;
    }
  html, body {
    scroll-behavior: smooth;
  }
  [id] {
    scroll-margin-top: 200px;
  }
#active-indicator {
    position: absolute;
    left: -3px; /* aligns with the left border */
    width: 2px;
    top: 0;
    background-color: #2407f8; /* active indicator color */
    border-radius: 1px;
    transition: top 0.3s ease;
    height: 24px; /* height of the active indicator, adjust as needed */
}
.blog-content a{
/* text-decoration: underline!important; */
color: #7f04ff!important;
}
.toc-link {
    display: block;
    padding-left: 0.75rem; /* space from left border */
    color: white;
    cursor: pointer;
    transition: color 0.3s ease;
}

.toc-link:hover {
    color: #7f04ff;
}
</style>

<style>

     .custom-audio {
            width: 100%;
        }
#popup-close{
    top: 0;
    right: 15px!important;
}
    @media (max-width: 640px) {
       .custom-audio {
        width: 80%;
        margin: auto;
    }
    .pad{
        padding: 1rem!important;
    }
    }
</style>
@endpush

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Share dropdown functionality
  const shareBtn = document.getElementById('shareBtn');
  const shareOptions = document.getElementById('shareOptions');
  const closeBtn = document.getElementById('closeShare');

  if (shareBtn && shareOptions && closeBtn) {
    shareBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      shareOptions.classList.toggle('hidden');
    });

    closeBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      shareOptions.classList.add('hidden');
    });

    document.addEventListener('click', (e) => {
      if (!shareBtn.contains(e.target) && !shareOptions.contains(e.target)) {
        shareOptions.classList.add('hidden');
      }
    });
  }

  // Set share URLs
  const pageUrl = encodeURIComponent(window.location.href);
  const pageTitle = encodeURIComponent(document.title);

  const facebook = document.getElementById('facebookShare');
  const twitter = document.getElementById('twitterShare');
  const linkedin = document.getElementById('linkedinShare');
  const whatsapp = document.getElementById('whatsappShare');
  const instagram = document.getElementById('instagramShare');

  if (facebook) facebook.href = `https://www.facebook.com/sharer/sharer.php?u=${pageUrl}`;
  if (twitter) twitter.href = `https://twitter.com/intent/tweet?url=${pageUrl}&text=${pageTitle}`;
  if (linkedin) linkedin.href = `https://www.linkedin.com/shareArticle?mini=true&url=${pageUrl}&title=${pageTitle}`;
  if (whatsapp) whatsapp.href = `https://api.whatsapp.com/send?text=${pageTitle}%20${pageUrl}`;
  if (instagram) instagram.href = 'https://www.instagram.com/yourprofile/';

  // Popup handling
  setTimeout(() => {
    const popup = document.querySelector('.popup');
    if (popup) popup.style.display = 'block';
  }, 5000);

  const popupClose = document.getElementById('popup-close');
  if (popupClose) {
    popupClose.addEventListener('click', () => {
      const popup = document.querySelector('.popup');
      if (popup) popup.style.display = 'none';
    });
  }
window.addEventListener('DOMContentLoaded', function () {
  const tocWrapper = document.querySelector('.toc-wrapper');
  const activeIndicator = document.getElementById('active-indicator');
  const tocLinks = document.querySelectorAll('.toc-link');
  const headings = document.querySelectorAll('.col-span-12 h2[id], .col-span-12 h3[id], .col-span-12 h4[id]');

  function clearActive() {
    tocLinks.forEach(link => link.classList.remove('active'));
  }

  function onScroll() {
    let currentId = null;

    for (let i = 0; i < headings.length; i++) {
      const rect = headings[i].getBoundingClientRect();
      if (rect.top <= 140) {
        currentId = headings[i].id;
      }
    }

    if (currentId && tocWrapper && activeIndicator) {
      clearActive();

      const activeLink = document.querySelector(`.toc-link[href="#${currentId}"]`);
      if (activeLink) {
        activeLink.classList.add('active');

        const wrapperRect = tocWrapper.getBoundingClientRect();
        const linkRect = activeLink.getBoundingClientRect();

        const topPosition = linkRect.top - wrapperRect.top + tocWrapper.scrollTop;

        // Move the indicator
        activeIndicator.style.top = `${topPosition}px`;
        activeIndicator.style.height = `${linkRect.height}px`;

        // Optional: Scroll tocWrapper so active link is at top
        tocWrapper.scrollTop = topPosition - 25; // adjust for padding
      }
    }
  }

  // Scroll & position indicator AFTER everything has loaded
  window.addEventListener('load', onScroll);

  // Live scroll update
  window.addEventListener('scroll', onScroll);
});

});
</script>
@endpush
