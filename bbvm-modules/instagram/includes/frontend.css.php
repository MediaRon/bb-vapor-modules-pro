<?php
if ( 'card' === $settings->layout ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed {
	position: relative;
	display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
	box-sizing: border-box;
}
<?php
if( '1' == $settings->card_columns ) :
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
		width: 100%;
	}
	<?php
endif;
if( '2' == $settings->card_columns ) :
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
		width: 50%;
	}
	@media only screen and (max-width: 500px) {
		.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
			width: 100%;
		}
	}
	<?php
endif;
if( '3' == $settings->card_columns ) :
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
		width: 33.3333%;
	}
	@media only screen and (max-width: 768px) {
		.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
			width: 50%;
		}
	}
	@media only screen and (max-width: 500px) {
		.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
			width: 100%;
		}
	}
	<?php
endif;
if( '4' == $settings->card_columns ) :
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
		width: 25%;
	}
	@media only screen and (max-width: 768px) {
		.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
			width: 50%;
		}
	}
	@media only screen and (max-width: 500px) {
		.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .fl-node-instafeed .instagram-card {
			width: 100%;
		}
	}
	<?php
endif;
endif;
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-author {
	display: flex;
	justify-content: flex-start;
	align-items: center;
	padding: 10px 0;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-author img {
	width: 50px;
	height: 50px;
	border-radius: 100%;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-author a,
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-author a:hover,
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-author a:visited {
	color: #000000;
}

.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-meta {
	font-size: 0.8em;
	text-align: center;
	margin: 10px 0;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-caption {
	font-size: 0.9em;
	text-align: center;
	line-height: 1.3;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-image {
	text-align: center;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-meta span {
	display: inline-block;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-meta .instagram-likes {
	margin-right: 10px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-card {
	background: #<?php echo $settings->card_background_color; ?>;
	color: #<?php echo $settings->card_text_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-card {
	max-width: <?php echo absint( $settings->max_image_width ); ?>px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-card.no-content {
	padding: 0 !important;
	height: 0 !important;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-buttons {
	margin-top: 20px;
	text-align: center;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-buttons a {
	display: inline-block;
	padding: 10px 20px;
	text-decoration: none;
	border-radius: 5px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-buttons a.load-more,
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-buttons a.load-more:hover,
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-buttons a.load-more:visited {
	color: #<?php echo $settings->load_more_text_color; ?>;
	background: #<?php echo $settings->load_more_background_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-buttons a.instagram-follow,
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-buttons a.instagram-follow:hover,
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-buttons a.instagram-follow:visited {
	color: #<?php echo $settings->follow_text_color; ?>;
	background: #<?php echo $settings->follow_background_color; ?>;
}
<?php
if( 'no' === $settings->show_likes_comments ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-meta {
	display: none;
}
<?php
endif;
if( 'no' === $settings->show_caption ):
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-instagram-for-beaverbuilder .instagram-caption {
		display: none;
	}
	<?php
	endif;
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'card_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-instagram-for-beaverbuilder .instagram-card",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'card_padding_top',
		'padding-right'  => 'card_padding_right',
		'padding-bottom' => 'card_padding_bottom',
		'padding-left' 	 => 'card_padding_left',
	),
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'likes_comments_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-instagram-for-beaverbuilder .instagram-card .instagram-meta"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'caption_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-instagram-for-beaverbuilder .instagram-card .instagram-caption"
) );
?>
