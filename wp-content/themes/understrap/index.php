<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>
<head>
  <meta name="description" content="Самые последние новости спорта, шоу-бизнеса и политики"/>
  <meta name="keywords" content="новости, спорт, шоу-бизнес, политика" />
</head>
<?php 
$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php// get_template_part( 'global-templates/left-sidebar-check' ); ?>
			<?php get_template_part( 'global-templates/full-width-page-wrapper' ); ?>

			<main class="site-main" id="main">
			    <?php 
			    $most_query = get_news_by_type('the_most_important_news');
			    //wp_reset_query();
			    $important_query = get_news_by_type('important_news');
			    //wp_reset_query();
			    $two_query = get_news_by_type('two_card');
			    //wp_reset_query();
			    $three_query = get_news_by_type('three_card');
			    //wp_reset_query();
			    $four_query = get_news_by_type('four_card');
			    //wp_reset_query();
			    $most_important_iter = 0;
			    $important_iter = 0;
			    $two_iter = 0;
			    $three_iter = 0;
			    $four_iter = 0;
			    ?>
				<?php if ( ($most_query -> have_posts()) or ($important_query -> have_posts()) or ($two_query -> have_posts()) or ($three_query -> have_posts()) or ($four_query -> have_posts()) ) : ?>
                <?php// if ( ($most_query -> have_posts()) or ($important_query -> have_posts()) or ($two_query -> have_posts()) or ($three_query -> have_posts()) or ($four_query -> have_posts()) ) : ?>

                    <div class="container">
                    
					    <?php /* Start the Loop */ ?>
					    <?php $post_col_number = 0;?>
    					
    				    <?php /* THE FIRST ROW THE MOST IMPORTANT NEWS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $most_query -> have_posts() ) and ( $most_important_iter < 1 ) ) : ?>
    						<?php
    						if ($most_important_iter < 1){
                            $most_query -> the_post();
    						?>
                            <div class="card col-12" style="float: left;">
                                <div class="col_margin">
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h1 class="card-title"><?php echo(the_title());?></h6>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
    						}
    					    $most_important_iter = $most_important_iter + 1;
    					    ?>
    					    <?php endwhile; 
    					    $most_important_iter = 0;?>
    					</div>
    					<?php /* END THE FIRST ROW */ ?>
    					
    					<?php /* THE SECOND ROW THREE CARDS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $three_query -> have_posts() ) and ( $three_iter < 3 ) ) : ?>
    						<?php
                            $three_query -> the_post();
    						?>
                            <div class="card col-sm-4" style="float: left; height: 450px;">
                                <div class="col_margin">
                                    <div style=" height:300px; overflow:hidden; text-align:center; line-height:300px; margin:auto;">
                                        <img class="card-img-top" src="<?php echo(get_the_post_thumbnail_url());?>" style="width:100%;">
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo(the_title());?></h6>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
    					    $three_iter = $three_iter + 1;
    					    ?>
    					    <?php endwhile;
    					    //$three_iter = 0;?>
    					</div>
    					<?php /* END THE SECOND ROW */ ?>
    					
    					<?php /* THE THIRD ROW IMPORTANT NEWS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $important_query -> have_posts() ) and ( $important_iter < 1 ) ) : ?>
    						<?php
    						if ($important_iter < 1){
                            $important_query -> the_post();
    						?>
                            <div class="card col-12" style="float: left; height: 450px;">
                                <div class="col_margin">
                                    <div style=" height:300px; overflow:hidden; text-align:center; line-height:300px; margin:auto;">
                                        <img class="card-img-top" src="<?php echo(get_the_post_thumbnail_url());?>" style="width:100%;">
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo(the_title());?></h4>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <?php
    						}
    					    $important_iter = $important_iter + 1;
    					    ?>
    					    <?php endwhile; ?>
    					</div>
    					<?php /* END THE THIRD ROW */ ?>
    					
    					<?php /* FOURTH ROW TWO CARDS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $two_query -> have_posts() ) and ( $two_iter < 2 ) ) : ?>
    						<?php
                            $two_query -> the_post();
    						?>
                            <div class="card col-sm-6" style="float: left; height: 450px;">
                                <div class="col_margin">
                                    <div style=" height:300px; overflow:hidden; text-align:center; line-height:300px; margin:auto;">
                                        <img class="card-img-top" src="<?php echo(get_the_post_thumbnail_url());?>" style="width:100%;">
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo(the_title());?></h6>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <?php
    					    $two_iter = $two_iter + 1;
    					    ?>
    					    <?php endwhile; ?>
    					</div>
    					<?php /* END FOURTH ROW */ ?>
    					
    					<?php /* FIFTH ROW THREE CARDS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $three_query -> have_posts() ) and ( $three_iter < 6 ) ) : ?>
    						<?php
                            $three_query -> the_post();
    						?>
                            <div class="card col-sm-4" style="float: left; height: 450px;">
                                <div class="col_margin">
                                    <div style="height:300px; overflow:hidden; text-align:center; line-height:300px; margin:auto;">
                                        <img class="card-img-top" src="<?php echo(get_the_post_thumbnail_url());?>" style="width:100%;">
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo(the_title());?></h6>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                           <?php
    					    $three_iter = $three_iter + 1;
    					    ?>
    					    <?php endwhile;?>
    					</div>
    					<?php /* END FIFTH ROW */ ?>
    					
    					<?php /* SIXTH ROW THE MOST IMPORTANT NEWS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $most_query -> have_posts() ) and ( $most_important_iter < 2 ) ) : ?>
    						<?php
                            $most_query -> the_post();
    						?>
                            <div class="card col-12" style="float: left;">
                                <div class="col_margin">
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h1 class="card-title"><?php echo(the_title());?></h6>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <?php
    					    $most_important_iter = $most_important_iter + 1;
    					    ?>
    					    <?php endwhile; ?>
    					</div>
    					<?php /* END SIXTH ROW */ ?>
    					
    					<?php /* SEVENTH ROW TWO CARDS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $two_query -> have_posts() ) and ( $two_iter < 4 ) ) : ?>
    						<?php
                            $two_query -> the_post();
    						?>
                            <div class="card col-sm-6" style="float: left; height: 450px;">
                                <div class="col_margin">
                                    <div style="height:300px; overflow:hidden; text-align:center; line-height:300px; margin:auto;">
                                        <img class="card-img-top" src="<?php echo(get_the_post_thumbnail_url());?>" style="width:100%;">
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo(the_title());?></h6>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <?php
    					    $two_iter = $two_iter + 1;
    					    ?>
    					    <?php endwhile; ?>
    					</div>
    					<?php /* END SEVENTH ROW */ ?>
    					
    					<?php /* EIGHTH ROW THREE CARDS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $three_query -> have_posts() ) and ( $three_iter < 9 ) ) : ?>
    						<?php
                            $three_query -> the_post();
    						?>
                            <div class="card col-sm-4" style="float: left; height: 450px;">
                                <div class="col_margin">
                                    <div style=" height:300px; overflow:hidden; text-align:center; line-height:300px; margin:auto;">
                                        <img class="card-img-top" src="<?php echo(get_the_post_thumbnail_url());?>" style="width:100%;">
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo(the_title());?></h6>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <?php
    						
    					    $three_iter = $three_iter + 1;
    					    ?>
    					    <?php endwhile;?>
    					</div>
    					<?php /* END EIGHTH ROW */ ?>
    					
    					<?php /* NINTH ROW IMPORTANT NEWS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $important_query -> have_posts() ) and ( $important_iter < 2 ) ) : ?>
    						<?php
                            $important_query -> the_post();
    						?>
                            <div class="card col-12" style="float: left; height: 450px;">
                                <div class="col_margin">
                                    <div style="height:300px; overflow:hidden; text-align:center; line-height:300px; margin:auto;">
                                        <img class="card-img-top" src="<?php echo(get_the_post_thumbnail_url());?>" style="width:100%;">
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo(the_title());?></h4>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <?php
    					    $important_iter = $important_iter + 1;
    					    ?>
    					    <?php endwhile; ?>
    					</div>
    					<?php /* END NINTH ROW */ ?>
    					
    					<?php /* TENTH ROW FOUR CARDS */ ?>
    					<div class="row row_margin">
                            <?php while ( ( $four_query -> have_posts() ) and ( $four_iter < 4 ) ) : ?>
    						<?php
                            $four_query -> the_post();
    						?>
                            <div class="card col-md-3" style="float: left; height: 350px;">
                                <div class="col_margin">
                                    <div style=" height:200px; overflow:hidden; text-align:center; line-height:300px; margin:auto;">
                                        <img class="card-img-top" src="<?php echo(get_the_post_thumbnail_url());?>" style="width:100%;">
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo(the_title());?></h6>
                                            <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                            <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <?php
    					    $four_iter = $four_iter + 1;
    					    ?>
    					    <?php endwhile; ?>
    					</div>
    					<?php /* END TENTH ROW */ ?>
    					
					    <?php //wp_reset_query()?>
					    <div style="clear: both;"></div>
					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php //understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
