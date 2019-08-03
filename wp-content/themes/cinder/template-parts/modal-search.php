<!-- Search Form Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="fa fa-close"></i>
            </button>
            <h4 class="modal-title"><?php esc_html_e( 'Search', 'cinder' ); ?></h4>
         </div>
		 <?php get_search_form(); ?>
		 <div class="modal-footer"></div>
      </div>
   </div>
</div>
<!--  End Search Form Modal -->
