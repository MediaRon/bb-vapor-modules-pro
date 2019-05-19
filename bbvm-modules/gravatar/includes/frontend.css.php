<?php
if( 'circular' === $settings->avatar_type ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-gravatar img {
	width: <?php echo absint( $settings->avatar_size ); ?>px;
	height: <?php echo absint( $settings->avatar_size ); ?>px;
	min-width: <?php echo absint( $settings->avatar_size ); ?>px;
	min-height: <?php echo absint( $settings->avatar_size ); ?>px;
	border-radius: 100%;
}
<?php
endif;
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-gravatar-for-beaverbuilder {
	text-align: <?php echo $settings->avatar_align; ?>;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'avatar_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-gravatar-for-beaverbuilder h2"
) );
?>