<?php $contact = new Cltvo_Page_Contact ?>
<div class="instagram" id="instagram-feed">
	<div class="instagram__overlay instagram_JS"></div>
	<div class="instagram__wrapper">
		<div class="instagram__container">
			<div class="instagram__close">
				<button class="instagram_JS">&times; CLOSE</button>
			</div>
			<div class="instagram__title">
				<p>Shaun's Feed</p>
			</div>
			<div class="instagram__gallery nano">
				<div class="nano-content">
					<?php foreach ($contact->instagram_photos as $img): ?>
						<div class="instagram__gallery-container">
							<figure class="instagram__gallery-image">
								<img src="<?php echo $img ?>" alt="">
							</figure>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="instagram__footer">
				<a href="<?php echo $contact->social_net['instagram']['link'] ?>" target="_blank">View more on <br>our Instagram ></a>
			</div>
		</div>
	</div>
</div>