<?php
/*
 *
 * This is a sample page you can copy and use as boilerplate for any new page.
 *
 */
require_once __DIR__ . '/../inc/above.php';

// Page-specific preparatory code goes here.

?>




<!-- TMV Styles -->
<style>
	.tmv-section .clipboard-button.copied:after {
		content: 'Copied';
		font-size: 10px;
		position: absolute;
		left: 100%;
		color: var(--dark);
		animation: fadeout 2s 1 ease-out forwards;
	}

	@keyframes fadeout {
	  0%, 50% {
		opacity: 1;
	  }
	  100% {
		opacity: 0;
	  }
	}
	
</style>
<!-- END: TMV Styles -->
<!-- TMV Section -->
<!-- @Adi: Show this Section only if user is Signed into Wordpress !!! -->
<section class="tmv-section">
	<div class="container">
		<!-- Intro -->
		<div class="row">
			<div class="columns small-12 medium-10 large-8">
				<div class="h2 strong text-lowercase space-50-top space-min-bottom">Tile Map Viewer</div>
				<div class="h5 text-neutral-2 space-50-bottom">
					Minimium Size: 14304 × 9888. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi veniam, repudiandae aut incidunt voluptatum quidem, nesciunt facilis labore temporibus molestias quaerat dicta magni illo obcaecati praesentium. Impedit, voluptas. Laborum, ad.
				</div>
			</div>
		</div>
		<!-- END: Intro -->
		<!-- Upload -->
		<div class="row">
			<div class="columns small-12 medium-10 large-8">
				<input id="file" class="js_map_image visuallyhidden" type="file" name="map-image" accept="image/*" required>
				
				<!-- Hide when Processing -->
				<label for="file" class="upload-button button fill-red-2 button-icon" style="--bg-i: url('../media/icon/icon-right-triangle-light.svg?v=20200127'); --bg-c: var(--red-1);">
					Upload New Image
				</label>

				<!-- Hide when Not Processing -->
				<label class="processing-button button fill-red-1 text-light no-pointer button-icon" style="--bg-i: url('../media/icon/icon-hour-glass-light.svg?v=20200127'); --bg-c: var(--red-1);">
					Generating Tiles&nbsp;
				</label>

				<br>
				<!-- Print Active Upload File Name Here -->
				<div class="file-name label space-min-top space-50-bottom">No Files Selected</div>

			</div>
		</div>
		<!-- END: Upload -->
		<!-- Listing -->
		<div class="row">
			<div class="columns small-11 medium-8 large-6">
				<div class="h5 strong space-50-top space-min-bottom">Generated Tiles:</div>

				<!-- For Each Item -->
				<div class="row" style="border-top: solid 1px var(--neutral-2);">
					<div class="columns small-10 medium-11 inline-middle">
						<!-- If you check to see if the original.png file is present in the folder you will know if the tiles have been processed -->
						<a class="name h6 condensed text-red-2" target="_blank" href="https://google.com">VivaCity-Masterplan</a>
					</div>
					<div class="columns small-2 medium-1 inline-middle">
						<button class="clipboard-button icon-button copied inline" tabindex="-1" style="background-image: url('../media/icon/icon-clipboard-red.svg<?php echo $ver ?>');"><!-- Copy to CLipboard --></button>
					</div>
				</div>
				<!-- END: For Each Item -->

				<!-- [Delete] For Each Item Example -->
				<div class="row" style="border-top: solid 1px var(--neutral-2);">
					<div class="columns small-10 medium-11 inline-middle">
						<a class="name h6 condensed text-red-2" target="_blank" href="https://google.com">OneCity-Tower-D</a>
					</div>
					<div class="columns small-2 medium-1 inline-middle">
						<button class="clipboard-button icon-button inline" tabindex="-1" style="background-image: url('../media/icon/icon-clipboard-red.svg<?php echo $ver ?>');"></button>
					</div>
				</div>
				<!-- END: [Delete] For Each Item Example -->

			</div>
		</div>
		<!-- END: Listing -->
	</div>
</section>
<!-- END: TMV Section -->





<?php require_once __DIR__ . '/../inc/below.php'; ?>
