<!-- resources/views/admin/layouts/sidebar.blade.php -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin') ? '' : 'collapsed' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.roles.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Role</span>
            </a>
        </li>


    </ul>
</aside>
