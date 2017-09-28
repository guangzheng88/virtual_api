<?php
/**
 * 公共方法
 * @author renguangzheng
 * @date 2017-09-22
 */
/**
 * 浏览器友好的变量输出
 * @param mixed $var 变量
 * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
 * @param string $label 标签 默认为空
 * @param boolean $strict 是否严谨 默认为true
 * @return void|string
 */
function dump($var, $echo=true, $label=null, $strict=true) {
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
        $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
    }
    if ($echo) {
        echo($output);
        return null;
    }else
        return $output;
}
/**
 * 根据不同的断言调用不同的方法
 */
function getResponse($assert = 0)
{
    $ci = &get_instance();
    switch ($assert) {
            case 1:
            if(method_exists($ci,'giveData1')){
                $ci->giveData1();
            }else{
                Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
            }
                break;
            case 2:
                if(method_exists($ci,'giveData2')){
                    $ci->giveData2();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 3:
                if(method_exists($ci,'giveData3')){
                    $ci->giveData3();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 4:
                if(method_exists($ci,'giveData4')){
                    $ci->giveData4();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 5:
                if(method_exists($ci,'giveData5')){
                    $ci->giveData5();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 6:
                if(method_exists($ci,'giveData6')){
                    $ci->giveData6();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 7:
                if(method_exists($ci,'giveData7')){
                    $ci->giveData7();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 8:
                if(method_exists($ci,'giveData8')){
                    $ci->giveData8();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 9:
                if(method_exists($ci,'giveData9')){
                    $ci->giveData9();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 10:
                if(method_exists($ci,'giveData10')){
                    $ci->giveData10();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 11:
                if(method_exists($ci,'giveData11')){
                    $ci->giveData11();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 12:
                if(method_exists($ci,'giveData12')){
                    $ci->giveData12();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 13:
                if(method_exists($ci,'giveData13')){
                    $ci->giveData13();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 14:
                if(method_exists($ci,'giveData14')){
                    $ci->giveData14();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 15:
                if(method_exists($ci,'giveData15')){
                    $ci->giveData15();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 16:
                if(method_exists($ci,'giveData16')){
                    $ci->giveData16();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 17:
                if(method_exists($ci,'giveData17')){
                    $ci->giveData17();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 18:
                if(method_exists($ci,'giveData18')){
                    $ci->giveData18();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 19:
                if(method_exists($ci,'giveData19')){
                    $ci->giveData19();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            case 20:
                if(method_exists($ci,'giveData20')){
                    $ci->giveData20();
                }else{
                    Util::errorMsg('断言'.$assert.'的方法未定义，请确认',404,404);
                }
                break;
            default:
                Util::errorMsg('参数错误');
                break;
        }
}
/**
 * 递归创建
 */
function mkDirs($dir){
    if(!is_dir($dir)){
        if(!mkDirs(dirname($dir))){
            return false;
        }
        if(!mkdir($dir,0555)){
            return false;
        }
        chmod($dir,0777);
    }
    return true;
}