<?php get_header('journal'); ?>

<?php includeWithVariables('/inc/modules/journal/issue-header.php', array('issue' => $post->issue, 'print_back_link' => true)) ?>

<?php $post = new Cltvo_Post ?>

<!-- IMG single Journal -->
<section class="journal__single--img background-image--center "  style="background-color: whitesmoke;<?php if (!empty($post->thumbail_img)): ?>background-image: url(<?php echo $post->thumbail_img->getImgSrc('large') ?>);<?php endif ?>"></section>

<!-- Primer texto -->
<section class="journal__single">
	<div class="grid__container">
		<div class="journal__single--text">
			<?php if (!empty($post->issue)): ?>
				<h5 class="journal__single--issue">
					<?php echo $post->issue->post->post_title ?>
				</h5>
			<?php endif ?>
			<hr class="journal__single--divider"></hr>
			<?php if (!empty($post->terms['category'])): ?>
			<h4 class="journal__single--categoria">
				<?php echo $post->terms['category'][0]->name ?>
			</h4>
			<?php endif ?>
			<h4 class="journal__single--date"><?php echo formatDate($post->post_date, "M. d, y") ?></h4>
			<h3 class="journal__single--ttl"><?php echo $post->post_title ?></h3>
			<div class="journal__single--desc">
				<p class="journal__single--parrafo">
					<?php echo wpautop($post->post_content) ?>
				</p>
			</div>
		</div>
	</div>
</section>

<!-- Slider -->
<section class="journal__single--slider">
	<div class="journal__single--slick" id="post-gallery_JS">
		<?php foreach ($post->gallery as $slide): ?>
			<div class="journal__single--slick-slide">
				<div class="journal__single--slick-box">
					<img class="journal__single--slick-image" src="<?php echo $slide->getImgSrc('large') ?>" alt="">
				</div>
			</div>
		<?php endforeach ?>

	</div>
</section>

<!-- Segundo texto -->

<section class="journal__single">
	<div class="grid__container">
		<div class="journal__single--text segundo-texto">
			<?php if (!empty($post->post_content)): ?>
			<div class="journal__single--segundo--parrafo">
				<?php echo wpautop($post->post_content) ?>
			</div>
			<?php endif ?>
			<hr class="journal__single--divider"></hr>
			<h5 class="journal__single--copy">S.F. & CO.</h5>
		</div>
	</div>
</section>
<section class="journal__single">
	<div class="grid__container">
		<div class="journal__single--backTop">
			<hr class="journal__single--divider--dotted"></hr>

			<a href="#journal-top" class="journal__single--back link-back-journal bktop">BACK TO Top</a>
		</div>
	</div>
</section>


<?php get_footer('journal'); ?>
