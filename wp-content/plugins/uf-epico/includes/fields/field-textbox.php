<?php
/**
 * Campo caixa de texto
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */
?>
<textarea name="<?php echo $name; ?>" class="widefat" cols="20" rows="8" ref="<?php echo $groupid; ?>" id="<?php echo $id; ?>"><?php echo wp_kses_data( $value ); ?></textarea>
