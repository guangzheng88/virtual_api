<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 公共工具类
 */
class Util
{
    /**
     * 返回错误提示
     *
     * @param string - $msg error message
     * @param intval - $status 错误状态：0：错误 1:成功 2：无数据 3：字段重复
     * @param intval - $state  单元测试错误标识 1 : 操作成功
     * @return json - response string
     */
    public static function errorMsg($msg, $status=0, $state=0)
    {
        $errorMsg = $msg;
        get_instance()->response(array('status'=>$status, 'error'=>$errorMsg,'state'=>$state), 200);
    }
}