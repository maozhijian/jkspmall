<?php

class MaoModule extends AdminbaseModule
{

	function index(){
		　   	$db=db('testhehe');
		　   	　       $sql="select * from rm_test";
		　   	　       　		$query=$db->query($sql);
		　   	　       　		　       $result=array();
		　   	　       　		　       while($row=$db->fetchrow($query)){
		　   	　       　		　       　        $result[]=$row;
		　   	　       　		　       　　　}
        $this->assign("result",$result);
	　　　$this->display("datacall.form.html");
	　　　//这里指定模块管理链接点开后所显示的模板页面，建议直接建一个kichijyo.admin.html，比用这个怪怪的名字好多了，是么？
	　}
	
}

?>