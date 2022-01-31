<!DOCTYPE html>
<html lang="en">

    @include('front-end.head')
	<body>
		<!-- HEADER -->
		@include('front-end.header')
		<!-- /HEADER -->

		<!-- NAVIGATION -->
        @include('front-end.navigation')
		<!-- /NAVIGATION -->

		<!-- SECTION -->
        {{-- collection --}}
		<div class="section">
			<!-- container -->
            @include('front-end.collection')
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
            @include('front-end.newproducts')
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			@include('front-end.hotdeal')
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
            @include('front-end.topselling')
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
            @include('front-end.topsellinglist')
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			@include('front-end.newsletter')
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		@include('front-end.footer')
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{asset('front-theme/js/jquery.min.js')}}"></script>
		<script src="{{asset('front-theme/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('front-theme/js/slick.min.js')}}"></script>
		<script src="{{asset('front-theme/js/nouislider.min.js')}}"></script>
		<script src="{{asset('front-theme/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('front-theme/js/main.js')}}"></script>

	</body>
</html>
