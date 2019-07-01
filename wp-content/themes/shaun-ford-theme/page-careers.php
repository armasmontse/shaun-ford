<?php $page_careers = new Cltvo_Page_Careers ?>

<?php get_header(); ?>

<section class="careers__hero background-image" <?php if(!empty($page_careers->thumbail_img)): ?>style="background-image: url(<?php echo $page_careers->thumbail_img->src ?>)"<?php endif ?>>
	<div class="notfound__layer"></div>
	<div class="grid__row--fullscreen">
		<div class="grid__container">
			<div class="grid__col-1-2 careers__col">
				<div class="careers__title-box">
					<h2 class="careers__title"><?php echo $page_careers->subtitle ?></h2>
				</div>
			</div>
			<div class="grid__col-1-2 careers__col">
				<?php if (!empty($page_careers->careers)): ?>
					<div class="nano careers__nano">
						<div class="nano-content careers__nano-content">
							<?php foreach ($page_careers->careers as $career): ?>
								<div class="careers__vacancy-box">
									<h3 class="careers__vacancy-title"><?php echo $career->post->post_title ?></h3>
									<div class="careers__vacancy-description">
										<?php echo wpautop($career->post->post_content) ?>
									</div>
									<a class="careers__vacancy-link" href="mailto:<?php echo $page_careers->mail ?>">Submit your CV</a>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>