<?php if (have_posts()):while (have_posts()):the_post(); ?>
  <div class="card mb-3">
    <div class="card-body d-flex align-items-center">
      <?php if (has_post_thumbnail()): ?>
      <div class="cat-img-warp img-thumbnail">
        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>"
             class="img-fluid mb-3 cat-img"/>
      </div>
      <?php endif; ?>
      <div class="blog-content">
        <h3><?php the_title() ?></h3>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="btn btn-success">Read more</a>
      </div>
    </div>
  </div>

  <hr/>
<?php endwhile; endif; ?>
