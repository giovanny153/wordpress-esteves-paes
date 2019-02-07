<?php
/**
 * Recursos globais
 *
 * @package Uf_Epico
 * @since   1.0.0
 * @license GPL-2.0+
 *
 */
?>
<div class="wrap">

    <h2><?php echo __( 'Épico plugin – Global assets ', 'uf-epico' ); ?></h2>

	<?php

	if ( ! empty( $_GET['settings-updated'] ) && $screen->parent_base != 'options-general' ) {

		echo '<div class="updated settings-error" id="setting-error-settings_updated">';
		echo '<p><strong>' . __( 'Settings saved.', 'uf-epico' ) . '</strong></p></div>';
	}
	?>

    <p><?php echo __( "Global plugin asset management", "uf-epico" ); ?></p>

    <form method="post" action="options.php" class="uf-epico-options-form">
<?php

// Isso imprime todos os campos de configuração ocultos
settings_fields( 'epico_global_assets' );
do_settings_sections( 'epico_global_assets' );
