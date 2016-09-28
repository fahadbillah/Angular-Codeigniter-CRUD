<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>NG-CI</title>

	<!-- 3rd party css start -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>bower_components/bootstrap/dist/css/bootstrap.css">
	<!-- 3rd party css end -->

	<!-- own css start -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css">
	<!-- own css start -->
</head>
<body>
	<div class="header">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo base_url() ?>home">NGCI</a>
				<ul class="nav navbar-nav">
					<li class="" activemenu="home">
						<a href="<?php echo base_url() ?>home">Home</a>
					</li>
					<li class="" activemenu="user_profile">
						<a href="<?php echo base_url() ?>user/fahadbillah">fahadbillah</a>
					</li>
					<li activemenu="about">
						<a href="<?php echo base_url() ?>about">About</a>
					</li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li activemenu="signup" ng-if="!user">
						<a href="<?php echo base_url() ?>signup">Sign Up</a>
					</li>
					<li activemenu="login" ng-if="!user">
						<a href="<?php echo base_url() ?>login">Login</a>
					</li>
					<li>
						<img class="img-circle" src="" alt="" style="display: inline-block;">
						<a href="<?php echo base_url() ?>logout" style="display: inline-block;">Logout</a>
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
