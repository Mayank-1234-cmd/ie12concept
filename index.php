<?php

session_start();

$_SESSION['tabs'] = [
    ['title' => 'Bing', 'url' => 'http://bing.de'],
    ['title' => 'LGK Blog', 'url' => 'http://blog.lgkonline.com']
];

$new_tab = ['title' => 'New tab', 'url' => 'new-tab.html'];
$info_tab = ['title' => 'About this live demo', 'url' => 'info.php'];

$action_get = filter_input(INPUT_GET, 'action');

if ($action_get == 'new-tab') {
    array_push($_SESSION['tabs'], $new_tab);
}

if ($action_get == 'info-tab') {
    array_push($_SESSION['tabs'], $info_tab);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>IE 12 Concept</title>
        <link rel="icon" type="image/png" href="images/favicon.png"> 
        
        <style type="text/css"><?php include_once 'css/main.css'; ?></style>
    </head>

    <body>
        <div class="window" id="window-1">
            <div class="top">
                <div class="window-options">
                    <button type="button" class="window-option window-minimize" data-minimize="#window-1"></button>
                    <button type="button" class="window-option window-maximize" data-maximize="#window-1"></button>
                    <button type="button" class="window-option window-close" data-close="#window-1"></button>
                </div><!-- window-options -->
                
                <div class="ie">
                    <div class="ie-nav">
                        <button type="button" class="ie-nav-btn ie-prev"></button>
                        <button type="button" class="ie-nav-btn ie-next"></button>
                    </div><!-- ie-nav -->
                    
                    <div class="ie-tabs">
                        <div class="ie-tabs-sortable">
                            <?php foreach ($_SESSION['tabs'] as $tab) : ?>
                            <div class="ie-tab" data-tab-url="<?php echo $tab['url']; ?>">
                                <div class="ie-tab-close"></div>

                                <img src="http://www.google.com/s2/favicons?domain=<?php echo $tab['url']; ?>" class="ie-tab-favicon">
                                <span class="ie-tab-label">
                                    <?php echo $tab['title']; ?>
                                </span>

                                <div class="ie-tab-address">
                                    <img src="http://www.google.com/s2/favicons?domain=<?php echo $tab['url']; ?>" class="ie-tab-address-favicon">
                                    <input type="text" class="ie-tab-address-input" value="<?php echo $tab['url']; ?>" spellcheck="false">
                                </div>
                            </div><!-- ie-tab -->
                            <?php endforeach; ?>
                        </div>
                        <div class="ie-tab ie-tab-new"></div>
                    </div><!-- ie-tabs -->
                    
                    <div class="ie-menu">
                        <span class="ie-menu-point ie-menu-info" title="About this demo"></span>
                        <span class="ie-menu-point ie-menu-fav"></span>
                        <span class="ie-menu-point ie-menu-options"></span>
                    </div>
                </div><!-- ie -->
            </div><!-- top -->
            
            <iframe src="http://bing.de" class="website-frame" id="website-frame-1" data-wakeup="#window-1" name="iframe1"></iframe>
        </div><!-- window -->
        
        <?php if (!$action_get) : ?>
        <div class="window inactive snapped right" id="window-2">
            <div class="top">
                <div class="window-options">
                    <button type="button" class="window-option window-minimize" data-minimize="#window-2"></button>
                    <button type="button" class="window-option window-maximize" data-maximize="#window-2"></button>
                    <button type="button" class="window-option window-close" data-close="#window-2"></button>
                </div><!-- window-options -->
                
                <div class="ie" style="visibility: hidden;">
                    <div class="ie-nav">
                        <button type="button" class="ie-nav-btn ie-prev"></button>
                        <button type="button" class="ie-nav-btn ie-next"></button>
                    </div><!-- ie-nav -->
                    
                    <div class="ie-menu">
                        <span class="ie-menu-point ie-menu-info" title="About this demo"></span>
                        <span class="ie-menu-point ie-menu-fav"></span>
                        <span class="ie-menu-point ie-menu-options"></span>
                    </div>
                </div><!-- ie -->
            </div><!-- top -->
            
            <iframe src="info.php" class="website-frame" id="website-frame-1" data-wakeup="#window-2"></iframe>
        </div><!-- window -->
        <?php endif; ?>
        
        <div class="droppable left"></div>
        <div class="droppable right"></div>
        
        <div id="fullscreen-info">
            <p>
                To get a better experience you should watch this demo on fullscreen mode.
            </p>
            <p>
                On the most browsers you just have to press F11.
            </p>
        </div>
        
        <div id="taskbar">
            <div id="taskbar-startmenu">
                <h1>Windows Simulator</h1>
                
                <p>
                    <a href="http://about.lgkonline.com/kontakt" target="_blank">Ask to get the code &raquo;</a>
                </p>
            </div>
            
            <div id="taskbar-windows"></div>
            <div class="task active" id="task-ie" data-toggle="#window-1"></div>
            <div class="task <?php if ($action_get) : ?>closed<?php else : ?>open<?php endif; ?>" id="task-info" data-toggle="#window-2"></div>
            <!--<div class="task" id="task-word"></div>-->
            
            <div id="taskbar-time">
                <?php echo date('H:i'); ?><br>
                <?php echo date('d.m.Y'); ?>
            </div>
        </div>
        
        <div id="layer"></div>
        
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script> 
        
        <script><?php include_once 'js/main.js'; ?></script>
        
        <script>
        $(function() {
            <?php if ($action_get == 'new-tab') : ?>
                $('.ie-tab[data-tab-url="new-tab.html"]').each(function() {
                    $(this).click();
                    $(this).find('.ie-tab-label').click();
                });
            <?php elseif ($action_get == 'info-tab') : ?>
                $('.ie-tab[data-tab-url="info.php"]').each(function() {
                    $(this).click();
                });
            <?php else : ?>
                $('.ie-tab').each(function() {
                    var iframe_url = $('.website-frame').attr('src');
                    var tab_url = $(this).attr('data-tab-url');

                    if (iframe_url === tab_url) {
                        $(this).addClass('active');
                    }
                });                  
            <?php endif; ?>
        });
        </script>
    </body>
</html>