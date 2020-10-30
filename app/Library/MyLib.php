<?php

namespace App\Library;

class MyLib{
	public static function category_listid($list, $parentid, $arr){
		foreach($list as $row){
			if($row->parentid==$parentid){
				$arr[]= $row->id;
				MyLib::category_listid($list, $row->id, $arr);
			}
		}
		return $arr;
	}
}