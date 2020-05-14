<?php get_header(); ?>
      <div class="row">

        <div class="col-sm-12">

          <?php 
            $args =  array(
                'post_type' => 'my-custom-type',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );
            $custom_query = new WP_Query( $args );
            while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                
                
                <div class="blog-post">
                    <h2 class="blog-post-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <?php if ( has_post_thumbnail() ) {?>
                        <div class="row">
                            <div class="col-md-4">
                                <?php	the_post_thumbnail('thumbnail'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <?php } else { ?>
                            <?php the_excerpt(); ?>
                        <?php } 
                    ?>
                </div>
            <?php endwhile; ?>
        </div><!-- /.col -->
      </div><!-- /.row -->
<?php get_footer(); ?>
