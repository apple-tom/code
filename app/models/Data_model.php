<?php
//data 数据库操作模型

class Data_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //获取数据列表  $order 排序 如id desc , $table 为表名
    function get_data($order,$table)
    {
        $this->db->order_by($order);
        $query=$this->db->get($table);
        return $query->result_array();
    }

    function get_where_array($table,$my_array ) {
        $query = $this->db->get_where($table, $my_array);
        $row = $query->result_array();
        return $row;   //row_array(); //
    }

    function get_distinct_array($table,$my_array ) {
        $this->db->distinct();// where aa is not null
        $query = $this->db->get_where($table, $my_array);
        $row = $query->result_array();
        return $row;   //row_array(); //
    }


    function get_where_array_order($table,$my_array,$order ) {
        $this->db->order_by($order);
        $query = $this->db->get_where($table, $my_array);
        $row = $query->result_array();
        return $row;   //row_array(); //
    }

    function get_array_limit($table,$my_array,$order,$limit ) {
        $this->db->order_by($order);
        $this->db->limit($limit);
        $query = $this->db->get_where($table, $my_array);
        
        $row = $query->result_array();
        return $row;   //row_array(); //
    }

    //获取数据列表  $order 排序 如id desc , $table 为表名  ->分页用
    function get_data_bypage($order,$table,$num,$offset)
    {
        $this->db->order_by($order);
        $query=$this->db->get($table,$num,$offset);
        return $query->result_array();
    }

    //获取数据列表  $order 排序 如id desc , $table 为表名  ->分页用
    function get_high_bypage($order,$table,$num,$offset,$name,$city)
    {
        if($city !='未选定'){
            $this->db->like('city', $city);
        }
        if($name !=''){
            $this->db->like('name', $name);
        }
        $this->db->order_by($order);
        $query=$this->db->get($table,$num,$offset);
        return $query->result_array();
    }


    //获取一条数据
    function get_adata($id,$table)
    {
        $query=$this->db->get_where($table,array('id'=>$id));
        $row = $query->row_array();
        return  $row;	  //row_array(); //
    }

    function get_where_adata($table,$my_array)
    {
        $query=$this->db->get_where($table,$my_array);
        $row = $query->row_array();
        return  $row;	  //row_array(); //
    }

    //查询数据库中是否存在某个数据,$some为表中匹配字段,$table为查询表
    function get_exists_data($some,$table)
    {
        $query = $this->db->get_where($table, $some); //$some  类似数组 array('city_name' => $city_name)
        return $query->num_rows(); //返回条数，
        //return $query->result();
    }

    //$post 为发过来的数组post，类型 array('desc'=>$_POST['desc'],'stime'=>time())
    function insert_data($post,$table)
    {
        $this->db->insert($table, $post);
        $id = $this->db->insert_id(); // 返回插入数据的id
        return $id;
    }

    function update_data($id,$post,$table)
    {
        $query=$this->db->update($table, $post, array('id' => $id));
        return $query;
    }

    function update_wdata($data,$post,$table)
    {
        $query=$this->db->update($table, $post, $data);
        return $query;
    }


    function delete_data($id,$table)
    {
        $query=$this->db->delete($table, array('id' => $id));
        return $query;
    }

    function get_hospital_search($name,$order,$table,$city_id)
    {
        if($name != ""){
            $this->db->like('name', $name);
        }
        if($city_id >0){
            $this->db->where('city_id', $city_id);
        }
        $this->db->order_by($order);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function get_cert_search($order,$table,$articles)
    {
        foreach($articles as $article){
            $this->db->or_where('article_id', $article);
        }
        $this->db->order_by($order);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    //获取数据列表  $order 排序 如id desc , $table 为表名  ->分页用
    function get_data_bypagetrain($order, $table, $num, $offset,$branch) {
        $this->db->where('category_id', $branch);

        $this->db->order_by($order);
        $query = $this->db->get($table, $num, $offset);

        return $query->result_array();
    }

    function gettrainnum($branch, $table) {
        $this->db->where('category_id', $branch);
        $this->db->from($table);
        $total = $this->db->count_all_results();

        return $total;
    }


    //获取where 数据列表  $order 排序 如id desc , $table 为表名     where
    function get_wdata($where, $order, $table) {
        $this->db->order_by($order);
        $query = $this->db->get_where($table, $where);
        return $query->result_array();
    }
    //获取数据列表  $order 排序 如id desc , $table 为表名  ->分页用

    function get_like_data($some='',$like,$table){

        $this->db->like($like);
        $query = $this->db->get_where($table, $some);
        return $query->num_rows();
    }

    function ger_select_bypage($str='',$like,$order,$table,$num=20,$offset=0)
    {
        if($str!=''){
            $this->db->where($str);
        }
        $this->db->like($like);
        $this->db->order_by($order);
        $query = $this->db->get($table, $num, $offset);
        return $query->result_array();
    }



    //高端业务管理系统权限设置
    function delete_quanxian($my_post, $table) {
        $this->db->where('company_id', $my_post['company_id']);
        $this->db->where('power_class', $my_post['power_class']);
        $this->db->where('power_type', $my_post['power_type']);

        $query=$this->db->delete($table);
        return $query;
    }
    function delete_permission($my_post, $table) {
        $this->db->where('group_name_id', $my_post['group_name_id']);
        $this->db->where('member_id', $my_post['member_id']);
        $query=$this->db->delete($table);
        return $query;
    }

    //根据权限读取list
    function get_data_bypage2($order, $table, $num, $offset,$pub_id,$quanxian) {

        $this->db->where('pub_id', $pub_id);
        for ($i=0 ;$i <count($quanxian);$i++){
            $this->db->or_where('pub_area',$quanxian[$i]['company_id']);

        }
        $this->db->order_by($order);
        $query = $this->db->get($table, $num, $offset);

        return $query->result_array();
    }
    function or_distinct_array($table,$member_id) {
        $this->db->distinct();
        $this->db->where('member_id', $member_id);
        $this->db->where('power_type', '!=1');
        $query = $this->db->get($table);
        $row = $query->result_array();
        return $row;   //row_array(); //
    }

    function get_distinct_wdata($where, $order, $table) {
        $this->db->order_by($order);
        $this->db->distinct();
        $query = $this->db->get_where($table, $where);
        return $query->result_array();
    }


    function get_high_bypage2($order,$table,$num,$offset,$name,$city,$pub_id,$quanxian)
    {
        if($city !='未选定'){
            $this->db->like('city', $city);
        }
        if($name !=''){
            $this->db->like('name', $name);
        }

        //$this->db->where('pub_id', $pub_id);
        for ($i=0 ;$i <count($quanxian);$i++){
            $this->db->or_where('pub_area',$quanxian[$i]['company_id']);

        }

        $this->db->order_by($order);
        $query=$this->db->get($table,$num,$offset);
        return $query->result_array();
    }

    function get_where_wdata($where, $order, $table,$str) {
        $this->db->order_by($order);
        $this->db->group_by($str);
        $query = $this->db->get_where($table, $where);
        return $query->result_array();
    }
    
    function get_like_where_data($some='',$like,$table,$str=''){

        $this->db->like($like);
        if($some==''){
            $query = $this->db->get($table);
        }else{
            if(is_array($some)){
                $this->db->where_in('category_id', $some);
                if($str!=''){
                    $this->db->group_by($str);
                }
                $query = $this->db->get($table);
            }else{
                $query = $this->db->get_where($table, $some);
            }
        }
        return $query->num_rows();
    }
    function ger_select_where_bypage($str='',$like,$order,$table,$num=20,$offset=0,$grop='')
    {
        if($str!=''){
            if(is_array($str)){
                $this->db->where_in('category_id', $str);
            }else{
                $this->db->where($str);
            }
        }
        $this->db->like($like);
        $this->db->order_by($order);
        if($grop!=''){
            $this->db->group_by($grop);
        }
        $query = $this->db->get($table, $num, $offset);
        return $query->result_array();
    }

    //计算总数 --整个表格
    function get_all_total($table)
    {
        $total = $this->db->count_all_results($table);
        return $total;
    }

    function get_total($table,$name,$city) {
        if($city !='未选定'){
            $this->db->like('city', $city);
        }
        if($name !=''){
            $this->db->like('name', $name);
        }

        $this->db->from($table);
        $total = $this->db->count_all_results();
        return $total;
    }

    //根据权限读取数据总数
    function get_total_power( $table, $pub_id,$quanxian) {

        $this->db->where('pub_id', $pub_id);
        for ($i=0 ;$i <count($quanxian);$i++){
            $this->db->or_where('pub_area',$quanxian[$i]['company_id']);

        }
        $this->db->from($table);
        $total = $this->db->count_all_results();
        return $total;
    }

    //根据查询条件 读取数据总数 --name ---city
    function get_total_search($table,$name,$city)
    {
        if($city !='未选定'){
            $this->db->like('city', $city);
        }
        if($name !=''){
            $this->db->like('name', $name);
        }
        $this->db->from($table);
        $total = $this->db->count_all_results();
        return $total;
    }
    //根据查询条件 及权限 读取数据总数 --name ---city
    function get_total_search_power($table,$name,$city,$quanxian)
    {
        if($city !='未选定'){
            $this->db->like('city', $city);
        }
        if($name !=''){
            $this->db->like('name', $name);
        }
        //$this->db->where('pub_id', $pub_id);
        for ($i=0 ;$i <count($quanxian);$i++){
            $this->db->or_where('pub_area',$quanxian[$i]['company_id']);
        }
        $this->db->from($table);
        $total = $this->db->count_all_results();
        return $total;
    }


    function get_shenhe($table,$my_array ) {
        $this->db->distinct();
        $query = $this->db->get_where($table, $my_array);
        $row = $query->result_array();
        return $row;   //row_array(); //
    }



}

?>