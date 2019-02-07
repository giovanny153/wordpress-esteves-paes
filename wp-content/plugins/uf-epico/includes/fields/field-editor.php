<?php
/**
 * Campo Editor
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */

function epico_sanitize_html( $input ) {

	$allowed = array(
		'form'  => array(
			'action' => array(),
		),
		'input' => array(
			'name' => array(),
		),
	);

	return wp_kses( $input, $allowed );
}
