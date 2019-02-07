<?php
/**
 * Campo de texto
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */
?>
<input autocomplete="new-password" name="<?php echo $name; ?>" class="widefat" type="text" ref="<?php echo $groupid; ?>" id="<?php echo $id; ?>" value="<?php echo wp_kses_data( $value ); ?>"/>
