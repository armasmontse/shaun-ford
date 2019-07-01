<?php $contact = new Cltvo_Page_Contact ?>
<section class="issue__instagram">
	<div class="issue__instagram--follow">
		<a class="rotate" href="https://www.instagram.com/shaunfordandco/" target="_blank">FOLLOW OUR INSTAGRAM</a>
	</div>
	<div class="issue__instagram--box">
		<?php foreach ($contact->instagram_photos as $img): ?>
			<figure>
				<img class="issue__instagram--img" src=" <?php echo $img ?> " alt="">
			</figure>
		<?php endforeach ?>
	</div>
</section>