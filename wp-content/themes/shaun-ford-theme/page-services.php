<?php $page_services = new Cltvo_Page_Services ?>

<?php get_header(); ?>

<section class="services__hero background-image" <?php if(!empty($page_services->thumbail_img)): ?>style="background-image: url(<?php echo $page_services->thumbail_img->src ?>)"<?php endif ?>>
	<div class="notfound__layer"></div>
	<div class="grid__row--fullscreen" style="overflow-y: scroll;">
		<div class="grid__container--fluid">
			<div class="grid__col-1-1 services__col">
				<div class="services__head">
					<h1 class="services__title"><?php echo $page_services->post->post_title ?></h1>
					<?php if (!empty($page_services->post->post_content)): ?>
						<div class="services__text">
							<!-- Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.  -->
							<?php echo wpautop($page_services->post->post_content) ?>
						</div>
					<?php endif ?>
				</div>
				<div class="services__footer">
					<?php foreach ($page_services->services as $service): ?>
						<div class="services__col-1-3">
							<h2 class="services__footer-title"><?php echo $service['title'] ?></h2>
							<p class="services__footer-text">
								<?php echo $service['description'] ?>
							</p>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
