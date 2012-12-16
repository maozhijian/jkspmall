<?php
class Demo2App extends MallbaseApp
{    
	
	function index(){
	    $sku ='IND140200005991';
		$goodsspec_mod=m('goodsspec');
		$sql=array(
				'join'         =>  'belongs_to_goods',
				'conditions'   =>  "sku='{$sku}'"
		);
		$arr=$goodsspec_mod->find($sql);
		print_r($arr);
		
	}
	 

	 
}
?>