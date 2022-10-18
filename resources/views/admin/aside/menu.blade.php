<li class="nav-header">MANU</li>
@if(auth()->user()->hasRole('menu'))
<li class="nav-item">
    <a href="{{ route('admin.menus.index') }}"
       class="nav-link @if(\Route::currentRouteName()  ==='admin.menus.index') active @endif">
        <i class="nav-icon fas fa-list"></i>
        <p>
            Menu
        </p>
    </a>
</li>
@endif
@if(auth()->user()->hasRole('menu-templates'))
<li class="nav-item">
    <a href="{{ route('admin.templates.menu') }}"
       class="nav-link @if(\Route::currentRouteName()  ==='admin.templates.menu') active @endif">
        <i class="nav-icon fas fa-code"></i>
        <p>
            Templates
        </p>
    </a>
</li>
@endif
