<?php
/**
 * Campo área de texto
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */
?>
<textarea name="<?php echo $name; ?>" class="widefat" cols="20" rows="12" ref="<?php echo $groupid; ?>" id="<?php echo $id; ?>"><?php echo Uf_Epico::strip_tags( $value ); ?></textarea>
