<?php include 'header.php'?>
<div id="wrap">
<h3>Kasutaja registreerimine</h3>
<?php if (isset($loginerror)):?>
<p style="color:#f00"><?php echo $loginerror?></p>
<?php endif;?>
<form action="<?php echo SITE_URL?>/index.php?action=login" method="post" enctype="application/x-www-form-urlencoded"  >
<label for="first_name">Eesnimi</label><input type="first_name" value="" name="first_name" id="first_name">
<label for="last_name">Perekonnanimi</label><input type="last_name" value="" name="last_name" id="last_name">
<label for="email">e-mail</label><input type="email" value="" name="email" id="email">
<label for="username">Kasutajanimi</label><input type="kasutajanimi" value="" name="username">
<label for="password">Salasõna</label><input type="password" value="" name="password" id="password">
<br class="clearer">
<input type="submit" value="Registreeri">

</form>
</div>
<?php include 'footer.php'?>