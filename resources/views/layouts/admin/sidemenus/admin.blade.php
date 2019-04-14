
<!--Dashboard -->
<li>
	<a class="app-menu__item {{ ($title['active']=='dashboard')?'active':'' }}" href="{{ route('admin.dashboard.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Dashboard</span>
	</a>
</li>
<!--- Profile -->

<li>
	<a class="app-menu__item {{ ($title['active']=='profile')?'active':'' }}" href="{{ route('admin.company.index') }}">
		<i class="app-menu__icon fa fa-user"></i>
		<span class="app-menu__label">Profile</span>
	</a>
</li>
<!--Announcements -->
<li>
	<a class="app-menu__item {{ ($title['active']=='announcements')?'active':'' }}" href="{{ route('admin.announcements.index') }}">
		<i class="app-menu__icon fa fa-bell"></i>
		<span class="app-menu__label">Announcements</span>
	</a>
</li>

<!--Teacher --> 
<li>
	<a class="app-menu__item {{ ($title['active']=='teachers')?'active':'' }}" href="{{ route('admin.teachers.index') }}">
		<i class="app-menu__icon fa fa-users"></i>
		<span class="app-menu__label">Teachers</span>
	</a>
 </li>
 
<!--Classes --> 
<li>
	<a class="app-menu__item {{ ($title['active']=='classes')?'active':'' }}" href="{{ route('admin.classes.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Classes</span>
	</a>
 </li>
 
 <!--Students --> 
<li>
	<a class="app-menu__item {{ ($title['active']=='students')?'active':'' }}" href="{{ route('admin.students.index') }}">
		<i class="app-menu__icon fa fa-graduation-cap"></i>
		<span class="app-menu__label">Students</span>
	</a>
 </li>
<!--Students --> 
<li>
	<a class="app-menu__item {{ ($title['active']=='attendances')?'active':'' }}" href="{{ route('admin.attendances.index') }}">
		<i class="app-menu__icon fa fa-address-card"></i>
		<span class="app-menu__label">Attendance</span>
	</a>
 </li>

 <!--Parents--->
<li>
	<a class="app-menu__item {{ ($title['active']=='parents')?'active':'' }}" href="{{ route('admin.parents.index') }}">
		<i class="app-menu__icon fa fa-user-circle"></i>
		<span class="app-menu__label">Parents</span>
	</a>
 </li>
   
<li>
	<a class="app-menu__item {{ ($title['active']=='reports')?'active':'' }}" href="{{ route('admin.reports.index') }}">
		<i class="app-menu__icon fa fa-address-card"></i>
		<span class="app-menu__label">Reports</span>
	</a>
 </li>
<li>
	<a class="app-menu__item {{ ($title['active']=='fees')?'active':'' }}" href="{{ route('admin.fees.index') }}">
		<i class="app-menu__icon fa fa-money"></i>
		<span class="app-menu__label">Fee Management</span>
	</a>
 </li>
