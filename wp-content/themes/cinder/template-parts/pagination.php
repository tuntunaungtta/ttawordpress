<!-- **************** pagination ******************** -->
<div class="recent-posts-pagination">
   <div class="text-center">
   		<?php 
   			
   			the_posts_pagination( array(
   		    'mid_size' => 2,
   		    'prev_text' => __( 'PREV', 'cinder' ),
   		    'next_text' => __( 'NEXT', 'cinder' ),
   		    ) );
   		    
   		 ?>
   </div>
</div>
<!-- **************** end pagination ******************** -->