<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    protected $guarded = [];
    public $timestamps = false;


    public function tree(){
    	$category = $this->orderBy('cate_order', 'asc')->get();
    	return $this->getTree($category);
    }



    public function getTree($data, $pid = 0){
    	$arr = array();
    	foreach ($data as $k => $v) {
    		if($v->cate_pid == $pid){
    			$data[$k]['_cate_name'] = $data[$k]['cate_name'];
    			$arr[$k] = $data[$k];
    			foreach($data as $m => $n){
    				if($n->cate_pid == $v->cate_id){
    					$data[$m]['_cate_name'] = ' ├─'.$data[$m]['cate_name'];
    					$arr[$m] = $data[$m];
    				}
    			}
    		}
    	}
    	return $arr;
    }
}
