<?php
/**
 * Columns Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.4.5
 */

?>
<div class="fl-bbvm-columns column-<?php echo absint( $settings->column_count + 1 ); ?>">
	<?php
	echo wp_kses_post( $settings->content );
	?>
</div>
