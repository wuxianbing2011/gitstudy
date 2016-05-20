<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
$smb_products = strpos($url,'smb/products');
$students_products = strpos($url,'students/products');
$video = strpos($url,'video');		//判断是否为video页面
$buy = strpos($url,'buy');			//判断是否为buy页面
get_header();?>

<?php if ($smb_products !== false || $students_products !== false):?>
<style>
	html,body{
		width: 100%;
		overflow-x:hidden;
	}
	body{
		background:#053d6f url("<?php bloginfo('template_directory'); ?>/img/products/bg.jpg") no-repeat;
		background-size: 100% auto;
	}
	*{
		padding: 0;
		margin:0;
	}
	#pro{
		padding-bottom: 11.5vw;
	}
	.logo{
		width: 100%;
		padding-top: 10px;
	}
	.logo img{
		width: 15%;
		display: block;
		margin:0 auto;
	}
</style>
<body>
	<div id="pro">
		<div class="logo">
			<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="">
		</div>
		<div class="tit">
			<img src="<?php bloginfo('template_directory'); ?><?php if ($smb_products !== false){echo '/img/products/tit.png';}elseif($students_products !== false) {echo '/img/products/tit-s.png';}?>" alt="">
		</div>
		<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
		?>
		</div>
		<?php get_footer();?>
		<script type="text/javascript">
		$("body").append("<div class='heng' style='background:#053D6E url(../../wp-content/themes/firsttimebuyer/img/heng.jpg) no-repeat center center;background-size:cover;'></div>");
		
		var url_products = window.location.href;
		if(url_products.indexOf("products") > 0 )
		{
			$(".footer>ul>li:last-child").addClass("current-menu-item");
		}
		
		</script>
<?php endif;?>





<?php if ( $smb_video !== false || $smb_buy !== false || $students_video !== false || $students_buy !== false ):?>
	<body style="overflow:hidden; background: url(<?php bloginfo('template_directory'); ?><?php if ($video !== false){echo '/img/bg.jpg';}elseif($buy !== false) {echo '/img/video/video-bg.jpg';}?>) no-repeat; background-size: 100%;">
	<div class="warp">
		<div class="logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png"/></div>
		
		<?php if ( $smb_video !== false || $students_video !== false ):?>
			<div class="video-banner">
			<h1><img src="<?php bloginfo('template_directory');?><?php if ($smb_video !== false){echo '/img/video/video-title.png';}elseif ($students_video !== false ) {echo '/img/video/video-title-s.png';}?>" /></h1>
			<div class="video">
			<div style="display: block; position: relative; max-width: 100%;">
				<div style="padding-top: 56.25%;">
					<iframe src="<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>" allowfullscreen webkitallowfullscreen mozallowfullscreen 
			style="width: 100%; height: 100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;border:0px;"></iframe>
				</div>
			</div>
			</div>
		</div>
		<div class="video-neirong"><img src="<?php bloginfo('template_directory');?><?php if ($smb_video !== false){echo '/img/video/video-banner.png';}elseif ($students_video !== false ) {echo '/img/video/video-banner-s.png';}?>" id="story-click-list" /> </div>
		
		<?php elseif ( $smb_video !== false || $smb_buy !== false || $students_video !== false || $students_buy !== false ):?>
		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		<?php endif;?>
		<?php get_footer();?>
		<script type="text/javascript">$("body").append("<div class='heng' style='background:#053D6E url(../../wp-content/themes/firsttimebuyer/img/heng.jpg) no-repeat center center;background-size:cover;'></div>");</script>
		<?php if($video !== false):?>
			<script type="text/javascript">
			$(function(){
				sunday_un("slideTop","story-click-list",function(){
					window.location.href="<?php echo $home_url;?><?php if ($students_video !== false){echo '/students';}elseif ( $smb_video !== false) {echo '/smb';}?>/buy/";
						})
						
// 						$("#paly").click(function(){
// 						 	ga('send', 'event','video','play','SMB');
// 				            //此处写点击触发的操作
// 				            $(this).css("display","none");
// 				            //1、取得播放器的对象
// 				            var objVideo=document.getElementById("diveoID");
// 				            //2、调用视频播放API
// 				            objVideo.play(); 
// 				            //视频停止API
// 				            //objVideo.pause();
// 				        });
						
			})
			</script>
		<?php endif;?>
<?php endif; ?>





<?php if ( is_home() || is_front_page() || ($students !== false && $students_video == false && $students_buy == false && $smb_video == false && $smb_buy == false && $students_dealer == false && $smb_dealer == false && $students_story == false && $smb_story == false && $students_products == false) ) :?>
<body class="index" style="background: url(<?php bloginfo('template_directory'); ?>/img/home/home-bg.jpg) no-repeat;background-size:100%;">
	<div class="warp home" style="">
			<div class="logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png"/></div>
			<div  class="home-banner"><a href="<?php echo $home_url;?><?php if ($students !== false){echo '/students/story?url=1';}else {echo '/smb/story?url=1';}?>"><img src="<?php bloginfo('template_directory'); ?><?php if ($students !== false){echo '/img/home/home-banner-s.jpg';}else{echo '/img/home/home-banner.jpg';}?>"/></a></div>
			<div  class="home-banner1"><a href="<?php echo $home_url;?><?php if ($students !== false){echo '/students/story?url=1';}else{echo '/smb/story?url=1';}?>"><img src="<?php bloginfo('template_directory'); ?><?php if ($students !== false){echo '/img/home/home-tu-s.png';}else {echo '/img/home/home-tu.png';}?>"/></a></div>
			
			<div class="home-nav">
				<?php 
				if ( $students !== false ){
					$post_id = query_posts('cat=3');
				}else{
					$post_id = query_posts('cat=2');
				}
				?>
				<?php if( count($post_id) > 1 ):?>
				<img src="<?php bloginfo('template_directory'); ?>/img/home/home-zuo.png" class="left" id="left"/>
				<img src="<?php bloginfo('template_directory'); ?>/img/home/home-you.png" class="right" id="right"/>
				<?php endif;?>
				<div class="nav-list" id="slidetop-tab">
					<ul>
						<?php 
						for ($i = 0; $i < count($post_id); $i++) {
							$j = $i + 1;
							//判断是否为第一个
							if($j == 1){
								echo "<li class=\"banner$j disappear banner-yi in\">";
							}else {
								echo "<li class=\"banner$j disappear banner-yi\">";
							}
								
							echo '<div class="list1">';
							
							//Index 人物图片 thumb
							echo '<img src="';
							if(get_field('thumb',$post_id[$i]->ID))
							{
								echo get_field('thumb',$post_id[$i]->ID);
							}
							else {
								echo bloginfo('template_directory').'/img/logo.png';
							}
							echo '" class="img1"/>';
								
							//Index标题图片 title
							echo '<img src="';
							if(get_field('title',$post_id[$i]->ID))
							{
								echo get_field('title',$post_id[$i]->ID);
							}
							else {
								echo bloginfo('template_directory').'/img/logo.png';
							}
							echo '" class="img4"/>';
								
							//Index故事摘要 abstract
							echo '<div class="img2">';
							if(get_field('abstract',$post_id[$i]->ID))
							{
								echo get_field('abstract',$post_id[$i]->ID);
							}
							else {
								echo 'No abstract';
							}
							echo '</div>';
								
							//阅读完整故事链接
							echo '<a hrefs="';
							echo $post_id[$i]->guid;
							echo "\" class=\"story$j-tab\"><img src=\"";
							echo bloginfo('template_directory');
							echo '/img/home/nav-1.png" class="img3" /></a>';
								
							//遮罩图片
							echo '</div><img src="';
							echo bloginfo('template_directory');
							echo '/img/home/zhezhao.png" class="zhezhao" class="zhezhao"/>';
								
							// li 结束
							echo "</li>";
						}
						
						?>
					</ul>
				
				</div>
				
				<?php if( count($post_id) > 1 ):?>
				<ul class="yuan">
					<li class="in"></li>
					<?php 
						for ($i = 1; $i < count($post_id); $i++){
							echo '<li></li>';
						}
					?>
				</ul>
				<?php endif;?>
			</div>
			
		<?php get_footer();?>
	<script type="text/javascript">
	$("body").append("<div class='heng' style='background:#053D6E url(../wp-content/themes/firsttimebuyer/img/heng.jpg) no-repeat center center;background-size:cover;'></div>");
		<?php if( count($post_id) > 1 ):?>
		$(function(){
			var tab=1;
			var tab2=1;
			var a=$(".disappear").length;

		sunday_un("slideLeft","slidetop-tab",function(c1){
			
			tab++;
			if(tab==a+1){
				tab=1;
			}
			$(".yuan li").removeClass("in");
			$(".yuan li").eq(tab-1).addClass("in");
			
			$(".banner"+tab).addClass("in");
			
			$(".banner"+tab2).removeClass("in");
			tab2=tab;
		})	
			sunday_un("slideRight","slidetop-tab",function(){
			tab--;
			if(tab==0){
				tab=a;
			}
			$(".yuan li").removeClass("in");
			$(".yuan li").eq(tab-1).addClass("in");
			$(".banner"+tab).addClass("in");
			$(".banner"+tab2).removeClass("in");
			tab2=tab;
		})	
		sunday_un("click","right",function(c1){
			
			tab++;
			if(tab==a+1){
				tab=1;
			}
			$(".yuan li").removeClass("in");
			$(".yuan li").eq(tab-1).addClass("in");
			$(".banner"+tab).addClass("in");
			$(".banner"+tab2).removeClass("in");
			tab2=tab;
		})	
	
		sunday_un("click","left",function(){
			tab--;
			if(tab==0){
				tab=a;
			}
			$(".yuan li").removeClass("in");
			$(".yuan li").eq(tab-1).addClass("in");
			$(".banner"+tab).addClass("in");
			$(".banner"+tab2).removeClass("in");
			tab2=tab;
		})				
	
})
	<?php endif;?>
	</script>
<?php endif; ?>






<?php if ( $smb_dealer !== false || $students_dealer !== false ):?>
<style>
   	::-webkit-scrollbar
   	{ 
   		width: 5px;
   	}
   	/* 滚动槽 */
   	::-webkit-scrollbar-track 
   	{
   		-webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.3);  
   		border-radius: 3px;
   	}
   	/* 滚动条滑块 */
   	::-webkit-scrollbar-thumb
   	{    
   		border-radius: 3px;   
   		background: rgba(0,0,0,0.1);    
   		-webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.5);
   	}
   	::-webkit-scrollbar-thumb:window-inactive
   	{    
   		background: rgba(255,0,0,0.4);
   	}

   	</style>
<body style="overflow-x:hidden; background:#053d6f; background-size: 100%;">
	<div class="warp">
		<div class="logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png"/></div>
		<div class="dealer-title"><img src="<?php bloginfo('template_directory'); ?>/img/dealer/text1.png"></div>
		<div class="dealer-search" id="city">
		<div class="prov-div"><span>省</span>
			<ul class="prov">
				<li>省</li>
			</ul>
		</div>
		
		<div class="city-div"><span>城市</span>
			<ul class="city">
				<li>城市</li>
			</ul>
		</div>
	</div>
	<div class="dealer-result">
		<ul>
			<li><h2>请选择您要查找的省市</h2></li>
		</ul>
	</div>
	</div>
		<?php get_footer();?>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.cityselect.js"></script>
	<script>
	$("body").append("<div class='heng' style='background:#053D6E url(../../wp-content/themes/firsttimebuyer/img/heng.jpg) no-repeat center center;background-size:cover;'></div>");
	$(function(){
		$("#city").citySelect({
				prov:"北京"
		}); 
		$('.prov-div span').click(function(){
			ga('send', 'event','purchase-dealer','province','SMB');
			$(".prov-div ul").show();
		});
		$('.city-div span').click(function(){
			ga('send', 'event','purchase-dealer','city','SMB');
			$(".city-div ul").show();
		});
	})
</script>
<?php endif; ?>





<?php if ( $smb_story !== false || $students_story !== false ):?>
<body style="background: url(<?php bloginfo('template_directory'); ?>/img/story/story-bg.jpg) no-repeat; background-size: 100%;">
	<div class="warp" id="slidetop-tab">
		<div class="logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png"/></div>
		<?php 
		if ( $students !== false ){
				$post_id = query_posts('cat=3');
			}else{
				$post_id = query_posts('cat=2');
			}
		for ($i = 0; $i < count($post_id); $i++) {
			$j = $i + 1;
			echo "<div class=\"content$j disappear\" id=\"$j\">";
			
			//story预览标题图片 title_story
			echo '<div class="story-banner"><h1><img src="';
			if(get_field('title_story',$post_id[$i]->ID))
			{
				echo get_field('title_story',$post_id[$i]->ID);
			}
			else {
				echo bloginfo('template_directory').'/img/logo.png';
			}
			echo '"/></h1></div>';
			
			//story预览人物 thumb_story
			echo '<img src="';
			if(get_field('thumb_story',$post_id[$i]->ID))
			{
				echo get_field('thumb_story',$post_id[$i]->ID);
			}
			else {
				echo bloginfo('template_directory').'/img/logo.png';
			}
			echo '" class="tu1"/>';
			
			//story预览文字 abstract_story
			echo '<div class="tu2">';
			if(get_field('abstract_story',$post_id[$i]->ID))
			{
				echo get_field('abstract_story',$post_id[$i]->ID);
			}
			else {
				echo 'No story';
			}
			
			//阅读完整故事链接
			echo '<sub id="tab-list1"><a hrefs="';
			echo $post_id[$i]->guid;
			echo "\" class=\"story$j-list-tab\"><img src=\"";
			echo bloginfo('template_directory');
			echo '/img/story/story-quanwen.png"/></a></sub>';
			
			//结束标签
			echo '</div></div>';
		}
		
		?>
		<div class="story-huaguo">
			<img src="<?php bloginfo('template_directory'); ?>/img/story/story-huaguo.png"/>
		</div>
		<div class="story-click-list story-shipin" id="story-click-list">
			<a href="<?php echo $home_url;?><?php if ($students_story !== false){echo '/students';}elseif ( $smb_story !== false) {echo '/smb';}?>/video/"><img src="<?php bloginfo('template_directory'); ?>/img/story/story-huaguo.png"/></a>
		</div>
		<?php get_footer();?>
	<script type="text/javascript">
	$("body").append("<div class='heng' style='background:#053D6E url(../../wp-content/themes/firsttimebuyer/img/heng.jpg) no-repeat center center;background-size:cover;'></div>");
		$(function(){
			var tab=1;
			var tab2=1;
			var myurl = GetQueryString("url");
			if(myurl !=null && myurl.toString().length>=1)
			{
				tab = myurl
		   		$(".disappear").removeClass("in");
		   		$(".content"+myurl).addClass("in");
			}
			if(myurl==<?php echo count($post_id);?>){
				$(".story-huaguo img").attr("src","<?php bloginfo('template_directory'); ?>/img/story-1/story-huaguo.png")
			}
			
		
		var a=$(".disappear").length
		sunday_un("slideTop","slidetop-tab",function(c1){
			tab++;
			console.log(tab);
			if ($('.sub-menu').css('display')=='block') 
			{
			     $('.sub-menu').slideUp();
			}
			if(tab==<?php echo count($post_id);?>){
				$(".story-huaguo img").attr("src","<?php bloginfo('template_directory'); ?>/img/story-1/story-huaguo.png")
			}
			if(tab==<?php echo count($post_id)+1;?>){
				window.location.href="<?php echo $home_url;?><?php if ($students_story !== false){echo '/students';}elseif ( $smb_story !== false) {echo '/smb';}?>/video/";
			}
			$(".story-list li").removeClass("in");
			$(".story-list li").eq(tab-1).addClass("in");
			$(".disappear").removeClass("in");
			$(".content"+tab).addClass("in");
			$(".story-list").hide();

			//prev
			$(".current-menu-parent .menu-item:eq("+(tab-2)+")").find('.menu-image').show();
			$(".current-menu-parent .menu-item:eq("+(tab-2)+")").find('.hovered-image').hide();
			//current	
			$(".current-menu-parent .menu-item:eq("+(tab-1)+")").find('.menu-image').hide();
			$(".current-menu-parent .menu-item:eq("+(tab-1)+")").find('.hovered-image').show();
		})	
			
			$(".story-list li").click(function(){
				var index=$(this).index()
				tab=index+1
				$(".story-list li").removeClass("in");
				$(this).addClass("in");
			});
			$(".story-list li").eq(myurl-1).addClass("in");
		
			
//			
//		sunday_un("slideDown","slidetop-tab",function(){
//			tab--;
//			if(tab==0){
//				tab=a
//			}
//			$(".disappear").removeClass("in");
//			$(".content"+tab).addClass("in")
//		})			
			
	
})

function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}
</script>
<?php endif;?>