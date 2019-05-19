<div class="fl-mediaron-faq-for-beaverbuilder">
<?php
if( 'yes' === $settings->toc && count( $settings->faq ) > 0 ) :
	?>
	<ul class="mediaron-faq">
	<?php
	foreach( $settings->faq as $faq ):
		printf( '<li><a href="#%s">%s</a></li>', sanitize_title( $faq->faq ), esc_html( $faq->faq ) );
	endforeach;
	?>
	</ul>
	<?php
endif;
foreach( $settings->faq as $faq ):
	?>
	<div class="mediaron-faq-item">
		<div class="mediaron-faq-heading" id="<?php echo sanitize_title( $faq->faq ); ?>"><?php echo esc_html( $faq->faq ); ?><?php echo 'no' === $settings->expanded ? '<i class="fas fa-plus"></i>' : ''; ?></div>
		<div class="mediaron-faq-content" <?php echo 'yes' === $settings->expanded ? '' : "style='display:none;'"; ?>>
			<?php echo $faq->faq_text; ?>
		</div>
	</div>
	<?php
endforeach;
?>
</div>