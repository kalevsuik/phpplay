<?php include 'header.php'?>
<div id="wrap">
  <h3>Fotod</h3>
  <div id="gallery">
  
  <?php foreach($galleryPics as $pic):?>
  <img class="thumb" src="<?php echo $pic['file']?>" alt="<?php echo $pic['name']?>" />
  <?php endforeach;?>
    <br class="clearer" />
  </div>
</div>
<div id="image_wrapper">
  <div id="largeimg">
  </div>
  <p><a id="close_image" href="javascript:void(0)">Sulge</a></p>
</div>
<?php include 'footer.php'?>