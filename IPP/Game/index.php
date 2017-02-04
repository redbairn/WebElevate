<?php
/**
 * Template Name: Game Page
 *
 *
 */
/**********************************************************************************************************************************
* Author: Craig Bell
* Assignment: WE4.0 Industry Partner Project, Digital Skills Academy  
* Date: 2016/09/25
* Ref: Some Stackoverflow examples
* Page: Game Page (Loaded Game)
* -Firstly, we need to get the user the first question from the subtopic and the difficulty level chosen.
* -Display the equation for that difficulty level (formatted to appear correctly formatted-different from the database).
* -Display a form input field to enter in the answer and when submitted check this answer against the correct answer (in database).
* -If answer is right display success message (and if there is one - show additional message).
* -Give option to go on to the next question (Forward). This should move the Question number on which is displayed in Board 1.
* -The current chosen Difficulty will be displayed in the Board 1.
* -The amount of correct answers will show in Board 1.
* -The amount of incorrect answers will show in Board 1.
* -The total score needs to appear in Board 2. A table will need to record this.
* -The ability to change the level (only the option to go down a level).
* -The ability for the user to leave in the middle of the game and the game state to be saved.
* -The ability for the user to create notes beside the equation.
* -???
***********************************************************************************************************************************/
//include config
include $_SERVER['DOCUMENT_ROOT'] . '/(name of client)/wp-config.php';
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
$config = Presscore_Config::get_instance();
$config->set('template', 'page');
get_header(); ?>
                                        <?php if( is_page("Game") ) { ?>
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/custom/css/game.css" />
		<?php } ?>
                                        
										<script type="text/javascript" src="/(name of client)/wp-content/themes/dt-the7-child/Game/sketch.js"></script>
										<script type="text/javascript">
										  
										    jQuery(function() {
										      jQuery('#tools_sketch').sketch({defaultColor: "#000"});
										    });
										  
										</script>
		<?php if ( presscore_is_content_visible() ): ?>
<div class="wf-wrap">
			<div id="content" class="content topic-list-content col-md-12" role="main">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php do_action('presscore_before_loop'); ?>
					
					<!-- GAME LOGIC -->
						<!-- Where all the magic happens (the majority of the logic)-->
						<?php include('game-logic.php'); ?>
					<!-- #GAME LOGIC -->
					<!-- The GAME -->
						<div class="row"><!-- For the Question Text -->
							<div class="col-md-2"></div>
							<div class="col-md-10">
								<?php echo $success_message; ?>
								<?php echo $failure_message; ?>
								<h3 class="question_text" id="question_text"><?php echo ucfirst($question_text); ?></h3>
							</div>
						</div><!--#ROW-->
						<form id="submitAnswerForm" action="" role="form" method="POST">
								<div class="row">
										<p class="question_difficulty" id="question_difficulty"><?php echo $difficulty ?></p>
										
								</div><!--#ROW for difficulty-->
								<div class="row">
									<div class="col-xs-12 col-md-2 col-lg-2">
                                                                                                        
                                <!-- ANSWER FIELD -->                                                                                                                                                                                                        
                                    
										<input type="text" name="submitted_answer" id="submission_box" maxlength="6" size="25">
                                
                                <p class="answear_text">Answer:</p>
                                <!-- END ANSWER FIELD --> 
                                
                                
									</div>
									<div class="col-xs-12 col-md-6 col-lg-6 col-lg-push-1 center notes">
										<canvas id="tools_sketch" class="pen"></canvas>
                                        <div class="tools">
										  <a href="#tools_sketch" data-tool="marker" class="marker"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
										  <a href="#tools_sketch" data-tool="eraser" class="eraser"><i class="fa fa-eraser fa-lg" aria-hidden="true"></i></a>
										</div>
									</div>
									<div class="col-xs-4 col-md-4 col-lg-4">
										<input type=hidden name="TOPIC_NAME" class="output1" value="<?php echo $topic_name ?>" />
										<input type=hidden name="SUBTOPIC_NAME" class="output2" value="<?php echo $subtopic_name ?>" />
										<input type=hidden name="QUESTION_TEXT" class="output3" value="<?php echo $question_text ?>" />
										<input type=hidden name="QUESTION_ID" class="output4" value="<?php echo $question_id ?>" />
										<input type=hidden name="DIFFICULTY_EQUATION" class="output5" value="<?php echo $difficulty ?>" />
										<input type=hidden name="DIFFICULTY_NAME" class="output6" value="<?php echo $chosen_difficulty ?>" />
										<input type=hidden name="ATTEMPTS_MADE" class="output7" value="<?php echo $attempts ?>" />
                                <!-- NEXT QUESTION -->                                    
                                 <form id="nextQuestionFrm" action="" role="form" method="POST">
									<button type="submit" name="next_question" class="btn btn-default col-center next"><i class="fa fa-arrow-right fa-2" aria-hidden="true"></i></button>
								</form>	                                                      
                                <!-- END NEXT QUESTION -->  
                                
                                
                                
                                
                                <!-- BUTTON SUBMIT THE ANSWER -->
										<button type="submit" name="submit" class="btn btn-default col-center submit">Submit <i class="fa fa-thumbs-o-up" aria-hidden="true" style="margin-left: 10px"></i></button>
                                <!-- END SUBMIT THE ANSWER -->
                                
                                
                                
                                
									</div>
								</div><!--#ROW for submit box, notes and button-->
						</form>
						<div class="row boards">
							<div class="col-xs-4 col-md-4 col-lg-4" id="board1">
								<?php //First block to show the Board 1 - The items below.
									$difficulty_name = strtoupper($chosen_difficulty);
									echo '<p><strong>Difficulty:</strong> '.$difficulty_name.'</p>';
									echo '<p><strong>Question:</strong></p> ';
									echo '<p><strong>Correct Answers:</strong></p> ';
									echo '<p><strong>Incorrect Answers:</strong></p> ';
									echo '<p><strong>Attempts:</strong> '.$attempts.'</p> ';
								?>
							</div>
							<div class="col-xs-4 col-md-4 col-lg-4" id="board2">
								<?php //Second block to show the Board 2 - The items below.
									echo '<h1><strong>SCORE</strong></h1>';
									echo '<p><strong>Score out of 50</strong></p>';
								?>
							</div>
							<div class="col-xs-4 col-md-4 col-lg-4" id="board3">
								<?php //Third block to show the Board 3 - The items below 
									echo '<h4>DIFFICULTY LEVEL</h4> ';
									echo '<h4><strong>EASY</strong></h4> ';
									echo '<h4><strong>MEDIUM</strong></h4> ';
									echo '<h4><strong>DIFFICULT</strong></h4> ';
								?>
							</div>
						</div>
			</div> <!-- / WRAP -->
					<!-- #GAME -->
					
					
					
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'the7mk2' ), 'after' => '</div>' ) ); ?>
					<?php presscore_display_share_buttons_for_post( 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'no-results', 'page' ); ?>
			<?php endif; ?>
<script>
</script>
			</div><!-- #content -->
			<?php do_action('presscore_after_content'); ?>
		<?php endif; // if content visible ?>
		
<?php get_footer(); ?>