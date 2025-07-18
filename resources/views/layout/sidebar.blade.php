<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class=" ">
            <img src="{{getImage(cms()->logo)}}" alt="Scaledux" class="img-fluid" />
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-th"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('attachments*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('attachments.index') }}">
            <i class="fas fa-fw fa-copy"></i>
            <span>Attachment</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('manage-access*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('access.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Employee</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Category</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('blogs*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('blogs.index') }}">
            <i class="fas fa-fw fa-photo-video"></i>
            <span>Post</span>
        </a>
    </li>

    <!-- Content Dropdown -->
    <li class="nav-item {{ Request::is('pages*','websites*','seos*','faqs*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContent"
            aria-expanded="true" aria-controls="collapseContent">
            <i class="fas fa-fw fa-images"></i>
            <span>Content</span>
        </a>
        <div id="collapseContent" class="collapse {{ Request::is('pages*','websites*','seos*','faqs*') ? 'show' : '' }}" aria-labelledby="headingContent" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('pages*') ? 'active' : '' }}" href="{{ route('pages.index') }}">Pages</a>
                <a class="collapse-item {{ Request::is('cms*') ? 'active' : '' }}" href="{{ route('cms.edit', 1) }}">Cms</a>
                <a class="collapse-item {{ Request::is('seos*') ? 'active' : '' }}" href="{{ route('seos.index') }}">Seo</a>
                <a class="collapse-item {{ Request::is('faqs*') ? 'active' : '' }}" href="{{ route('faqs.index') }}">Faq</a>
            </div>
        </div>
    </li>

    <!-- Email Marketing Dropdown -->
    <li class="nav-item {{ Request::is('campaigns*','emailgroups*','emails*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmail"
            aria-expanded="true" aria-controls="collapseEmail">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Email Marketing</span>
        </a>
        <div id="collapseEmail" class="collapse {{ Request::is('campaigns*','emailgroups*','emails*') ? 'show' : '' }}" aria-labelledby="headingEmail" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('campaigns') && !request('draft') ? 'active' : '' }}" href="{{ route('admin.campaigns.index') }}">Campaign</a>
                <a class="collapse-item {{ Request::is('campaigns') && request('draft') ? 'active' : '' }}" href="{{ route('admin.campaigns.index', ['draft' => 1]) }}">Draft</a>
                <a class="collapse-item {{ Request::is('emailgroups*') ? 'active' : '' }}" href="{{ route('admin.emailgroups.index') }}">Email Group</a>
                <a class="collapse-item {{ Request::is('emails*') ? 'active' : '' }}" href="{{ route('admin.emails.index') }}">All Subscriber</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('crm') && request('type') == 1 ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('crm', ['type' => 1]) }}">
            <i class="far fa-calendar-minus"></i>
            <span>Waitlist</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('crm') && request('type') == 2 ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('crm', ['type' => 2]) }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Priority Access</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('crm') && request('type') == 3 ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('crm', ['type' => 3]) }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Pdf Download</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('subscriber') ? 'active' : '' }}">
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
