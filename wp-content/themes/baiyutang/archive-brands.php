<?php get_header(); ?>
Cars =--------=
<section class="page-wrap">
  <div class="container">


    <div class="row">
      <div class="col-lg-9">
        <h1><?php echo single_cat_title(); ?></h1>
        <?php get_template_part('includes/section', 'archive'); ?>
        <?php //previous_posts_link();?>
        <?php //next_posts_link();?>

        <?php
        $big = 9999999999;
        echo paginate_links(
          array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
          )
        )
        ?>
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
