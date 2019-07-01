<?php $home = new Cltvo_Page_Home() ?>

<?php get_header(); ?>

<div class="home__hero">
    <section class="swiper-slide">
    	<div class="swiper-container swiper-container-h">
		    <div class="swiper-wrapper">
		        <div class="swiper-slide background-image--center" <?php if(!empty($home->thumbail_img)): ?>style="background-image: url(<?php echo $home->thumbail_img->src ?>)"<?php endif ?>>
		        	<?php 
			        	$title = $home->post->post_title;
			        	$subtitle = $home->subtitle;
			        	$content = $home->post->post_content . '<p style="text-align: right;"><img src="' . THEMEURL . '/images/Recurso 4.png" /></p>';
			        	$position = $home->position;
			        	$target = $home->link['target'];
			        	$link = $home->link['text'];
			        ?>
		        	<?php include 'inc/modules/home-slide-content.php' ?>
		        </div>
		        <?php foreach ($home->horizontal->childs as $child): ?>
        	        <div class="swiper-slide background-image" <?php if(!empty($child->thumbail_img)): ?>style="background-image: url(<?php echo $child->thumbail_img->src ?>)"<?php endif ?>>
        	        	<?php 
        		        	$title = $child->post->post_title;
        		        	$subtitle = $child->subtitle;
        		        	$content = $child->post->post_content;
        		        	$position = $child->position;
        		        	$target = $child->link['target'];
        		        	$link = $child->link['text'];
        		        ?>
        	        	<?php include 'inc/modules/home-slide-content.php' ?>
        	        </div>
		        <?php endforeach ?>
		    </div>
		    <!-- Add Pagination -->
		    <div class="swiper-pagination swiper-pagination-white swiper-pagination-h"></div>
			<div class="swiper-button-next swiper-button-white swiper-button-next-h"></div>
		    <div class="swiper-button-prev swiper-button-white swiper-button-prev-h"></div>
		</div>
    </section>
    <?php foreach ($home->vertical->childs as $child): ?>
    <section class="swiper-slide background-image" <?php if(!empty($child->thumbail_img)): ?>style="background-image: url(<?php echo $child->thumbail_img->src ?>)"<?php endif ?>>
    	<?php 
        	$title = $child->post->post_title;
        	$subtitle = $child->subtitle;
        	$content = $child->post->post_content;
        	$position = $child->position;
        	$target = $child->link['target'];
        	$link = $child->link['text'];
        ?>
    	<?php include 'inc/modules/home-slide-content.php' ?>
    </section>
    <?php endforeach ?>
</div>

<?php get_footer(); ?>
