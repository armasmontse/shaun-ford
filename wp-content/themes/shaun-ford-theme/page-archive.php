<?php $archive = new Cltvo_Page_Journal_Archive ?>

<?php get_header('journal'); ?>

<!-- Archive Issue -->
<section class="archive-background" style="background-color: whitesmoke; <?php if (!empty($archive->thumbail_img)): ?>background-image: url(<?php echo $archive->thumbail_img->getImgSrc('large') ?>);<?php endif ?>"> 
	<div class="notfound__layer"></div>
	<div class="issue__row">
		<div class="issue__container">
			<div class="issue__col-1-1">
				<div class="issue__head">
					<h4 class="issue__head--date">ALL ISSUES</h4>
					<h2 class="issue__head--category">Archive</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="archive__issues">
	<div class="issue__row">
		<div class="issue__container">
			<div class="issue__col-1-1 archive__issues-filter">
				<div class="archive__filter">FILTER BY</div>
				<nav class="archive__filters">
					<?php foreach ($archive->post_terms as $term): ?>
						<a href="<?php echo $term->permalink ?>" class="archive__filters--category"><?php echo $term->name ?></a>
					<?php endforeach ?>
				</nav>
			</div>
		</div>
	</div>
</section>

<section class="issue-journal archive__all-issues">
	<div class="issue__row">
		<div class="issue__container">
			<?php foreach ($archive->posts as $post): ?>
			<div class="issue__col-1-3">
				<div class="issue__box" style="background-color: whitesmoke;">
					<?php if (!empty($post->thumbail_img)): ?>
						<img class="issue__box-image" src="<?php echo $post->thumbail_img->getImgSrc('large') ?>" alt="">
					<?php endif ?>
				</div>
				<div class="issue__box-text">
					<?php if (!empty($post->issue)): ?>
						<h4 class="issue__box-text--categoryIssue"><?php echo $post->issue->post->post_title ?></h4>
					<?php endif ?>
					<h3 class="issue__box-text--date">
						<?php if (!empty($post->terms['category'])): ?>
							<a href="<?php echo get_term_link($post->terms['category'][0]) ?>" class="issue__box-text--category">
								<?php echo $post->terms['category'][0]->name ?>
							</a>
						<?php endif ?>
						<?php echo formatDate($post->post->post_date, "M. d, y") ?>
					</h3>
					<h2 class="issue__box-text--tittle">
						<a href="<?php echo $post->permalink ?>"><?php echo $post->post->post_title ?></a>
					</h2>
					<p class="issue__box-text--description">
						<?php echo strip_tags(apply_filters('the_excerpt', $post->post->post_content)) ?>
					</p>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	
	<!-- <div class="issue__row">
		<div class="issue__container">
			<div class="issue__link-view--morePost link-back-journal">+ VIEW MORE posts</div>
		</div>
	</div> -->
		
</section>

<!-- Instagram -->
<?php include get_stylesheet_directory() . '/inc/modules/journal/instagram.php'; ?>

<?php get_footer('journal'); ?>
