<?php $page_showroom = new Cltvo_Page_Showroom ?>

<?php get_header(); ?>

	<section class="showroom">
		<div class="grid__row">
			<div class="grid__container--fluid">
				<div class="showroom__hero"> <!-- Contenedor que permite que la pantalla se ponga al 100% -->
					
					<div class="showroom__slider-container">

						<div class="showroom__slider-wrapper">
							<div class="grid__row--fullscreen">
								<div class="grid__container--fluid" style="height: 100%;">
									<div class="slick-wrapper">
										<?php foreach ($page_showroom->gallery as $image): ?>
											<div class="background-image--center showroom__slide" style="background-image: url('<?php echo $image->src ?>');">
												<div class="showroom__layer"></div>
												<div class="grid__row--fullscreen">
													<div class="grid__container showroom__slide-container">
														<div class="grid__col-1-1 showroom__slide-content"></div>
													</div>
												</div>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>

						<div class="showroom__thumbs-wrapper">
							<div class="grid__row">
								<div class="grid__container--fluid">
									
									<div class="archive__wordpress">
										<button class="myImg showroom__zoom-button open_JS" data-target=".showroom__modal">view full image</button>	
									</div>

									<div class="showroom__gallery-dots slick-dots-wrapper"></div>
									
									<!-- <div class="showroom__gallery-open">
										<button class="showroom__gallery-open-button showroom__arrow--up open_JS" data-target=".slick-nav, .showroom__slide-container" data-open="CLOSE GALLERY" data-close="OPEN GALLERY">
											Open gallery
										</button>
									</div> -->
									
									<div class="slick-nav">
										<?php foreach ($page_showroom->gallery as $image): ?>
											<div class="showroom__gallery-image">
												<div class="showroom__layer"></div>
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
					<div id="myModal" class="showroom__modal">

						<!-- The Close-modal Button -->
						<button class="showroom__modal-close open_JS" data-target=".showroom__modal">&times; close</button>

						<!-- Modal Content (The Image) -->
						<div class="showroom__modal-content">
							<div class="slick-test">
								<?php foreach ($page_showroom->gallery as $image): ?>
									<div style="height: 100%;display: flex; align-content: center;">
										<img src="<?php echo $image->src_large ?>" style="margin: auto; display: block; height: auto; width: auto; max-width: 700px; max-height: 100%;" alt="">
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