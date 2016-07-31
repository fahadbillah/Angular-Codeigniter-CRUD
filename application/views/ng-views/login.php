<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h3>{{title}}</h3>
<ng-include src="socialLoginButton"> </ng-include>

<button type="button" ng-click="googleService.getUserData()">get Google data</button>