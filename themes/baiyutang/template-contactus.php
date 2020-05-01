<?php
/*
Template Name: Contact Us
*/
?>
<?php get_header(); ?>
<section class="page-wrap">
  <div class="container">
    <h1><?php the_title() ?></h1>
    <div class="row">
      <div class="col-lg-6">
        <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top"
                data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
          Popover on top
        </button>

        <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
          Popover on right
        </button>

        <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                data-placement="bottom" data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus.">
          Popover on bottom
        </button>

        <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
          Popover on left
        </button>
      </div>
      <div class="col-lg-6"><?php get_template_part('includes/section', 'content'); ?></div>
    </div>
  </div>
</section>


<?php get_footer(); ?>

