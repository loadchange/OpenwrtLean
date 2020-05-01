<?php if (have_posts()):while (have_posts()):the_post(); ?>

    <?php the_content(); ?>



    <?php
    $tags = get_the_tags();
    if ($tags):foreach (get_the_tags() as $tag):?>
        <a href="<?php echo get_tag_link($tag->term_id) ?>" class="badge badge-success"><?php echo $tag->name; ?></a>
    <?php endforeach;endif; ?>

    <?php foreach (get_categories() as $cat): ?>
        <a href="<?php echo get_category_link($cat) ?>" class="badge badge-success"><?php echo $cat->name; ?></a>
    <?php endforeach; ?>


    <p>
        <?php
        echo get_the_date('Y-m-d h:m:s');
        ?>
    </p>

<?php endwhile; endif; ?>
