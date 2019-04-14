	<main class="app-content">     
		<div class="app-title">       
			<ul class="app-breadcrumb breadcrumb">
				@if(empty(Request::segment(2)) || Request::segment(2)=='dashboard')
					<li class="breadcrumb-item"><a href="{{route(Request::segment(1).'.dashboard.index')}}">Dashboard</a></li>
				@else
					<li class="breadcrumb-item"><a href="{{route(Request::segment(1).'.dashboard.index')}}">Dashboard</a></li>
					@for($i=2; $i <= count(Request::segments()); $i++)
						@if(count(Request::segments())==$i || $i>2 || Request::segment($i)=='dashboard')
						<li class="breadcrumb-item"><a class="active">{{Request::segment($i)}}</a></li>
						@else
						<li class="breadcrumb-item"><a href="{{url('/'.Request::segment($i-1).'/'.Request::segment($i))}}">{{Request::segment($i)}}</a></li>
						@endif
					@endfor
				@endif
					
				</ul>
			</div>
			
			@yield('content')
		</main>		