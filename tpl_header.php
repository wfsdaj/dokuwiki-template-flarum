<?php

/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- 小屏幕才显示的导航菜单 -->
<div id="app-navigation" class="app-navigation">
    <div class="navigation app-backControl">
        <button class="btn btn-icon navigation-drawer has-icon" type="button" title="" data-trigger="#drawer">
            <svg t="1610551510682" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7066" width="24" height="24">
                <path d="M840.544 716.8c7.04 0 12.8 5.76 12.8 12.8v42.656a12.8 12.8 0 0 1-12.8 12.8H183.456a12.8 12.8 0 0 1-12.8-12.8V729.6c0-7.04 5.76-12.8 12.8-12.8h657.088z m0-238.944c7.04 0 12.8 5.76 12.8 12.8v42.688a12.8 12.8 0 0 1-12.8 12.8H183.456a12.8 12.8 0 0 1-12.8-12.8v-42.688c0-7.04 5.76-12.8 12.8-12.8h657.088z m0-238.912c7.04 0 12.8 5.728 12.8 12.8V294.4a12.8 12.8 0 0 1-12.8 12.8H183.456a12.8 12.8 0 0 1-12.8-12.8V251.744c0-7.072 5.76-12.8 12.8-12.8h657.088z" p-id="7067" fill="#515151"></path>
            </svg>
        </button>
    </div>
</div>

<!-- ********** HEADER ********** -->
<div class="drawer-backdrop"></div>
<!-- 小屏幕时弹出的侧边栏 -->
<div id="drawer" class="app-drawer">
    <header class="app-header navbar-fixed-top">
        <div class="container">
            <h1 class="header-title" title="<?= $conf['title']; ?>">
                <?php
                tpl_link(
                    wl(),
                    $conf['title'],
                    'accesskey="h" title="[H]"'
                );
                ?>
            </h1>
            <!-- <div id="header-primary" class="header-primary">
                <ul class="header-controls">
                    <li>
                        <a class="btn btn-link" title="demo" href="###">demo</a>
                    </li>
                </ul>
            </div> -->
            <div id="header-secondary" class="header-secondary">
                <ul class="header-controls">
                    <li class="item-search">
                        <div class="search">
                            <?php tpl_searchform(); ?>
                        </div>
                    </li>
                    <?php if ($conf['useacl']) : ?>
                        <?php if (!empty($_SERVER['REMOTE_USER'])) : ?>
                            <li>
                                <div class="dropdown">
                                    <a class="btn btn-link dropdown-toggle" id="userTools" href="javascript:;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="username"><?php echo htmlentities($_SERVER['REMOTE_USER']); ?></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="userTools">
                                        <?php echo (new \dokuwiki\Menu\SiteMenu())->getListItems('', false); ?>
                                        <li class="dropdown-separator"></li>
                                        <?php
                                        $items = (new \dokuwiki\Menu\UserMenu())->getItems();
                                        foreach ($items as $item) {
                                        ?>
                                            <li><a href="<?= $item->getLink(); ?>" title="<?= $item->getTitle(); ?>"><?= $item->getLabel(); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>
                        <?php else : ?>
                            <li>
                                <a class="btn btn-link" href="/?do=register">
                                    <?php
                                        global $lang;
                                        echo $lang['btn_register'];
                                    ?>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-link" href="/?do=login&sectok="><?php echo $lang['btn_login']; ?></a>
                            </li>
                        <?php endif ?>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </header>
</div>
