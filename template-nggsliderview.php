<?php 
/**
Slider integration

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/

?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div id="<?php echo $gallery->anchor ?>" class="flexslider">
   <ul class="slides">
  	<!-- Thumbnails -->
	<?php foreach ($images as $image) : ?>		
	<li>
            <div class="feature-image"> 
                <img class="full home_feature" src="<?php echo $image->imageURL ?>" alt="<?php echo $image->alttext ?>" title="<?php echo $image->alttext ?>">
            </div>

            <div class="flex-caption">
                <h2 class="post-title"><?php echo ($image->alttext) ?></h2>
                <p><?php echo html_entity_decode($image->description) ?></p>
            </div>
	</li>
 	<?php endforeach; ?>
  </ul>
</div>


<script type="text/javascript" defer="defer">
    jQuery(document).ready(function($) {
      $('.flexslider').flexslider({
        slideshowSpeed: 6000,
        directionNav:true,
        pauseOnHover:true
  });
    });	
</script>

<?php endif; ?>