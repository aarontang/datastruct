<?php
/**
 * 实现拉丁方正
 * Created by aaron <2590419211@qq.com>.
 * User: user
 * Date: 2017/3/15
 * Time: 18:13
 */

$n = empty($_GET['num']) ? 3 : abs((int)$_GET['num']);

//创建一个数组
$arr = range(1,$n);

for($i=0;$i<$n;$i++){
    //第一个元素移动到数组结尾
    echo implode(",",$arr),"<br />";
    $arr[] = $arr[$i];
    unset($arr[$i]);
}