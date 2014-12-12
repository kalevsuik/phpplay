<?php include 'header.php'?>
<div id="wrap">
  <h3>Vali oma lemmikpilt!</h3>
  <form action="<?php echo SITE_URL?>/index.php?action=result" method="post">
    <div id="vote_opts">
    <?php foreach($galleryPics as $pic):?>
    <p>
      <label for="p1">
        <img src="<?php echo $pic['file']?>" alt="<?php echo $pic['name']?>" height="100" />
      </label>
      <input type="radio" value="<?php echo $pic['id']?>" id="p1" name="pilt"/>
    </p>
    <?php endforeach;?>
    </div>
    <br/>
    <div class="buttonbar">
    <input type="submit" value="Valin!" />
    </div>
  </form>

</div>
<?php include 'footer.php'?>