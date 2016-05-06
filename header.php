<?php 
/*
|--------------------------------------------------------------------------
| Wordpress theme > header.php
|--------------------------------------------------------------------------
*/
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shotcurt icon" href="<?=bloginfo('template_url')?>/assets/images/icons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?=bloginfo('template_url')?>/assets/css/main.css">

    <?php
    wp_head();
    ?>
</head>
<body>
    <header class="header">
        
    </header><!-- .header -->
