<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>日本军舰</title>
  <link rel="stylesheet" href="../layui/css/layui.css">

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

<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
  <?php echo " <div class='layui-logo'>其他类别</div>"; ?> 

    <ul class="layui-nav layui-layout-left">
    <li class="layui-nav-item"><a href="主页.html">主页</a></li>
      <li class="layui-nav-item"><a href="ri g.php">概况</a></li>
      <li class="layui-nav-item"><a href="ri x.php?m=巡洋舰">巡洋舰</a></li>
      <li class="layui-nav-item"><a href="ri x.php?m=航空母舰">航空母舰</a></li>
      <li class="layui-nav-item"><a href="ri q.php">其他</a></li>

  </ul>   
 
<!-- 左栏 -->
<div class="content">
		<div class="sidebar">
        <div class="layui-collapse" lay-accordion="">
            <div class="layui-colla-item">
           
    <h2 class='layui-colla-title'>类别 简介</h2>
  <div class='layui-colla-content layui-show'>
  驱逐舰 26<br>
  战列舰 19<br>
  巡洋舰/艇 9<br>
  护卫舰 3 <br>
  常规潜艇 3 <br>
  水雷战舰艇 2<br>
  两栖作战舰艇 1 <br>
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
        background-image: url("../a/ri.png");
        background-repeat: no-repeat;
        background-attachment:fixed;
        background-position:right;
        
        background-size:34%;
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
$sql = "SELECT *from 战舰 where 制造国='日本' and 分类 !='航空母舰' and 分类 !='巡洋舰' LIMIT $start_from, $num_rec_per_page";
$rowult = $conn->query($sql);

while($row = $rowult->fetch_assoc()) { ?>
        <?php $p1=$row['名称'];?>
       <br>
        <img src="<?php if ($row['图片']!='暂无数据') {$src=$row['图片'];echo $src;}
                        else {echo "../a/军舰.jpg";} ?>" />
        <?php echo "<span class='w'>"."名称："."</span>". "<a href='modelmore.php?keywords=$p1'>$p1</a>".
                    "<span class='w'>"."&nbsp&nbsp&nbsp&nbsp&nbsp类型："."</span>".$row['分类']?>
        <hr class="layui-bg-blue">
        
<?php
}; 
?> 

    <!-- <div style="padding: 15px;">内容主体区域</div> -->
    </div>
<div class="layui-footer">



<!-- 底部固定区域  翻页-->

<?php 
$sql = "SELECT *from 战舰 where 制造国='日本' and 分类 !='航空母舰' and 分类 !='巡洋舰'"; 
$rs_result = $conn->query($sql); //查询数据
$total_records = $rs_result->num_rows;  // 统计总共的记录条数
$total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
?>
<div align="center">
<?php
echo "<a href='ri q.php?page=1'>".'|<'."</a> "; // 第一页 
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<span class='page-icon' class='h1'><a href='ri q.php?page=".$i."'>".$i."</a> </span>";
    if ($i==23) {echo"<br><br>";}
}; 
echo "<a href='ri q.php?page=$total_pages'>".'>|'."</a> "; // 最后一页
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

</body>

</html>