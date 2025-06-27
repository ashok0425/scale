<nav id="sidebar" class="sidebar" style="overflow-y: visible !important">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">
                <img src="{{ getImage(cms()->logo) }}" alt="" width="60" height="60" />
            </span>
        </a>
        <ul class="sidebar-nav" style="overflow-y: scroll!important;    scrollbar-width: none;">
        <li class="sidebar-item">
            <a
                class="sidebar-link {{ Request::is('dashboard', 'dashboard/*') ? 'text-light' : ' ' }}"
                href="{{ route('dashboard') }}"
            >
                <i class="fas fa-th"></i>
                <span class="align-middle">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a
                class="sidebar-link {{ Request::is('attachments', 'attachments/*') ? 'text-light' : ' ' }}"
                href="{{ route('attachments.index') }}"
            >
                <i class="fas fa-copy"></i>
                <span class="align-middle">Attachment</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a
                class="sidebar-link {{ Request::is('manage-access', 'manage-access/*') ? 'text-light' : ' ' }}"
                href="{{ route('access.index') }}"
            >
                <i class="fas fa-users"></i>
                <span class="align-middle">Employee</span>
            </a>
        </li>

            <li class="sidebar-item">
                <a
                    class="sidebar-link {{ Request::is('categories', 'categories/*') ? 'text-light' : ' ' }}"
                    href="{{ route('categories.index') }}"
                >
                    <i class="fas fa-shopping-cart"></i>
                    <span class="align-middle">Category</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link {{ Request::is('blogs', 'blogs/*') ? 'text-light' : ' ' }}"
                    href="{{ route('blogs.index') }}"
                >
                    <i class="fas fa-photo-video"></i>
                    <span class="align-middle">Post</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a
                    href="javascript:void(0);"
                    class="sidebar-link d-flex justify-between align-items-center {{ Request::is('pages*', 'websites*', 'seos*', 'faqs*') ? 'text-light' : '' }}"
                    data-toggle="content-dropdown"
                >
                    <span>
                        <i class="fas fa-images"></i>
                        <span class="align-middle">Content</span>
                    </span>
                    <i class="fas fa-chevron-down toggle-icon"></i>
                </a>
                <ul
                    class="submenu {{ Request::is('pages*', 'websites*', 'seos*', 'faqs*') ? 'd-block' : 'd-none' }}"
                    id="content-dropdown"
                >
                    <li class="submenu-item">
                        <a href="{{ route('pages.index') }}" class="sidebar-link">Pages</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('cms.edit', 1) }}" class="sidebar-link">Cms</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('seos.index') }}" class="sidebar-link">Seo</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('faqs.index') }}" class="sidebar-link">Faq</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a
                    href="javascript:void(0);"
                    class="sidebar-link d-flex justify-between align-items-center {{ Request::is('admin/campaigns*', 'admin/emailgroups*', 'admin/emails*') ? 'text-light' : '' }}"
                    data-toggle="email-marketing-dropdown"
                >
                    <span>
                        <i class="fas fa-envelope-open-text"></i>
                        <span class="align-middle">Email Marketing</span>
                    </span>
                    <i class="fas fa-chevron-down toggle-icon"></i>
                </a>
                <ul
                    class="submenu {{ Request::is('admin/campaigns*', 'admin/emailgroups*', 'admin/emails*') ? 'd-block' : 'd-none' }}"
                    id="email-marketing-dropdown"
                >
                    <li class="submenu-item">
                        <a href="{{ route('admin.campaigns.index') }}" class="sidebar-link">
                            Campaign
                        </a>
                    </li>
                    <li class="submenu-item">
                        <a
                            href="{{ route('admin.campaigns.index', ['draft' => 1]) }}"
                            class="sidebar-link"
                        >
                            Draft
                        </a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('admin.emailgroups.index') }}" class="sidebar-link">
                            Email Group
                        </a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('admin.emails.index') }}" class="sidebar-link">
                            All Subscriber
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link {{ Request::is('crm', 'crm/*') ? 'text-light' : ' ' }}"
                    href="{{ route('crm', ['type' => 1]) }}"
                >
                    <i class="far fa-calendar-minus"></i>
                    <span class="align-middle">Waitlist</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link {{ Request::is('crm', 'crm/*') ? 'text-light' : ' ' }}"
                    href="{{ route('crm', ['type' => 2]) }}"
                >
                    <i class="fas fa-images"></i>
                    <span class="align-middle">Priority Access</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link {{ Request::is('crm', 'crm/*') ? 'text-light' : ' ' }}"
                    href="{{ route('crm', ['type' => 3]) }}"
                >
                    <i class="fas fa-images"></i>
                    <span class="align-middle">Pdf Download</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a
                    class="sidebar-link {{ Request::is('subscriber', 'subscriber/*') ? 'text-light' : ' ' }}"
                    href="{{ route('subscriber') }}"
                >
                    <i class="fas fa-images"></i>
                    <span class="align-middle">Subscriber</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
