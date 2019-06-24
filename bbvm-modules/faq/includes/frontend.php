<div class="fl-bbvm-faq-for-beaverbuilder">
<?php
if ( 'yes' === $settings->toc && count( $settings->faq ) > 0 ) :
	?>
	<ul class="bbvm-faq">
	<?php
	foreach ( $settings->faq as $faq ) :
		printf( '<li><a href="#%s">%s</a></li>', esc_attr( sanitize_title( $faq->faq ) ), esc_html( $faq->faq ) );
	endforeach;
	?>
	</ul>
	<?php
endif;
foreach ( $settings->faq as $faq ) :
	?>
	<div class="bbvm-faq-item">
		<div class="bbvm-faq-heading" id="<?php echo esc_attr( sanitize_title( $faq->faq ) ); ?>"><?php echo esc_html( $faq->faq ); ?><?php echo 'no' === $settings->expanded ? '<i class="fas fa-plus"></i>' : ''; ?></div>
		<div class="bbvm-faq-content" <?php echo 'yes' === $settings->expanded ? '' : "style='display:none;'"; ?>>
			<?php echo wp_kses_post( $faq->faq_text ); ?>
		</div>
	</div>
	<?php
endforeach;
?>
</div>
