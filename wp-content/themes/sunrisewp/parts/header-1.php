<?php
session_start();
$header_option = get_field('theme_header_option', 'option');
$elMenu = wp_get_nav_menu_items('Menu Header-1');
$connect_social = get_field('connect_social', 'option');
$menu1 = array();
$menu = array();
foreach ($elMenu as $value) {

    $menu1[] = (array)$value;
}
foreach ($menu1 as $element) {
    if (!array_search($element['ID'], array_column($menu1, 'menu_item_parent'))) {
        $element['dem'] = 0;
    } else {
        $element['dem'] = 1;
    }
    $menu[] = (array)$element;
}
$url_check = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ke = strpos($url_check, 'page');
//print_r($ke);die();
if (!empty($ke)) {
    $url_check = substr($url_check, 0, $ke);
}
?>
<div class="header-bot">
    <div class="container">
        <nav class="menu">
            <ul>
                <?php foreach ($menu as $value): ?>
                    <?php if ($value['menu_item_parent'] == 0): ?>
                        <li class="<?php echo ($value['url'] == $url_check) ? 'active' : ''; ?>">
                            <a href="<?= $value['url'] ?>"><?= $value['title'] ?></a>
                            <?php if ($value['dem'] == 1): ?>
                                <i class="fas fa-caret-down"></i>
                                <nav class="menu-dropdown">
                                    <ul>
                                        <?php
                                        foreach ($menu as $k => $key) {
                                            if ($key['menu_item_parent'] == $value['ID']) {
                                                ?>
                                                <li><a href="<?= $key['url'] ?>"><?= $key['title'] ?></a></li>
                                            <?php }
                                        } ?>
                                    </ul>
                                </nav>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <div class="close-menu">
                <i class="far fa-times"></i>
            </div>
        </nav>
    </div>
</div>
