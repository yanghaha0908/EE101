<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>美国军舰</title>
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
               position: fixed; 
				float: left;/*侧边栏居左，改为right可令侧边栏居右*/
                top:60px;
                bottom: 0px;
                width: 170px;
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
  <?php echo " <div class='layui-logo'>美国 $p</div>"; ?> 

    <ul class="layui-nav layui-layout-left">
    <li class="layui-nav-item"><a href="主页.html">主页</a></li>
      <li class="layui-nav-item"><a href="us g.php">概况</a></li>
      <li class="layui-nav-item"><a href="us x.php?m=战列舰">战列舰</a></li>
      <li class="layui-nav-item"><a href="us x.php?m=航空母舰">航空母舰</a></li>
      <li class="layui-nav-item"><a href="us q.php?">其他</a></li>

  </ul>   
 
<!-- 左栏 -->
<div class="content">
		<div class="sidebar">
        <div class="layui-collapse" lay-accordion="">
            <div class="layui-colla-item">
  <?php echo " <h2 class='layui-colla-title'>$p 简介</h2>"; ?>
  <?php if ($p=='战列舰') {echo "<div class='layui-colla-content layui-show'>
  战列舰是一种以大口径火炮攻击与厚重装甲防护为主的高吨位海军作战舰艇。
  是能执行远洋作战任务的大型水面作战单位。战列舰曾长期是各主要海权国家的主力舰种之一，作为各国海军的主力舰。
  二战结束以后战列舰的战略地位被航空母舰和战略导弹核潜艇所取代。</div>";} ?>
  <?php if ($p=='航空母舰') {echo " <div class='layui-colla-content layui-show'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 航空母舰，简称“航母”，有“海上霸主”之美称，是一种以舰载机为作战武器的大型水面舰艇，可以供舰载机起飞和降落。
 它通常拥有巨大的飞行甲板和舰岛，舰岛大多坐落于右舷。航空母舰是目前世界上最庞大、最复杂、威力最强的武器之一，是一个国家综合国力的象征。</div>";} ?>
     </div>
  
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">可视化</h2>
    <div class="layui-colla-content layui-show">

    <div class="site-demo-button" id="layerDemo" style="margin-bottom: 0;">
<button data-method="offset" data-type="lb" class="layui-btn layui-btn-normal">可视化</button>
</div>   
 

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
        background-image: url("../a/usa1.jpg");
        background-repeat: no-repeat;
        background-attachment:fixed;
        background-position:right;
        
        background-size:26%;
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
$sql = "SELECT *from 战舰 where 制造国='美国' and 分类 ='$p' LIMIT $start_from, $num_rec_per_page";
$rowult = $conn->query($sql);

while($row = $rowult->fetch_assoc()) { ?>
       <?php $p1=$row['名称'];?>
       <br>
        <img src="<?php if ($row['图片']!='暂无图片') {$src=$row['图片'];echo $src;}
                        else {echo "../a/la.jpg";} ?>" />
        <?php echo "<span class='w'>"."名称："."</span>". "<a href='modelmore.php?keywords=$p1'>$p1</a>".
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
$sql = "SELECT * FROM 战舰 where 制造国 ='美国' and 分类='$p'";
$rs_result = $conn->query($sql); //查询数据
$total_records = $rs_result->num_rows;  // 统计总共的记录条数
$total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
?>
<div align="center">
<?php
echo "<a href='us x.php?m=$p&page=1'>".'|<'."</a> "; // 第一页 
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<span class='page-icon' class='h1'><a href='us x.php?m=$p&page=".$i."'>".$i."</a> </span>";
    if ($i==23) {echo"<br><br>";}
}; 
echo "<a href='us x.php?m=$p&page=$total_pages'>".'>|'."</a> "; // 最后一页
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

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
                    if ($p=='战列舰'){echo 168.10;}
                    elseif(($p=='航空母舰')){echo 245.50;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 252.64;}
                    elseif(($p=='航空母舰')){echo 244.98;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 135.67;}
                    elseif(($p=='航空母舰')){echo 316.11;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 0;}
                    elseif(($p=='航空母舰')){echo 317.30;}
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
            data: [<?php   
                    if ($p=='战列舰'){echo 27.40;}
                    elseif(($p=='航空母舰')){echo 30.53;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 34.14;}
                    elseif(($p=='航空母舰')){echo 37.09;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 23.85;}
                    elseif(($p=='航空母舰')){echo 49.53;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 0;}
                    elseif(($p=='航空母舰')){echo 46.64;}
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
            data: [<?php   
                    if ($p=='战列舰'){echo 20.72;}
                    elseif(($p=='航空母舰')){echo 31.01;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 29.05;}
                    elseif(($p=='航空母舰')){echo 30.56;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 17.67;}
                    elseif(($p=='航空母舰')){echo 31.00;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 0;}
                    elseif(($p=='航空母舰')){echo 30.00;}
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
            data: [<?php   
                    if ($p=='战列舰'){echo 28907.72;}
                    elseif(($p=='航空母舰')){echo 30600.22;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 53679.67;}
                    elseif(($p=='航空母舰')){echo 30183.02;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 16133.33;}
                    elseif(($p=='航空母舰')){echo 82163.74;}
                    else{echo 0;}
                    ?>, 
                    <?php   
                    if ($p=='战列舰'){echo 0;}
                    elseif(($p=='航空母舰')){echo 82960.0;}
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