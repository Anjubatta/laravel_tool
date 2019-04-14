<!--Dashboard -->
<li>
	<a class="app-menu__item {{ ($title['active']=='dashboard')?'active':'' }}" href="{{ route('teacher.dashboard.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Dashboard</span>
	</a>
</li>

<!--- Profile -->

<li>
	<a class="app-menu__item {{ ($title['active']=='profile')?'active':'' }}" href="{{ route('teacher.dashboard.profile') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Profile</span>
	</a>
</li>

<!--- Parents --->

<li>
	<a class="app-menu__item {{ ($title['active']=='parent')?'active':'' }}" href="{{ route('teacher.parents.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Parents</span>
	</a>
</li>

<!-- Student Record -->

<li>
	<a class="app-menu__item {{ ($title['active']=='class')?'active':'' }}" href="{{ route('teacher.students.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Student Record</span>
	</a>
</li>

<!--- Attandence -->
<li>
	<a class="app-menu__item {{ ($title['active']=='attendances')?'active':'' }}" href="{{ route('teacher.attendances.index') }}">
		<i class="app-menu__icon fa fa-dashboard"></i>
		<span class="app-menu__label">Attendance</span>
	</a>
 </li>
 
<!--li>
	<a class="app-menu__item {{--  ($title['active']=='attandence') ? 'active': '' --}}" href="{{-- route('teacher.attandence.index')--}}">
		<i class="app-menu_icon fa fa-dashboard"></i>
		<span class="app-menu_label">Attendence</span>
	</a>
</li-->