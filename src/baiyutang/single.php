<?php get_header(); ?>

<section class="page-wrap">
  <div class="container">


    <div class="row">
      <div class="col-lg-9">
        <?php if (has_post_thumbnail()): ?>
          <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>"
               class="img-fluid mb-3 img-thumbnail"/>
        <?php endif; ?>
        <h1><?php the_title() ?></h1>
        <?php get_template_part('includes/section', 'blogcontent'); ?>

        <?php
        // comments_template();
        ?>

        <?php wp_link_pages(); ?>
      </div>
      <div class="col-lg-3">

        <?php if (is_active_sidebar('page-sidebar')): ?>

          <ul class="page-widget">
            <?php dynamic_sidebar('page-sidebar') ?>
          </ul>

        <?php endif; ?>

      </div>

    </div>


  </div>
</section>

<?php get_footer(); ?>

