/*
Ajax 三级省市联动
日期：2012-7-18

settings 参数说明
-----
url:省市数据josn文件路径
prov:默认省份
city:默认城市
dist:默认地区（县）
nodata:无数据状态
required:必选项
------------------------------ */
(function($){
	$.fn.citySelect=function(settings){
		if(this.length<1){return;};

		// 默认值
		settings=$.extend({
			url:"../../wp-content/themes/firsttimebuyer/js/city.min.js",
			prov:null,
			city:null,
			dist:null,
			nodata:null,
			required:true
		},settings);

		var box_obj=this;
		var prov_obj=box_obj.find(".prov");
		var city_obj=box_obj.find(".city");
		var dist_obj=box_obj.find(".dist");
		var prov_val=settings.prov;
		var city_val=settings.city;
		var dist_val=settings.dist;
		var select_prehtml=(settings.required) ? "" : "<li value=''>请选择</li>";
		var city_json;

		// 赋值市级函数
		var cityStart=function(index){
			var prov_id=index || 0;
			if(!settings.required){
				prov_id--;
			};
			city_obj.empty().attr("disabled",true);
			dist_obj.empty().attr("disabled",true);
			if(prov_id<0||typeof(city_json.citylist[prov_id].c)=="undefined"){
				if(settings.nodata=="none"){
					city_obj.css("display","none");
					dist_obj.css("display","none");
				}else if(settings.nodata=="hidden"){
					city_obj.css("visibility","hidden");
					dist_obj.css("visibility","hidden");
				};
				return;
			};
			
			// 遍历赋值市级下拉列表
			temp_html=select_prehtml;
			$.each(city_json.citylist[prov_id].c,function(i,city){
				temp_html+="<li value='"+city.n+"'>"+city.n+"</li>";
			});
			city_obj.html(temp_html).attr("disabled",false).css({"display":"","visibility":""});
			
			distStart();
		};

		// 赋值地区（县）函数
		var distStart=function(){
			var prov_id=prov_obj.get(0).selectedIndex;
			var city_id=city_obj.get(0).selectedIndex;
			if(!settings.required){
				prov_id--;
				city_id--;
			};
			dist_obj.empty().attr("disabled",true);
			// 遍历赋值市级下拉列表
			temp_html=select_prehtml;

			dist_obj.html(temp_html).attr("disabled",false).css({"display":"","visibility":""});
		};

		var init=function(){
			// 遍历赋值省份下拉列表
			temp_html=select_prehtml;
			$.each(city_json.citylist,function(i,prov){
				temp_html+="<li value='"+prov.p+"'>"+prov.p+"</li>";
			});
			prov_obj.html(temp_html);

			// 若有传入省份与市级的值，则选中。（setTimeout为兼容IE6而设置）
			setTimeout(function(){
				if(settings.prov!=null){
					prov_obj.val(settings.prov);
					cityStart();
					setTimeout(function(){
						if(settings.city!=null){
							city_obj.val(settings.city);
							distStart();
							setTimeout(function(){
								if(settings.dist!=null){
									dist_obj.val(settings.dist);
								};
							},1);
						};
					},1);
				};
			},1);



			var jsontext;
		$("#search-but").click(function(){
			var city = $("#city .city").val();
			$.each(jsontext,function(n,value){
				console.log(1)
			 	if(value.Prefecture==city){
			 		console.log(value.Prefecture)
		        }
           });
		})
		$.ajax({
			type:'GET',
			url:'../../wp-content/themes/firsttimebuyer/js/FTB.json',
			dataType: "text",
			success: function (e){
				//jsontext = $.parseJSON(e);
				jsontext = eval( '(' + e + ')' );
				console.log(jsontext)
           },
           error: function () {
                    alert("Ajax请求数据失败!");
           }
		})




			// 选择省份时发生事件
			var shengji;
			prov_obj.find("li").click(function(){
				var index = $(this).index()
				shengji = $(this).html();
				$('.prov-div ul').hide()
				$('.prov-div span').html($(this).html())
				$('.city-div span').html("城市")
				cityStart(index);
				// 选择市级时发生事件
				city_obj.find("li").click(function(){
					var index = $(this).html()
					$('.city-div span').html(index)
					$('.city-div ul').hide()
					distStart();
					$('.dealer-result ul li').remove()
					var jiandu = 0;
					var jisuan = 2370;
					$.each(jsontext,function(n,value){
					 	if(value.Prefecture==index){
					 		jiandu++;
					 		console.log(value.Prefecture)
					 		$('.dealer-result ul').append("<li><h2>"+value.name+"</h2><p>"+shengji+index+"市"+value.add+"</p><span><a href='tel:"+value.tel+"''>"+value.tel+"</a></span></li>");
				        }
				        if(jiandu==0 && jisuan == n){
					 		$('.dealer-result ul').append("<li><h2>抱歉，没有找到！</h2></li>");
				        }
		           });


				});
			});


		};

		// 设置省市json数据
		if(typeof(settings.url)=="string"){
			$.getJSON(settings.url,function(json){
				city_json=json;
				init();
			});
		}else{
			city_json=settings.url;
			init();
		};
	};
})(jQuery);