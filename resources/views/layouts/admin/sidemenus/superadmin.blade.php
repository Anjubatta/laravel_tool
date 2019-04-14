
<!--Dashboard -->
<li>
	<a class="app-menu__item {{ ($title['active']=='dashboard')?'active':'' }}" href="{{ route('superadmin.dashboard.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Dashboard</span>
	</a>
</li>

<!--Announcements -->
<li>
	<a class="app-menu__item {{ ($title['active']=='announcements')?'active':'' }}" href="{{ route('superadmin.announcements.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Announcements</span>
	</a>
</li>

<!--Company -->
<li>
	<a class="app-menu__item {{ ($title['active']=='company')?'active':'' }}" href="{{ route('superadmin.company.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Company</span>
	</a>
</li>

<!--Reports -->
<li>
	<a class="app-menu__item {{ ($title['active']=='reports')?'active':'' }}" href="{{ route('superadmin.reports.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Reports</span>
	</a>
</li>
