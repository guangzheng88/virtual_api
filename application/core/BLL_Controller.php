<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * 基类
 * 完成跟BLL同功能的rest_ful功能
 */
require(APPPATH.'/libraries/REST_Controller.php');
class BLL_Controller extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    /**
     * 初始化处理函数
     */
    private function _init()
    {
        header("Content-type:text/html;charset=utf-8");
        //解决ajax跨域问题
        echo header("Access-Control-Allow-Origin:*");
        $this->load->library('REST_Client',array('server'=>BLL_HOST),'rest_client');
    }
}
