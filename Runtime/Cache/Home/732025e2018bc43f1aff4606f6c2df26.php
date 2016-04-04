<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><meta http-equiv="content-type" content="text/html;charset=utf-8">
<title><?php echo ($meta_title); ?>_<?php echo C('WEB_SITE_TITLE');?></title>
<head>
<link href="/Public/Home/css/top.css" rel="stylesheet">
<link href="/Public/Home/css/common.css" rel="stylesheet">
<link href="/Public/Home/css/tuan.css" rel="stylesheet">
<link href="/Public/Home/css/footer.css" rel="stylesheet">

<script type="text/javascript" src="/Public/Home/js/public.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
</head>
<body>
<!-- 工具条 -->
	<!-- 顶部工具条 -->
	<!-- /工具条 -->
	<!-- 头部 -->
	<div class="yershop_wrapper">
	 <!-- logo -->


<div class="header">
<a href="" class="logo" title="<?php echo C('WEB_SITE_TITLE');?>"><img src="/Public/Home/images/logo.png" alt="<?php echo C('WEB_SITE_TITLE');?>"></a>

<div class="header_center"  >
<div class="search">
<form action="<?php echo U("Search/index");?>" name="Searchform"  method="post" >

<p>
<input type="text" name="words" placeholder="输入您想要的商品" class="search"><a rel="nofollow" href="javascript:vod(0)" class="search_btn"></a></p>
<input type="hidden" name="type" id="type" value="1"></form>
</div>
<div class="tag">热门搜索：
<?php if(is_array($hotsearch)): foreach($hotsearch as $key=>$vo): ?><a href="<?php echo U('Search/index?words='.$vo);?>"><?php echo ($vo); ?></a><?php endforeach; endif; ?>
</div>
</div>

<div class="top_right">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="shopping_cart" id="shopping_cart" style="display:">购物车<span id="docerCartBtn" class="yellow"></span></a>
<?php if(is_login()): if(empty($usercart)): ?><div class="sc_goods"  id="goods" style="display:none;"><ul class="sc_goods_ul">
<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p></ul>
<div class="sc_goods_foot" style="display: none;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div>
</div>
<?php else: ?>
<div class="sc_goods" id="goods" style="display:none;">
<ul class="sc_goods_ul">
<?php if(is_array($usercart)): $i = 0; $__LIST__ = $usercart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <dl>
<dt class="mini-img"><a  href="<?php echo U('Article/detail?id='.$vo['goodid']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["goodid"]),'path')); ?>" width='40' height='40'/> </a></dt>
<dd><span class="mini_title"><a href="<?php echo U('Article/detail?id='.$vo['goodid']);?>"><?php echo (get_good_name($vo["goodid"])); ?></a> </span><span class="mini-cart-count red">¥<?php echo ($vo["price"]); ?><em class="<?php echo ($vo["sort"]); ?>">*<?php echo ($vo["num"]); ?></em></span></dd>
<dd><span class="mini-cart-info"><?php echo ($vo["parameters"]); ?></span><span class="mini-cart-del"><a name="<?php echo ($vo["sort"]); ?>" rel="del" href="javascript:vod(0);"  onclick="delcommon(event)">删除</a></span></dd>
</dl>
</li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
<div class="sc_goods_foot" style="display:block;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div>
</div><?php endif; ?>


 <?php else: ?>


 

<?php if(empty($usercart)): ?><div id="goods" class="sc_goods" style="display:none;">
<ul class="sc_goods_ul">
<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p>

</ul>
<div class="sc_goods_foot" style="display:none;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div></div>
<?php else: ?>
<div id="goods" class="sc_goods" style="display:none;">
<ul class="sc_goods_ul">
 <?php if(is_array($usercart)): foreach($usercart as $key=>$vo): ?><li> <dl>
<dt class="mini-img"><a  href="<?php echo U('Article/detail?id='.$vo['id']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["id"]),'path')); ?>" width='40' height='40'/> </a></dt>
<dd><span class="mini_title"><a href="<?php echo U('Article/detail?id='.$vo['id']);?>"><?php echo (get_good_name($vo["id"])); ?></a> </span><span class="mini-cart-count red">¥<?php echo ($vo["price"]); ?><em class="<?php echo ($vo["sort"]); ?>">*<?php echo ($vo["num"]); ?></em></span></dd>
<dd><span class="mini-cart-info"><?php echo ($vo["parameters"]); ?></span><span class="mini-cart-del"><a name="<?php echo ($vo["sort"]); ?>" rel="del" href="javascript:vod(0);"   onclick="delcommon(event)">删除</a></span></dd>
</dl>
</li><?php endforeach; endif; ?>
</ul>
<div class="sc_goods_foot" style="display:block;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>"  class="my_shopping_cart_btn">查看我的购物车</a>
</div></div><?php endif; endif; ?>
</div></div>
	
	<!-- /头部 -->

	<!-- 菜单 -->
	<!-- 导航条-->

 <div class="menu-wrapper" >
    <div class="nav-all">
       <div class="all_class" id="all-class">
        <h2><span class="grid"><img src="/Public/Home/images/grid.png"></span><span>商品分类</span><b></b></h2>
      </div>
      <div class="all-goods" style="display: none;" id="all-goods">
<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><div class="item">
          <div class="product"><h4><a href="<?php echo U('home/article/index/pid/'.$cate['id']);?>"><?php echo ($cate["title"]); ?></a> </h4> </div>
            <?php if($cate['child'] != false): ?><div class="product-wrap pos"> 
          
            <div class="cf">
              <div class="fl wd252 pr20">
              
                <?php if(is_array($cate['child'])): $i = 0; $__LIST__ = $cate['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_sub): $mod = ($i % 2 );++$i;?><ul class="cf"> <li><span><a href="<?php echo U('home/article/lists/pid/'.$cate_sub['id']);?>"><?php echo ($cate_sub["title"]); ?></a></span>
                   <?php if($cate_sub['child']): if(is_array($cate_sub['child'])): $i = 0; $__LIST__ = $cate_sub['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_sub_two): $mod = ($i % 2 );++$i;?><a href="<?php echo U('home/article/lists/pid/'.$cate_sub_two['id']);?>"><?php echo ($cate_sub_two["title"]); ?> </a><?php endforeach; endif; else: echo "" ;endif; endif; ?> 
              
                </li> </ul><?php endforeach; endif; else: echo "" ;endif; ?>
               
</div>
            </div> </div><?php endif; ?>
       
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
      </div></div>
    
    
    <ul class="menu">
      <?php $__NAV__ = M('Channel')->field(true)->where("status=1")->order("sort")->select(); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav["pid"]) == "0"): ?><li>
                            <a href="<?php echo (get_nav_url($nav["url"])); ?>" target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><?php echo ($nav["title"]); ?></a>
                      </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    
  </div>
	<!-- /菜单 -->


	<!-- 主体 -->
	<div  class="commom_wrapper">

 

<div class="main"><div class="main_center"><div class="center_left">
<!-- 左侧菜单 -->
	<h3><a rel="nofollow" href='javascript:vod(0)' class="home-me">我的会员中心</a></h3>
<h3><a rel="nofollow" class="home-me" >订单中心</a></h3>
<dl>
<dd><a rel="nofollow" href='<?php echo U("center/index");?>'>我的主页</a></dd>
<dd><a rel="nofollow" href='<?php echo U("center/allorder");?>'>订单管理</a></dd>
<dd><a rel="nofollow" href='<?php echo U("Collect/index");?>'>我的收藏</a></dd>
<dd><a rel="nofollow" href='<?php echo U("UserCoupon/index");?>'>优惠券</a></dd>
<dd><a rel="nofollow" href='<?php echo U("comment/lists");?>'>评价管理</a></dd>

</dl>

<h3><a rel="nofollow" class="home-me" >个人信息</a></h3>

<dl class="last">
<dd><a href='<?php echo U("account/security");?>'>安全中心</a></dd>
<dd><a href='<?php echo U("member/index");?>'>个人档案</a></dd>
<dd><a rel="nofollow" href='<?php echo U("address/index");?>'>地址管理</a></dd>

<dd><a rel="nofollow" href='<?php echo U("shopcart/index");?>'>我的购物车</a></dd>
<dd><a rel="nofollow" href='<?php echo U("UserEnvelope/index");?>'>站内信</a></dd>
</dl> <script>/* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
			
            $("a[href='" + url + "']").addClass("current") ;
			</script>
   
<!-- 左侧菜单 -->
</div><!-- 个人中心 初始状态 start -->
<div class="center_right account" id="MemberCenterCtrl" style="display: block;">
<div class="account_right"  style="display: block;">
	<!-- 安全中心 初始状态 start -->
	<h4 class="">安全中心</h4>

	<div class="security_content_index security_bar">
                    <ul>
           <li>
	<?php if(($num) == "0"): ?><span class="icon"></span><span class="col2"><span class="inner"><span style="width:33%;"></span><i></i></span></span><span class="col1"><span>低</span></span><?php endif; ?>
	<?php if(($num) == "1"): ?><span class="icon2"></span><span class="col23"><span class="inner"><span style="width:33%;"></span><i></i></span></span><span class="col1"><span>中</span></span><?php endif; ?>
		<?php if(($num) == "2"): ?><span class="icon2"></span><span class="col24"><span class="inner"><span style="width:33%;"></span><i></i></span></span><span class="col1"><span>高</span></span><?php endif; ?>
				<?php if(($num) == "3"): ?><span class="icon3"><span class="col25"><span class="inner"><span style="width:33%;"></span></span><i></i></span></span><span class="col1"><span>较高</span></span><?php endif; ?>
	<span class="col3">建议您启动全部安全设置，以保证账户安全</span><span class="history">
												<a class="deepblue" href="<?php echo U("account/history");?>" >查看登录历史</a><span>上次登录时间：<?php echo (date('Y-m-d H:i',$time["last_login_time"])); ?></span></span></li>
                                                                                            </ul>
                </div>

<div class="security_content_index">
    <p><i class="success"></i><span class="title">登录密码</span><span class="tip">互联网账号存在被盗风险，建议您定期更改密码以保护账户安全</span>
					<a class="deepblue" href="<?php echo U("user/profile");?>">修改&gt;&gt;</a></p>
              
			   <p><?php if(empty($emailid)): ?><i class="failure"></i>
						<?php else: ?>
						<i class="success"></i><?php endif; ?><span class="title">邮箱验证</span><span class="tip">验证后，可用于邮箱找回登录密码，接收订单提醒服务</span>
						<?php if(empty($emailid)): ?><a class="deepblue"href="<?php echo U("account/checkemail");?>">验证&gt;&gt;</a>
						<?php else: ?>
					已验证</a><?php endif; ?>
						</p>
                        <p><?php if(empty($mobile)): ?><i class="failure"></i>
						<?php else: ?>
						<i class="success"></i><?php endif; ?><span class="title">手机验证</span><span class="tip">验证后，可用于手机号快速登录，修改登录密码，接收账户余额变动提醒</span>
						<?php if(empty($mobile)): ?><a class="deepblue" href="<?php echo U("account/checkmobile");?>">验证&gt;&gt;</a>
						<?php else: ?>
						已验证<?php endif; ?></p>
                        <p><?php if(empty($code)): ?><i class="failure"></i>
						<?php else: ?>
						<i class="success"></i><?php endif; ?><span class="title">支付密码</span><span class="tip">设置支付密码后，在使用账户中余额或礼品卡等资金时，需输入支付密码</span>
						
						<a class="deepblue" href="<?php echo U("account/paykey");?>"><?php if(empty($code)): ?>设置
						<?php else: ?>
					修改<?php endif; ?>&gt;&gt;</a></p>
                   
                </div>
				 </div>
	<!-- 安全中心结束状态 end -->

<!-- 个人中心 初始状态 end --></div></div></div>
    <script type="text/javascript">_init_area();</script>
       
   
   

 </div>
	<!-- 主体 -->

  <!-- 购物车js -->
   	<script>
	//购物车显示与隐藏
	 var Shopcart= document.getElementById('shopping_cart');
     var Goodsmenu= document.getElementById('goods');
            var timerr = null;//定义定时器变量
            //鼠标移入div1或div2都把定时器关闭了，不让他消失
            Shopcart.onmouseover =Goodsmenu.onmouseover = function ()
            {
                Goodsmenu.style.display = 'block';
                clearTimeout(timerr);
            }
            //鼠标移出div1或div2都重新开定时器，让他延时消失
            Shopcart.onmouseout =Goodsmenu.onmouseout = function ()
            {
                //开定时器
                timerr= setTimeout(function () { 
                    Goodsmenu.style.display = 'none'; }, 10);
            }
			
//购物车动态删除
	function delcommon(event)
		{ //获取事件源
event = event ? event : window.event; 
var obj = event.srcElement ? event.srcElement : event.target; 
//这时obj就是触发事件的对象，可以使用它的各个属性 
//还可以将obj转换成jquery对象，方便选用其他元素 
str = obj.innerHTML.replace(/<\/?[^>]*>/g,''); //去除HTML tag

	var $obj = $(obj);
	var str=$obj.parent().prev().html();
	if(obj.rel=="del")
{ var str=obj.name;
var uexist="<?php echo get_username();?>";
	//全选的实现 定义删的发送路径
	if(uexist){
		var del='<?php echo U("Shopcart/delItemByuid");?>';	
	}
else{
var del='<?php echo U("Shopcart/delItem");?>';
	
	}

$.ajax({
type:'post', //传送的方式,get/post
url:del, //发送数据的地址
data:{sort:str},
 dataType: "json",
success:function(data)
{var $obj = $(obj);
	$obj.parents("li").remove();
	if(data.sum=="0"){  //判断购物车数量是否为0，为0则隐藏底部查看工具
						$("div.sc_goods_foot").hide();
					   	var html='<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p>';
					   $("ul.sc_goods_ul").html(html);
				
	
	}
	else{$("div.sc_goods_foot").show();}

},
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert(XMLHttpRequest+thrownError); }
		})
}
	
	} 
//购物车删除结束


	
</script>
   <!-- /购物车js -->

	<!-- 底部 -->
	
    <!-- 底部-->
   <script type="text/javascript"  charset="utf-8" src="/Public/static/js/menudown.js"></script> 

</div></div>
<div class="footer">
<div class="footer_pic_new">
		<div class="footer_pic_new_inner">
		    <a name="foot_1" href="http://help.dangdang.com/details/page13" target="_blank" class="footer_pic01"><span>正规渠道正品保障</span></a>
		    <a name="foot_2" class="footer_pic02" href="http://help.dangdang.com/details/page21" target="_blank"><span>放心购物货到付款</span></a>
		    <a name="foot_3" class="footer_pic03" href="http://help.dangdang.com/details/page16" target="_blank"><span>150城市次日送达</span></a>
		    <a name="foot_4" class="footer_pic04" href="http://help.dangdang.com/details/page29" target="_blank"><span>上门退货当场退款</span></a>
		</div>
	</div>
    <div class="foot_center">  
	
  <?php if(is_array($footer)): $i = 0; $__LIST__ = $footer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl><dt><?php echo ($vo["title"]); ?></dt>
 <?php if(is_array($vo['id'])): $i = 0; $__LIST__ = $vo['id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$son): $mod = ($i % 2 );++$i;?><dd><a rel="nofollow"  href="<?php echo U('help/lists?pid='.$son['id']);?>"><?php echo ($son["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
</dl><?php endforeach; endif; else: echo "" ;endif; ?> 
     

<dl>
    <dt>在线客服</dt>
    <dd>周一至周五</dd>
    <dd>09:00-18:00</dd>
	<dd><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('QQ');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('QQ');?>:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></dd>
</dl>

  

     
    </div>
 
<div class="theme-footer"> 
    

  
      
       <p><span style=" text-align: center;"> Copyright@yershop商城系统 2014-2015 <strong><a href="http://www.yershop.com/" target="_blank" class="red">Yershop.com</a></strong> <?php echo C('WEB_SITE_ICP');?></p>
    
	</div> </div>

</div>
	<!-- /底部 -->
</body>
</html>