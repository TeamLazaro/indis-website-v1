<?php
/*
 *
 * The is the Home page
 *
 */
require_once __DIR__ . '/../inc/above.php';

// In the context of this page,
// 	`allProjectsExcludingCurrent` literally refers to "all the projects"
$projects = &$allProjectsExcludingCurrent;

// Consolidate the featured spotlights across all projects
$featuredSpotlights = [ ];
foreach ( $projects as $project ) {
	$projectSpotlights = getContent( [ ], 'spotlight_list', $project[ 'ID' ] );
	foreach ( $projectSpotlights as $spotlight ) {
		if ( ! $spotlight[ 'spotlight_featured' ] )
			continue;
		$spotlight[ 'project' ] = $project[ 'post_title' ];
		$spotlight[ 'permalink' ] = $project[ 'permalink' ];
		$featuredSpotlights[ ] = $spotlight;
	}
}
shuffle( $featuredSpotlights );
$numberOfSpotlights = str_pad( count( $featuredSpotlights ), 2, '0', STR_PAD_LEFT );

?>





<!-- Sample Page Content -->
<section class="sample-section">
	<div class="container">
		<div class="row">
			<div class="columns small-12">
			</div>
		</div>
	</div>
</section>
<!-- END: Sample Page Content -->


<!-- Project List Section -->
<section data-section="Projects List" class="project-list-section space-25-top space-100-bottom">
	<div class="container">
		<div class="project-list row">
			<div class="project-item-container columns small-12 medium-6 large-4">
				<div class="project-list-intro space-25-left">
					<div class="logo"><a href="<?php echo $baseURL ?>" class="inline"><img class="block" src="../media/indis-logo-dark.svg<?php echo $ver ?>"></a></div>
					<div class="list-title space-50-top-bottom">
						<div class="h2 strong text-lowercase">Find an <span class="text-red-2">Indis</span> home near you</div>
					</div>
				</div>
			</div>
			<?php foreach ( $projects as $project ) : ?>
				<div class="project-item-container columns small-12 medium-6 large-4">
					<a href="<?= $project[ 'permalink' ] ?>" class="project-item block fill-neutral-2 js_project_item" tabindex="-1">
						<img src="<?= getContent( '', 'cover_images -> 0 -> sizes -> large', $project[ 'ID' ] ) ?>">
						<div class="project-card fill-dark space-25">
							<div class="title h4 strong"><?= $project[ 'post_title' ] ?></div>
							<div class="location label"><?= getContent( '', 'location', $project[ 'ID' ] ) ?></div>
							<hr class="dash">
							<div class="type h6 strong space-25-top"><?= getContent( '', 'type', $project[ 'ID' ] ) ?></div>
							<div class="price h5 condensed space-min-top"><?= getContent( '', 'price', $project[ 'ID' ] ) ?></div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- END: Project List Section -->


<!-- Carousel: Spotlights -->
<?php if ( ! empty( $featuredSpotlights ) ) : ?>
<div data-section="Spotlight" id="spotlight" class="carousel spotlight indis-carousel js_carousel_container">
	<div class="carousel-list js_carousel_content">
		<div class="carousel-list-item js_carousel_item">
			<div class="carousel-title h2 strong">
				<span class="text-red-2">spotlight</span> <br>apartment <br>units
			</div>
		</div>
		<?php foreach ( $featuredSpotlights as $index => $spotlight ) : ?>
			<div class="carousel-list-item js_carousel_item">
				<div class="card-index text-neutral-2">
					<div class="count h3 inline-bottom"><?= str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ?></div>
					<div class="total label strong text-uppercase inline-bottom"><?= $numberOfSpotlights ?></div>
				</div>
				<div class="carousel-card fill-dark" style="background-image: url( '<?= $spotlight[ 'spotlight_thumbnail' ][ 'sizes' ][ 'small' ] ?>' );">
					<div class="info space-25">
						<div class="project label strong text-neutral-2"><?= $spotlight[ 'project' ] ?></div>
						<div class="info-box">
							<span class="title h5 strong"><?= $spotlight[ 'spotlight_title' ] ?></span>
							<span class="description p text-neutral-2"><?= $spotlight[ 'spotlight_description' ] ?></span>
						</div>
						<div class="price h5 condensed"><?= $spotlight[ 'spotlight_price' ] ?></div>
						<div class="time h6 condensed"><span class="text-uppercase">Valid For :</span> <?= getIntervalString( $spotlight[ 'spotlight_expiry' ] ) ?></div>
					</div>
				</div>
				<a href="<?= $spotlight[ 'permalink' ] ?>#spotlight" target="_blank" class="button fill-neutral-4 text-light button-icon" style="--bg-i: url('../media/icon/icon-right-triangle-light.svg<?php echo $ver ?>'); --bg-c: var(--neutral-2);">Visit Project</a>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="carousel-controls clearfix">
		<div class="container">
			<div class="prev float-left"><button class="button js_pager" data-dir="left"><img class="block" src="../media/icon/icon-left-triangle-dark.svg<?php echo $ver ?>"></button></div>
			<div class="next float-right"><button class="button js_pager" data-dir="right"><img class="block" src="../media/icon/icon-right-triangle-dark.svg<?php echo $ver ?>"></button></div>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- END: Carousel: Spotlights -->


<?php require_once __DIR__ . '/../inc/below.php'; ?>
<script type="text/javascript" src="/js/home.js<?= $ver ?>"></script>
