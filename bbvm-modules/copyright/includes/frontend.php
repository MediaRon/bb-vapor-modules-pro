<?php
if( isset( $settings->copyright_site_field ) ):
$copyright_html = '';
$copyright_html .= $settings->copyright_symbol . '&nbsp';
if( ! empty( $settings->copyright_start_year ) ) {
	$copyright_html .= esc_html( $settings->copyright_start_year ) . '&ndash;';
}
$copyright_html .= esc_html( date('Y') ) . '&nbsp;';
if( ! empty( $settings->copyright_text_field ) ) {
	$copyright_html .= esc_html( $settings->copyright_text_field ) . '&nbsp';
}
$copyright_html .= esc_html( $settings->copyright_site_field );
?>
<div class="fl-bbvm-copyright-for-beaverbuilder">
	<p><?php echo $copyright_html; ?></p>
</div>
<?php
endif;