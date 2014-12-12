<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Kaire USA</title>
<link rel="stylesheet" type="text/css" href="Style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="gal.js"></script>
</head>
<body>
<div id="header">
  <ul>
    <li><a href="<?php echo SITE_URL ?>?action=main">Pealeht</a></li>
    <li><a href="<?php echo SITE_URL ?>?action=gallery">Galerii</a></li>
    <li><a href="<?php echo SITE_URL ?>?action=vote">Hääletamine</a></li>
	
	<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1):?>
     <li><strong><a href="<?php echo SITE_URL ?>?action=logout">Logi välja (<?php echo $_SESSION['fullname']?>)</a></strong></li>
    <?php else:?>
    <li><a href="<?php echo SITE_URL ?>?action=login">Logi sisse</a></li>
    <?php endif;?>
	<li><a href="<?php echo SITE_URL ?>?action=feedback">Tagasiside</a></li>
	
	<li><a href="<?php echo SITE_URL ?>?action=register">Kasutajaks registreerimine</a></li>
	
  </ul>
</div>
<div id="banner">
</div>