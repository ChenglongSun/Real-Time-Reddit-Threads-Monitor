<?php
header("Content-type: text/html; charset=utf-8");
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid']))
{
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
include('conn.php');
$myid = $_SESSION['userid'];
$username = $_SESSION['username'];
$postid = $_GET['post_id'];

echo "Posts with the tag ";
echo "<br />";  

$tag_post = mysql_query("SELECT * FROM `post` WHERE `post_id` = $postid ");
while($row = mysql_fetch_array($tag_post)) 
{   
	//显示作品
	echo '<a href="post.php?post_id='.$row['post_id'].'&uid='.$row['uid'].'">'.$row['title'].'</a>';
	echo "<br />";   

} 

?>