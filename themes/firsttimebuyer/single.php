<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package firsttimebuyer
 */
$home_url = home_url();
$url = $_SERVER["REQUEST_URI"];		//获取当前的url
$students = strpos($url,'students');			//判断是否为students页面
$smb = strpos($url,'smb');			//判断是否为smb页面
$smb_video = strpos($url,'smb/video');
$smb_buy = strpos($url,'smb/buy');
$students_video = strpos($url,'students/video');
$students_buy = strpos($url,'students/buy');
$smb_dealer = strpos($url,'smb/dealer');
$students_dealer = strpos($url,'students/dealer');
$smb_story = strpos($url,'smb/story');
$students_story = strpos($url,'students/story');
$video = strpos($url,'video');		//判断是否为video页面
$buy = strpos($url,'buy');			//判断是否为buy页面
get_header();?>
<style>
<!--
html,body{
	width:100%;
	overflow-x:hidden;
}
-->
</style>
<body style="background: url(<?php bloginfo('template_directory'); ?>/img/story-1/story-bg.jpg) no-repeat; background-size: 100%;">
	<div class="warp">
		<div class="logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png"/></div>
		<?php
		while ( have_posts() ) : the_post();

		echo '<div class="story1-content">';
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'firsttimebuyer' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'firsttimebuyer' ),
				'after'  => '</div>',
			) );
		

		endwhile; // End of the loop.
		?>

		<div class="story-click-list" id="story-click-list">
		<?php
			if ( $students !== false ){
				$post_id = query_posts('cat=3');
			}else{
				$post_id = query_posts('cat=2');
			}
			$get_the_category = get_the_category();
			$nicename = $get_the_category[0];
		if ($nicename->category_nicename == 'story-business') {
			echo '<ul class="list-banner">';
			for ($i = 0; $i < count($post_id); $i++) {
				$j = $i + 1;
				if ($post_id[$i]->ID == get_post()->ID){
					continue;
				}
					
				//其他链接 otherlink
				echo '<li><a href="';
				echo $home_url;
				echo "/smb/story/?url=$j";
				// 					echo $post_id[$i]->guid;
				echo '"><img src="';
				echo get_field('otherlink',$post_id[$i]->ID);
				echo '"/></a></li>';
		
			}
			echo '</ul>';
		
		}elseif($nicename->category_nicename == 'story-students'){
			echo '<ul class="list-banner">';
			for ($i = 0; $i < count($post_id); $i++) {
				$j = $i + 1;
				if ($post_id[$i]->ID == get_post()->ID){
					continue;
				}
					
				//其他链接 otherlink
				echo '<li><a href="';
				echo $home_url;
				echo "/students/story/?url=$j";
				// 					echo $post_id[$i]->guid;
				echo '"><img src="';
				echo get_field('otherlink',$post_id[$i]->ID);
				echo '"/></a></li>';
			
			}
			echo '</ul>';
		}
		
        $categoryIDS = array();
        foreach ($get_the_category as $category) {
            array_push($categoryIDS, $category->term_id);
        }
        $categoryIDS = implode(",", $categoryIDS);
		?>
		
		<?php
			$prev_post = get_previous_post($categoryIDS);
			if (!empty( $prev_post )): ?>
			<a title="<?php echo $prev_post->post_title; ?>" href="<?php
					for ($i = 0; $i < count($post_id); $i++) {
						$j = $i + 2;
						if ($post_id[$i]->ID == get_post()->ID){
							
							echo $home_url;
							if ($students !== false){echo '/students';}elseif ( $smb !== false) {echo '/smb';}
							echo "/story/?url=".$j;
							break;
						}
					}?>" rel="external nofollow" ><img src="<?php bloginfo('template_directory'); ?>/img/story/story-huaguo.png"/></a>
			<?php else: ?>
			<a href="<?php echo $home_url;?><?php if ($students !== false){echo '/students';}elseif ( $smb !== false) {echo '/smb';}?>/video"><img alt="视频" src="<?php bloginfo('template_directory'); ?>/img/story-1/story-huaguo.png" /></a>
			<?php endif;?>
			</div>
		</div>
		<?php get_footer();?>
		<script type="text/javascript">
		$("body").append("<div class='heng' style='background:#053D6E url(../../../../wp-content/themes/firsttimebuyer/img/heng.jpg) no-repeat center center;background-size:cover;'></div>");
			$(function(){
				sunday_un("slideTop","story-click-list",function(){
					window.location.href="<?php
					for ($i = 0; $i < count($post_id); $i++) {
						$k = count($post_id)-1;
						$j = $i + 2;
						if ($i == $k) {
							echo $home_url;
							if ($students !== false){echo '/students';}elseif ( $smb !== false) {echo '/smb';}
							echo "/video";
							break;
						}
						if ($post_id[$i]->ID == get_post()->ID){
							echo $home_url;
							if ($students !== false){echo '/students';}elseif ( $smb !== false) {echo '/smb';}
							echo "/story/?url=".$j;
							break;
						}
					}?>";
				});
	})
		</script>
		<?php if (count($post_id) == 1):?>
		<style>
		<!--
		.story1-img10{
			padding-bottom:0;
		}
		.story-click-list{
			padding-top: 20%;
			position: relative;
			top: -32px;
			margin-bottom: 0;
			padding-bottom: 45px;
		}
		-->
		</style>
		<?php endif;?>