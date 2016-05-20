<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package firsttimebuyer
 */
$url = $_SERVER["REQUEST_URI"];		//获取当前的url
$students = strpos($url,'students');			//判断是否为students页面
$smb = strpos($url,'smb');			//判断是否为smb页面
$products = strpos($url,'products');
?>
<?php wp_reset_query();if ($smb!== false || is_home() || is_front_page() ):?>
   	<?php  wp_nav_menu( 
		array( 
				'theme_location'		=> 'primary',
				'container_class'		=> 'footer' ,
				'items_wrap'			=> '<ul>%3$s</ul>',
				'depth'					=> 0,
			)
		); ?>
   	<?php elseif ($students!== false):?>
   	<?php  wp_nav_menu( 
		array( 
				'theme_location'		=> 'studentsmenu',
				'container_class'		=> 'footer' ,
				'items_wrap'			=> '<ul>%3$s</ul>',
				'depth'					=> 0,
			)
		); ?>
   	<?php endif;?>
<?php if ($products!==false):?><?php elseif (true):?></div><?php endif;?>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/sunday.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">

	$(function(){
		$(".menu-item-has-children").click(function(){
			if($(".sub-menu").css("display")=="none"){

				$(".sub-menu").show();
				}else{
				$(".sub-menu").hide();	
				}
		});

		$('.menu-item').each(function(){
			var img = $(this).find('img');
			img.removeAttr('width');
			img.removeAttr('height');
			img.removeAttr('style');
// 			console.log(img);

		});

		$('.footer .menu-item-has-children >a.menu-image-title-after').attr('href','javascript:void(0)');
		
})

	</script>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-64528120-13', 'auto');
	  ga('send', 'pageview');
	</script>
</body>
</html>