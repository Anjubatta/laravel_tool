		<!-- Essential javascripts for application to work-->
		<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/moment.min.js') }}"></script>
		<script src="{{ asset('js/datetimepicker.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		<!-- The javascript plugin to display page loading on top-->
		<script src="{{ asset('js/plugins/pace.min.js') }}"></script>
		<!-- Page specific javascripts-->
		<script src="{{ asset('js/delete.js') }}"></script>
		<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
		
		<script src="{{ asset('js/build/jquery.datetimepicker.full.js') }}"></script>


		<script>
			var BASE_URL = jQuery('meta[name="site-url"]').attr('content');
			
			</script>
		
		<script src="{{ asset('js/custom.js') }}"></script>
		@yield('script')
		@include('sweetalert::alert')
	</body>
</html>