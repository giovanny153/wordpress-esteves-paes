<?php
/**
 * Campo de parágrafo
 *
 * @package   Uf_Epico
 * @since     1.5.0
 * @license   GPL-2.0+
 *
 */
?>
<p class="<?php echo $name; ?>" id="<?php echo $id; ?>"><?php echo wp_kses_data( $value ); ?></p>
