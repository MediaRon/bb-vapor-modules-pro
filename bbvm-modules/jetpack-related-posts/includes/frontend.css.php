<?php
$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : 'FFFFFF';
$text_color = BBVapor_Modules_Pro::get_color( $text_color );

$heading_color = isset( $settings->heading_color ) ? esc_attr( $settings->heading_color ) : 'FFFFFF';
$heading_color = BBVapor_Modules_Pro::get_color( $heading_color );

$title_color = isset( $settings->title_color ) ? esc_attr( $settings->title_color ) : 'FFFFFF';
$title_color = BBVapor_Modules_Pro::get_color( $title_color );

// Padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'related_posts_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-related-posts-for-beaverbuilder",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'related_posts_padding_top',
			'padding-right'  => 'related_posts_padding_right',
			'padding-bottom' => 'related_posts_padding_bottom',
			'padding-left'   => 'related_posts_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'related_posts_margin',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-related-posts-for-beaverbuilder",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'related_posts_margin_top',
			'margin-right'  => 'related_posts_margin_right',
			'margin-bottom' => 'related_posts_margin_bottom',
			'margin-left'   => 'related_posts_margin_left',
		),
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper.grid {
	display: flex;
	flex-wrap: wrap;
	justify-content: flex-start;
}
.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-items {
	box-sizing: border-box;
	padding: 10px;
}
.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-1 {
	width: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-2 {
  width: 50%;
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-2 {
		width: 100%;
	}
}
.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-3 {
	 width: 33%;
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-3 {
		width: 50%;
	}
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-3 {
		width: 100%;
	}
}
.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-4 {
	width: 25%;
}
@media only screen and (max-width: 800px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-4 {
		width: 33%;
	}
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-4 {
		width: 50%;
	}
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-4 {
		width: 100%;
	}
}
.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-5 {
	width: 20%;
}
@media only screen and (max-width: 1000px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-5 {
		width: 25%;
	}
}
@media only screen and (max-width: 800px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-5 {
		width: 33%;
	}
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-5 {
	width: 50%;
	}
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-5 {
		width: 100%;
	}
}
.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-6 {
	width: 16%;
}
@media only screen and (max-width: 1000px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-6 {
		width: 25%;
	}
}
@media only screen and (max-width: 800px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-6 {
		width: 33%;
	}
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-6 {
		width: 50%;
	}
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper .columns-6 {
		width: 100%;
	}
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder {
	color: <?php echo esc_html( $text_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder h3,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder h4 {
	margin: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder h4.jp-relatedposts-post-title .jp-relatedposts-post-a {
	display: inline-block;
	color: <?php echo esc_html( $title_color ); ?>;
	margin-top: 10px;
	margin-bottom: 10px;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder .jp-relatedposts-items p.jp-relatedposts-post-excerpt {
	margin-bottom: 10px;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder .jp-relatedposts-headline {
	color: <?php echo esc_html( $heading_color ); ?>;
	padding-left: 10px;
}.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder h3.jp-relatedposts-headline em {
	font-style: normal;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder h3.jp-relatedposts-headline em:before {
	content: '';
	display: inline-block;
	border-top: 1px solid <?php echo esc_html( $text_color ); ?> !important;
	top: -10px;
	height: 1px;
	width: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder .jp-relatedposts-items p.jp-relatedposts-post-date, .fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder .jp-relatedposts-items p.jp-relatedposts-post-context {
	opacity: 0.3 !important;
	margin-bottom: 0;
}
<?php if ( 'list' === $settings->layout ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-related-posts-for-beaverbuilder .jp-relatedposts-items {
		clear: left;
		margin-bottom; 20px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .jp-relatedposts-wrapper.list img {
		float: left;
		overflow: hidden;
		max-width: 33%;
		margin-right: 3%;
		margin-bottom: 20px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> #jp-relatedposts .jp-relatedposts-list h4.jp-relatedposts-post-title {
		display: inline-block;
		max-width: 63%;
	}
<?php endif; ?>
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-related-posts-for-beaverbuilder
	.jp-relatedposts-headline",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'link_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-related-posts-for-beaverbuilder h4.jp-relatedposts-post-title .jp-relatedposts-post-a",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'excerpt_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-related-posts-for-beaverbuilder .jp-relatedposts-items p.jp-relatedposts-post-excerpt",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'date_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-related-posts-for-beaverbuilder .jp-relatedposts-items p.jp-relatedposts-post-date",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'context_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-related-posts-for-beaverbuilder .jp-relatedposts-items p.jp-relatedposts-post-context",
	)
);
