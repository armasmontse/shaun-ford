<?php $journal = new Cltvo_Page_Journal ?>

<?php get_header('journal'); ?>

<?php includeWithVariables('/inc/modules/journal/issue-header.php', array('issue' => $journal->issue, 'print_back_link' => false)) ?>

<!-- Issue -->
<section class="issue-background" style="background-image: url(<?php echo $journal->issue->image->getImgSrc('large') ?>);"> 
	<div class="notfound__layer"></div>
	<div class="issue__row">
		<div class="issue__container ">
			<div class="issue__col-1-1">
				<div class="issue__head">
					<h4 class="issue__head--date">CURRENT ISSUE / <?php echo formatDate($journal->issue->post->post_date, "F Y") ?></h4>
					<h2 class="issue__head--category"><?php echo $journal->issue->post->post_title ?></h2>
					<div class="issue__head--text">
						<?php echo wpautop($journal->issue->post->post_content) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="issue-journal">
	<div class="issue__row">
		<div class="issue__container">
			<?php foreach ($journal->issue->posts as $post): ?>
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
							<?php echo formatDate($post->post->post_date, "M. d, y") ?> <!-- Aug. 17, 2017 -->
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
	<div class="issue__row">
		<div class="issue__container">
			<a class="issue__link-view link-back-journal" href="<?php echo specialPagePermalink('archive') ?>">+ VIEW ARCHIVE</a>
		</div>
	</div>
</section>

<section class="issue-backgroundColor">
	<div class="issue__row">
		<div class="issue__container">
			<div class="issue__col-1-1">
				<h2 class="issue__palette-title">Monthly palette inspiration</h2>
				<div class="issue__palette-contImage ">
					<div class="issue__palette-image">
						<img src="<?php echo THEMEURL ?>images/collage.png" alt="">
					</div>					
				</div>
			</div>
		</div>
	</div>
</section>

<section class="issue-backgroundPhrases">
	<div class="issue__row">
		<div class="issue__container">
			<div class="issue__col-1-1 issue__phrases">
				
				<h2 class="issue__phrases--ttl">“Styles come and go. Good design is a language, not a style.”</h2>
				<h3 class="issue__phrases--author"><span>SHAUN ford</span></h3>
				<div class="issue__phrases-firm sixteen-nine">
					<div class="issue__phrases-image content">
						<img src="<?php echo THEMEURL ?>images/firm.svg" alt="Firm">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- modal -->
<div class="modal modal--show">
	<div class="modal__content" style="height: 100%;">
		
		<?php if ($journal->open): ?>
			<div class="modal-close modalClose"><span>X CLOSE</span></div>
		<?php endif	?>
		
		<div class="modal__content-text">
			<div class="modal__content-text--ttl">
				<h5 class="modal__content-text--ttl--welcome">
					<?php if ($journal->open): ?>
						WELCOME TO
					<?php else: ?>
						COMING SOON
					<?php endif	?>
				</h5>
				<h2 class="modal__content-text--ttl--titleJournal">Shaun’s Journal</h2>
			</div>
			<div class="modal__content-text--txt">
				<!-- <p>Shaun’s Journal is a casual lorem ipsum dolor sit amet, 
				consectetuer adipiscing elit, sed diam nonummy nibh euismod 
				tincidunt ut laoreet dolore magna aliquam erat volutpat.
				Ut wisi enim ad minim veniam, quis nostrud exerci tation 
				ullamcorper suscipit lobortis nisl ut aliquipex ea commodo consequat. </p> -->
				<?php echo wpautop($journal->post->post_content) ?>
			</div>
			<div class="modal__content-text--continue modalClose">
				<div class="modal__content-text--linkContinue">
				<?php if ($journal->open): ?>
						CONTINUE TO CURRENT ISSUE > 
				<?php else: ?>
						<a href="<?php echo BLOGURL ?>">BACK TO MAIN SITE</a>
				<?php endif	?>
				</div>
			</div>
		</div>
		<div class="modal__content-image">
			<?php if (!empty($journal->thumbail_img)): ?>
				<img src="<?php echo $journal->thumbail_img->getImgSrc('large') ?>" alt="">
			<?php endif ?>
		</div>
	</div>
</div>
<div class="modal-overlay"></div>

<!-- Instagram -->
<?php include get_stylesheet_directory() . '/inc/modules/journal/instagram.php'; ?>

<script>

	(function($) {

		var journal_is_open = <?php echo json_encode($journal->open) ?>

		if (journal_is_open) {
			// Modal 
			var $modalOverlay = $('.modal-overlay'),
		    $modalContainer = $('.modal'),
		    $modalClose = $('.modalClose');

			$modalOverlay.on('click', function(){
			  $modalContainer.toggleClass('modal--show');
			});

			$modalClose.on('click', function(){
			  $modalContainer.removeClass('modal--show');
			});
		}else {
			$("body").css({"overflow":"hidden"});
		}

	})(jQuery);

</script>

<?php get_footer('journal'); ?>
