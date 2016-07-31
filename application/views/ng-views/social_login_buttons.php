<div id="fb-root"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<fb:login-button show-faces="true" max-rows="1" size="large"></fb:login-button>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="g-signin2" data-onsuccess="startGoogle"></div>
	</div>
</div>

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
<script src="https://apis.google.com/js/platform.js" async defer></script>
