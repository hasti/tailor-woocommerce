<?php

if ( ! function_exists( 'tailor_shortcode_pricing' ) ) {

    /**
     * Defines the shortcode rendering function for the Pricing element.
     *
     * @since 1.0.0
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_pricing( $atts, $content = null, $tag ) {

        $atts = shortcode_atts( array(
            'id'                =>  '',
            'class'             =>  '',
            'title'             =>  __( 'Standard plan', 'tailor-woocommerce' ),
            'price'             =>  '9',
            'currency'          =>  '$',
            'period'            =>  __( 'month', 'tailor-woocommerce' ),
            'featured'          =>  false,
        ), $atts, $tag );

	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( 'tailor-element pricing ' . trim( esc_attr( $atts['class'] ) ) );

	    if ( false != $atts['featured'] ) {
		    $class .= ' pricing--featured';
	    }

	    return  '<div ' . trim( "{$id} class=\"{$class}\"" ) . '>' .
	                '<h3 class="pricing__title">' . esc_attr( $atts['title'] ) . '</h3>' .
                    //'<p class="pricing__subtitle"></p>' .
                    '<div class="pricing__price">' .
	                    '<span class="pricing__currency">' . esc_attr( $atts['currency'] ) . '</span>' . esc_attr( $atts['price'] ) .
	                    '<span class="pricing__period">/ ' . esc_attr( $atts['period'] ) . '</span>' .
	                '</div>' .
                    '<div class="pricing__content">' . do_shortcode( $content ) .'</div>' .
                '</div>';
	        }

    add_shortcode( 'tailor_pricing', 'tailor_shortcode_pricing' );
}