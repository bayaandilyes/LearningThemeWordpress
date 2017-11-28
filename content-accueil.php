<section>

<?php 
the_content(); 
$args = array (
    'post_type'  => 'accueil-news',
    'orderby'    => 'rand', 
    'posts_per_page' => 1
);
$loop = new WP_Query($args); 
if($loop->have_posts()) : 
while($loop->have_posts()) : 
    $loop->the_post();
    global $post; 

            echo '<aside>';
                echo  get_the_post_thumbnail($id, 'accueil-size'); 
            echo '</aside>';

              echo  '<article>';
                 echo '<h3>' . get_the_title() . '</h3>'; 
                 echo the_content();                 
              echo  '</article>';

endwhile; 
            
endif;
            
      ?>           
                <!-- PARTENAIRES -->
                <div class="partenaires" style="height:200px;">
                <h3 style="text-align:center;"> Nos Partenaires  </h3>
                <?php echo do_shortcode('[logoshowcase center_mode="false" slides_column="3" dots="false" arrows="false"]'); ?>

                </div> <!-- /.partenaires -->

 </section>


