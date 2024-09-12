<!-- resources/views/admin/layouts/sidebar.blade.php -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) != 'dashboard') collapsed @endif" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) != 'roles') collapsed @endif" href="{{ route('admin.roles.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Role</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) != 'users') collapsed @endif" href="{{ route('admin.users.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) != 'permissions') collapsed @endif" href="{{ route('admin.permissions.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Permission</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) != 'abouts') collapsed @endif" href="{{ route('admin.abouts.index') }}">
                <i class="bi bi-card-list"></i>
                <span>About</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) != 'brands') collapsed @endif" href="{{ route('admin.brands.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Brand</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) != 'events') collapsed @endif" href="{{ route('admin.events.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Events</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) != 'contacts') collapsed @endif" href="{{ route('admin.contacts.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Contacts</span>
            </a>
        </li>



    </ul>
</aside>
