<?php include 'header.php'?>
<div id="wrap">

<div id="vorm" >
	<p>Palun vali, mis koht Sulle kõige rohkem meeldis ja lisa ka mõni kommentaar. </p>
<form action="data.php" method="POST">
	
<div> 
<label>
Monterey <input type="radio" name="Asukoht" value="Monterey" />
</label>
<label>
Surmaorg <input type="radio" name="Asukoht" value="Surmaorg" />
</label>
<label>
Suur Kanjon <input type="radio" name="Asukoht" value="Suur Kanjon" />
</label>
</div>

<br/>
<textarea name="vabatekst" cols="50" rows="8" placeholder="Siia saad kirjutada, miks just see koht Sulle meeldis"></textarea>
<br/>
<br/>
<input type="submit" value="Saada!" />
</form>
</div>

<div id="pilt1">
		<img src="Pildid/Tagasiside.JPG" alt="Autor" width="512" height="340" />
		
	</div>
	<br class="clearer" />

</div>
<?php include 'footer.php'?>