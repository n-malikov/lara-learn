<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link{{ $page === '' ? ' active' : '' }}" href="{{ route('admin.home') }}">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'users' ? ' active' : '' }}" href="{{ route('admin.users.index') }}">Users</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'regions' ? ' active' : '' }}" href="{{ route('admin.regions.index') }}">Regions</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'categories' ? ' active' : '' }}" href="{{ route('admin.adverts.categories.index') }}">Categories</a></li>
</ul>
