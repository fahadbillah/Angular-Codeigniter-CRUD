<!DOCTYPE html>
<html ng-app="NGCI">
<head>
	<title>{{pageTitle}} | NG-CI</title>

	<!-- 3rd party css start -->

	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">

	<!-- 3rd party css end -->



	<!-- own css start -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!-- own css start -->
</head>
<body>
	<div id="fb-root"></div>
	<div class="header">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<a class="navbar-brand" href="#/home">NGCI</a>
				<ul class="nav navbar-nav">
					<li class="active" activemenu="home">
						<a href="#/home">Home</a>
					</li>
					<li activemenu="about">
						<a href="#/about">About</a>
					</li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li activemenu="signup" ng-if="!user">
						<a href="#/signup">Sign Up</a>
					</li>
					<li activemenu="login" ng-if="!user">
						<a href="#/login">Login</a>
					</li>
					<li ng-if="!!user">
						<img class="img-circle" ng-src="{{user.profile_picture}}" alt="" style="display: inline;"> <a href="#/logout" style="display: inline;">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<div class="body">
		<div class="col-sm-12 ad-container visible-sm-block visible-xs-block">Top Container</div>
		<div class="col-sm-2 ad-container hidden-sm hidden-xs">
			LEFT AD CONTAINER 
		</div>

		<div class="col-sm-8" ng-view>

		</div>

		<div class="col-sm-2 ad-container hidden-sm hidden-xs">
			RIGHT AD CONTAINER
		</div>
	</div>

	<div class="footer">
		<div class="col-md-8 col-md-offset-2">
			&copy;
		</div>
	</div>
	<!-- facebook sdk start -->
	<script type="text/javascript">
		(function(d){
			FB = null;

			var js,
			id = 'facebook-jssdk',
			ref = d.getElementsByTagName('script')[0];

			if (d.getElementById(id)) {
				return;
			}

			js = d.createElement('script');
			js.id = id;
			js.async = true;
			js.src = "//connect.facebook.net/en_US/sdk.js";

			ref.parentNode.insertBefore(js, ref);

		}(document));
	</script>
	<!-- facebook sdk end -->


	<!-- 3rd party js start -->
	<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
	<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="bower_components/angular/angular.js"></script>
	<script type="text/javascript" src="bower_components/angular-route/angular-route.js"></script>
	<script type="text/javascript" src="bower_components/angular-cookies/angular-cookies.js"></script>
	<!-- 3rd party js end -->


	<!-- own js start -->
	<script type="text/javascript" src="assets/js/app.js"></script>

	<!-- directives start -->
	<script type="text/javascript" src="assets/js/directives/activemenu.js"></script>
	<!-- directives end -->



	<!-- services start -->
	<script type="text/javascript" src="assets/js/services/httpinterceptor.js"></script>
	<script type="text/javascript" src="assets/js/services/loginservice.js"></script>
	<script type="text/javascript" src="assets/js/services/facebookservice.js"></script>
	<!-- services end -->

	<!-- controllers start -->
	<script type="text/javascript" src="assets/js/controllers/homectrl.js"></script>
	<script type="text/javascript" src="assets/js/controllers/aboutctrl.js"></script>
	<script type="text/javascript" src="assets/js/controllers/signupctrl.js"></script>
	<script type="text/javascript" src="assets/js/controllers/loginctrl.js"></script>
	<script type="text/javascript" src="assets/js/controllers/logoutctrl.js"></script>
	<!-- controllers end -->


	<!-- own js start -->
</body>
</html>