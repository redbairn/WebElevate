<?php 
/**
 * Template Name: Topic Page
 *
 *
 */
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 Industry Partner Project, Digital Skills Academy  
* Date: 2016/09/01
* Ref: https://daveismyname.com/login-and-registration-system-with-php-bp
* -Start of Game (need to choose the subtopic)
**************************************************************************************/

//include config
require(ABSPATH . 'wp-config.php');

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

$config = Presscore_Config::get_instance();
$config->set('template', 'page');


get_header(); ?>

  <!-- CSS STYLESHEET FOR TOPIC PAGE -->
  
   <?php echo do_shortcode('[wce_code id=20] '); ?>
   
   
    
        <h2 class="topic_header">CHOOSE A TOPIC</h2>
        
        
        
        
		<?php if ( presscore_is_content_visible() ): ?>

			<div id="content" class="content topic-list-content col-md-12" role="main">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php do_action('presscore_before_loop'); ?>

                
					<!-- TOPICS -->
						<!-- Where all the magic happens (the majority of the logic)-->
						<?php include('topics-logic.php'); ?>
					<!-- # Topics -->
                                        
							
					<!-- MODAL NEW START   -->
				<div id="lvlModal" class="modal fade difficulty_modal_topic" role="dialog" aria-labelledby="lvlModal" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h2 class="modal-title">Difficulty LEVEL</h2>
							</div>
							<!-- Modal Body -->
							<div class="modal-body">
																
				                     <div class="form-group">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">										 
                                             <img class="img-responsive" src="http://we40team4.webelevate.net/(name of client)/wp-content/uploads/2016/09/EASY.jpg" alt="Easy level trophy">
										</div>
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                             <img class="img-responsive" src="http://we40team4.webelevate.net/(name of client)/wp-content/uploads/2016/09/MEDIUM.jpg" alt="Medium level trophy">
										</div>
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                             <img class="img-responsive" src="http://we40team4.webelevate.net/(name of client)/wp-content/uploads/2016/09/DIFFICULT.jpg" alt="Difficult level trophy">
                                    	</div>	
                                    	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" id="character_level">
                                    	  <img class="img-responsive" src="http://we40team4.webelevate.net/(name of client)/wp-content/uploads/2016/09/CHARACTER_form.jpg" alt="(name of client) character">
                                        </div>
								   </div>	
								
								<!-- FORM for LOADED GAME-->
								<form id="setLvlFrm" action="/(name of client)/Topics/Game/" role="form" method="POST">
									<div class="form-group">
										<div class="col-xs-3 col-md-3 col-lg-3">										 
											<input type="radio" name="difficulty" id="lvleasy" value="Easy" checked />
											<label for="lvleasy"><span>Easy</span></label>
										</div>
										<div class="col-xs-3 col-md-3 col-lg-3">
											<input type="radio" name="difficulty" id="lvlmed" value="Medium" />
											<label for="lvlmed"><span>Medium</span></label>
										</div>
										<div class="col-xs-3 col-md-3 col-lg-3">
											<input type="radio" name="difficulty" id="lvldiff" value="Difficult" />
											<label for="lvldiff"><span>Difficult</span></label>
											
										</div>
										<input type=hidden name="SUBTOPIC_NAME" class="output" />
										<div class="col-xs-3 col-md-3 col-lg-3">
											<button type="submit" name="submit" class="btn btn-default difficulty_modal">Play <i class="fa fa-thumbs-o-up" aria-hidden="true" style="margin-left: 10px"></i></button>
										</div>
									</div>
								</form><!-- #FORM for LOADED GAME-->
							</div><!-- #modal-body -->
		
						</div><!-- #modal-content -->
					</div><!-- #modal-dialog -->
				</div><!-- #modal -->
				<!-- MODAL NEW FINISH -->
			</div><!-- #Content -->

					
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'the7mk2' ), 'after' => '</div>' ) ); ?>

					<?php presscore_display_share_buttons_for_post( 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'page' ); ?>

			<?php endif; ?>

			</div><!-- #content -->

			<?php do_action('presscore_after_content'); ?>

		<?php endif; // if content visible ?>
<script>
(function($) {
	$('div.panel-body li.subtopic_name a').click(function() {
		// Get the value of the text within the hyperlink
		var subtopic_value = $(this).text();
		// Post the value to the clas output and assign the value of the subtopic to the attribute
		$('.output').attr('value', subtopic_value);
	})
})( jQuery );
</script>
<?php get_footer(); ?>