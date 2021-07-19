<div class="header-title">
    <div class="container">
        <h1>
            <?php
                if (is_home()) {
                    if (get_option('page_for_posts', true)) {
                    echo get_the_title(get_option('page_for_posts', true));
                    } else {
                        echo 'Blog';
                    }
                } elseif (is_archive()) {
                    echo get_the_archive_title();
                } elseif (is_search()) {
                    echo sprintf( 'Search Results for %s', get_search_query() );
                } elseif( valid_element(get_field('page_title')) ) {
                    echo get_field('page_title');
                } else {
                    echo get_the_title();
                }
            ?>
        </h1>
    </div>

    <?php $image = get_field('banner_image'); ?>
    <?php $url = $image ? $image : get_template_directory_uri() . '/assets/images/cp-banner-default.jpg'; ?>
    <div class="header-title__background abs-cover bg-image full" style="background-image: url(<?= $url; ?>)"></div>
</div>