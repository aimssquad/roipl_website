<div class="pagetitle">
    <h1>{{ $pageTitle ?? 'Dashboard' }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            {{-- <li class="breadcrumb-item active">{{ $breadcrumb ?? $pageTitle }}</li> --}}
        </ol>
    </nav>
</div>
