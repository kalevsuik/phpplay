?>
<?php include 'header.php'?>
<div id="wrap">
<h3>Sisselogimine</h3>
<?php if (isset($loginerror)):?>
<p style="color:#f00"><?php echo $loginerror?></p>
<?php endif;?>
<?php $username = isset($username) ? $username : ''?>
<form action="<?php echo SITE_URL?>/index.php?action=login" method="post" enctype="application/x-www-form-urlencoded"  >
<label for="username">Kasutajanimi</label><input type="text" value="<?php echo $username ?>" name="username">
<label for="password">Password</label><input type="password" value="" name="password" id="password">
<br class="clearer">
<input type="submit" value="Logi sisse">

</form>
</div>
<?php include 'footer.php'?>