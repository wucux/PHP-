<?php
/**
 * User: wucux
 * Date: 2017/5/16
 * Time: 18:15
 */

namespace Admin\Controller;


use Admin\Model\AdminModel;
use Admin\Model\ChapterModel;
use Think\Controller;
use Tool\Pagelist;

class ChapterController extends Controller
{
    //显示文章列表
    function chapterList(){
        $chapter =new ChapterModel();
        $category=D('category');
        $sql1="SELECT * FROM wu_category";
        $info2=$category->query($sql1);
        $pre=10;
        if (!empty($_POST["category_id"])&&$_POST["category_id"]!=0){
            $i=$_POST['category_id'];
            $total=$chapter->where("chapter_category=$i")->count();
            $pagelist= new Pagelist($total,$pre);
            $sql2="SELECT * FROM wu_chapter,wu_category WHERE wu_chapter.chapter_category=wu_category.category_id ORDER BY chapter_id DESC ";
            $info3=$chapter->query($sql2);
            foreach ($info3 as $k=>$v){
                if ($info3[$k]['category_id']==$i){
                    $info[$k]=$info3[$k];
                }
            }
        }else{
            $total=$chapter->count();
            $pagelist= new Pagelist($total,$pre);
            $sql2="SELECT * FROM wu_chapter,wu_category WHERE wu_chapter.chapter_category=wu_category.category_id ORDER BY chapter_id DESC ".$pagelist->limit;
            $info=$chapter->query($sql2);
        }
        $fpage=$pagelist->fpage();
        $this->assign("info",$info);
        $this->assign("info2",$info2);
        $this->assign("pagelist",$fpage);
        $this->display();
    }
    //新建文章
    function chapterAdd(){
        $admin=new AdminModel();
        $admininfo=$admin->where("admin_id=1")->find();
        $category=D("category");
        $sql="SELECT * FROM wu_category";
        $info=$category->query($sql);
        $this->assign("info",$info);
        $admin_name=$admininfo['admin_name'] ;
        if(!empty($_POST)){
            $chapter=new ChapterModel();
            $textIntro=$chapter->getIntro($_POST['chapter_text']);
            $_POST['chapter_intro']=$textIntro;
            $_POST['chapter_writer']=$admin_name;
            $_POST['chapter_time']=date("Y-m-d H:i:s");
            $getdate=$chapter->create($_POST);
            $b=$chapter->add($getdate);
            if($b){
                $this->redirect("Chapter/chapterList/",array(),2,"新建文章成功！！！");
            }else{
                $this->redirect("Chapter/chapterAdd/",array(),2,"新建文章失败！！！");
            }
        }
        $this->display();
    }
    //文章修改
    function chapterUpdate(){
       if(isset($_GET['id']))
       {
           $i= $_GET['id'];
            $chapter=new ChapterModel();
            $sql="SELECT * FROM wu_chapter WHERE chapter_id=$i";
            $info=$chapter->query($sql);
            $category=D("category");
            $sql2="SELECT * FROM wu_category";
            $info2=$category->query($sql2);
            if($info){
                $chapter_title=$info['0']['chapter_title'];
                $chapter_category=$info['0']['chapter_category'];
                $chapter_key=$info['0']['chapter_key'];
                $chapter_id=$info['0']['chapter_id'];
                $chapter_text=$info['0']["chapter_text"];
                $this->assign("chapter_title",$chapter_title);
                $this->assign("chapter_category",$chapter_category);
                $this->assign("chapter_key",$chapter_key);
                $this->assign("chapter_id",$chapter_id);
                $this->assign("chapter_text",$chapter_text);
                $this->assign("info2",$info2);
            }
       }else
       {
           if (!empty($_POST))
           {
               //更新数据库
               $admin=new AdminModel();
               $adminInfo=$admin->where("admin_id=1")->find();
               $admin_name=$adminInfo['admin_name'] ;
               if(!empty($_POST))
               {
                   $chapter=new ChapterModel();
                   $id=$_POST['chapter_id'];
                   $textIntro=$chapter->getIntro($_POST['chapter_text']);
                   $_POST['chapter_intro']=$textIntro;
                   $_POST['chapter_writer']=$admin_name;
                   $_POST['chapter_time']=date("Y-m-d H:i:s");
                   $getDate=$chapter->create($_POST);
                   $b=$chapter->where("chapter_id=$id")->save($getDate);
                   if($b){
                       $this->redirect("Chapter/chapterList/",array(),2,"修改文章成功！！！");
                   }else {
                       $this->redirect("Chapter/chapterList/",array(),2,"修改文章失败！！！");
                   }
               }
           }
       }
        $this->display();
    }
    //删除文章
    function chapterDelete(){
        $i=$_GET['id'];
        $chapter=new ChapterModel();
        $sql="DELETE FROM wu_chapter WHERE chapter_id=$i";
        $b=$chapter->execute($sql);
        if($b){
            $this->redirect("Chapter/chapterList/",array(),2,"删除文章成功！！！");
        }else{
            $this->redirect("Chapter/chapterList/",array(),2,"删除文章失败！！！");
        }
    }
    //文章分类管理
    function chapterCategory(){
        $category=D('category');
        $sql1="SELECT * FROM wu_category";
        $info2=$category->query($sql1);
        $total=$category->count();
        $pre=10;
        $pagelist= new Pagelist($total,$pre);
        $fpage=$pagelist->fpage();
        if($_POST){
            if ($_POST['category_id']){
                //修改分类
                $i=$_POST['category_id'];
                $j=$i-1;
                $_POST['category_time']=$info2["$j"]["category_time"];
                $getbase=$category->create($_POST);
                $b=$category->where("category_id=$i")->save($getbase);
                if($b){
                    $this->redirect("Chapter/chapterCategory/",array(),2,"修改分类成功！！！");
                }else{
                    $this->redirect("Chapter/chapterCategory/",array(),2,"修改分类失败！！！");
                }
            }else{
                //新建分类
                $_POST['category_time']=date("Y-m-d H:i:s");
                $getbase=$category->create($_POST);
                $b=$category->add($getbase);
                if($b){
                    $this->redirect("Chapter/chapterCategory/",array(),2,"新建分类成功！！！");
                }else{
                    $this->redirect("Chapter/chapterCategory/",array(),2,"新建分类失败！！！");
                }
            }
        }else{
            if ($_GET['delid']){
                $i=$_GET['delid'];
                $chapter=new ChapterModel();
                $a= $chapter->where("chapter_category=$i")->delete();
                if($a){
                    $b=$category->where("category_id=$i")->delete();
                    if($b){
                        $this->redirect("Chapter/chapterCategory/",array(),2,"删除分类成功！！！");
                    }
                }else{
                    $this->redirect("Chapter/chapterCategory/",array(),2,"删除分类失败！！！");
                }
            }
        }

        $this->assign("info2",$info2);
        $this->assign("pagelist",$fpage);
        $this->display();
    }

}