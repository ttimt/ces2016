<?php
	require_once 'config.php';

	$url = "https://api.instagram.com/oauth/authorize/?client_id={$clientID}&redirect_uri={$clientRedirect}&response_type=code";
	header("Location: {$url}");

	/*
		curl -F 'client_id=CLIENT_ID' \
		-F 'client_secret=CLIENT_SECRET' \
		-F 'grant_type=authorization_code' \
		-F 'redirect_uri=AUTHORIZATION_REDIRECT_URI' \
		-F 'code=CODE' \
		https://api.instagram.com/oauth/access_token
	 * */