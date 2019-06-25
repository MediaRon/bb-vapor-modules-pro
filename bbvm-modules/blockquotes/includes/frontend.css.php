@keyframes bbvm-clockwise {
	0% {
		transform:rotate(0);
	}
	100% {
		transform:rotate(360deg);
	}
}

@keyframes bbvm-counter {
	0% {
		transform:rotate(0);
	}
	100% {
		transform:rotate(-360deg);
	}
}
@keyframes bbvm-shadows {
	0% {
		box-shadow:0 2px 4px -2px rgba(0,0,0,.25);
		transform:scale(.95);
	}
	100% {
		box-shadow:0 0 4px 2px rgba(0,0,0,.25);
		transform:scale(1);
	}
}
.fl-node-<?php echo esc_html( $id ); ?> blockquote {
	margin:0;
	padding:0;
	border:0;
	outline:0;
	font-size:100%;
	vertical-align:baseline;
	background:transparent;
	quotes:none;
}

.fl-node-<?php echo esc_html( $id ); ?> blockquote:before,
.fl-node-<?php echo esc_html( $id ); ?> blockquote:after {
	content:'';
	content:none;
}
<?php
if ( 'bold' === $settings->blockquote_style ) :
	$bold_quote_color = isset( $settings->bold_quote_color ) ? esc_attr( $settings->bold_quote_color ) : 'rgba(206, 255, 246, 0.8)';
	$bold_quote_color = BBVapor_Modules_Pro::get_color( $bold_quote_color );

	$text_shadow_color = isset( $settings->bold_text_shadow_color ) ? esc_attr( $settings->bold_text_shadow_color ) : 'rgba(206, 255, 246, 0.2)';
	$text_shadow_color = BBVapor_Modules_Pro::get_color( $text_shadow_color );

	$bold_background_color = isset( $settings->bold_background_color ) ? esc_attr( $settings->bold_background_color ) : 'FFFFFF';
	$bold_background_color = BBVapor_Modules_Pro::get_color( $bold_background_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		display: flex;
		background: <?php echo esc_html( $bold_background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote {
		position: relative;
		color: #2e6057;
		max-width: <?php echo absint( $settings->max_width ); ?>%;
		margin: 20px auto;
		align-self: center;
		padding: 100px 40px 200px 40px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h2 {
		color: #224841;
		position: relative;
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		font-size: 2.5rem;
		font-weight: normal;
		line-height: 0.8;
		margin: 0;
		z-index: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h2:after {
		content:"’";
		position: absolute;
		top: -3rem;
		font-family: sans-serif;
		left: 0;
		font-size: 100rem;
		line-height: 0.7;
		color: <?php echo esc_html( $settings->bold_quote_color ); ?>;
		text-shadow: -3rem -3rem 0 <?php esc_html( $settings->text_shadow_color ); ?>;
		z-index: -1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h2:before {
		content:"’";
		position: absolute;
		font-family: sans-serif;
		top: 0;
		left: 3rem;
		font-size: 100rem;
		line-height: 0.7;
		color: <?php echo esc_html( $settings->bold_quote_color ); ?>;
		text-shadow: 3rem 3rem 0 <?php esc_html( $settings->text_shadow_color ); ?>;
		z-index: -1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h3 {
		position: relative;
		color: #224841;
		font-size: 1.5rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		line-height: 1.1;
		margin: 0;
		padding-top: 1.5rem;
		z-index: 1;
	}
<?php endif; ?>
<?php if ( 'enhanced' === $settings->blockquote_style ) : ?>
	<?php
	$enhanced_background_color = isset( $settings->enhanced_background_color ) ? esc_attr( $settings->enhanced_background_color ) : '000000';
	$enhanced_background_color = BBVapor_Modules_Pro::get_color( $enhanced_background_color );

	$enhanced_quote_color = isset( $settings->enhanced_quote_color ) ? esc_attr( $settings->enhanced_quote_color ) : 'rgba(0, 0, 0, 1)';
	$enhanced_quote_color = BBVapor_Modules_Pro::get_color( $enhanced_quote_color );

	$enhanced_text_color = isset( $settings->enhanced_text_color ) ? esc_attr( $settings->enhanced_text_color ) : '000000';
	$enhanced_text_color = BBVapor_Modules_Pro::get_color( $enhanced_text_color );

	$enhanced_border_color = isset( $settings->enhanced_border_color ) ? esc_attr( $settings->enhanced_border_color ) : '000000';
	$enhanced_border_color = BBVapor_Modules_Pro::get_color( $enhanced_border_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		display: flex;
		padding: 0 20px;
		background-image: <?php echo FLBuilderColor::gradient( $settings->enhanced_gradient ); // phpcs:ignore ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote {
		position: relative;
		color: #ffffff;
		padding: 30px 0;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 80px auto;
		align-self: center;
		border-top: solid 1px <?php echo esc_html( $enhanced_border_color ); ?>;
		border-bottom: solid 1px <?php echo esc_html( $enhanced_border_color ); ?>;
		background-color: <?php echo esc_html( $enhanced_background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h2 {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		color: <?php echo esc_html( $enhanced_text_color ); ?>;
		font-size: 40px;
		font-weight: 800;
		margin: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote:after {
		position: absolute;
		content: "”";
		color: <?php echo esc_html( $enhanced_quote_color ); ?>;
		font-size: 10rem;
		line-height: 0;
		bottom: -43px;
		right: 30px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h3 {
		position: relative;
		color: <?php echo esc_html( $enhanced_text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
if ( 'left_border' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		display: flex;
		padding: 0 20px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote {
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 30px 0;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 10px auto;
		padding-left: <?php echo absint( $settings->border_width + 20 ); ?>px;
		align-self: center;
		background: <?php echo esc_html( $background_color ); ?>;
	}
	<?php
	$background = '';
	if ( 'color' === $settings->border_type ) {
		$background_color = isset( $settings->border_background_color ) ? esc_attr( $settings->border_background_color ) : '333333';
		$background_color = BBVapor_Modules_Pro::get_color( $background_color );

		$background = 'background: ' . $background_color . ';';
	} else {
		$background = 'background-image: ' . FLBuilderColor::gradient( $settings->border_background_gradient ) . ';';
	}
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote:before {
		content: '';
		display: block;
		position: absolute;
		width: <?php echo absint( $settings->border_width ); ?>px;
		height: 100%;
		left: 0;
		top: 0;
		<?php echo esc_html( $background ); ?>
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h2 {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 40px;
		font-weight: 800;
		margin: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h3 {
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
if ( 'right_border' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		display: flex;
		padding: 0 20px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote {
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 30px 30px;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 10px auto;
		padding-right: <?php echo absint( $settings->border_width + 20 ); ?>px;
		align-self: center;
		background: <?php echo esc_html( $background_color ); ?>;
	}
	<?php
	$background = '';
	if ( 'color' === $settings->border_type ) {
		$background_color = isset( $settings->border_background_color ) ? esc_attr( $settings->border_background_color ) : '333333';
		$background_color = BBVapor_Modules_Pro::get_color( $background_color );
		$background       = 'background: ' . $background_color . ';';
	} else {
		$background = 'background-image: ' . FLBuilderColor::gradient( $settings->border_background_gradient ) . ';';
	}
	?>
.fl-node-<?php echo esc_html( $id ); ?> .blockquote:after {
	content: '';
	display: block;
	position: absolute;
	width: <?php echo absint( $settings->border_width ); ?>px;
	height: 100%;
	right: 0;
	top: 0;
	<?php echo esc_html( $background ); ?>
}
.fl-node-<?php echo esc_html( $id ); ?> .blockquote h2 {
	font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
	font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
	position: relative;
	color: <?php echo esc_html( $text_color ); ?>;
	font-size: 40px;
	font-weight: 800;
	margin: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .blockquote h3 {
	position: relative;
	color: <?php echo esc_html( $text_color ); ?>;
	font-size: 1.4rem;
	font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
	font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
	margin: 0;
	padding-top: 20px;
	z-index: 1;
}
<?php endif; ?>
<?php
if ( 'top_bottom_border' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );

	$border_color = isset( $settings->top_bottom_border_color ) ? esc_attr( $settings->top_bottom_border_color ) : 'FAFAFA';
	$border_color = BBVapor_Modules_Pro::get_color( $border_color );

	$border_color_hover = isset( $settings->top_bottom_border_color_hover ) ? esc_attr( $settings->top_bottom_border_color_hover ) : 'FFFFFF';
	$border_color_hover = BBVapor_Modules_Pro::get_color( $border_color_hover );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		display: flex;
		padding: 0 20px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote {
		position: relative;
		box-sizing: border-box;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 30px 30px;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 10px auto;
		align-self: center;
		background: <?php echo esc_html( $background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote:before {
		content: '';
		display: block;
		position: absolute;
		width: 100%;
		background: <?php echo esc_html( $border_color ); ?>;
		height: <?php echo absint( $settings->top_bottom_border_height ); ?>px;
		left: 0;
		top: <?php echo absint( $settings->top_bottom_border_height ); ?>px;
		z-index: 2;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote:after {
		content: '';
		display: block;
		position: absolute;
		background: <?php echo esc_html( $border_color ); ?>;
		width: 100%;
		height: <?php echo absint( $settings->top_bottom_border_height ); ?>px;
		left: 0;
		bottom: <?php echo absint( $settings->top_bottom_border_height ); ?>px;
		z-index: 2;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote:hover:before {
		background-color: <?php echo esc_html( $border_color_hover ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote:hover:after {
		background-color: <?php echo esc_html( $border_color_hover ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h2 {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 40px;
		font-weight: 800;
		margin: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .blockquote h3 {
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
if ( 'cite_border_effect' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );

	$border_color = isset( $settings->cite_border_color ) ? esc_attr( $settings->cite_border_color ) : 'FAFAFA';
	$border_color = BBVapor_Modules_Pro::get_color( $border_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		display: block;
		overflow: hidden;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote {
		position: relative;
		box-sizing: border-box;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 50px 50px;
		border: solid 2px <?php echo esc_html( $border_color ); ?>;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 0 auto;
		align-self: center;
		background: <?php echo esc_html( $background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote:before {
		background-color: <?php echo esc_html( $background_color ); ?>;
		bottom: -10%;
		content: "";
		left: 0;
		position: absolute;
		right: 0;
		top: -10%;
		transform: rotate(-15deg) skew(5deg);
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote p {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 2.0rem;
		font-weight: 800;
		margin: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote cite {
		display: block;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		text-align: right;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
if ( 'cite' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );

	$border_color = isset( $settings->cite_border_color ) ? esc_attr( $settings->cite_border_color ) : 'FAFAFA';
	$border_color = BBVapor_Modules_Pro::get_color( $border_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		display: flex;
		padding: 0 20px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote {
		position: relative;
		box-sizing: border-box;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 50px 50px;
		border: solid 2px <?php echo esc_html( $border_color ); ?>;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 10px auto;
		align-self: center;
		background: #FFF;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote p {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 2.0rem;
		font-weight: 800;
		margin: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote cite {
		display: block;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		text-align: right;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
if ( 'cite_animated_border' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );

	$border_color = isset( $settings->cite_border_color ) ? esc_attr( $settings->cite_border_color ) : 'FAFAFA';
	$border_color = BBVapor_Modules_Pro::get_color( $border_color );

	$border_color_animated = isset( $settings->cite_animated_border_color ) ? esc_attr( $settings->cite_animated_border_color ) : 'FFFFFF';
	$border_color_animated = BBVapor_Modules_Pro::get_color( $border_color_animated );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		position: relative;
		display: block;
		overflow: hidden;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote {
		display: block;
		position: relative;
		box-sizing: border-box;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 50px 50px;
		border: solid 2px <?php echo esc_html( $border_color ); ?>;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 0 auto;
		align-self: center;
		background: <?php echo esc_html( $background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote:before {
		animation: bbvm-clockwise 30s infinite linear;
		background-color: <?php echo esc_html( $background_color ); ?>;
		bottom:10%;
		content: "";
		left: 0;
		opacity:.5;
		position: absolute;
		right: 0;
		top:10%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote:after {
		animation: bbvm-counter 30s infinite linear;
		background-color: <?php echo esc_html( $background_color ); ?>;
		bottom:10%;
		content: "";
		left: 0;
		opacity:.5;
		position: absolute;
		right: 0;
		top:10%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote p {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 2.0rem;
		font-weight: 800;
		margin: 0;
		z-index: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote cite {
		display: block;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		text-align: right;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
if ( 'cite_scale' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		display: block;
		overflow: hidden;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote {
		animation: bbvm-shadows 2s linear infinite alternate;
		position: relative;
		box-sizing: border-box;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 50px 50px;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 0 auto;
		background: <?php echo esc_html( $background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote p {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 2.0rem;
		font-weight: 800;
		margin: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote cite {
		display: block;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		text-align: right;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
if ( 'cite_brackets' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );

	$border_color = isset( $settings->cite_border_color ) ? esc_attr( $settings->cite_border_color ) : 'FAFAFA';
	$border_color = BBVapor_Modules_Pro::get_color( $border_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		position: relative;
		display: block;
		overflow: hidden;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote {
		display: block;
		position: relative;
		box-sizing: border-box;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 50px 50px;
		border: solid 1em <?php echo esc_html( $border_color ); ?>;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 0 auto;
		align-self: center;
		background: <?php echo esc_html( $background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote:before {
		background-color: <?php echo esc_html( $background_color ); ?>;
		bottom: -1em;
		content: "";
		left: 2em;
		position: absolute;
		right: 2em;
		top: -1em;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote p {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 2.0rem;
		font-weight: 800;
		margin: 0;
		z-index: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote cite {
		display: block;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		text-align: right;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
if ( 'cite_icon' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );

	$border_color = isset( $settings->cite_border_color ) ? esc_attr( $settings->cite_border_color ) : 'FAFAFA';
	$border_color = BBVapor_Modules_Pro::get_color( $border_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		position: relative;
		display: block;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote {
		display: block;
		position: relative;
		box-sizing: border-box;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 50px 50px;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 0 auto;
		align-self: center;
		background: <?php echo esc_html( $background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote:before {
		content: "";
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		background: linear-gradient(0deg, <?php echo esc_html( $border_color ); ?> calc(50% - 1em), transparent calc(50% - 1em)), linear-gradient(180deg, <?php echo esc_html( $border_color ); ?> calc(50% - 1em), transparent calc(50% - 1em));
		width: 4px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote:after {
		content: "“";
		position: absolute;
		top: calc(50% + 10px);
		left: -4px;
		color: <?php echo esc_html( $border_color ); ?>;
		font-family: Arial, sans-serif;
		font-size: 40px;
		font-style: normal;
		line-height: 1em;
		text-align: center;
		width: 4px;
		margin-top: -0.5em;
		transition: .5s all ease-in-out;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote p {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		font-style: italic;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 2.0rem;
		font-weight: 800;
		margin: 0;
		z-index: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote cite {
		display: block;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		font-style: italic;
		text-align: left;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
if ( 'background_quotes' === $settings->blockquote_style ) :
	$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
	$text_color = BBVapor_Modules_Pro::get_color( $text_color );

	$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );

	$background_quote_color = isset( $settings->background_quote_color ) ? esc_attr( $settings->background_quote_color ) : 'FAFAFA';
	$background_quote_color = BBVapor_Modules_Pro::get_color( $background_quote_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-blockquotes-for-beaverbuilder {
		position: relative;
		display: block;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote {
		display: block;
		position: relative;
		box-sizing: border-box;
		color: <?php echo esc_html( $text_color ); ?>;
		padding: 50px 50px;
		width: 100%;
		max-width: 500px;
		z-index: 1;
		margin: 0 auto;
		align-self: center;
		background: <?php echo esc_html( $background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote:before {
		z-index: -1;
		position: absolute;
		color: <?php echo esc_html( $background_quote_color ); ?>;
		font-size: 4rem;
		font-style: normal;
		font-weight: 700;
		content: "“";
		top: 0;
		left: 0;
		line-height: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote:after {
		z-index: -1;
		position: absolute;
		color: <?php echo esc_html( $background_quote_color ); ?>;
		font-size: 4rem;
		font-style: normal;
		font-weight: 700;
		content: "“";
		content: "”";
		bottom: 0;
		right: 0;
		line-height: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote p {
		font-family: '<?php echo esc_html( $settings->font_heading['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_heading['weight'] ); ?>;
		position: relative;
		font-style: italic;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 2.0rem;
		font-weight: 800;
		margin: 0;
		z-index: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> blockquote cite {
		display: block;
		position: relative;
		color: <?php echo esc_html( $text_color ); ?>;
		font-size: 1.4rem;
		font-family: '<?php echo esc_html( $settings->font_attribution['family'] ); ?>';
		font-weight: <?php echo esc_html( $settings->font_attribution['weight'] ); ?>;
		margin: 0;
		font-style: italic;
		text-align: right;
		padding-top: 20px;
		z-index: 1;
	}
<?php endif; ?>
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'blockquote_padding',
		'selector'     => ".fl-node-$id .blockquote, .fl-node-$id blockquote",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'blockquote_padding_top',
			'padding-right'  => 'blockquote_padding_right',
			'padding-bottom' => 'blockquote_padding_bottom',
			'padding-left'   => 'blockquote_padding_left',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .blockquote",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width' => $settings->max_width . '%',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .blockquote",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width' => $settings->max_width_medium . '%',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .blockquote",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width' => $settings->max_width_responsive . '%',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id blockquote",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width' => $settings->max_width . '%',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id blockquote",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width' => $settings->max_width_medium . '%',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id blockquote",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width' => $settings->max_width_responsive . '%',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .blockquote h2",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .blockquote h2",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_medium . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .blockquote h2",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_responsive . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .blockquote h3",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_attribution . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .blockquote h3",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_attribution_medium . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .blockquote h3",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_attribution_responsive . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id blockquote p",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id blockquote p",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_medium . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id blockquote p",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_responsive . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id blockquote cite",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_attribution . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id blockquote cite",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_attribution_medium . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id blockquote cite",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'font-size' => $settings->font_size_attribution_responsive . 'px',
		),
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .blockquote h2 {
	line-height: 1.1;
}
.fl-node-<?php echo esc_html( $id ); ?> .blockquote h3 {
	line-height: 1.1;
}
