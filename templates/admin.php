<body> <div class="wrap">
	<h1>habib Plugi</h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Manage Settings</a></li>
		<li><a href="#tab-2">Updates</a></li>
		<li><a href="#tab-3">About</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'iqra_plugin_group' );
			do_settings_sections( 'habib_plugin' );
			submit_button();
		?>
	</form>
		
			</div>

			<div id="tab-2" class="tab-pane">
				<h3>Updates</h3>
			</div>

			<div id="tab-3" class="tab-pane">
				<h3>About</h3>
			</div>
		</div>
</div>
<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://localhost:3000/browser-sync/browser-sync-client.js?v=2.26.12'><\/script>".replace("HOST", location.hostname));
//]]></script>
</body>