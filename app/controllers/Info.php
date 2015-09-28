<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Shanghai');
		$this->load->model('Data_model');
	}

	public function index()
	{
		$this->load->view('Info/index');
	}
	//客户与CDAI数据对比页面
	public function cdai($id = 100061)
	{
		//$my_array['id'] = $id;
		$table = "customer";
		//echo $id;

		//读取所有客户信息
		$list["customer"] = $this->Data_model->get_data('id asc',$table);
		//读取第一个客户信息
		$list["a_customer"] = $this->Data_model->get_adata($id,$table);
		//读取cdmi
		$my_array['high'] = $list['a_customer']['near_height'];
		$my_array['sex'] = $list['a_customer']['sex'];
		$list["weight"]  = $this->Data_model->get_where_adata('cdai',$my_array);
		//读取第一个客户体重
		$my_array2['uid'] = $id;
		$limit = 7;
		$list['my_weight'] = $this->Data_model->get_array_limit("weight",$my_array2,"id desc",$limit );

		//判读ID与客户ID做对比
		$list["id"] =$id;

		//显示页面详细
		$this->load->view('Info/cdai',$list);
	}

	/**
	 *built by yuzhongping
	 *time:2015-9-28 10:41
	 *view is  /views/Info/customer.php
	 */

	public function customer()
	{
		$table = "customer";
		//读取所有客户信息
		$list["customer"] = $this->Data_model->get_data('id asc',$table);

		//显示页面详细
		$this->load->view('Info/customer',$list);
	}

	public function ucai()
	{
		$list['title'] = "UCAI评分-客户信息";		
		//显示页面详细
		$this->load->view('Info/ucai',$list);
	}
	public function ucai2()
	{	
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		$addData1['name'] = trim(htmlspecialchars ($this->input->post ('name')));
		$addData1['phone']  = trim(htmlspecialchars ($this->input->post ('phone')));
		$addData1['hospital_id'] = trim(htmlspecialchars ($this->input->post ('hospital_id')));	

		$this->db->trans_start();
        $KSId = $this->Data_model->insert_data($addData1, 'customer');
        $this->db->trans_complete();	

        if($KSId >0){
        	//显示页面详
			$where = site_url ('Info/ucai3/'.$KSId);
            header("Content-Type:text/html;charset=utf-8");
            echo '<script>alert("添加客户信息成功");';
            echo 'window.location.href="' .$where . '";</script>';
            exit();

        }else{
			header("Content-Type:text/html;charset=utf-8");
            echo '<script>alert("添加客户信息失败，请重新再试");';
            echo 'window.location.href="' . $status ['where'] . '";</script>';
            exit();
        }
	}

	public function ucai3($id = 0)
	{
		$list['uid'] = $id;
		$list['title'] = "UCAI评分-评测";
		$this->load->view('Info/ucai3',$list);
	}

}
