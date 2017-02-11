<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once BASEPATH . '/helpers/url_helper.php';
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>

</head>
<body>
	<div class="container">
    <div class="header-container">
      <h1>
        <span>404</span>
        <div class="green-dot"></div>
        <span class="title">ERROR</span>
      </h1>
    </div>
    <div class="dialog">
      <h2>It seems like the page you are looking for does not exist.</h2>
      <p>
          <a href="<?php //echo base_url(); ?>" class="button">Go to the main page</a>
      </p>
    </div>
  </div>
</body>
</html>