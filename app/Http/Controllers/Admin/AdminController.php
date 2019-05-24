<?php

namespace App\Http\Controllers\Admin;

use App\Model\RoleModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdminModel;
use App\Model\NavModel;
use App\Model\CateModel;
use App\Model\PowerModel;
use App\Model\RoleUser;
class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function admin(){
        return view('admin.login');
    }
    public function welcome(){
        return view('admin.welcome');
    }
    //管理员添加
    public function adminadd(){
        $list=RoleModel::all()->toArray();
        return view('admin.adminadd',['data'=>$list]);
    }
    //管理员修改
    public function adminUpdate($uid){
        $data=RoleModel::all()->toArray();
        $adminrole=AdminModel::where(['uid'=>$uid])->first();
        $roleInfo=RoleUser::where(['uid'=>$uid])->pluck('role_id')->toarray();
        $info=[
            'data'=>$data,
            'adminrole'=>$adminrole,
            'roleInfo'=>$roleInfo
        ];
        return view('admin.adminupdate',$info);
    }
    //管理员角色展示
    public function userrole($uid){
        $data=RoleModel::all()->toArray();
        $list=RoleUser::where(['uid'=>$uid])->pluck('role_id')->toarray();
        $info=[
            'data'=>$data,
            'adminrole'=>$list,
        ];
        return view('admin.admin_role',$info);
    }
    public function pwdupdate(){
        return view('admin.pwdupdate');
    }
    //展示权限
    public function getSon($data,$pid=0){
        $powerInfo=[];
        foreach($data as $k=>$v){
            if($v['pid']==$pid){
                $son=$this->getSon($data,$v['action_id']);
                $v['son']=$son;
                $powerInfo[]=$v;
            }
        }
        return $powerInfo;
    }
    public function adminrole(){
        $info = PowerModel::all()->toarray();
        $powerInfo=$this->getSon($info);
        $data=[
            'powerInfo'=>$powerInfo
        ];
        return view('admin.roleadd',$data);
    }
    public function rolelist(){
        $roleDate=RoleModel::all()->toArray();
        return view('admin.rolelist',['roleDate'=>$roleDate]);
    }
    public function powerlist(){
        $Info=PowerModel::where(['is_show'=>1])->get()->toArray();
        return view('admin.powerlist',['powerinfo'=>$Info]);
    }
    public function poweradd(){
        $powerInfo=PowerModel::where(['pid'=>0])->get()->toArray();
        return view('admin.poweradd',['powerInfo'=>$powerInfo]);
    }
    //导航栏添加
    public function articleadd(){
        return view('news.articleadd');
    }
    //导航栏展示
    public function articlelist(){
        $navInfo=NavModel::all()->toArray();
        return view('news.articlelist',['navInfo'=>$navInfo]);
    }
    //导航栏修改
    public function articleupdate($nav_id){
        $navInfo=NavModel::where(['nav_id'=>$nav_id])->first();
        return view('news.articleupdate',['navInfo'=>$navInfo]);
    }
    //分类添加
    public function cateadd(){
        return view('cate.cateadd');
    }
    //分类展示
    public function catelist(){
        $cateInfo=CateModel::all()->toArray();
        return view('cate.catelist',['cateInfo'=>$cateInfo]);
    }
    //分类修改
    public function cateupdate($cate_id){
        $cateInfo=CateModel::where(['cate_id'=>$cate_id])->first();
        return view('cate.cateupdate',['cateInfo'=>$cateInfo]);
    }
    //新闻添加
    public function newsadd(){
        return view('news.newsadd');
    }
    //新闻展示
    public function newslist(){
        $cateInfo=CateModel::all()->toArray();
        return view('cate.catelist',['cateInfo'=>$cateInfo]);
    }
    //新闻修改
    public function newsupdate($news_id){
        $cateInfo=CateModel::where(['cate_id'=>$cate_id])->first();
        return view('cate.cateupdate',['cateInfo'=>$cateInfo]);
    }
    public function quit(){
        session()->flush('uname');
        header('refresh:0.2;/adminlogin');
    }
}