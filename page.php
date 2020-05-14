<?php get_header(); ?>
      <div class="row">

        <div class="col-sm-12">

          <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                get_template_part('content', get_post_format());
            endwhile; endif;
          ?>

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.col -->

      </div><!-- /.row -->
<?php get_footer(); ?>
