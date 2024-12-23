<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" style="text-align: center" href="{{route('frontend.home')}}">
            {{$setting->site_name }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    {{-- @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan --}}
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('slider_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-image c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.slider.title') }}
                </a>
            </li>
        @endcan
        @can('about_association_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/settings*") ? "c-show" : "" }} {{ request()->is("admin/services*") ? "c-show" : "" }} {{ request()->is("admin/partners*") ? "c-show" : "" }} {{ request()->is("admin/beneficiaries*") ? "c-show" : "" }} {{ request()->is("admin/values*") ? "c-show" : "" }} {{ request()->is("admin/swot-analysis*") ? "c-show" : "" }} {{ request()->is("admin/stakeholders*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-journeys*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.aboutAssociation.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.service.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('partner_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.partners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/partners") || request()->is("admin/partners/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-handshake c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.partner.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiaries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiaries") || request()->is("admin/beneficiaries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiary.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('value_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.values.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/values") || request()->is("admin/values/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-balance-scale c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.value.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('swot_analysi_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.swot-analysis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/swot-analysis") || request()->is("admin/swot-analysis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chart-bar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.swotAnalysi.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('stakeholder_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.stakeholders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stakeholders") || request()->is("admin/stakeholders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-secret c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.stakeholder.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_journey_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-journeys.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-journeys") || request()->is("admin/beneficiary-journeys/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-plane c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryJourney.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('project_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.projects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.project.title') }}
                </a>
            </li>
        @endcan
        @can('media_center_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/newss*") ? "c-show" : "" }} {{ request()->is("admin/galleries*") ? "c-show" : "" }} {{ request()->is("admin/videos*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-compact-disc c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.mediaCenter.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('news_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.newss.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/newss") || request()->is("admin/newss/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe-americas c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.news.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('gallery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.galleries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/galleries") || request()->is("admin/galleries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-images c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.gallery.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('video_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.videos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/videos") || request()->is("admin/videos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-video c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.video.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('hawkma_mangment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/hawkmas*") ? "c-show" : "" }} {{ request()->is("admin/hawkam-categories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.hawkmaMangment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('hawkam_category_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.hawkam-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hawkam-categories") || request()->is("admin/hawkam-categories/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.hawkamCategory.title') }}
                        </a>
                    </li>
                @endcan
                    @can('hawkma_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hawkmas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hawkmas") || request()->is("admin/hawkmas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hawkma.title') }}
                            </a>
                        </li>
                    @endcan
            
                </ul>
            </li>
        @endcan
        @can('report_mangment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/report-categories*") ? "c-show" : "" }} {{ request()->is("admin/reports*") ? "c-show" : "" }} {{ request()->is("admin/report-moneys*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reportMangment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('report_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.report-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/report-categories") || request()->is("admin/report-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-barcode c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reports") || request()->is("admin/reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.report.title') }}
                            </a>
                        </li>
                    @endcan
                    {{-- @can('report_money_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.report-moneys.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/report-moneys") || request()->is("admin/report-moneys/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportMoney.title') }}
                            </a>
                        </li>
                    @endcan --}}
                </ul>
            </li>
        @endcan
        {{-- @can('volunteering_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/volunteers*") ? "c-show" : "" }} {{ request()->is("admin/volunteer-guides*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-hands-helping c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.volunteeringManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('volunteer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.volunteers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/volunteers") || request()->is("admin/volunteers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-volleyball-ball c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.volunteer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('volunteer_guide_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.volunteer-guides.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/volunteer-guides") || request()->is("admin/volunteer-guides/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.volunteerGuide.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan --}}
        @can('support_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.supports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/supports") || request()->is("admin/supports/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.support.title') }}
                </a>
            </li>
        @endcan
        @can('contact_mangment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/contacts*") ? "c-show" : "" }} {{ request()->is("admin/subscribes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-phone c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contactMangment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('contact_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contact.title') }}
                            </a>
                        </li>
                    @endcan
                    {{-- @can('subscribe_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.subscribes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subscribes") || request()->is("admin/subscribes/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-envelope c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subscribe.title') }}
                            </a>
                        </li>
                    @endcan --}}
                </ul>
            </li>
        @endcan
        {{-- @can('said_about_us_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.said-about-uss.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/said-about-uss") || request()->is("admin/said-about-uss/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-star-half-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.saidAboutUs.title') }}
                </a>
            </li>
        @endcan
        @can('director_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.directors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/directors") || request()->is("admin/directors/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-sitemap c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.director.title') }}
                </a>
            </li>
        @endcan --}}
        @can('membership_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/members*") ? "c-show" : "" }} {{ request()->is("admin/membership-types*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-memory c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.membership.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
              
                    @can('membership_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.membership-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/membership-types") || request()->is("admin/membership-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.membershipType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('member_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.members.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/members") || request()->is("admin/members/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.member.title') }}
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>