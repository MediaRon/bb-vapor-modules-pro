.fl-node-<?php echo $id; ?> .fl-bbvm-simple-separator {
	clear: both;
	width: <?php echo absint( $settings->width ); ?>%;
	border-top-color: <?php echo (6 == strlen( $settings->color ) ) ? '#' . $settings->color : $settings->color; ?>;
	border-top-style: <?php echo $settings->style; ?>;
	border-top-width: <?php echo absint( $settings->height ); ?>px;
	background: transparent;
}