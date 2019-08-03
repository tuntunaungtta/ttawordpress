	<div class="page-header header-filter">
        <div class="container">
            <div class="row">
				<div class="col-md-12">
					<?php if ( have_posts() ) : ?>
						<h1 class="title"><?php /* translators: %s: search query string */ printf( esc_html__( 'Search Results for: %s', 'cinder' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php else : ?>
						<h1 class="title"><?php esc_html_e( 'Nothing Found', 'cinder' ); ?></h1>
						<h4><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cinder' ); ?></h4>
					<?php endif; ?>
						<?php get_search_form(); ?>
				</div><!--/.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.page-header-->