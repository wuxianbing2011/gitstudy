//鼠标事件集合
//滑动函数
/*

	notclick :按下时立即执行
	slideTopMove :向上滑动时不断执行
	slideDownMove ：向下滑动时不断执行
	slideLeftMove ：向左滑动时不断执行
	slideRightMove ：向右滑动时不断执行
	notMove ：滑动时无方向定位执行
	notClicks ： 松开频幕时执行（即使滑动过也能接受）
	click ： 点击执行（拒绝滑动执行）
	slideRight ：向右滑动
	slideLeft ：向左滑动
	slideTop ：向上滑动
	slideDown ：向下滑动
	例子：
	sunday_un("事件","id",function(){
		//执行函数
	})

	图片加载：
	sunday_loadImg(['图片地址','图片地址'],function(){
		//完成后执行
	});

*/
var sunday_un = function(index,id,fn,slide){
	
	var id = document.getElementById(id);
	
	if(id==null || index==null || fn==null) return;
	slide = slide || true;
	id.addEventListener("touchstart",touchstart0,false);
	var x1=0,x2=0,x3=0,y1=0,y2=0,animate = false;
	function touchstart0(){
		x1=0;x2=0;x3=0;y1=0;y2=0;
		if(index=="notClick"){
			fn(x1,y1);
			return;
		}
		var t = event.touches[0];
		x1 = t.pageX;
		y1 = t.pageY;
		id.addEventListener("touchmove",touchmove0,false);
		id.addEventListener("touchend",touchend0,false);
	}
	function touchmove0(){
		event.preventDefault();
		var v = event.touches[0];
		x2 = v.pageX;
		y2 = v.pageY;
		x3 = x1-x2;
		y3 = y1-y2;
		if(y3 > 0 && index == 'slideTopMove'){
			fn(y3);
			return;
		}else if(y3 < 0 && index == 'slideDownMove'){
			fn(y3);
			return;
		}else if(x3 > 0 && index == 'slideLeftMove'){
			fn(x3);
			return;
		}else if(x3 < 0 && index == 'slideRightMove'){
			fn(x3);
			return;
		}else if(index=="notMove"){
			fn(x2,y2,x1,y1);
			return;
		}
	}
	function touchend0(){
		x1 = x1-x2;
		c1 = y1-y2;
		if(index=="notClicks"){
			fn();
			return;
		}
		if(x2==0 && index == 'click'){
			fn(id);
			return;
		}else if(x1 < -40 && x2!=0 && index == 'slideRight'){//右
			fn();
			return;
		}else if(x1 > 40 && x2!=0 && index == 'slideLeft'){//左
			fn();
			return;
		}else if(c1 > 40 && y2!=0  && index == 'slideTop') {//上
			fn();
			return;
		}else if(c1 < -40 && y2!=0 && index == 'slideDown'){//下
			fn();
			return;
		}
	}
}

//图片加载
function sunday_loadImg(attr,ok)
{
	var loadingImgInd = 0;
	var loadingImgNew = [];
	for(var i=0;i<attr.length;i++)
	{
		loadingImgNew[i] = new Image();
		loadingImgNew[i].src = attr[i]
		loadingImgNew[i].onload = function()
		{
			loadingImgInd++;
			if(loadingImgInd==attr.length)
			{
					ok();
			}
		}
	}
}

/*
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64528120-13', 'auto');
  ga('send', 'pageview');
*/
//index 
$(".home-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','Nav','homepage','SMB');
	window.location.href=hrefs;
})

$(".story-tab").click(function(){
	ga('send', 'event','Nav','Story','SMB');
})
$(".video-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','Nav','video','SMB');
	window.location.href=hrefs;
})
$(".buy-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','Nav','purchase','SMB');
	window.location.href=hrefs;
})
//indes  nav
$(".story1-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','homepage','readmore-business','SMB');
	window.location.href=hrefs;
})
$(".story2-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','homepage','readmore-shop','SMB');
	window.location.href=hrefs;
})
$(".story3-tab").click(function(){
	var hrefs=$(this).attr("hrefs")
	ga('send', 'event','homepage','readmore-getrich','SMB');
	window.location.href=hrefs
})
$(".story4-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','homepage','readmore-annualincome','SMB');
	window.location.href=hrefs;
})

//story
$(".story1-list-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','story','preview-business','SMB');
	window.location.href=hrefs;
})
$(".story2-list-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','story','preview-shop','SMB');
	window.location.href=hrefs;
})
$(".story3-list-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','story','preview-getrich','SMB');
	window.location.href=hrefs;
})
$(".story4-list-tab").click(function(){
	var hrefs=$(this).attr("hrefs");
	ga('send', 'event','story','preview-annualincome','SMB');
	window.location.href=hrefs;
})

//buy
$(".buy-btn1").click(function(){
	var href=$(this).attr("href");
	ga('send', 'event','purchase','buynow','SMB');
	window.location.href=href;
})
$(".buy-btn2").click(function(){
	var href=$(this).attr("href");
	ga('send', 'event','purchase','education','SMB');
	window.location.href=href;
})
$(".buy-btn3").click(function(){
	var href=$(this).attr("href");
	ga('send', 'event','purchase','finddealer','SMB');
	window.location.href=href;
})

var url = window.location.href;
if(url.indexOf("students/products") > 0 )
{
	var url = "EDU";
}
if(url.indexOf("smb/products") > 0 )
{
	var url = "SMB";
}
//products
$('#pro ul li a').click(function(){
	var name=$(this).attr('name');
			 ga('send', 'event','purchase-now',name,url);
		})
var er_=false,wu_=false,qi_=false,yi_=false;
$(window).scroll(function(){
	var top_=$(document).scrollTop();
	var d_h=$(document).height();
	var w_h = $(window).height();
	val_ = top_ / (d_h-w_h);
	if (val_>=0.25&&val_<0.3) 
	{
		if (!er_) 
		{
					ga('send', 'event','pagecontent','25%view',url,{'nonInteraction':true});
					er_=true;
				}
			}
			if (val_>=0.50&&val_<0.55) 
			{
				if (!wu_) 
				{
					ga('send', 'event','pagecontent','50%view',url,{'nonInteraction':true});
					wu_=true;
				}

			}
			if (val_>=0.75&&val_<0.8)
			{
				if (!qi_)
				{ 
					ga('send', 'event','pagecontent','75%view',url,{'nonInteraction':true});
					qi_=true;
				}

			}
			if (val_>=1) 
			{
				if (!yi_)
				{ 
						ga('send', 'event','pagecontent','100%view',url,{'nonInteraction':true});
						yi_=true;
					}

				}

			})