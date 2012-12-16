<?php
  
 class Demo1App extends MallbaseApp
 {
 	   function index(){
 	   	echo 'Demo1';   	
 	   }
 	   
 	   /**
 	    * goods方法对应 goods模型
 	    * @return viod
 	    */
 	   function goods(){
 	   	$goods=m('goods');
 	   	$id=empty($_GET['id'])?0:intval($_GET['id']);
 	   	if(!$id){
 	   		echo "Warning!Hacking!";
 	   	    return ;
 	   	}
 	   	//获取goods信息
 	   	$goods_info=$goods->get_info($id);
 	   	//输出goods信息
 	   	$result=print_r($goods_info);
 	   }
 	   
 	   //此处的test自定义模型将在下面讲述，暂时略过；
 	   function test(){
 	   	$test=m('test');
 	   	
 	   	$data=array('name'=>'营茂','name2'=>'电商');//name name2对应表字段
 	   	$test->addData($data);
 	   	
 	   }
 	   
 }
?>