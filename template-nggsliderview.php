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
<?

    $display_content = get_option('ng_slider_display_content') ? true: false ;
    if(get_option('ng_slider_order') == 'reverse')
        $images = array_reverse($images);
?>
<div id="<?php echo $gallery->anchor ?>" class="flexslider">
   <ul class="slides">
  	<!-- Thumbnails -->
	<?php foreach ($images as $image) : ?>		
	<li class="<? if(!$display_content) echo 'full-width';?>">
            <div class="feature-image "> 
                <img class="full home_feature" src="<?php echo $image->imageURL ?>" alt="<?php echo $image->alttext ?>" title="<?php echo $image->alttext ?>">
            </div>
            <? if($display_content) {?>
            <div class="flex-caption">
                <h2 class="post-title"><?php echo ($image->alttext) ?></h2>
                <p><?php echo html_entity_decode($image->description) ?></p>
            </div>
            <? } ?>
	</li>
 	<?php endforeach; ?>
  </ul>
</div>


<script type="text/javascript" defer="defer">
    jQuery(document).ready(function($) {
      $('.flexslider').flexslider({
        <? echo "slideshowSpeed: ".(get_option('ng_slider_slideshow_speed') ? get_option('ng_slider_slideshow_speed')*1000: 6000).","?>
        <? //echo "direction: '".(get_option('ng_slider_direction') ? get_option('ng_slider_direction'): 'horizontal')."',"?>
        <? if(get_option('ng_slider_order') == 'random')
                echo 'randomize:true,';
           
        ?>
        <? echo "directionNav: ".(get_option('ng_slider_direction_nav') ? 'true': 'false').","?>
        <? echo "controlNav: ".(get_option('ng_slider_pagination') ? 'true': 'false').","?>
        <? //echo "animation: '".(get_option('ng_slider_animation') ? get_option('ng_slider_animation'): 'fade')."',"?>
        pauseOnHover:true
  });
    });	
</script>
<style>
    <?
    if($display_content){
        $img_width = get_option('ng_slider_image_width');
        $txt_width = get_option('ng_slider_text_width');
        if(is_numeric((int) $img_width) && ((int) $img_width)>1)
            echo '.flexslider .feature-image {width:'.$img_width.' !important;}';
        if(is_numeric((int) $txt_width) && ((int) $txt_width)>1)
            echo '.flexslider .flex-caption {width:'.$txt_width.' !important;}';
    }
    ?>
    
</style>

<?php endif; ?>