<div class="page-title dark-background">
    <div class="container">
        <h1>{{ $title ?? 'Default Title' }}</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="current">{{ $current ?? 'Current Page' }}</li>
            </ol>
        </nav>
    </div>
</div>
