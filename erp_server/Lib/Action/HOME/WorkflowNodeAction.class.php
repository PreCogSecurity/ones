<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WorkflowNodeAction
 *
 * @author 志鹏
 */

class WorkflowNodeAction extends CommonAction {
    
    private $theTypes = array(
        "1" => "人为决策",
        "2" => "自动处理",
        "3" => "等待外部相应",
        "4" => "分支",
        "5" => "汇合",
        "6" => "结束节点",
        "7" => "条件判断"
    );
    
    protected function pretreatment() {
        if(IS_POST and $_POST["pid"]) {
            $_POST["workflow_id"] = $_POST["pid"];
            unset($_POST["pid"]);
        }
    }
    
    protected function _filter(&$map) {
        if($_GET["workflow_id"]) {
            $map["workflow_id"] = abs(intval($_GET["workflow_id"]));
        }
        if($_GET["workflow_alias"]) {
            $model = D("Workflow");
            $workflow = $model->getByAlias($_GET["workflow_alias"]);
            $map["workflow_id"] = $workflow["id"];
        }
    }
    
    protected function _order(&$order) {
        $order="listorder ASC, id ASC";
    }
    
//    public function index() {
//        $workflow_id = abs(intval($_GET["workflow_id"]));
//        if(!$workflow_id) {
//            $this->redirect("/HOME/Workflow");
//        }
//        $workflow = D("Workflow");
//        $theWorkflow = $workflow->find($workflow_id);
//        if(!$theWorkflow) {
//            $this->redirect("/HOME/Workflow");
//        }
//        $this->assign("theWorkflow", $theWorkflow);
//        $_REQUEST["order"] = "listorder";
//        $_REQUEST["sort"] = "ASC";
//        parent::index();
//    }
//    
//    public function _before_edit() {
//        $this->assign("theTypes", $this->theTypes);
//    }
//    
//    public function add() {
//        $this->assign("theTypes", $this->theTypes);
//        $workflow_id = abs(intval($_GET["workflow_id"]));
//        if(!$workflow_id) {
//            $this->redirect("/HOME/Workflow");
//        }
//        $workflow = D("Workflow");
//        $theWorkflow = $workflow->find($workflow_id);
//        $this->assign("theWorkflow", $theWorkflow);
//        
//        parent::add();
//    }
//    
//    public function setPermission() {
//        $id = abs(intval($_GET["id"]));
//        $nodeModel = D("WorkflowNode");
//        $theNode = $nodeModel->find($id);
//        
//        if(IS_POST){
//            foreach($_POST as $k=>$v) {
//                $rules[] = sprintf("%s:%s", $k, implode(",", $v));
//            }
//            $nodeModel->where("id=".$id)->save(array(
//                "executor" => implode("|", $rules)
//            ));
//            
//            $this->redirect("/HOME/WorkflowNode/index/workflow_id/".$theNode["workflow_id"]);
//            return;
//        }
//        
//        /** 用户组 */
//        $tmp = D("AuthGroup")->select();
//        foreach($tmp as $k=>$t) {
//            $theGroups[$t["id"]] = $t["title"];
//        }
//        /** 部门 */
//        $tmp = D("Department")->getTree();
//        foreach($tmp as $k=>$t) {
//            $theDepts[$t["id"]] = $t["prefix"].$t["name"];
//        }
//        /** 用户 */
//        $tmp = D("User")->select();
//        foreach($tmp as $k=>$t) {
//            $theUsers[$t["id"]] = $t["truename"];
//        }
//        
//        $rules = explode("|", $theNode["executor"]);
//        
//        foreach($rules as $item) {
//            list($k, $rule) = explode(":", $item);
//            $rule = explode(",", $rule);
//            switch($k) {
//                case "g":
//                    $selectedGroups = $rule;
//                    break;
//                case "d":
//                    $selectedDepts = $rule;
//                    break;
//                case "u":
//                    $selectedUsers = $rule;
//                    break;
//            }
//        }
//        
//        $this->assign("theNode", $theNode);
//        $this->assign("theGroups", $theGroups);
//        $this->assign("theDepts", $theDepts);
//        $this->assign("theUsers", $theUsers);
//        
//        $this->assign("selectedGroups", $selectedGroups);
//        $this->assign("selectedDepts", $selectedDepts);
//        $this->assign("selectedUsers", $selectedUsers);
//        
//        $this->display();
//        
//    }
    
}

?>