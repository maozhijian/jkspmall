<?php

class MaoModule extends IndexbaseModule
{

   //index()为默认方法，延续了所有的控制器的特征；
   function index()
　     {
　       $db=db("testhehe");
　       $sql="select * from rm_test";
　		$query=$db->query($sql);
　       $result=array();
     while($row=$db->fetchrow($query)){
        $result[]=$row;
        }
		$this->assign("result",ecm_json_encode($result));//注意这里的ECM_JSON
		$this->display("admin/datacall.index.html");
   }
}

?>
