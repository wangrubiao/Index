<?php

// +----------------------------------------------------------------------
// | W+ [ Not the same fireworks ]
// +----------------------------------------------------------------------
// | Describe: 会员Api
// +----------------------------------------------------------------------
// | Time: 2016/11/15
// +----------------------------------------------------------------------
// | Author: 64941334@qq.com
// +----------------------------------------------------------------------

namespace Api\Controller;
use Think\Controller;
class UserController extends Controller {
    /**
     * 定时脚本
     * 每天更新计划状态 统计金额
     */
    public function timing(){

        $filename = 'log.txt';
        $word = "写入成功.时间是：".date('Y-m-d H:i:s')."\r\n";  //双引号会换行 单引号不换行
        file_put_contents($filename, $word,FILE_APPEND);
        exit;
        $where['status'] = array('in','0,1');
        $where['signtime'] = array('LT',strtotime(date('Y-m-d'))); //LT表达式小于
        $data['status'] = 3;
        $result = M('zmx_plan')
            // ->fetchSql(true)
            ->where($where)
            ->save($data);
        p($result);

        //把失效的
    }

}
