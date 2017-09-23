<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 模拟添加用户
 * 在constants.php中定义接口访问路径
 * 在开发前期阶段为虚拟路径，访问虚拟路径获取模拟数据，进行前端页面开发，
 * 后端接口开发完毕后，将路径改为真正的接口路径
 * 注意：此配置在view层配置，这里是为了演示
 * @author guangzhengren@sina.com
 * @date 2017-09-22 17:00:00
 */
class Demo1 extends BLL_Controller
{
    /**
     * 页面
     */
    public function index_get()
    {
        $this->load->view('demo/index.html');
    }
    /**
     * 请求BLL接口,执行添加用户
     */
    public function index_post()
    {
        $params['username'] = $this->input->post('username');
        $params['password'] = $this->input->post('password');
        $params['phone'] = $this->input->post('phone');
        $params['assert'] = $this->input->post('assert');
        //请求BLL
        $res = $this->rest_client->post(ADD_USER_PATH,$params);
        if(is_object($res) && $res->state == 1)
        {
            echo '用户添加成功';
        }else
        {
            echo $res->error;
        }
    }
}