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
//本地数据库
if(!$link)
{
    echo"not connect";
}
else{
    $link->set_charset("utf8");
    //$sql="SELECT *from 战舰 order by rand() limit 1";
    $sql="SELECT *from 战舰 where 名称 ='$keywords'";
    //这里的话改成你要选择数据库的方式
    $result = mysqli_query($link,$sql);
    if($result==FALSE){
        echo"error";
    }
    $data=array();
    $res = mysqli_fetch_array($result);
   
}
require './detail.php';
