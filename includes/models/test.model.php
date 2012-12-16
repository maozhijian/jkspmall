<?php
class TestModel extends BaseModel{
	/**
// 	 * $table 为表映射,$prikey 为映射表的主键,$alias 为查询表的别名,主要体现在SQL语句里,$_name 为模型的名称,
                        这四个值都与 ECMALL 模型数据库操作(非Adodb+SQL的方式)有关,如果不想用SQL语句查询的话,而是使用模型自身提供的数据操作功能,
                        那么至少要把 $table,$prikey体现出来;至于$alias 与$_name 的存在与否并不重要.只有类似于我们需要得到模型名称时,
                        才会将$_name 进行实现,例如:function getName(){return this->name;}。
	 */
	/**
	 * @author carrymao
     * 2013 8-12
     * @return void
	 */
	var $table  ='Test';
	var $prikey ='id';
	var $alias  ='tm';
	var $_name  ='testmode';
	
	function addData($data){
		
		$this->add($data);//该处的add继承自BaseModel类
		echo '插入成功';
	}
	
	
}


?>