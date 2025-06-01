<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <div class="m-3 text-center">
        <img src="{{ auth('volunteer')->user()->photo ? auth('volunteer')->user()->photo->getUrl('preview') : ''  }}" alt="">

    </div>

    <ul class="c-sidebar-nav">
        
        <li class="c-sidebar-nav-item">
            <a href="{{ route('volunteer.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("volunteer.volunteer-tasks.index") }}" class="c-sidebar-nav-link {{ request()->is("volunteer/volunteer-tasks") || request()->is("volunteer/volunteer-tasks/*") ? "c-active" : "" }}">
                <i class="fa-fw fas fa-tasks c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.volunteerTask.title') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('volunteer/profile/password') || request()->is('volunteer/profile/password/*') ? 'c-active' : '' }}"
                href="{{ route('volunteer.profile.password.edit') }}">
                <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                </i>
                {{ trans('global.change_password') }}
            </a>
        </li> 
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
