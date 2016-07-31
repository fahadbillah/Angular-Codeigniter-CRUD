<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- 
<div id="fb-root"></div>
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
</script> -->
<h3>{{title}}</h3>
<fb:login-button show-faces="true" max-rows="1" size="large"></fb:login-button>