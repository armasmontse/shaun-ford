<?php $contact = new Cltvo_Page_Contact ?>

<?php get_header(); ?>

<section class="contact__hero background-image" <?php if(!empty($contact->thumbail_img)): ?>style="background-image: url(<?php echo $contact->thumbail_img->src ?>)"<?php endif ?>>
	<div class="notfound__layer"></div>
	<div class="grid__row--fullscreen">
		<div class="grid__container--fluid">
			<div class="grid__col-1-1 contact__col">
				<div class="contact__head">
					<h1 class="contact__title"><?php echo $contact->post->post_title ?></h1>
					<div class="contact__text">
						<?php echo $contact->post->post_content ?>
					</div>
				</div>
				<div class="contact__footer">
					<address class="contact__footer-address">
						<?php echo wpautop($contact->social_net['address']) ?>
					</address>

					<a href="mailto:<?php echo $contact->social_net['mail'] ?>" class="contact__footer-link"><?php echo $contact->social_net['mail'] ?></a> <br>
					<a href="tel:<?php echo $contact->social_net['phone'] ?>" class="contact__footer-link"><?php echo $contact->social_net['phone'] ?></a> <br>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>