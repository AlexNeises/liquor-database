<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en"><![endif]-->
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
		<title>Alcohol Recipe Database</title>
		<link rel="icon" href="<?php print site_url('static/favicon.png'); ?>" type="image/png">
		<link rel="stylesheet" href="<?php print site_url('static/foundation/stylesheets/app.css'); ?>">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:800|Open+Sans:800|Open+Sans:800|Open+Sans:700|Open+Sans:600|Open+Sans:400|Arial:200|Open+Sans:700" rel="stylesheet" type="text/css">
		<script src="<?php print site_url('static/foundation/bower_components/foundation/js/vendor/jquery.js?'.time()); ?>"></script>
	</head>
	<body>
		<div id="topbar_nav" class="contain-to-grid sticky">
			<nav class="top-bar" data-topbar role="navigation">
				<section class="top-bar-section">
					<ul class="left">
						<?php if($page == 'home') : ?>
							<li class="active"><a href="<?php print site_url('home'); ?>">Home</a></li>
						<?php else : ?>
							<li><a href="<?php print site_url('home'); ?>">Home</a></li>
						<?php endif; ?>
						<?php if($page == 'search') : ?>
							<li class="active"><a href="<?php print site_url('search'); ?>">Search</a></li>
						<?php else : ?>
							<li><a href="<?php print site_url('search'); ?>">Search</a></li>
						<?php endif; ?>
						<?php if($page == 'submit') : ?>
							<li class="active"><a href="<?php print site_url('submit'); ?>">Submit</a></li>
						<?php else : ?>
							<li><a href="<?php print site_url('submit'); ?>">Submit</a></li>
						<?php endif; ?>
					</ul>
					<ul class="right">
						<li><a href="javascript:void(0)">About</a></li>
					</ul>
				</section>
			</nav>
		</div>