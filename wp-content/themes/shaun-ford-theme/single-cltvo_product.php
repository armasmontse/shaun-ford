<?php

$page_products = new Cltvo_Page_Products;
$current_product = new Cltvo_Product;

$term_posts = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'cltvo_product',
        'tax_query' => array(
            array(
                'taxonomy' => Cltvo_Page_Products::TAXONOMY,
                'field' => 'term_id',
                'terms' => $page_products->current_term_id,
            )
        )
    )
);

?>

<?php get_header(); ?>

	<section class="archive">
		<div class="grid__row">
			<div class="grid__container--fluid">
				<div class="archive__hero"> <!-- Contenedor que permite que la pantalla se ponga al 100% -->

					<div class="archive__slider-container">

						<div class="archive__content-wrapper">
							<div class="grid__row">
								<div class="grid__container archive__zoom-container" style="text-align: center;">
									<div class="archive__menu">
										<ul class="archive__terms-menu">
											<?php $featuredTerm = $page_products->featuredTerm() ?>
											<li class="archive__terms-item">
												<a <?php if ($featuredTerm->current): ?>class="active"<?php endif ?> href="<?php echo $featuredTerm->permalink ?>">
													<?php echo $featuredTerm->term->name ?>
												</a>
											</li>
											<?php foreach ($page_products->terms() as $term): ?>
												<li class="archive__terms-item">
													<a <?php if ($term->current): ?>class="active"<?php endif ?> href="<?php echo $term->permalink ?>">
														<?php echo $term->term->name ?>
													</a>
												</li>
											<?php endforeach ?>
										</ul>
										<div class="archive__products-container">
											<ul class="archive__products-menu">
												<?php foreach ($term_posts as $post): ?>
													<li class="archive__products-item">
														<a <?php if ($current_product->post->ID == $post->ID): ?>style="text-decoration: underline;"<?php endif ?> href="<?php echo get_post_permalink($post->ID) ?>">
															<?php echo $post->post_title ?>
														</a>
													</li>
												<?php endforeach ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="archive__slider-wrapper">
							<div class="grid__row--fullscreen">
								<div class="grid__container--fluid" style="height: 100%;">
									<div class="slick-wrapper">
										<?php $gallery = $current_product->gallery() ?>
										<?php foreach ($gallery as $image): ?>
											<div class="background-image--center archive__slide" style="background-image: url('<?php echo $image->src ?>');">
												<div class="archive__layer"></div>
												<div class="grid__row--fullscreen">
													<div class="grid__container archive__slide-container">
														<div class="grid__col-1-1 archive__slide-content"></div>
													</div>
												</div>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>

						<div class="archive__thumbs-wrapper">
							<div class="grid__row">
								<div class="grid__container--fluid">
									
									<div class="archive__wordpress">
										<h1 class="archive__title"><?php echo $current_product->post->post_title ?></h1>
										<div class="archive__description"><?php echo wpautop($current_product->post->post_content) ?></div>
										<button class="myImg projects__zoom-button open_JS" data-target=".projects__modal" style="margin-top: 0;">view full image</button>
									</div>

									<div class="archive__gallery-dots slick-dots-wrapper"></div>

									<!-- <div class="projects__gallery-open">
										<button class="projects__gallery-open-button projects__arrow--up open_JS" data-target=".slick-nav, .projects__slide-container" data-open="CLOSE GALLERY" data-close="OPEN GALLERY">
											Open gallery
										</button>
									</div> -->
									
									<div class="slick-nav">
										<?php foreach ($gallery as $image): ?>
											<div class="archive__gallery-image">
												<div class="archive__layer"></div>
												<img src="<?php echo $image->src_medium ?>" alt="">
											</div>
										<?php endforeach ?>
									</div>

								</div>
							</div>
						</div>

						<button class="slick-prev slick-arrow" aria-label="Previous" type="button"></button>
						<button class="slick-next slick-arrow" aria-label="Next" type="button"></button>

					</div>

					<!-- The Modal -->
					<div id="myModal" class="projects__modal">

						<!-- The Close-modal Button -->
						<button class="projects__modal-close open_JS" data-target=".projects__modal">&times; close</button>

						<!-- Modal Content (The Image) -->
						<div class="projects__modal-content">
							<div class="slick-test">
								<?php foreach ($gallery as $image): ?>
									<div style="height: 100%;display: flex; align-content: center;">
										<img src="<?php echo $image->getImgSrc('large') ?>" style="margin: auto; display: block; height: auto; width: auto; max-width: 700px; max-height: 100%;" alt="">
									</div>
								<?php endforeach ?>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
