<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package firsttimebuyer
 */
$url = $_SERVER["REQUEST_URI"];		//获取当前的url
$students = strpos($url,'students');			//判断是否为students页面
$smb = strpos($url,'smb');			//判断是否为smb页面
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>开启梦想为明天</title>
	<?php if ($smb!== false || is_home() || is_front_page() ):?>
   	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/index.css"/>
   	<?php elseif ($students!== false):?>
   	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/index_students.css"/>
   	<?php endif;?>
</head>
<?php wp_head(); ?>