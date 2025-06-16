 <header class="header">
      <div class="container">
        <a href="/">
          <img src="{{getImage(cms()->logo)}}" alt="" class="h-5 md:h-7" />
        </a>
        <ul class="nav">

          <li>
            <a href="{{route('founder')}}" class="nav-item">Founder</a>
          </li>
          <li>
            <a href="{{route('freelancer')}}" class="nav-item">Freelancers</a>
          </li>
          <li>
            <a href="{{route('investor')}}" class="nav-item">Investor</a>
          </li>
          <li>
            <a href="{{route('blog')}}" class="nav-item">Blogs</a>
          </li>
        </ul>
        <div class="flex items-center justify-end gap-6">
          <div class="flex flex-wrap items-center gap-6">
            <a href="#waitlistSection" class="btn-outline max-md:hidden">Join the waitlist</a>
            <a
              href="{{route('priority.access')}}"
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
