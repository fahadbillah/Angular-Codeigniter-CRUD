<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h3>{{title}}</h3>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
	<img class="img-circle" ng-src="{{user.profile_picture}}" alt="{{user.name}}">
	<strong ng-bind="user.name"></strong>
</div>