<?php
/**
 * Content Scroller Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

$form_settings = $settings->scroller_content;
?>
var bbvmContentScrollerImages = new Array();
<?php
$count = 0;
foreach ( $form_settings as $form_setting ) {
	?>
	bbvmContentScrollerImages[<?php echo absint( $count ); ?>] = new Image();
	bbvmContentScrollerImages[<?php echo absint( $count ); ?>].src = '<?php echo esc_url( $form_setting->background_photo_left_src ); ?>';
	<?php
	$count ++;
}
