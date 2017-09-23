<?php
/**
 * <文件描述> 定义接口访问路径
 * <详细描述> 在开发前期阶段为虚拟路径，访问虚拟路径获取模拟数据，进行前端页面开发，
 * 后端接口开发完毕后，将路径改为真正的接口路径
 * (因接口地址修改一般情况下只在开发时期有变动，所以我觉得因把此常量文件单独提出来)
 * 注意：确定好请求方式:GET|POST|PUT|DELETE
 * 备注：此配置在view层配置，这里是为了演示
 * @author
 * @date
 */
//测试接口
define('TEST_PATH', 'test/testRestFul/index');
//添加用户接口
define('ADD_USER_PATH', 'test/test1/index');