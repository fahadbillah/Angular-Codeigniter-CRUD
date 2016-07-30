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
				<a class="navbar-brand" href="#">NGCI</a>
				<ul class="nav navbar-nav">
					<li class="active" activemenu="home">
						<a href="#/home">Home</a>
					</li>
					<li activemenu="about">
						<a href="#/about">About</a>
					</li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li activemenu="signup">
						<a href="#/signup">Sign Up</a>
					</li>
					<li activemenu="login">
						<a href="#/login">Login</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<div class="body">
		<div class="col-md-2 col-lg-2 ad-container">
			LEFT AD CONTAINER 
		</div>

		<div class="col-md-8 col-lg-8" ng-view>

		</div>

		<div class="col-md-2 col-lg-2 ad-container">
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
    		// load the Facebook javascript SDK

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
    <!-- 3rd party js end -->


    <!-- own js start -->
    <script type="text/javascript" src="assets/js/app.js"></script>

    <!-- directives start -->
    <script type="text/javascript" src="assets/js/directives/activemenu.js"></script>
    <!-- directives end -->



    <!-- services start -->
    <script type="text/javascript" src="assets/js/services/facebookservice.js"></script>
    <!-- services end -->

    <!-- controllers start -->
    <script type="text/javascript" src="assets/js/controllers/homeCtrl.js"></script>
    <script type="text/javascript" src="assets/js/controllers/aboutCtrl.js"></script>
    <script type="text/javascript" src="assets/js/controllers/signupCtrl.js"></script>
    <script type="text/javascript" src="assets/js/controllers/loginCtrl.js"></script>
    <!-- controllers end -->


    <!-- own js start -->
</body>
</html>