<li class="nav-item">
    <a href="{{ route('admin.companies.index') }}"
       class="nav-link {{ Request::is('admin/companies*') ? 'active' : '' }}">
        <p>Companies</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.users.index') }}"
       class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
        <p>User</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.favorits.index') }}"
       class="nav-link {{ Request::is('admin/favorits*') ? 'active' : '' }}">
        <p>Favorits</p>
    </a>
</li>


