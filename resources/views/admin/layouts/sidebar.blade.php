<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
        <i class="fas fa-envelope"></i>
        <span>Contact Messages</span>
        @if(\App\Models\Contact::where('is_read', false)->count() > 0)
            <span class="badge badge-danger">{{ \App\Models\Contact::where('is_read', false)->count() }}</span>
        @endif
    </a>
</li> 