	<div class="page-header header-filter">
        <div class="container">
            <div class="row">
				<div class="col-md-12">
					<?php if(is_shop() || is_product_category()): ?>
						<h1 class="title"><?php woocommerce_page_title(); ?></h1>
					<?php else: ?>
						<h1 class="title"><?php the_title(); ?></h1>
					<?php endif; ?>
				</div><!--/.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.page-header-->