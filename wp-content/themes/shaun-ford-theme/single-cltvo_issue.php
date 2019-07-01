<?php $issue = new Cltvo_Issue ?>

<?php get_header('journal'); ?>

<?php includeWithVariables('/inc/modules/journal/issue-header.php', array('issue' => $issue, 'print_back_link' => false)) ?>

<!-- Issue -->
<section class="issue-background" style="background-image: url(<?php echo $issue->image->getImgSrc('large') ?>);"> 
	<div class="notfound__layer"></div>
	<div class="issue__row">
		<div class="issue__container ">
			<div class="issue__col-1-1">
				<div class="issue__head">
					<h4 class="issue__head--date">
						<?php if ($issue->is_current): ?>
							CURRENT ISSUE /
						<?php endif ?>
						<?php echo formatDate($issue->post->post_date, "F Y") ?></h4>
					<h2 class="issue__head--category"><?php echo $issue->post->post_title ?></h2>
					<div class="issue__head--text">
						<?php echo wpautop($issue->post->post_content) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="issue-journal">
	<div class="issue__row">
		<div class="issue__container">
			<?php foreach ($issue->posts as $post): ?>
				<div class="issue__col-1-3">
					<div class="issue__box" style="background-color: whitesmoke;">
						<?php if (!empty($post->thumbail_img)): ?>
							<img class="issue__box-image" src="<?php echo $post->thumbail_img->getImgSrc('large') ?>" alt="">
						<?php endif ?>
					</div>
					<div class="issue__box-text">
						<h4 class="issue__box-text--categoryIssue"><?php echo $post->issue->post->post_title ?></h4>
						<h3 class="issue__box-text--date">
							<?php if (!empty($post->terms['category'])): ?>
								<a href="<?php echo get_term_link($post->terms['category'][0]) ?>" class="issue__box-text--category">
									<?php echo $post->terms['category'][0]->name ?>
								</a>
							<?php endif ?>
							<?php echo formatDate($post->post->post_date, "M. d, y") ?> <!-- Aug. 17, 2017 -->
						</h3>
						<h2 class="issue__box-text--tittle"><a href="<?php echo $post->permalink ?>"><?php echo $post->post->post_title ?></a></h2>
						<p class="issue__box-text--description">
							<?php echo strip_tags(apply_filters('the_excerpt', $post->post->post_content)) ?>
						</p>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	<div class="issue__row">
		<div class="issue__container">
			<div class="issue__link-view link-back-journal" href="<?php echo specialPagePermalink('archive') ?>">+ VIEW ARCHIVE</div>
		</div>
	</div>
</section>

<!-- Instagram -->
<?php include get_stylesheet_directory() . '/inc/modules/journal/instagram.php'; ?>

<?php get_footer('journal'); ?>