<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 模拟添加用户接口
 * @author guangzhengren@sina.com
 * @date 2017-09-22 15:30:09
 */
class Test1 extends BLL_Controller
{
    private $assert;//断言，根据断言返回不同的预期值
    public function __construct()
    {
        parent::__construct();
        $this->assert = isset($_REQUEST['assert']) ? intval($_REQUEST['assert']) : 0;
    }
    /**
     * 添加用户接口
     */
    public function index_post()
    {
        /* 根据不同的断言调用相对应的giveData方法，
         * 断言为1,调用giveData1；为2,调用giveData2()...
         * 前提是你必须定义相对应的giveData方法
         * 目前最多支持20种返回
         */
        getResponse($this->assert);
    }
    /**
     * 用户已存在
     */
    public function giveData1(){
        Util::errorMsg('用户已存在',2,3);
    }
    /**
     * 手机号码已存在
     */
    public function giveData2() {
        Util::errorMsg('手机号码已存在',2,4);
    }
    /**
     * 添加失败
     */
    public function giveData3() {
        Util::errorMsg('添加失败',2,5);
    }
    /**
     * 添加成功
     */
    public function giveData4() {
        $response['state'] = 1;
        $response['status'] = 1;
        $response['message'] = '添加成功';
        $response['primaryKey'] = 10;
        //调用rest_client返回
       $this->response($response);
    }

    /*
    -----------------------------------------------------------------
    | 访问:http://192.168.9.141:8003/index.php/home/handApi 生成接口文档
    | 将接口文档放到你认为合适的地方
    | 一般是放在方法体之上
    | 使用apidoc -c apidoc.json 生成接口文档网页版
    -----------------------------------------------------------------
    */
/**
 * @api {post} test/test1/index 添加用户接口
 * @apiDescription 添加用户,完成...,并...,最后...
 * @apiGroup test
 * @apiName test_test1_index_post
 * @apiParam {String} username 用户名
 * @apiParam {String} password 密码
 * @apiParam {String} [phone] 手机号
 * @apiParam {Integer} [assert=0] 断言，根据断言返回不同的预期值，真实接口不需要
 * @apiSuccess {Integer} status 接口是否调用成功的标识,1为成功
 * @apiSuccess {Integer} state 业务处理结果,1为成功
 * @apiSuccess {Integer} primaryKey 自增ID
 * @apiSuccessExample {Object} 成功的响应:
 * {
 *   "state": 1,
 *   "status": 1,
 *   "message": "添加成功",//提示元
 *   "primaryKey": 10 //用户添加成功后的主键
 * }
 * @apiError (Error  200) {Integer} status 不等于1,表示接口调用失败
 * @apiError (Error  200) {Integer} state 不等于1,表示业务结果处理失败
 * @apiError (Error  200) {Integer} state-0 参数错误
 * @apiError (Error  200) {Integer} state-3 用户已存在
 * @apiError (Error  200) {Integer} state-4 手机号码已存在
 * @apiError (Error  200) {Integer} state-5 添加失败
 * @apiErrorExample {Object} 失败的响应，例如:
 * HTTP/1.1 200 OK
object(stdClass)#1 (3) {
    ["status"]=> int(0)
    ["state"]=> int(0)
    ["error"]=> "参数错误"
}
 */
}