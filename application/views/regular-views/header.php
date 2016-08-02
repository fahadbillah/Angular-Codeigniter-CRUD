<!DOCTYPE html>
<html>
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
	<div class="header">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<a class="navbar-brand" href="home">NGCI</a>
				<ul class="nav navbar-nav">
					<li class="active" activemenu="home">
						<a href="home">Home</a>
					</li>
					<li class="active" activemenu="user_profile">
						<a href="user/fahadbillah">fahadbillah</a>
					</li>
					<li activemenu="about">
						<a href="about">About</a>
					</li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li activemenu="signup" ng-if="!user">
						<a href="signup">Sign Up</a>
					</li>
					<li activemenu="login" ng-if="!user">
						<a href="login">Login</a>
					</li>
					<li>
						<img class="img-circle" src="" alt="" style="display: inline-block;">
						<a href="logout" style="display: inline-block;">Logout</a>
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
