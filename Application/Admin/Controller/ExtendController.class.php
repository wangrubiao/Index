<?php
/***
*@ extend Controller
* 生成推广链接
*@ Wangrubiao
*@ 2015
*/
namespace Admin\Controller;
use Think\Controller;
class ExtendController extends Controller {
	/*****
	*生成推广链接
	*/
    public function index(){
		extract(I());
		$res = M('bid_platform');
		$result = $res->where()->select();
		$this->assign('result',$result);
		$this->display('Index/extension');
    }
    /******
    *ajax加载平台资源
    */
    public function handle(){
    	extract(I());
    	$res = M("bid_resources");
    	$where['platform_id']=array('eq',$id);
    	$result = $res->where($where)->select();
    	if(!empty($result)){
    		foreach ($result as $key => $value) {
    			$str.='<input type="radio" value="'.$value['id'].'" name="resources" class="'.$value['rseval'].'"/>'.$value['rsename'];
    		}
    		$this->ajaxReturn($str);
    	}else{
			$this->ajaxReturn("<b>请在后台为该平台添加资源.</b>");
    	}
    }
    /******
    *ajax加载平台资源位置
    */
    public function handleSize(){
    	extract(I());
    	$res = M("bid_ressize");
    	$where['rsenid']=array('eq',$id);
    	$result = $res->where($where)->order('size_val desc')->select();
    	if(!empty($result)){
    		foreach ($result as $key => $value) {
    			$str.='<input type="radio" value="'.$value['id'].'" name="ressize" class="'.$value['size_key'].'"/><b>'.$value['size_val'].'</b>&nbsp;<font color="red">'.$value['describe'].'</font><br>';
    		    $str.='————————————————<br>';
            }
    		$this->ajaxReturn($str);
    	}else{
			$this->ajaxReturn("<b>请在后台为该平台添加资源位置.</b>");
    	}
    }
    /******
    *保存生成广告名称
    */
    public function generate()
    {
        extract(I());
        //判断广告字符格式
        if(!ctype_alnum($rule_name)){
            $data['status']  = 2;
            $this->ajaxReturn($data);
        }
        if(strlen($rule_name)>5){
             $data['status']  = 3;
             $this->ajaxReturn($data);
        }
        $rule = M('bid_rule');
        $val['rule_name']=array('eq',$rule_name);
        $result=$rule->where($val)->select();
        if($result){
            $data['status']  = 1;
            $this->ajaxReturn($data);
        }else{
            //生成成功
            $dataB = array(
                'rule_name' =>$rule_name,
                'size_id' =>$size_id,
                'pubtime'=> time()
                );
            $rule->add($dataB);
            $data['status']  = 0;
            $this->ajaxReturn($data);
        }
        
    }
    /******
    *规则下单次数查询
    */
    public function selectRule()
    {
        extract(I());
        $rule = M('bid_rule');
        $rule_val['rule_name']=array('eq',$ruleName);
        $ruleVal = $rule->where($rule_val)->select();
        if(!$ruleVal){
            $this->ajaxReturn("查询失败，规则名称不存在.");
        }
        $order = M('order');
        $val['position']=array('eq',$ruleName);
        $val['type']=array('neq',0);
        $val['order']=array(array('egt',strtotime($startDate.'00:00:00')),array('elt',strtotime($endDate.'23:59:59')),'and');//等于大于
        $result = $order->fetchSql(false)->where($val)->select();
       // echo $result;
        //p($result);
        $data['content']="期间下单".count($result)."次.";
        $this->ajaxReturn($data['content']);
        
    }
}