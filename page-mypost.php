<?php get_header(); ?>
      <div class="row">

        <div class="col-sm-12">

          <?php 
            $args =  array(
                'post_type' => 'my-custom-post',
            );
            $my_loop = new WP_Query( $args );

            if ($my_loop->have_posts()) : while ( $my_loop->have_posts()) :
                $my_loop->the_post();
                // $meta = get_post_meta($post->ID, '', true);?>
                <h1>Title</h1>
                <?php the_title(); ?>
                <h1>Content</h1>
                <?php the_content(); ?>

            <?php endwhile; endif; wp_reset_postdata(); ?>
            
        </div><!-- /.col -->
      </div><!-- /.row -->
<?php get_footer(); ?>
