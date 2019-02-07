<?php // Variaveis relativas a datas

$date_type      = get_theme_mod( 'epico_date_type', 'published' );

$date_threshold = get_theme_mod( 'epico_date_threshold', 0 );

$days_published = epico_days_diff( DateTime::createFromFormat( 'U', get_the_time('U') ), DateTime::createFromFormat( 'U', (int) current_time('timestamp') ) );

$days_modified  = epico_days_diff( DateTime::createFromFormat( 'U', get_the_modified_time('U') ), DateTime::createFromFormat( 'U', (int) current_time('timestamp') ) ); ?>

<?php if ( 'published' === $date_type || 'both' === $date_type ) : // Checagem de exibe a data de publicacao. ?>

	<?php if ( $date_threshold == 0 || $date_threshold >= $days_published ) : // Se a data de publicacao for maior que o numero de dias definido no painel ?>

		<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>

	<?php endif;  // Finaliza a checagem de limiar de apresentacao da data. ?>

<?php endif; // Finaliza a chegagem para exibicao da data de publicacao. ?>

<?php if ( 'modified' === $date_type || 'both' === $date_type ) : // Exibe a data de atualizacao. ?>

	<?php if ( $date_threshold == 0 || $date_threshold >= $days_modified ) : // Se a data de atualizacao for maior que o numero de dias definido no painel ?>

		<time class="entry-updated" datetime="<?php echo get_the_modified_time( 'Y-m-d\TH:i:sP' ); ?>" title="<?php echo get_the_modified_time( _x( 'l, F j, Y, g:i a', 'post time format', 'epico' ) ); ?>"><?php echo __( 'Updated in: ', 'epico' ) . get_the_modified_date(); ?></time>

	<?php endif;  // Finaliza a checagem de limiar de apresentacao da data. ?>

<?php endif;  // Finaliza a chegagem para exibicao da data de atualizacao. ?>