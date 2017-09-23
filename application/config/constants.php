<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 系统常量配置
 * @author guangzhengren@sina.com
 * @date 2017-09-22
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

//BLL请求地址，开发前期阶段为虚拟BLL地址，待前端页面开发完毕后修改为真正的BLL地址
define('BLL_HOST', 'http://192.168.9.141:8007/index.php/');

//加载路径常量配置
if(file_exists(APPPATH.'config/api_path.php')) require_once(APPPATH.'config/api_path.php');