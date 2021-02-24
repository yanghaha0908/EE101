<?php
if (isset($_GET["keywords"])){
    $keywords = $_GET["keywords"];
} else {
    echo "keywords not specified";
    exit(0);
}
?>
<?php  
$link = mysqli_connect("localhost",'root','','homework1');
if(!$link)
{
    echo"not connect";
}
$link->set_charset("utf8");

header("Content-Type: text/html; charset=utf-8");

class page {
    private $myde_total;          //总记录数
    private $myde_size;           //一页显示的记录数
    private $myde_page;           //当前页
    private $myde_page_count;     //总页数
    private $myde_i;              //起头页数
    private $myde_en;             //结尾页数
    private $myde_url;            //获取当前的url
    /*
     * $show_pages
     * 页面显示的格式，显示链接的页数为2*$show_pages+1。
     * 如$show_pages=2那么页面上显示就是[首页] [上页] 1 2 3 4 5 [下页] [尾页] 
     */

    private $show_pages;
    public function __construct($myde_total = 1, $myde_size = 1, $myde_page = 1, $myde_url, $show_pages = 2) {
        $this->myde_total = $this->numeric($myde_total);
        $this->myde_size = $this->numeric($myde_size);
        $this->myde_page = $this->numeric($myde_page);
        $this->myde_page_count = ceil($this->myde_total / $this->myde_size);
        $this->myde_url = $myde_url;
        if ($this->myde_total < 0)
            $this->myde_total = 0;
        if ($this->myde_page < 1)
            $this->myde_page = 1;
        if ($this->myde_page_count < 1)
            $this->myde_page_count = 1;
        if ($this->myde_page > $this->myde_page_count)
            $this->myde_page = $this->myde_page_count;
        $this->limit = ($this->myde_page - 1) * $this->myde_size;
        $this->myde_i = $this->myde_page - $show_pages;
        $this->myde_en = $this->myde_page + $show_pages;
        if ($this->myde_i < 1) {
            $this->myde_en = $this->myde_en + (1 - $this->myde_i);
            $this->myde_i = 1;
        }
        if ($this->myde_en > $this->myde_page_count) {
            $this->myde_i = $this->myde_i - ($this->myde_en - $this->myde_page_count);
            $this->myde_en = $this->myde_page_count;
        }
        if ($this->myde_i < 1)
            $this->myde_i = 1;
    }
    //检测是否为数字
    private function numeric($num) {
        if (strlen($num)) {
            if (!preg_match("/^[0-9]+$/", $num)) {
                $num = 1;
            } else {
                $num = substr($num, 0, 11);
            }
        } else {
            $num = 1;
        }
        return $num;
    }
    //地址替
    private function page_replace($page) {
        return str_replace("{page}", $page, $this->myde_url);
    }
    //首页
    private function myde_home() {
        if ($this->myde_page != 1) {
            return "<a href='" . $this->page_replace(1) . "' title='首页'>首页</a>";
        } else {
            return "<p>首页</p>";
        }
    }
    //上一页
    private function myde_prev() {
        if ($this->myde_page != 1) {
            return "<a href='" . $this->page_replace($this->myde_page - 1) . "' title='上一页'>上一页</a>";
        } else {
            return "<p>上一页</p>";
        }
    }
    //下一页
    private function myde_next() {
        if ($this->myde_page != $this->myde_page_count) {
            return "<a href='" . $this->page_replace($this->myde_page + 1) . "' title='下一页'>下一页</a>";
        } else {
            return"<p>下一页</p>";
        }
    }
    //尾页
    private function myde_last() {
        if ($this->myde_page != $this->myde_page_count) {
            return "<a href='" . $this->page_replace($this->myde_page_count) . "' title='尾页'>尾页</a>";
        } else {
            return "<p>尾页</p>";
        }
    }
    //输出
    public function myde_write($id = 'page') {
        $str = "<div id=" . $id . ">";
        $str.=$this->myde_home();
        $str.=$this->myde_prev();
        if ($this->myde_i > 1) {
            $str.="<p class='pageEllipsis'>...</p>";
        }
        for ($i = $this->myde_i; $i <= $this->myde_en; $i++) {
            if ($i == $this->myde_page) {
                $str.="<a href='" . $this->page_replace($i) . "' title='第" . $i . "页' class='cur'>$i</a>";
            } else {
                $str.="<a href='" . $this->page_replace($i) . "' title='第" . $i . "页'>$i</a>";
            }
        }
        if ($this->myde_en < $this->myde_page_count) {
            $str.="<p class='pageEllipsis'>...</p>";
        }
        $str.=$this->myde_next();
        $str.=$this->myde_last();
        $str.="<p class='pageRemark'>共<b>" . $this->myde_page_count .
                "</b>页<b>" . $this->myde_total . "</b>条数据</p>";
        $str.="</div>";
        return $str;
    }
}
$showrow = 10; //一页显示的行数  
$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
//$url = "?page={page}"; //分页地址，如果有检索条件 
$url="?page={page}&keywords=".$_GET['keywords'] ;

//es搜索
$param ='{
    "query": {
        "multi_match": {
          "query": "';
$param .="$keywords";
$param .='",
          "fields": ["名称","制造国","分类","前型","制造厂","简介"]
        }
    },
"size": 1000
}';
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,"http://localhost:9200/ship/_search");
$header = array("content-type: application/json; charset=UTF-8");
curl_setopt($curl,CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$timeout = 10;
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($curl,CURLOPT_POSTFIELDS, $param);
$esres = curl_exec($curl);
curl_close($curl);
$esresult=(json_decode($esres, true));

$total = $esresult["hits"]["total"]["value"]; //记录总条数  
if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))  
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
//获取数据  
?>  

<!DOCTYPE html>  
<html>  
    <head>   
    <meta charset="UTF-8">
	    <title>Page</title>
	    <link rel="stylesheet" href="layui/css/layui.css">
        <link rel="stylesheet" href="static/header.css">
        <link rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />  
        <style type="text/css">
            .logo-img{float: left !important;margin-top:20px;}  
            p{margin:0}  
            #page{  
                height:40px;  
                padding:20px 0px;  
            }  
            #page a{  
                display:block;  
                float:left;  
                margin-right:10px;  
                padding:2px 12px;  
                height:24px;  
                border:1px #cccccc solid;  
                background:#fff;  
                text-decoration:none;  
                color:#808080;  
                font-size:12px;  
                line-height:24px;  
            }  
            #page a:hover{  
                color:#077ee3;  
                border:1px #077ee3 solid;  
            }  
            #page a.cur{  
                border:none;  
                background:#077ee3;  
                color:#fff;  
            }  
            #page p{  
                float:left;  
                padding:2px 12px;  
                font-size:12px;  
                height:24px;  
                line-height:24px;  
                color:#bbb;  
                border:1px #ccc solid;  
                background:#fcfcfc;  
                margin-right:8px;  
            }  
            #page p.pageRemark{  
                border-style:none;  
                background:none;  
                margin-right:0px;  
                padding:4px 0px;  
                color:#666;  
            }  
            #page p.pageRemark b{  
                color:red;  
            }  
            #page p.pageEllipsis{  
                border-style:none;  
                background:none;  
                padding:4px 0px;  
                color:#808080;  
            }  
            .dates li {font-size: 14px;margin:20px 0}  
            .dates li span{float:right}  
        </style>  
        <script src="../js/jquery-3.4.1.min.js"></script>
    </head>  
    <body class="lay-de">
    <div class="header">
        <div class="header-wrap">
            <div class="logo-pull-left">
                <a href="主页.html">
                    <img src="../img_warship/logo.jpg" alt="" class="logo-img">
                </a>
        </div>
            <form class="layui-form detail-search pull-left" action="pageestest.php" method="GET">
                <div class="layui-form-item header-swrap">
                    <div class="layui-input-block header-box">
                      <i class="layui-icon layui-icon-search"></i>
                      <input type="text" name="keywords" lay-verify="title" placeholder="请输入搜索条件" autocomplete="off"  class="layui-input">
                    </div>
                </div>
            </form>
            <div class="blog-nav pull-right">
                <ul class="layui-nav pull-left">
                  <li class="layui-nav-item layui-this"><a href="主页.html">首页</a></li>
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
            <li><a href="主页.html">首页</a></li>
            <li><a href="about.html">关于</a></li>
        </ul>
    </div>

    <div class="container-wrap">
        <div class="container">  
            <div class="demo">    
                <div class="showData">  
                    <ul class="dates">  
                        <?php for($i=($curpage-1)*$showrow;$i<$curpage*$showrow and $i<$total;$i++) { ?>   
                            <li>  
                                <span><?php echo $esresult["hits"]["hits"][$i]["_source"]["制造国"] ?></span>  
                                <?php  
                                $p=$esresult["hits"]["hits"][$i]["_source"]["名称"];
                                $c = $esresult["hits"]["hits"][$i]["_source"]["制造国"];
                                $sql = "SELECT * from 战舰 where 名称 = '$p'";
                                $query = mysqli_query($link, $sql);
                                $row = mysqli_fetch_assoc($query);
                                if($row['图片']!='暂无图片' and $row['图片']!='暂无数据'){
                                    echo "<a target='_blank' href='modelmore.php?keywords=$p'>
                                    $p;
                                    '<img src='{$row['图片']}' title='{$row['名称']}' id='jump'>'
                                    </a>";
                                    
                                }
                                else{
                                    echo "<a target='_blank' href='modelmore.php?keywords=$p'>
                                    $p
                                    </a>";
                                }
                                ?>
                            </li>  
                        <?php } ?>  
                    </ul>  
                 <!--显示数据区-->  
                </div>  
                <div class="showPage">  
                    <?php  
                    if ($total > $showrow) {//总记录数大于每页显示数，显示分页  
                        $page = new page($total, $showrow, $curpage, $url, 2);  
                        echo $page->myde_write();  
                    }  
                    ?>  
                </div>  
            </div>  
        </div> 
                </div>
<br><br><br><br>
        <div class="footer">
        <p>
           <span>2020 05</span>
           <span><a href="about.html" target="_blank">小组相关</a></span>
           <span>Group 3</span>
       </p>
       </div> 
        <script type="text/javascript" src="http://www.sucaihuo.com/Public/js/other/jquery.js"></script>
        <!-- <script>
        document.onreadystatechange = function () {
    if (document.readyState == "complete") {    
        $(".loading-div").hide();
        $('body').css('overflow','scroll');
    }
  };
    $("#jump").click(function(){
        location.href="modelmore.php?keywords=<?php echo $p;?>";
    });
    </script>    -->
    </body>  
</html>  
