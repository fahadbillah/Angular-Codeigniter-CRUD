<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h3>{{title}}</h3>
<ng-include src="socialLoginButton"> </ng-include>
<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<fb:login-button show-faces="true" max-rows="1" size="large"></fb:login-button>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="g-signin2" data-onsuccess="startGoogle"></div>
	</div>
</div>

-->
<button type="button" ng-click="googleService.getUserData()">get Google data</button>