<?php
/**
 * Credit Cards Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-credit-cards-for-beaverbuilder">
	<?php
	foreach ( $settings->creditcard as $card ) {
		switch ( $card->credit_cards ) {
			case 'amex':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/amex.png' ) );
				break;
			case 'cirrus':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/cirrus.png' ) );
				break;
			case 'dc':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/diners-club.png' ) );
				break;
			case 'discover':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/discover.png' ) );
				break;
			case 'maestro':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/maestro.png' ) );
				break;
			case 'mastercard':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/mastercard.png' ) );
				break;
			case 'paypal':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/paypal.png' ) );
				break;
			case 'sage':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/sage.png' ) );
				break;
			case 'shopify':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/shopify.png' ) );
				break;
			case 'skrill':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/skrill.png' ) );
				break;
			case 'visa':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/visa.png' ) );
				break;
			case 'wu':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/western-union.png' ) );
				break;
			case 'worldpay':
				echo sprintf( '<img src="%s" />', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . '/bbvm-modules/credit-cards/logos/worldpay.png' ) );
				break;
		}
	}
	?>
</div>
