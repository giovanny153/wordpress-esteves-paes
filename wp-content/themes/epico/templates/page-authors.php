<?php
/**
 * Template Name: Lista de autores
 *
 * @package Épico
 * @since   1.0.2
 */
?>
<?php get_header(); // Carrega o template header.php. ?>

	<?php hybrid_get_menu( 'breadcrumbs' ); // Carrega o template menu/breadcrumbs.php. ?>

	<div id="main-container">

		<div class="wrap">

<?php $site_layout = get_theme_mod( 'epico_sidebar_layout', 1 ); // Opcoes do customizador

	$content_class = ''; ?>

<?php if ( $site_layout == 0 ) {

	$content_class = 'content-right';

} else if ( $site_layout == 1 ) {

	$content_class = 'content-left';

}

// Obtem todos os usuarios pela quantidade de artigos
$allUsers = get_users('orderby=post_count&order=DESC');

$users = array();

// Remove assinantes da lista pois eles nao escrevem artigos
foreach( $allUsers as $currentUser ) {

	if ( ! in_array( 'subscriber', $currentUser->roles ) ) {

		$users[] = $currentUser;
	}
} ?>

			<main id="content" class="content <?php echo esc_html( $content_class ); ?>" role="main" itemprop="mainContentOfPage" itemscope itemtype="https://schema.org/Blog">

			<?php if ( is_active_sidebar( 'before-content' ) ) : // Se a area de widgets possui widgets. ?>

					<aside id="sidebar-before-content">

						<?php dynamic_sidebar( 'before-content' ); // Apresenta a area de widgets auxiliar. ?>

					</aside><!-- #sidebar-promo .aside -->

			<?php endif; // Finaliza a checagem por widgets. ?>

				<article <?php hybrid_attr( 'post' ); ?>>

					<header class="entry-header">

						<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

						<?php $show_featured = get_post_meta( get_the_ID(), 'epico-show-featured', TRUE ); ?>

						<?php if ( 'on' === $show_featured ) { // Caso o show_featured estiver marcado como `on`. ?>

							<?php the_post_thumbnail(); ?>

						<?php } ?>

						<?php if ( $social_pages == 1 && ! is_page( $excluded_pages ) ) : ?>

							<?php include( locate_template( '/inc/social-buttons.php' ) ); // Adiciona codigo para botoes sociais. ?>

						<?php endif; ?>

					</header><!-- .entry-header -->

					<div <?php hybrid_attr( 'entry-content' ); ?>>

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<?php the_content(); ?>

						<?php endwhile; endif; ?>

						<?php foreach( $users as $user ) { ?>

						<div class="author-profile vcard<?php if ( user_can( $user->ID, 'editor' ) ) { echo ' editor'; } ?><?php if ( user_can( $user->ID, 'administrator' ) ) { echo ' administrador'; } ?>">

							<h4 class="author-name fn n">

								<a href="<?php echo get_author_posts_url( $user->ID ); ?>"><?php echo $user->display_name; ?></a>

								<?php if ( user_can( $user->ID, 'editor' ) ) { echo ' <span class="editor-tag">' . __( 'Editor' , 'epico' ) . '</span>'; } ?>

								<?php if ( user_can( $user->ID, 'administrator' ) ) { echo ' <span class="editor-tag">' . __( 'Admin' , 'epico' ) . '</span>'; } ?>

							</h4>

							<a href="<?php echo get_author_posts_url( $user->ID ); ?>"><?php echo get_avatar( $user->user_email, '128' ); ?></a>

							<div class="author-description author-bio">

								<p class="author-description-text"><?php echo get_user_meta($user->ID, 'description', true); ?></p>

								<p class="social">

									<?php if ( $website = get_the_author_meta( 'user_url' ) ) { ?>
										<a class="website" itemprop="url" href="<?php echo esc_url( $website ); ?>" title="<?php printf( esc_attr__( '%s’s website', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Website', 'epico' ); ?></a>
									<?php } ?>

									<?php if ( $facebook = get_user_meta( $user->ID, 'facebook', true ) ) { ?>
										<a class="facebook" href="<?php echo esc_url( $facebook ); ?>" title="<?php printf( esc_attr__( '%s on Facebook', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Facebook', 'epico' ); ?></a>
									<?php } ?>

									<?php if ( $youtube = get_user_meta( $user->ID, 'youtube', true ) ) { ?>
										<a target="_blank" rel="noopener" class="youtube" href="<?php echo esc_url( $youtube ); ?>" title="<?php printf( esc_attr__( '%s on Youtube', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Youtube', 'epico' ); ?></a>
									<?php } ?>

									<?php if ( $instagram = get_user_meta( $user->ID, 'instagram', true ) ) { ?>
										<a class="instagram" href="<?php echo esc_url( $instagram ); ?>" title="<?php printf( esc_attr__( '%s on Instagram', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Instagram', 'epico' ); ?></a>
									<?php } ?>

									<?php if ( $twitter = get_user_meta( $user->ID, 'twitter', true ) ) { ?>
										<a class="twitter" href="<?php echo esc_url( "http://twitter.com/{$twitter}" ); ?>" title="<?php printf( esc_attr__( '%s on Twitter', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Twitter', 'epico' ); ?></a>
									<?php } ?>									

									<?php if ( $pinterest = get_user_meta( $user->ID, 'pinterest', true ) ) { ?>
										<a class="pinterest" href="<?php echo esc_url( $pinterest ); ?>" title="<?php printf( esc_attr__( '%s on Pinterest', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Pinterest', 'epico' ); ?></a>
									<?php } ?>

									<?php if ( $linkedin = get_user_meta( $user->ID, 'linkedin', true ) ) { ?>
										<a class="linkedin" href="<?php echo esc_url( $linkedin ); ?>" title="<?php printf( esc_attr__( '%s on Linkedin', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Linkedin', 'epico' ); ?></a>
									<?php } ?>

									<?php if ( $whatsapp = get_user_meta( $user->ID, 'whatsapp', true ) ) { ?>
										<a target="_blank" rel="noopener" class="whatsapp" href="https://wa.me/<?php echo esc_attr( the_author_meta( 'whatsapp' ) ); ?>" title="<?php printf( esc_attr__( '%s on WhatsApp', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'WhatsApp', 'epico' ); ?></a>
									<?php } ?>

									<?php if ( $telegram = get_user_meta( $user->ID, 'telegram', true ) ) { ?>
										<a target="_blank" rel="noopener" class="telegram" href="https://t.me/<?php echo esc_attr( the_author_meta( 'telegram' ) ); ?>" title="<?php printf( esc_attr__( '%s on Telegram', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Telegram', 'epico' ); ?></a>
									<?php } ?>

									<?php if ( $viber = get_user_meta( $user->ID, 'viber', true ) ) { ?>
										<a target="_blank" rel="noopener" class="viber" href="https://viber.me/<?php echo esc_attr( the_author_meta( 'viber' ) ); ?>" title="<?php printf( esc_attr__( '%s on Viber', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Viber', 'epico' ); ?></a>
									<?php } ?>								
								</p>

							</div>

						</div>

						<?php } ?>


					</div><!-- .entry-content -->

						<?php edit_post_link( __( 'Edit this page', 'epico' ) , '<footer class="entry-footer">', '</footer><!-- .entry-footer -->' ); ?>

					<?php include( locate_template( '/inc/zen-mode.php' ) ); // Adiciona codigo do modo Zen. ?>

				</article><!-- .entry -->

				<?php hybrid_get_sidebar( 'after-content' ); // Mostra a area de widget after-content. ?>

			</main><!-- #content -->

				<?php hybrid_get_sidebar( 'primary' ); // Carrega o template sidebar/primary.php. ?>

		</div><!-- .wrap -->

	</div><!-- #main-conteiner -->

		<?php get_footer(); // Carrega o template footer.php template. ?>
