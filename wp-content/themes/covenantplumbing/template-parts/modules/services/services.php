<?php
$section_id = get_sub_field('section_id');
$section_classes = get_sub_field('section_classes');
$services = get_sub_field('services'); // relationship

// Can't just print an empty id and have id="", so build printout here instead
$id = !empty($section_id) ? "id=\"{$section_id}\"" : '';

// Apply padding class
$padding = get_sub_field('padding_between_sections');
$padding_top = $padding['section_padding_top'];
$padding_bottom = $padding['section_padding_bottom'];
if( $padding_top && $padding_bottom ) {
    $section_classes .= ' double-padding';
} elseif( $padding_top ) {
    $section_classes .= ' double-padding--top';
} elseif( $padding_bottom ) {
    $section_classes .= ' double-padding--bot';
}
?>
<section <?= $id; ?> class="section-wrap services <?= $section_classes; ?>">
    <div class="services__container container">
    <?php 
    if( $services ) :
        ?>
        <ul class="services__list">
        <?php
        $cx = 0;
        foreach( $services as $service ) :
            $cx++;
            $id = $service->ID;
            $image = acf_get_attachment(get_post_thumbnail_id($id));
            $link = get_the_permalink($id);
            ?>
            <li class="services__list-item">
                <a class="services__list-item__anchor" href="<?= $link; ?>">
                    <h3 class="services__list-item__title h4"><?= $service->post_title; ?></h3>

                    <div class="services__list-item__backgrounds">
                        <span class="services__list-item__overlay abs-cover"></span>
                        <div class="services__list-item__image abs-cover bg-image full" style="background-image: url(<?= $image['url']; ?>);" aria-hidden="true"></div>
                        <div class="services__list-item__image--hover abs-cover bg-image full" style="background-image: url(<?= $image['url']; ?>);" aria-hidden="true"></div>
                    </div>
                </a>
            </li>
            <?php
        endforeach;
        ?>
        </ul>
        <?php
    endif;
    ?>
    </div>
</section>