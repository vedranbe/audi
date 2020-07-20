<?php
/**
* The header for our theme.
*/
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?>
        <?php if (wp_title('', false)) {
                echo ' :';
        } ?>
    <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400&family=Roboto+Condensed:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?> translate="no">
        
<header class="header nav-down clear" role="banner" aria-label="Header">
    <div class="wrapper">
        <div class="header-inner">
                    <div class="logo">
                        <a href="#home"><img src="<?php echo AUDI_IMAGES.'/logo.svg'; ?>"></a>
                    </div>

                    <div class="navigation">
                        <nav class="navbar navbar-dark navbar-expand-md">
                            <div class="hamburger hamburger--stand" tabindex="0" aria-label="Menu" role="button" aria-controls="navbarSupportedContent">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <?php audi_nav(); ?>
                            </div>
                        </nav>
                    </div>
                </div>
        </div>
    </div>
</header>