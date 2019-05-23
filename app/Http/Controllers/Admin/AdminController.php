<?php

namespace App\Http\Controllers\Admin;

use App\Model\RoleModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdminModel;
use App\Model\NavModel;
use App\Model\CateModel;
use App\Model\PowerModel;
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
    public function adminadd(){
        $list=RoleModel::all()->toArray();
        return view('admin.adminadd',['data'=>$list]);
    }
    public function adminUpdate($uid){
        $data=RoleModel::all()->toArray();
        $adminrole=AdminModel::where(['uid'=>$uid])->first();
        $info=[
            'data'=>$data,
            'adminrole'=>$adminrole
        ];
        return view('admin.adminupdate',$info);
    }
    public function pwdupdate(){
        return view('admin.pwdupdate');
    }
    public function adminrole(){
        return view('admin.roleadd');
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