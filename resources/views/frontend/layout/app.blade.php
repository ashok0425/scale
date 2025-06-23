
    @php
 $pageUrl = request()->path();
    $seo = \App\Models\Seo::where('page_url', $pageUrl)->first();

@endphp
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


<title>{{ $seo?->meta_title ?? 'ScaleDux | Verified Marketplace to Hire, Fund & Get Mentored' }}</title>

<meta name="description" content="{{ $seo?->meta_description ?? 'Hire trusted talent, connect with real investors, and get personalized mentorship — all in one verified platform built for founders and growing startups.' }}">
<meta name="keywords" content="{{ $seo?->meta_keywords ?? 'startup marketplace, find trusted freelancers, connect with investors, early stage startup funding, find mentors for startups, freelance for startups, startup launch toolkit, startup service providers India, scaledux' }}">
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="canonical" href="{{ url()->current() }}" />
<!-- Open Graph / Facebook -->
<meta property="og:title" content="{{ $seo?->meta_title ?? 'ScaleDux | Verified Marketplace to Hire, Fund & Get Mentored' }}" />
<meta property="og:description" content="{{ $seo?->meta_description ?? 'Hire trusted talent, connect with real investors, and get personalized mentorship — all in one verified platform built for founders and growing startups.' }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ url('storage/'.$seo?->thumbnail??cms()->logo) }}" />
<meta property="og:site_name" content="ScaleDux" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $seo?->meta_title ?? 'ScaleDux | Verified Marketplace to Hire, Fund & Get Mentored' }}" />
<meta name="twitter:description" content="{{ $seo?->meta_description ?? 'Hire trusted talent, connect with real investors, and get personalized mentorship — all in one verified platform built for founders and growing startups.' }}" />
<meta name="twitter:image" content="{{ url('storage/'.$seo?->thumbnail??cms()->logo) }}" />


    <link rel="stylesheet" crossorigin href="{{asset('frontend/assets/main.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @stack('style')

    <style>
        .after\:bg-no-repeat:after{
            z-index: -1!important;
        }
        html,body{
            scroll-behavior: smooth;
        }

        select {

}

/* The custom arrow using a background SVG */
select {
  background-image: url("data:image/svg+xml,%3Csvg fill='none' stroke='%236B7280' stroke-width='2' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M6 9l6 6 6-6'%3E%3C/path%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 0.75rem center;
  background-size: 1.25rem 1.25rem;
}
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
<style>
    .error-text {
  color: #FF6B6B;
  font-size: 0.875rem; /* small font */
  margin-top: 0.25rem; /* 4px */
}
  input[type="text"],
  input[type="email"],
  input[type="number"],
  select,
  textarea {
    border: 1px solid #ccc;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    outline: none;
  }

  /* On focus (typing) */
  input:focus,
  select:focus,
  textarea:focus {
    border-color: #6b46c1; /* custom purple */
    box-shadow: 0 0 0 2px rgba(107, 70, 193, 0.2);
  }

  /* When user has typed something (optional enhancement) */
  input:not(:placeholder-shown),
  textarea:not(:placeholder-shown) {
    border-color: #6b46c1;
  }

  /* Red border for errors */
  .border-red-300 {
    border-color: #fa6565 !important;
    box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.3) !important;
    margin-bottom: 1px;
  }
</style>
  </head>
  <body>
    @include('frontend.layout.header')

    @yield('content')

    @include('frontend.layout.footer')


       <dialog
        id="success"
        class="gradient-border fixed top-1/2 left-1/2 w-full max-w-[683px] -translate-1/2 flex-col justify-center space-y-6 rounded-3xl p-10 open:flex"
      >
        <img src="{{ asset('frontend/images/div.galaxy-logo-circle.svg') }}" alt="" class="mx-auto size-[73px]" />
        <h2 class="dh-2 text-center">{{session()->get('title')}}</h2>
        <p class="b1 text-center font-normal">
         {{session()->get('message')}}
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


   <script type="application/ld+json">
{!! json_encode([
    "@context" => "https://schema.org",
    "@type" => "WebSite",
    "name" => "ScaleDux",
    "url" => url('/'),
    "description" => $seo?->meta_description ?? 'Hire trusted talent, connect with real investors, and get personalized mentorship — all in one verified platform built for founders and growing startups.',
    "publisher" => [
        "@type" => "Organization",
        "name" => "ScaleDux Software Innovations Pvt Ltd",
        "url" => url('/')
    ],
    "keywords" => explode(',', $seo?->meta_keywords ?? 'startup marketplace, find trusted freelancers, connect with investors, early stage startup funding, find mentors for startups, freelance for startups, startup launch toolkit, startup service providers India, scaledux'),
    "inLanguage" => "en"
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

    <script type="module" crossorigin src="{{asset('frontend/assets/main.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>

    @if (session()->has('message')&&session()->get('type')!='error')
    document.getElementById('success').showModal()
    @endif

    @if (request()->path()!='priority-access')
 @if ($errors->any())
        @foreach ($errors->all() as $error)
            Toastify({
                text: @json($error),
                style: {
                    background: "#810202",
                    color: "#fff"
                },
                duration: 8000,
                gravity: "top",
                position: "right",
                close: true,
            }).showToast();
        @endforeach
    @endif
    @endif

</script>

@stack('script')

<script>
  document.addEventListener('DOMContentLoaded', function () {
    if (window.location.hash === '#waitlist-Section') {
      const el = document.getElementById('waitlist-Section');
      if (el) {
        // Scroll to actual element position smoothly
        el.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }

     if (window.location.hash === '#subscriber-email') {
      const el = document.getElementById('subscriber-email');
      if (el) {
        // Scroll to actual element position smoothly
        el.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }
  });
</script>
  </body>
</html>
