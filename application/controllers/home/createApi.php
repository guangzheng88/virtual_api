<?php
/**
 * 生成文档注释并且自动创建代码模板
 */
class CreateApi extends BLL_Controller
{
    private $api_url;//接口路径数组
    private $dir;//文件绝对地址
    private $params;//参数
    private $content;//文档注释
    /**
     * 填写注释页面
     */
    public function index_get()
    {
        $this->load->view('home/index.html');
    }
    /**
     * 处理页面提交并且生成文件模板
     */
    public function submit_post()
    {
        //接收参数
        $this->params = $_POST;
        foreach ($this->params as $key=>$val)
        {
            if(is_array($val)){
                foreach($val as $k=>$v){
                    $this->params[$key][$k] = trim($v);
                }
            }else{
                $this->params[$key] = trim($val);
            }
        }
        //接口名称
        if(empty($this->params['api_url'])) Util::errorMsg('接口地址参数错误');
        //创建接口目录
        $mkdir = $this->mkDirs($this->params['api_url']);
        if(!$mkdir) Util::errorMsg('权限不足',2,2);
        //拼接内容
        $this->joinContent();
        echo '<textarea style="width:100%;height:600px;">';
        echo $this->content;
        echo '</textarea>';
        //是否生成接口文件
        if($this->params['isFile'] == '1') $this->checkApi();
    }
    /**
     * 递归创建controllers下的目录
     */
    private function mkDirs($dir)
    {
        if(empty($dir)) Util::errorMsg('路径错误');
        //以/拆分成数组
        $controArr = explode('/',$dir);
        if(!is_array($controArr) || count($controArr) < 3) Util::errorMsg('接口格式必须为：模块/控制器/方法');
        foreach($controArr as $key=>$val)
        {
            $controArr[$key] = lcfirst($val);
        }
        $this->api_url = $controArr;
        if($this->params['isFile'] == '1') {
            $dir = dirname(dirname(__FILE__)).'/'.$controArr[0];
            $this->dir = $dir;
        }else{
            return true;
        }
        return mkDirs($dir);
    }
    /**
     * 拼接注释内容
     */
    private function joinContent()
    {
        $text = '';
        $text .= "    /**\n";
        $text .= "     * @author ".$this->params['author']." ".date('Y-m-d H:i:s')."\n";
        $text .= "     * @api {".$this->params['api_method']."} ".$this->params['api_url']." ".$this->params['api_title']."\n";
        $text .= "     * @apiDescription ".$this->params['apiDescription']."\n";
        $text .= "     * @apiGroup ".$this->params['apiGroup']."\n";
        //将斜杠转换成下划线
        $apiName = str_replace('/', '_', $this->params['api_url']).'_'.$this->params['api_method'];
        $text .= "     * @apiName ".$apiName."\n";
        //请求参数
        if(is_array($this->params['key']))
        {
            foreach ($this->params['key'] as $k => $v)
            {
                if ($v == '') continue;
                $paramType = 'paramType'.$k;
                $text .= "     * @apiParam {".$this->params[$paramType]."} ".$v." ".$this->params['value'][$k]."\n";
            }
        }
        //数组请求参数
        if($this->params['arrKey'] != '')
        {
            $dataParams = '';
            $dataParams .= ' {<br>'."\n";
            //遍历数组子参数
            foreach ($this->params['arrParamKey'] as $key=>$val)
            {
                if($val != '')
                {
                    if(($key+1) != count($this->params['arrParamKey']))
                    {
                        $dataParams .= '     * "'.$val.'" : "'.$this->params['arrParamValue'][$key].'",<br>'."\n";
                    }else
                    {
                        $dataParams .= '     * "'.$val.'" : "'.$this->params['arrParamValue'][$key].'"<br>'."\n";
                    }
                }
            }
            $dataParams .= '     * }'."\n";
            $text .= "     * @apiParam {Array} ".$this->params['arrKey']."\n";
            $text .= '     * '.$dataParams;
        }
        //成功返回值
        foreach ($this->params['succeskey'] as $k => $v)
        {
            if ($v == '') continue;
            $paramType = 'successParamType'.$k;
            $text .= "     * @apiSuccess {".$this->params[$paramType]."} ".$v." ".$this->params['succesvalue'][$k]."\n";
        }
        //成功示例
        $text .= "     * @apiSuccessExample {Json} 成功的响应:\n";
        //将换行符拆分成数组
        $array = explode("\n",$this->params['apiSuccessExample']);
        //每一行都补一个*
        foreach($array as $key=>$val)
        {
            $val = trim($val);
            if($key == 0 || ($key+1) == count($array)) {
                $text .= "     * ".$val."\n";
            }else{
                $text .= "     *      ".$val."\n";
            }
        }
        //失败返回参数
        foreach ($this->params['errorkey'] as $key=>$val)
        {
            if ($val == '') continue;
            $paramType = 'errorParamType'.$key;
            $text .= "     * @apiError (Error  200) {".$this->params[$paramType]."} ".$val." ".$this->params['errorvalue'][$key]."\n";
        }
        //失败响应
        $text .= "     * @apiErrorExample {Json} 失败的响应，例如:\n";
        $text .= "     * HTTP/1.1 200 OK\n";
         //将换行符拆分成数组
        $array = explode("\n",$this->params['apiErrorExample']);
        //每一行都补一个*
        foreach($array as $key=>$val)
        {
            $val = trim($val);
            if($key == 0 || ($key+1) == count($array)) {
                $text .= "     * ".$val."\n";
            }else{
                $text .= "     *      ".$val."\n";
            }
        }
        $text .= "     */";
        $this->content = $text;
    }
    /**
     * 验证接口是否存在，不存在则创建
     */
    private function checkApi()
    {
        //取出文件名
        $filename = $this->dir.'/'.$this->api_url[1].'.php';
        if(!file_exists($filename))
        {
            //新建文件
            $content = $this->joinApiContent();
            $myfile = fopen($filename,"w") or die("权限不足");
            fwrite($myfile,$content);
            fclose($myfile);
            chmod($filename,0666);
            // echo '<textarea style="width:100%;height:600px;">';
            // echo $content;
            // echo '</textarea>';
        }else
        {
            echo '<script>alert("接口文件已存在，若要覆盖请先删除【'.$filename.'】");</script>';
        }
    }
    /**
     * 拼接接口文件内容
     */
    private function joinApiContent()
    {
        $text = '';
        $text .= "<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n";
        $text .= "/**\n";
        $text .= " * ".$this->params['api_title']."\n";
        $text .= " * @author ".$this->params['author']."\n";
        $text .= " * @date ".date('Y-m-d H:i:s')."\n";
        $text .= " */\n";
        $text .= "class ".ucfirst($this->api_url[1])." extends BLL_Controller\n";
        $text .= "{\n";
        $text .= "    private \$assert;//断言，根据断言返回不同的预期值\n";
        $text .= "    public function __construct()\n";
        $text .= "    {\n";
        $text .= "        parent::__construct();\n";
        $text .= "        \$this->assert = isset(\$_REQUEST['assert']) ? intval(\$_REQUEST['assert']) : 0;\n";
        $text .= "    }\n";
        $text .= $this->content."\n";
        $text .= "    public function ".$this->api_url[2]."_".$this->params['api_method']."()\n";
        $text .= "    {\n";
        $text .= "        getResponse(\$this->assert);\n";
        $text .= "    }\n";
        $text .= "    /**\n";
        $text .= "     * 模拟正常返回\n";
        $text .= "     */\n";
        $text .= "    public function giveData1()\n";
        $text .= "    {\n";
        $text .= "        \$response['state'] = 1;\n";
        $text .= "        \$response['status'] = 1;\n";
        $text .= "        \$this->response(\$response);\n";
        $text .= "    }\n";
        $text .= "    /**\n";
        $text .= "     * 模拟失败返回\n";
        $text .= "     */\n";
        $text .= "    public function giveData2()\n";
        $text .= "    {\n";
        $text .= "        Util::errorMsg('操作失败',2,3);\n";
        $text .= "    }\n";
        $text .= "}\n";
        return $text;
    }
}