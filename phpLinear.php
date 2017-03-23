<?php
/**
 * 实现线性表的一些特性
 * Created by aaron <2590419211@qq.com>.
 * User: user
 * Date: 2017/3/15
 * Time: 18:13
 */

class phpLinear{
    private $data = array();
    public $length = 0;

    /**
     * 初始化一个固定长度的线性表
     * @author aaron <2590419211@qq.com>
     * @param $length
     * @return bool
     */
    public function InitList($length){
        $length = (int)$length;
        //传入一个错误的长度
        if($length<1){
            return false;
        }
        $this->length = $length;
        //让线性表的长度等于需要初始化的长度，给每个位置附上初始值
        for($i=0;$i<$length;$i++){
            $data[$i] = 0;
        }
        return true;
    }

    /**
     * 判断是否是一个空的线性表
     * @author aaron <2590419211@qq.com>
     * @return bool
     */
    public function ListEmpty(){
        return $this->length > 0 ? true : false;
    }

    /**
     * 清空线性表
     * @author aaron <2590419211@qq.com>
     * @return bool
     */
    public function ClearList(){
        $this->length = 0;
        $this->data = array();
        return true;
    }

    /**
     * 获取线性表某个位置的元素的值
     * @author aaron <2590419211@qq.com>
     * @param $location
     * @return bool|mixed
     */
    public function GetElem($location){
        //线性表是从1开始的 如果不在界限之内 返回FALSE
        if(!$this->_isLocation($location)){
            return false;
        }
        //直接通过偏移量来取出要访问的值
        $value = $this->data[$location-1];
        return $value;
    }

    /**
     * 返回线性表中的某个值的位置
     * @author aaron <2590419211@qq.com>
     * @param $value
     * @return int
     */
    public function LocateElem($value){
        $location = 0;
        for($i=1;$i<=$this->length;$i++){
            if($this->data[$i-1] == $value){
                $location = $i;
            }
        }
        return $location;
    }

    /**
     * 线性表的插入操作
     * @author aaron <2590419211@qq.com>
     * @param $location
     * @param $value
     * @return bool
     */
    public function ListInsert($location,$value){
        //位置不合理直接返回
        if(!$this->_isLocation($location)){
            return false;
        }
        $old_data = $this->data;
        //后面的每一个都要挪位置
        $this->data[$location-1] = $value;
        for($i=$location;$i<$this->length;$i++){
            $this->data[$i] = $old_data[$i-1];
        }
        return true;
    }

    /**
     * 线性表的删除操作
     * @author aaron <2590419211@qq.com>
     * @param $location
     * @return bool|mixed
     */
    public function ListDelete($location){
        //位置不合理直接返回
        if(!$this->_isLocation($location)){
            return false;
        }
        $old_data = $this->data;
        //后面的每一个都要挪位置
        $value = $this->data[$location-1];
        for($i=$location;$i<$this->length;$i++){
            $this->data[$i-1] = $old_data[$i-2];
        }
        return $value;
    }

    /**
     * 查看表里面的数据
     * @author aaron <2590419211@qq.com>
     * @return bool
     */
    public function showData(){
        print_r($this->data);
        return false;
    }

    /**
     * 判断位置是否合法
     * @author aaron <2590419211@qq.com>
     * @param $location
     * @return bool
     */
    private function _isLocation($location){
        if($location<1 || $location>$this->length){
            return false;
        }
        return true;
    }

}

$linear = new phpLinear();
