<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 模拟前端访问BLL的demo
 * 在constants.php中定义接口访问路径
 * 在开发前期阶段为虚拟路径，访问虚拟路径获取模拟数据，进行前端页面开发，
 * 后端接口开发完毕后，将路径改为真正的接口路径
 * 注意：此配置在view层配置，这里是为了演示
 * @author guangzhengren@sina.com
 * @date 2017-09-22 17:00:00
 */
class Demo extends BLL_Controller
{
    /**
     * 模拟view层访问BLL
     */
    public function index_get()
    {
        // 拼接参数
        $params['token'] = md5('token');
        $params['name'] = 'admin';
        //请求BLL
        $res = $this->rest_client->get(TEST_PATH,$params);
        //处理接口返回
        dump($res);exit;
    }
}