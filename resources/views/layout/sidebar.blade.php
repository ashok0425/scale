<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class=" ">
         <img src="{{getImage(cms()->logo)}}" alt="Scaledux" class="img-fluid" />

        </div>
        {{-- <div class="sidebar-brand-text mx-3">ScaleDux</div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-th"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('attachments.index') }}">
            <i class="fas fa-fw fa-copy"></i>
            <span>Attachment</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('access.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Employee</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Category</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('blogs.index') }}">
            <i class="fas fa-fw fa-photo-video"></i>
            <span>Post</span>
        </a>
    </li>

    <!-- Content Dropdown -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContent"
            aria-expanded="false" aria-controls="collapseContent">
            <i class="fas fa-fw fa-images"></i>
            <span>Content</span>
        </a>
        <div id="collapseContent" class="collapse" aria-labelledby="headingContent" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pages.index') }}">Pages</a>
                <a class="collapse-item" href="{{ route('cms.edit', 1) }}">Cms</a>
                <a class="collapse-item" href="{{ route('seos.index') }}">Seo</a>
                <a class="collapse-item" href="{{ route('faqs.index') }}">Faq</a>
            </div>
        </div>
    </li>

    <!-- Email Marketing Dropdown -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmail"
            aria-expanded="false" aria-controls="collapseEmail">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Email Marketing</span>
        </a>
        <div id="collapseEmail" class="collapse" aria-labelledby="headingEmail" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.campaigns.index') }}">Campaign</a>
                <a class="collapse-item" href="{{ route('admin.campaigns.index', ['draft' => 1]) }}">Draft</a>
                <a class="collapse-item" href="{{ route('admin.emailgroups.index') }}">Email Group</a>
                <a class="collapse-item" href="{{ route('admin.emails.index') }}">All Subscriber</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('crm', ['type' => 1]) }}">
            <i class="far fa-calendar-minus"></i>
            <span>Waitlist</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('crm', ['type' => 2]) }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Priority Access</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('crm', ['type' => 3]) }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Pdf Download</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('subscriber') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Subscriber</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
