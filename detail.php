<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Details</title>
	<link rel="stylesheet" href="layui/css/layui.css">
    <link rel="stylesheet" href="static/header.css">
</head>
<?php
        function strcomp($str1,$str2){
            if($str1!=$str2){
                return TRUE;
            }else{
                return FALSE;
            }
        }
?>
<body class="lay-de">
		<div class="header">
			<div class="header-wrap">
				<h1 class="logo pull-left">
					<a href="indexmore.php">
						<img src="../img_warship/logo.jpg" alt="" class="logo-img">
					</a>
				</h1>
				<form class="layui-form detail-search pull-left" action="w.php" method="POST">
					<div class="layui-form-item header-swrap">
					    <div class="layui-input-block header-box">
					      <i class="layui-icon layui-icon-search"></i>
					      <input type="text" name="keywords" lay-verify="title" placeholder="请输入搜索条件" autocomplete="off"  class="layui-input">
					    </div>
					</div>
				</form>
				<div class="blog-nav pull-right">
					<ul class="layui-nav pull-left">
					  <li class="layui-nav-item layui-this"><a href="indexmore.php">首页</a></li>
					  <li class="layui-nav-item"><a href="about.html">关于</a></li>
					</ul>

				</div>
				<div class="mobile-nav pull-right" id="mobile-nav">
					<a href="javascript:;">
						<i class="layui-icon layui-icon-more"></i>
					</a>
				</div>
			</div>
			<ul class="pop-nav" id="pop-nav">
				<li><a href="index.html">首页</a></li>
				<li><a href="about.html">关于</a></li>
			</ul>
        </div>
            <div class="container">
                <div class="container-wrap">
                <h2 class="item-title">
                    <p><i class="layui-icon layui-icon-speaker"></i><?php echo $res['名称'];?></span></p>
                </h4>
                <div class="item">
                    <div class="item-box">
                        <?php echo "制造国："
                              .$res['制造国']
                              ."<br>"."活跃时间：";
                              echo $res['活跃时间'];
                    
                        if(strcomp($res['建造时间'],"暂无数据")){   
                            echo "<br>"."建造时间：";
                            echo $res['建造时间'];
                         };
                         if(strcomp($res['下水时间'],"暂无数据")){
                             echo"<br>"."下水时间：";
                             echo $res['下水时间'];
                         };
                         if(strcomp($res['服役时间'],"暂无数据")){
                         echo"<br>"."服役时间："
                             .$res['服役时间'];
                         };
                         ?>
                    </div>
                </div>
                        </div>
                    <div class="item-pic">
                    <?php if($res['图片']!='暂无图片' and $res['图片']!='暂无数据'):?>
                         <img src="<?php $src=$res['图片'];echo $src;?>" />
                    <?php else:?>
                    <img src="../img_warship/nonepic.jpg" alt="" height="200">
                    <?php endif;
                    ?>
                    </div>
                <div class="container-wrap">
                <div class="item">
                    <div class="item-select">
                       <div class="layui-tab layui-tab-brief" lay-filter="demo">
                       <ul class="layui-tab-title">
                       <li style="color:#000;font-size:25px;">相关数据</li>
                       <li style="color:#0000FF;font-size:25px;">详细信息</li>
                       <li style="color:#FF00FF;font-size:25px;">武器配备</li>
                       <li style="color:#00FF00;font-size:25px;">简介</li>
                       </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item" id="data">
                        <?php
                        if(strcomp($res['满排吨位'],"暂无数据")){
                            echo"满排吨位：".$res['满排吨位']
                                ."<br>";
                        };
                        if(strcomp($res['编制'],"暂无数据")){
                            echo"编制：".$res['编制']
                                ."<br>";
                        };
                        if(strcomp($res['舰长'],"暂无数据")){
                            echo"舰长：".$res['舰长']
                                ."<br>";
                        };
                        if(strcomp($res['型宽'],"暂无数据")){
                            echo"型宽：".$res['型宽']
                                ."<br>";
                        };
                        if(strcomp($res['续航距离'],"暂无数据")){
                            echo"续航距离：".$res['续航距离']
                                ."<br>";
                        };
                        if(strcomp($res['航速'],"航速：")){
                            echo"航速：".$res['航速']
                                ."<br>";
                        };
                        if(strcomp($res['满载排水量'],"暂无数据")){
                            echo"满载排水量：".$res['满载排水量']
                                ."<br>";
                        };
                        if(strcomp($res['潜航深度'],"暂无数据")){
                            echo"潜航深度：".$res['潜航深度']
                                ."<br>";
                        };
                        if(strcomp($res['自持力'],"暂无数据")){
                            echo"自持力：".$res['自持力'];
                        };
                        ?>
                        </div>
                        <div class="layui-tab-item" id="precise">
                            <?php
                            if(strcomp($res['分类'],"暂无数据")){
                                echo"分类：".$res['分类']
                                    ."<br>";
                            };
                            if(strcomp($res['前型'],"暂无数据")){
                                echo"前型：".$res['前型']
                                    ."<br>";
                            };
                            if(strcomp($res['制造厂'],"暂无数据")){
                                echo"制造厂".$res['制造厂']
                                    ."<br>";
                            }
                            if(strcomp($res['活动范围'],"暂无数据")){
                                echo"活动范围".$res['活动范围'];
                            };
                            ?>
                        </div>
                        <div class="layui-tab-item" id="weapon">
                        <?php if(strcomp($res['武器设备'],"暂无数据"))
                               {
                                   echo $res['武器设备'];
                                   }
                              else{
                                  echo "数据还在努力寻找呢";
                              }
                        ;?>
                        </div>
                        <div class="layui-tab-item" id="info">
                        <?php if(strcomp($res['简介'],"暂无数据"))
                               {
                                   echo $res['简介'];
                                   }
                              else{
                                  echo "数据还在努力寻找呢";
                              }

                        ?>
                        </div>
                    </div>
                 </div>
                </div>            
            </div>
<script src="layui/layui.js"> </script>
<script>
layui.use([ 'layer', 'element'], function(){
  layer = layui.layer //弹层
  ,element = layui.element //元素操作
  
  //向世界问个好
  layer.msg('Warship');
  
  //监听Tab切换
  element.on('tab(demo)', function(data){
    layer.tips('切换了 '+ data.index +'：'+ this.innerHTML, this, {
      tips: 1
    });
  });
  
  //底部信息
  var footerTpl = lay('#footer')[0].innerHTML;
  lay('#footer').html(layui.laytpl(footerTpl).render({}))
  .removeClass('layui-hide');
});
</script>

</div>
</div>

<div id="main1" style="width:900px;height:600px;"></div><!-- 为可视化1的空间 -->
<div id="main2" style="width:900px;height:600px;"></div><!-- 为可视化2的空间 -->
<script src="../echarts/echarts.js"></script>
<script type="text/javascript">
    	//以下为可视化代码
        // 基于准备好的dom，初始化echarts实例
        var dom = document.getElementById("main1");
    var myChart1 = echarts.init(dom);
    var app = {};
option = {
    title: {
        text: '<?php echo $res['名称']?>'
    },
    tooltip: {},
    legend: {
        data: ['<?php echo $res['名称']?>', '<?php echo $res['分类']?>平均水平'],
        left:'middle'
    },
    radar: {
        // shape: 'circle',
        name: {
            textStyle: {
                color: '#fff',
                backgroundColor: '#999',
                borderRadius: 3,
                padding: [3, 5]
            }
        },
        indicator: [
            { name: '舰长'},
            { name: '型宽'},
            { name: '航速'},
            { name: '满载排水量'},
        ]
    },
    series: [{
        name: '<?php echo $res['名称']?> vs <?php echo $res['分类']?>平均水平',
        type: 'radar',
        // areaStyle: {normal: {}},
        data: [
            {
                value: [<?php echo floatval($res['舰长'])?>, 
                        <?php echo floatval($res['型宽'])?>, 
                        <?php echo floatval($res['航速'])?>, 
                        <?php echo floatval($res['满载排水量'])?>
                        ],
                name: '<?php echo $res['名称']?>'
            },
            {
                value: [<?php   if($res['分类']== '航空母舰'){echo 239.81;}
                                elseif($res['分类']== '战列舰'){echo 186.79;}
                                elseif($res['分类']== '巡洋舰'){echo 153.55;}
                                elseif($res['分类']== '驱逐舰'){echo 141.00;}
                                elseif($res['分类']== '护卫舰'){echo 103.10;}
                                elseif($res['分类']== '两栖作战舰艇'){echo 135.94;}
                                elseif($res['分类']== '核潜艇'){echo 119.56;}
                                elseif($res['分类']== '常规潜艇'){echo 67.85;}
                                elseif($res['分类']== '水雷战舰艇'){echo 53.32;}
                                elseif($res['分类']== '导弹艇'){echo 47.08;}
                                elseif($res['分类']== '巡逻舰/艇'){echo 57.90;}
                                elseif($res['分类']== '保障辅助舰艇'){echo 125.90;}
                                elseif($res['分类']== '气垫艇/气垫船'){echo 28.15;}
                                elseif($res['分类']== '其他'){echo 19.11;}
                                else{echo 103.10;}
                        ?>, 
                        <?php   if($res['分类']== '航空母舰'){echo 34.49;}
                                elseif($res['分类']== '战列舰'){echo 28.75;}
                                elseif($res['分类']== '巡洋舰'){echo 16.78;}
                                elseif($res['分类']== '驱逐舰'){echo 14.88;}
                                elseif($res['分类']== '护卫舰'){echo 12.12;}
                                elseif($res['分类']== '两栖作战舰艇'){echo 22.18;}
                                elseif($res['分类']== '核潜艇'){echo 12.04;}
                                elseif($res['分类']== '常规潜艇'){echo 8.27;}
                                elseif($res['分类']== '水雷战舰艇'){echo 9.16;}
                                elseif($res['分类']== '导弹艇'){echo 9.31;}
                                elseif($res['分类']== '巡逻舰/艇'){echo 9.27;}
                                elseif($res['分类']== '保障辅助舰艇'){echo 21.17;}
                                elseif($res['分类']== '气垫艇/气垫船'){echo 13.28;}
                                elseif($res['分类']== '其他'){echo 4.45;}
                                else{echo 12.12;}
                        ?>, 
                        <?php   if($res['分类']== '航空母舰'){echo 29.22;}
                                elseif($res['分类']== '战列舰'){echo 22.80;}
                                elseif($res['分类']== '巡洋舰'){echo 28.74;}
                                elseif($res['分类']== '驱逐舰'){echo 32.80;}
                                elseif($res['分类']== '护卫舰'){echo 27.54;}
                                elseif($res['分类']== '两栖作战舰艇'){echo 18.61;}
                                elseif($res['分类']== '核潜艇'){echo 26.09;}
                                elseif($res['分类']== '常规潜艇'){echo 17.73;}
                                elseif($res['分类']== '水雷战舰艇'){echo 15.58;}
                                elseif($res['分类']== '导弹艇'){echo 35.49;}
                                elseif($res['分类']== '巡逻舰/艇'){echo 26.93;}
                                elseif($res['分类']== '保障辅助舰艇'){echo 17.74;}
                                elseif($res['分类']== '气垫艇/气垫船'){echo 55.08;}
                                elseif($res['分类']== '其他'){echo 16.40;}
                                else{echo 27.54;}
                        ?>, 
                        <?php   if($res['分类']== '航空母舰'){echo 34.41;}
                                elseif($res['分类']== '战列舰'){echo 32.99;}
                                elseif($res['分类']== '巡洋舰'){echo 10.48;}
                                elseif($res['分类']== '驱逐舰'){echo 5.12;}
                                elseif($res['分类']== '护卫舰'){echo 2.31;}
                                elseif($res['分类']== '两栖作战舰艇'){echo 11.05;}
                                elseif($res['分类']== '核潜艇'){echo 13.90;}
                                elseif($res['分类']== '常规潜艇'){echo 2.08;}
                                elseif($res['分类']== '水雷战舰艇'){echo 645.58;}
                                elseif($res['分类']== '导弹艇'){echo 380.26;}
                                elseif($res['分类']== '巡逻舰/艇'){echo 1.25;}
                                elseif($res['分类']== '保障辅助舰艇'){echo 12.72;}
                                elseif($res['分类']== '气垫艇/气垫船'){echo 248.05;}
                                elseif($res['分类']== '其他'){echo 511.56;}
                                else{echo 5.12;}
                        ?>
                        ],
                name: '<?php echo $res['分类']?>平均水平'
            }
        ]
    }]
};;
    myChart1.setOption(option, true);

    //以上为可视化1
    
    
    
    
    
    var myChart2 = echarts.init(document.getElementById('main2'));

option = {
    title: {
        text: '<?php echo $res['名称']?>',
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['<?php echo $res['名称']?>', '<?php echo $res['分类']?>平均水平'],
        left:'middle'
    },
    grid: [
        {x: '7%', y: '7%', width: '38%', height: '38%'},
        {x2: '7%', y: '7%', width: '38%', height: '38%'},
        {x: '7%', y2: '7%', width: '38%', height: '38%'},
        {x2: '7%', y2: '7%', width: '38%', height: '38%'}
    ],
    
    calculable: true,
    xAxis: [
        {
            gridIndex: 0, 
            type: 'category',
            data: ['舰长']
        },
        {
            gridIndex: 1, 
            type: 'category',
            data: ['型宽']
        },
        {
            gridIndex: 2, 
            type: 'category',
            data: ['航速']
        },
        {
            gridIndex: 3, 
            type: 'category',
            data: ['满载排水量']
        }
    ],
    yAxis: [
        {
            gridIndex: 0,
            type: 'value'
        },
        {
            gridIndex: 1,
            type: 'value'
        },
        {
            gridIndex: 2,
            type: 'value'
        },
        {
            gridIndex: 3,
            type: 'value'
        }
    ],
    series: [
        {
            name: '<?php echo $res['名称']?>',
            type: 'bar',
            xAxisIndex: 0,
            yAxisIndex: 0,
            data: [<?php echo floatval($res['舰长'])?>]
        },
        {
            name: '<?php echo $res['分类']?>平均水平',
            type: 'bar',
            xAxisIndex: 0,
            yAxisIndex: 0,
            data: [<?php    if($res['分类']== '航空母舰'){echo 239.81;}
                            elseif($res['分类']== '战列舰'){echo 186.79;}
                            elseif($res['分类']== '巡洋舰'){echo 153.55;}
                            elseif($res['分类']== '驱逐舰'){echo 141.00;}
                            elseif($res['分类']== '护卫舰'){echo 103.10;}
                            elseif($res['分类']== '两栖作战舰艇'){echo 135.94;}
                            elseif($res['分类']== '核潜艇'){echo 119.56;}
                            elseif($res['分类']== '常规潜艇'){echo 67.85;}
                            elseif($res['分类']== '水雷战舰艇'){echo 53.32;}
                            elseif($res['分类']== '导弹艇'){echo 47.08;}
                            elseif($res['分类']== '巡逻舰/艇'){echo 57.90;}
                            elseif($res['分类']== '保障辅助舰艇'){echo 125.90;}
                            elseif($res['分类']== '气垫艇/气垫船'){echo 28.15;}
                            elseif($res['分类']== '其他'){echo 19.11;}
                            else{echo 103.10;}
                    ?>],
        },
        {
            name: '<?php echo $res['名称']?>',
            type: 'bar',
            xAxisIndex: 1,
            yAxisIndex: 1,
            data: [<?php echo floatval($res['型宽'])?>]
        ,
        },
        {
            name: '<?php echo $res['分类']?>平均水平',
            type: 'bar',
            xAxisIndex: 1,
            yAxisIndex: 1,
            data: [<?php    if($res['分类']== '航空母舰'){echo 34.49;}
                            elseif($res['分类']== '战列舰'){echo 28.75;}
                            elseif($res['分类']== '巡洋舰'){echo 16.78;}
                            elseif($res['分类']== '驱逐舰'){echo 14.88;}
                            elseif($res['分类']== '护卫舰'){echo 12.12;}
                            elseif($res['分类']== '两栖作战舰艇'){echo 22.18;}
                            elseif($res['分类']== '核潜艇'){echo 12.04;}
                            elseif($res['分类']== '常规潜艇'){echo 8.27;}
                            elseif($res['分类']== '水雷战舰艇'){echo 9.16;}
                            elseif($res['分类']== '导弹艇'){echo 9.31;}
                            elseif($res['分类']== '巡逻舰/艇'){echo 9.27;}
                            elseif($res['分类']== '保障辅助舰艇'){echo 21.17;}
                            elseif($res['分类']== '气垫艇/气垫船'){echo 13.28;}
                            elseif($res['分类']== '其他'){echo 4.45;}
                            else{echo 12.12;}
                    ?>],
        },
        {
            name: '<?php echo $res['名称']?>',
            type: 'bar',
            xAxisIndex: 2,
            yAxisIndex: 2,
            data: [<?php echo floatval($res['航速'])?>]
        },
        {
            name: '<?php echo $res['分类']?>平均水平',
            type: 'bar',
            xAxisIndex: 2,
            yAxisIndex: 2,
            data: [<?php    if($res['分类']== '航空母舰'){echo 29.22;}
                            elseif($res['分类']== '战列舰'){echo 22.80;}
                            elseif($res['分类']== '巡洋舰'){echo 28.74;}
                            elseif($res['分类']== '驱逐舰'){echo 32.80;}
                            elseif($res['分类']== '护卫舰'){echo 27.54;}
                            elseif($res['分类']== '两栖作战舰艇'){echo 18.61;}
                            elseif($res['分类']== '核潜艇'){echo 26.09;}
                            elseif($res['分类']== '常规潜艇'){echo 17.73;}
                            elseif($res['分类']== '水雷战舰艇'){echo 15.58;}
                            elseif($res['分类']== '导弹艇'){echo 35.49;}
                            elseif($res['分类']== '巡逻舰/艇'){echo 26.93;}
                            elseif($res['分类']== '保障辅助舰艇'){echo 17.74;}
                            elseif($res['分类']== '气垫艇/气垫船'){echo 55.08;}
                            elseif($res['分类']== '其他'){echo 16.40;}
                            else{echo 27.54;}
                    ?>],
        },
        {
            name: '<?php echo $res['名称']?>',
            type: 'bar',
            xAxisIndex: 3,
            yAxisIndex: 3,
            data: [<?php echo floatval($res['满载排水量'])?>],
        },
        {
            name: '<?php echo $res['分类']?>平均水平',
            type: 'bar',
            xAxisIndex: 3,
            yAxisIndex: 3,
            data: [<?php    if($res['分类']== '航空母舰'){echo 34.41;}
                            elseif($res['分类']== '战列舰'){echo 32.99;}
                            elseif($res['分类']== '巡洋舰'){echo 10.48;}
                            elseif($res['分类']== '驱逐舰'){echo 5.12;}
                            elseif($res['分类']== '护卫舰'){echo 2.31;}
                            elseif($res['分类']== '两栖作战舰艇'){echo 11.05;}
                            elseif($res['分类']== '核潜艇'){echo 13.90;}
                            elseif($res['分类']== '常规潜艇'){echo 2.08;}
                            elseif($res['分类']== '水雷战舰艇'){echo 645.58;}
                            elseif($res['分类']== '导弹艇'){echo 380.26;}
                            elseif($res['分类']== '巡逻舰/艇'){echo 1.25;}
                            elseif($res['分类']== '保障辅助舰艇'){echo 12.72;}
                            elseif($res['分类']== '气垫艇/气垫船'){echo 248.05;}
                            elseif($res['分类']== '其他'){echo 511.56;}
                            else{echo 5.12;}
                    ?>],
        },
    ]
};
// 使用刚指定的配置项和数据显示图表。
            //window.alert('yes');
           

            myChart2.setOption(option);//这个函数生成了可视化图像

    //以上为可视化二

    </script>
<div class="container-about">
<div class="item">
<div id="rs">
    <div class="tt" style="color:#000;font-size:25px;font-weight:bold;">相关搜索</div>
        <table cellpadding="0" id="aa">
            <tr>
                <?php
                $sql2="SELECT *FROM 战舰 where 制造国 = '{$res['制造国']}' order by rand() limit 3";
                $result2 =mysqli_query($link,$sql2);
                for($i=0;$i<3;$i++){
                    $res2= mysqli_fetch_array($result2);
                    $p=$res2['名称'];
                    echo "<th>". "<a href='modelmore.php?keywords=$p' style='color:#0000FF;font-size:20px;text-decoration:underline;'>$p</a>"."</th>";
                    echo "<td></td>";
                };
                ?>
            </tr>
            <tr>
                <?php
                  $sql3="SELECT *FROM 战舰 where 分类 = '{$res['分类']}' order by rand() limit 3";
                  $result3 =mysqli_query($link,$sql3);
                for($i=0;$i<3;$i++){
                    $res3= mysqli_fetch_array($result3);
                    $p=$res3['名称'];
                    echo "<th>"."<a href='modelmore.php?keywords=$p' style='color:#0000FF;font-size:20px;text-decoration:underline;'>$p</a>"."</th>";
                    echo "<td></td>";
                };
                ?>
            </tr>
            <tr>
                <?php
                  $sql4="SELECT *FROM 战舰 where 活跃时间 = '{$res['活跃时间']}' order by rand() limit 3";
                  $result4 =mysqli_query($link,$sql4);
                for($i=0;$i<3;$i++){
                    $res4= mysqli_fetch_array($result4);
                    $p=$res4['名称'];
                    echo "<th>"."<a href='modelmore.php?keywords=$p' style='color:#0000FF;font-size:20px;text-decoration:underline;'>$p</a>"."</th>";
                    echo "<td></td>";
                };
                ?>
            </tr>
            </table>
</div>
</div>
</div>
<div class="footer">
     <p>
        <span>2020 05</span>
        <span><a href="about.html" target="_blank">小组相关</a></span>
        <span>Group 3</span>
    </p>
    </div>
</body>
</html>