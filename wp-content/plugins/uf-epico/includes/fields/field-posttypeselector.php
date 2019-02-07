<?php
/**
 * Campo seletor de post types
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */

$structure = explode( '||', $settings['default'] );

if ( ! empty( $structure[1] ) && empty( $value ) ) {

	$value = $structure[1];
}

if ( $structure[0] == 'page' ) {

	$args = array(
		'depth'    => 0,
		'child_of' => 0,
		'selected' => $value,
		'echo'     => 1,
		'id'       => $id,
		'name'     => $name
	);

	wp_dropdown_pages( $args );

	return;
}

$posts = get_posts( array(
	'post_type'     => $structure[0],
	'numberposts'   => - 1,
	'post_status'   => 'publish',
	'cache_results' => false,
	'no_found_rows' => true,
) );

echo "<select name=\"" . $name . "\" id=\"" . $id . "\" >\r\n";

echo '<option value=""></option>';

foreach ( $posts as $p ) {

	$sel = '';

	if ( $p->ID == $value ) {

		$sel = 'selected="selected"';
	}

	echo '<option value="' . $p->ID . '" ' . $sel . '>' . esc_html( $p->post_title ) . '</option>';
}

echo '</select>';