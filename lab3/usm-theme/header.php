<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<header class="site-header">
    <div class="header-container">
        <h1 class="logo"><?php bloginfo('name'); ?></h1>

        <nav class="main-nav">
            <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false
            )); ?>
            <button id="sidebar-toggle">☰ Sidebar</button>
        </nav>
    </div>
</header>