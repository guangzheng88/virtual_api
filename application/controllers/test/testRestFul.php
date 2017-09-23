<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 测试rest_ful在ci框架中的使用
 * @author guangzhengren@sina.com
 * @date 2017-09-21 17:00:00
 */
class TestRestFul extends BLL_Controller
{
    /**
     * 测试GET请求
     */
    public function index_get()
    {
        $arr['state'] = 1;
        $arr['status'] = 1;
        $arr['message'] = 'GET请求成功';

        //调用rest_client返回
//        $this->response($arr);

        //或者工具类返回错误信息
//        Util::errorMsg('参数错误');

        //或者工具类返回错误信息,指定state和status
        Util::errorMsg('入库失败',2,5);
    }
}