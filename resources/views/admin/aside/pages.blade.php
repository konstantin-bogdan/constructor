<li class="nav-header">MAIN</li>
<li class="nav-item">
    <a href="{{ route('admin.backups.index') }}"
       class="nav-link @if(str_contains(url()->current(), 'admin/backups')) active @endif">
        <i class="nav-icon fas fa-upload"></i>
        <p>
            Backups
        </p>
    </a>
</li>
@if(auth()->user()->hasRole('lang'))
<li class="nav-item">
    <a href="{{ route('admin.languages.index') }}"
       class="nav-link @if(str_contains(url()->current(), 'admin/languages')) active @endif">
        <i class="nav-icon fas fa-language"></i>
        <p>
            Languages
        </p>
    </a>
</li>
@endif
@if(auth()->user()->hasRole('api'))
<li class="nav-item">
    <a href="/admin/docs" class="nav-link @if(str_contains(url()->current(), 'admin/docs')) active @endif">
        <i class="nav-icon fas fa-file"></i>
        <p>
            API Docs
        </p>
    </a>
</li>
@endif
@if(auth()->user()->hasRole('subscribers'))
<li class="nav-item">
    <a href="{{ route('admin.subscribers.index')}} "
       class="nav-link @if(str_contains(url()->current(), 'admin/subscribers')) active @endif">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Subscribers
        </p>
    </a>
</li>
@endif
@if(auth()->user()->hasRole('admins'))
<li class="nav-item">
    <a href="{{ route('admin.users.index')}} "
       class="nav-link @if(str_contains(url()->current(), 'admin/users')) active @endif">
        <i class="nav-icon fas fa-user-group"></i>
        <p>
            Admins
        </p>
    </a>
</li>
@endif
<li class="nav-header">PAGES</li>
@if(auth()->user()->hasRole('pages'))
<li class="nav-item">
    <a href="{{ route('admin.pages.index') }}"
       class="nav-link @if(\Route::currentRouteName()  ==='admin.pages.index') active @endif">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Pages
        </p>
    </a>
</li>
@endif
@if(auth()->user()->hasRole('page-templates'))
<li class="nav-item">
    <a href="{{ route('admin.templates.page') }}"
       class="nav-link  @if(\Route::currentRouteName()  ==='admin.templates.page') active @endif">
        <i class="nav-icon fas fa-code"></i>
        <p>
            Templates
        </p>
    </a>
</li>
@endif
