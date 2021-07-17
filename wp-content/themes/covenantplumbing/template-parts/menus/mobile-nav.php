<?php
$menu = 'primary-navigation';
$primary_navigation = wp_get_nav_menu_items($menu);
?>
<div class="mobile-nav desktop-hide">
    <div id="mobile-header" class="mobile-nav__header mobile-header">
        <div class="mobile-header__inner">
            <p class="mobile-header__logo">
                <a class="mobile-header__logo__link" href="<?= bloginfo('url'); ?>/">
                    <img class="mobile-header__logo__image" src="<?= bloginfo('template_url'); ?>/assets/images/logo.png" alt="<?= bloginfo('name'); ?> logo" />
                </a>
                <span class="sr-only"><?= bloginfo('name'); ?></span>
            </p>
            <button id="mobile-trigger" type="button" class="mobile-header__button button--clear">
                <span class="mobile-header__button__text sr-only">Menu</span>
                <span class="mobile-header__button__icon"></span>
            </button>
        </div>
    </div>

    <div id="mobile-navigation" class="mobile-nav__menu mobile-menu">
        <div class="mobile-menu__wrap menu-center force">
            <div id="mobile-menu" class="mobile-menu__panel">
                <div id="mobile-menu-primary" class="mobile-menu__group">
                    <?php mobile_nav_build_primary($primary_navigation); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * Build out primary-menu 
 */
function mobile_nav_build_primary($nav){
    if( empty($nav) ) {
        return false;
    }

    // Create parent arrays
    $menu_items = [];
    foreach( $nav as $item ) {
        $isParent = $item->menu_item_parent;

        if( $isParent === '0'){
            $menu_items[] = $item; // Push object into menu_item array
        }
    }

    // Build out sub-menu array
    $sub_menu_items = [];
    foreach( $nav as $item ) {
        $parent = $item->menu_item_parent;

        if( $parent !== '0'){
            $sub_menu_items[$parent][] = $item;
        }
    }

    // Now, begin building the HTML
    ob_start();
    ?>
    <ul class="mobile-menu__navigation mobile-menu-primary" data-level="1">
    <?php
    foreach( $menu_items as $item ) {
        $id = $item->ID;
        $title = $item->title;
        $url = $item->url;
        $isNewTab = $item->target !== '' ? 'target="_blank"' : '';
        $secondary = isset($sub_menu_items[$id]) ? $sub_menu_items[$id] : false;

        // Remove secondary sub menu items & leave tertiary menu items
        unset($sub_menu_items[$id]);
        ?>
        <li id="mobile-item-<?= $id; ?>" class="mobile-menu-primary__item">
            <a class="mobile-menu-primary__item__link" href="<?= $url; ?>" <?= $isNewTab; ?>>
                <?= $title; ?>
            </a>
            <?php // Secondary menu level
            if( $secondary !== false ) :
                mobile_nav_build_sub_menu( $id, $title, $secondary, $sub_menu_items );
            endif;
            ?>
        </li>
        <?php
    }
    ?>
    </ul>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;	
}

/**
 * Build out sub-menu 
 * 
 * @param String $id Parent id
 * @param String $title Parent title
 * @param Array $secondary Pass array reference to object
 * @param Array $sub_menu_items Pass array reference to sub_menu_items_array
 * 
 */
function mobile_nav_build_sub_menu( $id, $title, $secondary, $sub_menu_items ) {
    ?>
    <button type="button" class="mobile-menu-primary__toggle button--clear" data-open="sub-menu-<?= $id; ?>">
        <span class="mobile-menu-primary__toggle__icon ikes-chevron-down no-touch" aria-hidden="true"></span>
        <span class="mobile-menu-primary__toggle__text sr-only no-touch">Open <?= $title; ?></span>
    </button>

    <ul id="sub-menu-<?= $id; ?>" class="mobile-menu__navigation mobile-sub-menu" data-level="2" aria-hidden="true">
        <?php
        foreach( $secondary as $item ) :
            $id = $item->ID;
            $title = $item->title;
            $url = $item->url;
            $isNewTab = $item->target !== '' ? 'target="_blank"' : '';

            $secondary = isset($sub_menu_items[$id]) ? $sub_menu_items[$id] : false;

            // Remove secondary sub menu items & leave tertiary menu items
            unset($sub_menu_items[$id]);
            ?>
            <li id="mobile-item-<?= $id; ?>" class="mobile-sub-menu__item">
                <a class="mobile-sub-menu__item__link" href="<?= $url; ?>" <?= $isNewTab; ?>>
                    <?= $title; ?>
                </a>
                <?php // Secondary menu level
                if( $secondary !== false ) :
                    mobile_nav_build_sub_menu( $id, $title, $secondary, $sub_menu_items );
                endif;
                ?>
            </li>
            <?php
        endforeach;
        ?>
    </ul>
    <?php
}