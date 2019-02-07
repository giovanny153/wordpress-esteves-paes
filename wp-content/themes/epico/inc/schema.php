<?php // Variaveis para metatados do Schema.org

$site_name       = get_bloginfo( 'name' );

$date_type       = get_theme_mod( 'epico_date_type', 'published' );

$categories      = get_the_category();

$separator       = ', ';

$output          = '';

$logo_url        = get_theme_mod( 'epico_logo_upload' );

$logo_id         = attachment_url_to_postid( $logo_url );

$logo_attr       = wp_get_attachment_image_src( $logo_id );

$attachment_id   = get_post_thumbnail_id( get_the_ID() );

$featured_attr   = wp_get_attachment_metadata( $attachment_id );

$logo_width      = ( $logo_attr ) ? $logo_attr[1] : '' ;

$logo_height     = ( $logo_attr ) ? $logo_attr[2] : '' ;

$featured_height = ( $featured_attr ) ? $featured_attr['sizes']['epico-tiny']['height'] : '' ;

$featured_width  = ( $featured_attr ) ? $featured_attr['sizes']['epico-tiny']['width'] : '' ;?>


<meta itemprop="mainEntityOfPage" content="<?php echo the_permalink() ?>"/>

<meta itemprop="inLanguage" content="<?php echo get_bloginfo('language'); ?>"/>

<span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">

	<meta itemprop="name" content="<?php echo esc_attr( $site_name ); ?>">

	<?php if ( $logo_url ) : // Se o logotipo do blog tiver sido definido. ?>

		<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">

			<meta itemprop="url" content="<?php echo esc_url( $logo_url ); ?>">

			<meta itemprop="width" content="<?php echo esc_attr( $logo_width ); ?>px">

			<meta itemprop="height" content="<?php echo esc_attr( $logo_height ); ?>px">

		</span>

	<?php endif; ?>

</span>


<span itemprop="author" itemscope="itemscope" itemtype="https://schema.org/Person">

	<meta itemprop="name" content="<?php esc_html( the_author() ); ?>">

	<meta itemprop="url" content="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">

</span>


<?php if ( 'none' !== $date_type ) : // Checagem para inserir data. ?>

	<meta itemprop="datePublished" content="<?php echo get_the_time( 'Y-m-d\TH:i:sP' ); ?>" />

	<meta itemprop="dateModified" content="<?php echo the_modified_date( 'Y-m-d\TH:i:sP' ); ?>" />

<?php endif;  // Finaliza a chegagem para adicao de metadados da data. ?>


<?php if ( has_post_thumbnail() ) : // Se o post tiver uma imagem de destaque definida. ?>

	<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

		<meta content="<?php esc_url( $feature_thumb[0] ); ?>" />

		<meta itemprop="url" content="<?php the_post_thumbnail_url(); ?>">

		<meta itemprop="width" content="<?php echo $featured_width; ?>">

		<meta itemprop="height" content="<?php echo $featured_height; ?>">

	</span>

<?php endif; // Finaliza a checagem por imagem de destaque. ?>


<?php if ( $categories ) : // Se o post tiver categorias definidas. ?>

	<?php foreach( array_slice( $categories, 0, 1 ) as $category ) { ?>

		<meta itemprop="articleSection" content="<?php esc_attr( $category->name ); ?>">

	<?php } ?>

<?php endif; ?>