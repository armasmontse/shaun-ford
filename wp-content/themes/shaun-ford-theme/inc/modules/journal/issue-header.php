<section class="issue__header">
	<div class="grid__container journal__navbar--responsive--container">
		<div class="journal__navbar--temporada">
			<?php if (!empty($issue)): ?>
				<?php if ($print_back_link): ?>
					<a href="<?php echo $issue->permalink ?>" class="journal__navbar--backissue link-back-journal">< BACK TO <?php echo $issue->post->post_title ?></a>
				<?php endif ?>
				<?php if (!empty($issue->thumbail_img)): ?>
					<img style="margin-left: auto;" class="journal__navbar--backissue--logo" src="<?php echo $issue->thumbail_img->getImgSrc('large') ?>" alt="">
				<?php endif ?>
			<?php endif ?>
		</div>
	</div>
</section>