<?php

/**
 * DokuWiki Flarum Template
 *
 * @link     http://dokuwiki.org/template:flarum
 * @author   laoyu <wfdaj@qq.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
header('X-UA-Compatible: IE=edge,chrome=1');

$showTools = !tpl_getConf('hideTools') || (tpl_getConf('hideTools') && !empty($_SERVER['REMOTE_USER']));
$showSidebar = page_findnearest($conf['sidebar']) && ($ACT == 'show');
?>
<!doctype html>
<html lang="<?php echo $conf['lang'] ?>" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>
        (function(H) {
            H.className = H.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement)
    </script>
    <?php tpl_metaheaders() ?>
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
</head>

<body>

    <div id="dokuwiki__site" class="app affix <?php echo tpl_classes(); ?> <?php echo ($showSidebar) ? 'showSidebar' : ''; ?> <?php echo ($hasSidebar) ? 'hasSidebar' : ''; ?>">

        <?php include('tpl_header.php') ?>

        <main id="dokuwiki__top" class="app-content">
            <header class="hero alert p-0 m-0 alert-dismissible fade show" role="alert">
                <div class="container position-relative">
                    <div class="container-narrow">
                        <h2 class="hero-title">胜败乃兵家常事😏，少侠请重新来过。</h2>
                        <?php if ($conf['tagline']) : ?>
                            <div class="hero-subtitle"><?= $conf['tagline']; ?></div>
                        <?php endif ?>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </header>
            <div class="container">
                <div class="sideNavContainer">
                    <div class="sideNavOffset">
                        <?php if ($conf['youarehere']) : ?>
                            <div class="youarehere"><?php tpl_youarehere() ?></div>
                        <?php endif ?>
                        <!-- ********** CONTENT ********** -->
                        <div id="dokuwiki__content">
                            <?php html_msgarea() ?>
                            <div class="typo position-relative">
                                <?php tpl_flush() ?>
                                <?php tpl_includeFile('pageheader.html') ?>
                                <!-- wikipage start -->
                                <?php tpl_content(false) ?>
                                <!-- wikipage stop -->
                                <?php tpl_includeFile('pagefooter.html') ?>
                            </div>

                            <div class="docInfo"><?php tpl_pageinfo() ?></div>

                            <?php tpl_flush() ?>
                        </div><!-- /content -->
                    </div>
                    <nav class="IndexPage-nav sideNav offcanvas">
                        <ul data-spy="affix" data-offset-top="180">
                            <li class="app-primaryControl item-newDiscussion">
                                <button type="button" class="btn btn-primary IndexPage-newDiscussion hasIcon" data-toggle="modal" data-target="#addNew" title="add new">
                                    <svg t="1610551596271" class="icon btn-icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="8435" width="24" height="24">
                                        <path d="M474 152m8 0l60 0q8 0 8 8l0 704q0 8-8 8l-60 0q-8 0-8-8l0-704q0-8 8-8Z" p-id="8436" fill="#515151"></path>
                                        <path d="M168 474m8 0l672 0q8 0 8 8l0 60q0 8-8 8l-672 0q-8 0-8-8l0-60q0-8 8-8Z" p-id="8437" fill="#515151"></path>
                                    </svg>
                                    <span class="btn-label">
                                        <?php
                                            global $lang;
                                            echo $lang['mail_newpage'];
                                        ?>
                                    </span>
                                </button>
                            </li>
                            <li class="item-nav">
                                <div class="btn-group dropdown app-titleControl dropdown-select">
                                    <button class="dropdown-toggle btn" id="dropdownMenuTools" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="btn-label"><?php echo $lang['page_tools']; ?></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuTools">
                                        <?php echo (new \dokuwiki\Menu\PageMenu())->getListItems('action '); ?>
                                        <li class="dropdown-separator"></li>
                                        <li>
                                            <?php tpl_toc() ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>

    <?php html_msgarea() /* 页面顶部偶尔出现错误和信息消息 */ ?>

    <div class="no">
        <?php tpl_indexerWebBug() /* 提供DokuWiki内务管理，所有模板都需要 */ ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addNew" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewLabel">
                        Modal title
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo p_render('xhtml', p_get_instructions('{{NEWPAGE}}'), $info) ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
