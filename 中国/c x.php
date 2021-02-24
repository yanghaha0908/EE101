<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>中国军舰</title>
  <link rel="stylesheet" href="../layui/css/layui.css">
  <script src="echarts/echarts.js"></script>

  <script type="text/javascript" scr="../layui/layui.all.js"></script>

<style>
    legend {text-align:center;}
    img
    {
        height:100px;width:200px;
        border-radius: 8px;
    }
    .w{font-weight:900;}
</style>

<style type="text/css"> /*设置翻页东西的样式，不过有些还没用上*/       
			/* 左边栏 */
            .sidebar{ 
               position: relative; 
				float: left;/*侧边栏居左，改为right可令侧边栏居右*/
                top:60px;
                bottom: 0px;
                width: 180px;
				/* background: black; */
			}

	
	/*设置div样式的整体布局*/
	.page-icon{
		margin:20px 0 0 0;/*设置距离顶部20像素*/
		font-size:0;/*修复行内元素之间空隙间隔*/
		text-align:center;/*设置内容居中显示*/
	}
	
	/*设置共有的的样式布局，主要是进行代码优化，提高运行效率*/
	.page-icon a,.page-disabled,.page-next{
		border:1px solid #ccc;
		border-radius:3px;
		padding:4px 10px 5px;
		font-size:14PX;/*修复行内元素之间空隙间隔*/
		margin-right:10px;
	}
	
	/*对 a 标签进行样式布局 */
	.page-icon a{
		text-decoration:none;/*取消链接的下划线*/
		color:#005aa0;
	}
	
	.page-current{
		color:#ff6600;
		padding:4px 10px 5px;
		font-size:14PX;/*修复行内元素之间空隙间隔*/
	}
	
	.page-disabled{
		color:#ccc;
	}
	
	.page-next i,.page-disabled i{
		cursor:pointer;/*设置鼠标经过时的显示状态，这里设置的是显示状态为小手状态*/
		display:inline-block;/*设置显示的方式为行内块元素*/
		width:5px;
		height:9px;
		background-image:url(http://img.mukewang.com/547fdbc60001bab900880700.gif);/*获取图标的背景链接*/
	}
	.page-disabled i{
		background-position:-80px -608px;
		margin-right:3px;
	}
 
	.page-next i{
		background-position:-62px -608px;
		margin-left:3px;
	}
</style>

</head>

<!-- 上栏 -->
<body class="layui-layout-body">
<?php $p=$_GET['m'];?>
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
  <?php echo " <div class='layui-logo'>中国 $p</div>"; ?> 
  <!-- !!!!妙啊 -->
    <!-- <div class="layui-logo">中国 护卫舰</div> -->
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
    <li class="layui-nav-item"><a href="主页.html">主页</a></li>
    <li class="layui-nav-item"><a href="c g.php">概况</a></li>
      <li class="layui-nav-item"><a href="c x.php?m=护卫舰">护卫舰</a></li>
      <li class="layui-nav-item"><a href="c x.php?m=保障辅助舰艇">辅助舰艇</a></li>
      <li class="layui-nav-item"><a href="c x.php?m=常规潜艇">常规潜艇</a></li>
  <li class="layui-nav-item"><a href="c x.php?m=驱逐舰">驱逐舰</a></li>
  <li class="layui-nav-item"><a href="c x.php?m=巡逻舰/艇">巡逻舰</a></li>
  <li class="layui-nav-item"><a href="c q.php?">其他</a></li>
  </ul>   
 
<!-- 左栏 -->
<div class="content">
				<div class="sidebar">

        <div class="layui-collapse" lay-accordion="">
  <div class="layui-colla-item">
  <?php echo " <h2 class='layui-colla-title'>$p 简介</h2>"; ?>
  <?php if ($p=='护卫舰') {echo "<div class='layui-colla-content layui-show'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  护卫舰,是以导弹、舰炮、深水炸弹及反潜鱼雷为主要武器的轻型水面战斗舰艇。
  它的主要任务是为舰艇编队担负反潜、护航、巡逻、警戒、侦察及支援登陆作战任务以及提供无人舰载机
  的起飞和降落。</div>";} ?>
  <?php if ($p=='保障辅助舰艇') {echo " <div class='layui-colla-content layui-show'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp辅助舰艇（英文名称：Auxiliary ship)
  是执行海上战斗保障、技术保障和后勤保障任务而不直接参加对敌作战的各种舰艇的统称。</div>";} ?>
    <?php if ($p=='常规潜艇') {echo "<div class='layui-colla-content layui-show'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  常规潜艇是用柴油机作为动力源，柴油机工作需要大量的氧气，因此只有在水面状态、半潜状态和通气管状态航行时才能充电。
  潜艇的噪音降至90分贝左右就可以“淹没”在浩瀚的海洋背景噪音中。</div>";} ?>
    <?php if ($p=='巡逻舰/艇') {echo "<div class='layui-colla-content layui-show'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  巡逻舰，在海军舰艇中是处于护卫舰以下一级的水面作战舰，主要用于近海防御、日常巡逻和战斗支援，
  也可用于巡逻警戒、反潜反舰、扫雷防空、缉私救援、情报收集等多种任务，
  具体功能视具体装备设计情况而定。</div>";} ?>
  <?php if ($p=='驱逐舰') {echo "<div class='layui-colla-content layui-show'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  驱逐舰，是一种多用途的军舰，19世纪90年代至21世纪以来，海军重要的舰种之一，是海军舰队中突击力较强的中型军舰之一。
  现代驱逐舰主要职责以护航为核心，同时拥有侦察巡逻警戒，布雷，袭击岸上目标等。</div>";} ?>
   
  </div>


  <div class="layui-colla-item">
    <h2 class="layui-colla-title">可视化</h2>
    <div class="layui-colla-content layui-show">

    <div class="site-demo-button" id="layerDemo" style="margin-bottom: 0;">
<button data-method="offset" data-type="lb" class="layui-btn layui-btn-normal">可视化</button>
</div>

             
<!--  -->

    </div>


  </div>



 
<script>
//注意：折叠面板 依赖 element 模块，否则无法进行功能性操作
layui.use('element', function(){
  var element = layui.element;
  
  //…
});
</script>
                </div>
</div>

<!-- 内容主体区域 -->
  <div class="layui-body">

  <style>
    body{
        background-image: url("../a/c.jpg");
        background-repeat: no-repeat;
        background-attachment:fixed;
        background-position:right;
        
        background-size:50%;
        background-origin:content-box;
    }
    </style>
    
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homework1";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");//!!!!!!!!

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

$num_rec_per_page=10;  

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT *from 战舰 where 制造国='中国' and 分类 ='$p' LIMIT $start_from, $num_rec_per_page";
$rowult = $conn->query($sql);

while($row = $rowult->fetch_assoc()) { ?>

            <?php $p1=$row['名称'];?>
       <br>
        <img src="<?php if ($row['图片']!='暂无数据') {$src=$row['图片'];echo $src;}
                        else {echo "../a/军舰.jpg";} ?>" />
        <?php echo "<span class='w'>"."名称："."</span>"."<a href='modelmore.php?keywords=$p1'>$p1</a>".
                    "<span class='w'>"."&nbsp&nbsp&nbsp&nbsp&nbsp建造时间："."</span>".$row['建造时间']?>
                
        <hr class="layui-bg-blue">
        
<?php
}; 
?> 

    <!-- <div style="padding: 15px;">内容主体区域</div> -->
    </div>
<div class="layui-footer">



<!-- 底部固定区域  翻页-->

<?php 
$sql = "SELECT * FROM 战舰 where 制造国 ='中国' and 分类='$p'";
$rs_result = $conn->query($sql); //查询数据
$total_records = $rs_result->num_rows;  // 统计总共的记录条数
$total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
?>
<div align="center">
<?php
echo "<a href='c x.php?m=$p&page=1'>".'|<'."</a> "; // 第一页 
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<span class='page-icon' class='h1'><a href='c x.php?m=$p&page=".$i."'>".$i."</a> </span>";
    if ($i==23) {echo"<br><br>";}
}; 
echo "<a href='c x.php?m=$p&page=$total_pages'>".'>|'."</a> "; // 最后一页
?>
  </div>
</div>
<script src="../layui/layui.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>

<!-- --------------------------------------------------------- -->

<script src="../layui/layui.js" charset="utf-8"></script>
<script>
layui.use('layer', function(){ //独立版的layer无需执行这一句
  var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
  
  //触发事件
  var active = {
    setTop: function(){
      var that = this; 
      //多窗口模式，层叠置顶
    
    }

    ,offset: function(othis){
      var type = othis.data('type')
      ,text = othis.text();
      
      layer.open({
        type: 1
        ,offset: type //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
        ,id: 'layerDemo'+type //防止重复弹出
        //,content: '<div style="padding: 20px 100px;">'+'$("#test")' +'</div>'
		,content:$("#test")
    // <?php if ($p=='护卫舰'){echo "$('#test')";}?>
    ,area: ['350px', '400px']
        ,btn: '关闭全部'
        ,btnAlign: 'c' //按钮居中
        ,shade: 0 //不显示遮罩
        ,yes: function(){
          layer.closeAll();
		
        }
		,end: function(){
			$("#test").hide();
		}

      });

            layer.open({
        type: 1
        ,offset: type //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
        ,id: 'layerDemo'+type //防止重复弹出
        //,content: '<div style="padding: 20px 100px;">'+'$("#test")' +'</div>'
		,content:$("#test")
    ,area: ['400px', '400px']
        ,btn: '关闭全部'
        ,btnAlign: 'c' //按钮居中
        ,shade: 0 //不显示遮罩
        ,yes: function(){
          layer.closeAll();
		
        }
		,end: function(){
			$("#test").hide();
		}

      });
    }
  };
  
  $('#layerDemo .layui-btn').on('click', function(){
    var othis = $(this), method = othis.data('method');
    active[method] ? active[method].call(this, othis) : '';
  });  
});

</script>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div  id="test"> 


    
    <div id="舰长" style="width:300px;height:200px;"></div>
    <script type="text/javascript">
    	
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('舰长'));

        option = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            crossStyle: {
                color: '#999'
            }
        }
    },
    title:{
        text:'舰长'
    },
    grid:{
        left:'20%'
    },
    toolbox: {
        feature: {
            dataView: {show: true, readOnly: true},
            magicType: {show: true, type: ['line', 'bar',]},
            restore: {show: true},
        }
    },
    legend: {
        data: ['数值']
    },
    xAxis: [
        {
            type: 'category',
            data: ['二战前', '二战期间', '二战后至冷战期间', '冷战后至今'],
            axisPointer: {
                type: 'shadow'
            }
        }
    ],
    yAxis: [
        {
            type: 'value',
            
            
            axisLabel: {
                formatter: '{value} 米'
            }
        }
    ],
    series: [
        {
            
            type: 'bar',
            data: [<?php   
                    if ($p=='护卫舰'){echo 0;}
                    elseif($p=='保障辅助舰艇'){echo 0;}
                    elseif($p=='常规潜艇'){echo 0;}
                    elseif($p=='巡逻舰/艇'){echo 0;}
                    elseif($p=='驱逐舰'){echo 0;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 0;}
                    elseif($p=='保障辅助舰艇'){echo 0;}
                    elseif($p=='常规潜艇'){echo 0;}
                    elseif($p=='巡逻舰/艇'){echo 0;}
                    elseif($p=='驱逐舰'){echo 0;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 101.29;}
                    elseif($p=='保障辅助舰艇'){echo 110.03;}
                    elseif($p=='常规潜艇'){echo 70.85;}
                    elseif($p=='巡逻舰/艇'){echo 69.66;}
                    elseif($p=='驱逐舰'){echo 131.60;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 116.97;}
                    elseif($p=='保障辅助舰艇'){echo 153.30;}
                    elseif($p=='常规潜艇'){echo 76.04;}
                    elseif($p=='巡逻舰/艇'){echo 73.84;}
                    elseif($p=='驱逐舰'){echo 153.81;}
                    else{echo 0;}
                    ?>]
        }
    ]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);


    </script>

<div id="型宽" style="width:300px;height:200px;"></div>
    <script type="text/javascript">
    	
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('型宽'));

        option = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            crossStyle: {
                color: '#999'
            }
        }
    },
    title:{
        text:'型宽'
    },
    grid:{
        left:'20%'
    },
    toolbox: {
        feature: {
            dataView: {show: true, readOnly: true},
            magicType: {show: true, type: ['line', 'bar',]},
            restore: {show: true},
        }
    },
    legend: {
        data: ['数值']
    },
    xAxis: [
        {
            type: 'category',
            data: ['二战前', '二战期间', '二战后至冷战期间', '冷战后至今'],
            axisPointer: {
                type: 'shadow'
            }
        }
    ],
    yAxis: [
        {
            type: 'value',
            
            
            axisLabel: {
                formatter: '{value} 米'
            }
        }
    ],
    series: [
        {
            
            type: 'bar',
            data: [ <?php   
                    if ($p=='护卫舰'){echo 0;}
                    elseif($p=='保障辅助舰艇'){echo 0;}
                    elseif($p=='常规潜艇'){echo 0;}
                    elseif($p=='巡逻舰/艇'){echo 0;}
                    elseif($p=='驱逐舰'){echo 0;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 0;}
                    elseif($p=='保障辅助舰艇'){echo 0;}
                    elseif($p=='常规潜艇'){echo 0;}
                    elseif($p=='巡逻舰/艇'){echo 0;}
                    elseif($p=='驱逐舰'){echo 0;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 10.85;}
                    elseif($p=='保障辅助舰艇'){echo 14.62;}
                    elseif($p=='常规潜艇'){echo 12.20;}
                    elseif($p=='巡逻舰/艇'){echo 10.19;}
                    elseif($p=='驱逐舰'){echo 12.77;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 13.04;}
                    elseif($p=='保障辅助舰艇'){echo 33.22;}
                    elseif($p=='常规潜艇'){echo 8.04;}
                    elseif($p=='巡逻舰/艇'){echo 10.67;}
                    elseif($p=='驱逐舰'){echo 16.66;}
                    else{echo 0;}
                    ?>]
        }
    ]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);


    </script>


<div id="航速" style="width:300px;height:200px;"></div>
    <script type="text/javascript">
    	
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('航速'));

        option = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            crossStyle: {
                color: '#999'
            }
        }
    },
    title:{
        text:'航速'
    },
    grid:{
        left:'20%'
    },
    toolbox: {
        feature: {
            dataView: {show: true, readOnly: true},
            magicType: {show: true, type: ['line', 'bar',]},
            restore: {show: true},
        }
    },
    legend: {
        data: ['数值']
    },
    xAxis: [
        {
            type: 'category',
            data: ['二战前', '二战期间', '二战后至冷战期间', '冷战后至今'],
            axisPointer: {
                type: 'shadow'
            }
        }
    ],
    yAxis: [
        {
            type: 'value',
            
            
            axisLabel: {
                formatter: '{value} 节'
            }
        }
    ],
    series: [
        {
            
            type: 'bar',
            data: [ <?php   
                    if ($p=='护卫舰'){echo 0;}
                    elseif($p=='保障辅助舰艇'){echo 0;}
                    elseif($p=='常规潜艇'){echo 0;}
                    elseif($p=='巡逻舰/艇'){echo 0;}
                    elseif($p=='驱逐舰'){echo 0;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 0;}
                    elseif($p=='保障辅助舰艇'){echo 0;}
                    elseif($p=='常规潜艇'){echo 0;}
                    elseif($p=='巡逻舰/艇'){echo 0;}
                    elseif($p=='驱逐舰'){echo 0;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 26.42;}
                    elseif($p=='保障辅助舰艇'){echo 17.38;}
                    elseif($p=='常规潜艇'){echo 17.51;}
                    elseif($p=='巡逻舰/艇'){echo 15.81;}
                    elseif($p=='驱逐舰'){echo 34.95;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 27.17;}
                    elseif($p=='保障辅助舰艇'){echo 18.57;}
                    elseif($p=='常规潜艇'){echo 20.19;}
                    elseif($p=='巡逻舰/艇'){echo 18.53;}
                    elseif($p=='驱逐舰'){echo 30.27;}
                    else{echo 0;}
                    ?>]
        }
    ]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);


    </script>


<div id="满载排水量" style="width:300px;height:200px;"></div>
    <script type="text/javascript">
    	
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('满载排水量'));

        option = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            crossStyle: {
                color: '#999'
            }
        }
    },
    title:{
        text:'满载排水量'
    },
    grid:{
        left:'20%'
    },
    toolbox: {
        feature: {
            dataView: {show: true, readOnly: true},
            magicType: {show: true, type: ['line', 'bar',]},
            restore: {show: true},
        }
    },
    legend: {
        data: ['数值']
    },
    xAxis: [
        {
            type: 'category',
            data: ['二战前', '二战期间', '二战后至冷战期间', '冷战后至今'],
            axisPointer: {
                type: 'shadow'
            }
        }
    ],
    yAxis: [
        {
            type: 'value',
            
            
            axisLabel: {
                formatter: '{value} 吨'
            }
        }
    ],
    series: [
        {
            
            type: 'bar',
            data: [ <?php   
                    if ($p=='护卫舰'){echo 0;}
                    elseif($p=='保障辅助舰艇'){echo 0;}
                    elseif($p=='常规潜艇'){echo 0;}
                    elseif($p=='巡逻舰/艇'){echo 0;}
                    elseif($p=='驱逐舰'){echo 0;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 0;}
                    elseif($p=='保障辅助舰艇'){echo 0;}
                    elseif($p=='常规潜艇'){echo 0;}
                    elseif($p=='巡逻舰/艇'){echo 0;}
                    elseif($p=='驱逐舰'){echo 0;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 1789.31;}
                    elseif($p=='保障辅助舰艇'){echo 8557.73;}
                    elseif($p=='常规潜艇'){echo 3036.5;}
                    elseif($p=='巡逻舰/艇'){echo 1863.94;}
                    elseif($p=='驱逐舰'){echo 3618.86;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='护卫舰'){echo 2816.41;}
                    elseif($p=='保障辅助舰艇'){echo 17423.94;}
                    elseif($p=='常规潜艇'){echo 2634.00;}
                    elseif($p=='巡逻舰/艇'){echo 1499.67;}
                    elseif($p=='驱逐舰'){echo 6385.73;}
                    else{echo 0;}
                    ?>]
        }
    ]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);


    </script>


 </div>   
</body>

</html>