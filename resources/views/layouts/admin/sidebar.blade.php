<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">

        @if(auth()->user()->roles_id=='1')

            @include('layouts.admin.sidemenus.superadmin')

        @elseif(auth()->user()->roles_id=='2')

            @include('layouts.admin.sidemenus.admin')

        @elseif(auth()->user()->roles_id=='3')

            @include('layouts.admin.sidemenus.management')

        @elseif(auth()->user()->roles_id=='4')

            @include('layouts.admin.sidemenus.teachers')

        @elseif(auth()->user()->roles_id=='5')

            @include('layouts.admin.sidemenus.parents')

        @endif

    </ul>
</aside>