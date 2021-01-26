<?php get_header(); ?>



			<div class="team">
                <div class="container">
                    <div class="row">
                        
								<?php
										if (have_posts())
										{
											while ( have_posts())
											{	
												the_post();
												echo DajStudentaPoId($post->ID);
											}
										}
								?> 
                        </div>
                    </div>
                </div>
            </div>

        
<?php get_footer(); ?>