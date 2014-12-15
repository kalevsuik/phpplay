<?php include 'header.php'?>
<div id="wrap">

<?php if ( ! isset($newfeedback)):?>


<div id="vorm" >
	<p>Palun vali, mis koht Sulle kõige rohkem meeldis ja lisa ka mõni kommentaar. </p>
<form action="<?php echo SITE_URL?>/index.php?action=feedback" method="POST">
	
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
<?php endif;?>
<div id="pilt1">
		<img src="Pildid/Tagasiside.JPG" alt="Autor" width="512" height="340" />
		
	</div>
	<br class="clearer" />

</div>

  <?php if (isset($feedback)):?>
  <table>
  	<tr>
  	<td>Asukoht</td>
  	<td>Tagasiside</td>
    </tr>
  <?php foreach($feedback as $fb):?>
  <tr>
  	<td><?php echo $fb['location']?></td>
  	<td><?php echo $fb['feedback']?></td>
  </tr>	
  <?php endforeach;?>
  </table>
  <?php endif;?>

  <?php if (isset($fullfeedback)):?>
  <table>
  	<tr>
    <td>Kasutaja</td>
  	<td>Asukoht</td>
  	<td>Tagasiside</td>
    </tr>
  <?php foreach($fullfeedback as $fb):?>
  <tr>
  	<td><?php echo $fb['user']?></td>
  	<td><?php echo $fb['location']?></td>
  	<td><?php echo $fb['feedback']?></td>
  </tr>	
  <?php endforeach;?>
  </table>
  <?php endif;?>




  <br class="clearer" />
  </div>
<?php include 'footer.php'?>