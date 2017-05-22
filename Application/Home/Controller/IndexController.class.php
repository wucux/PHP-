<?php
namespace Home\Controller;
use Admin\Model\ChapterModel;
use Admin\Model\VisitmsgModel;
use Think\Controller;
use Tool\Pagelist;

class IndexController extends Controller {
    //主界面
    public function index(){
        $this->selectdb();
        $this->display();
    }

    //列表界面逻辑
    public function showlist(){
        $i=$_GET['id'];
        $j=$i-1;
        $chapterCate= new ChapterModel();
        $visitmsg=new VisitmsgModel();
        $category=D("category");
        //获取分页初始设置
        $sql1="SELECT * FROM wu_chapter WHERE chapter_category=$i ";
        $info=$chapterCate->query($sql1);
        $total=count($info);
        $pre=5;
        //载入分页模型
        $pagelist=new Pagelist($total,$pre);
        //评论列表查询
        $sql3="SELECT * FROM wu_chapter,wu_visitmsg WHERE wu_chapter.chapter_id=wu_visitmsg.visitmsg_from ORDER BY visitmsg_id DESC ".$pagelist->limit;
        $info3=$visitmsg->query($sql3);
        //导航条显示的分类查询
        $sql4="SELECT * FROM wu_category WHERE category_list=1";
        $info4=$category->query($sql4);
        //所有分类查询
        $sql6="SELECT * FROM wu_category ";
        $info6=$category->query($sql6);
        $zhuti=$info6{"$j"}{"category_name"};
       //按类别查询文章
        $sql5="SELECT * FROM wu_chapter WHERE chapter_category=$i ORDER BY chapter_id DESC " .$pagelist->limit;
        $info5=$chapterCate->query($sql5);

        $pagelist2=$pagelist->fpage();
        $this->assign("total",$total);
        $this->assign("info3",$info3);
        $this->assign("info4",$info4);
        $this->assign("info5",$info5);
        $this->assign("info6",$info6);
        $this->assign("pagelist2",$pagelist2);
        $this->assign("zhuti",$zhuti);
        $this->display();
    }

    //阅读界面逻辑
    public function reading(){
        $this->selectdb();
        if(!empty($_GET['id'])){
            $chapter= new ChapterModel();
            $sql5="SELECT * FROM wu_chapter WHERE chapter_id={$_GET['id']}";
            $info5=$chapter->query($sql5);
            $chapter_title=$info5['0']['chapter_title'];
            $chapter_time=$info5['0']['chapter_time'];
            $chapter_writer=$info5['0']['chapter_writer'];
            $chapter_visitmsg=$info5['0']['chapter_visitmsg'];
            $chapter_category=$info5['0']['chapter_category'];
            $chapter_visit=$info5['0']['chapter_visit'];
            $chapter_key=$info5['0']['chapter_key'];
            $chapter_text=$info5['0']["chapter_text"];
            $sql6="SELECT * FROM wu_chapter WHERE chapter_category = {$chapter_category} ORDER BY chapter_id DESC LIMIT 0,5 " ;
            $info6=$chapter->query($sql6);
            $this->assign("chapter_title",$chapter_title);
            $this->assign("chapter_time",$chapter_time);
            $this->assign("chapter_writer",$chapter_writer);
            $this->assign("chapter_visitmsg",$chapter_visitmsg);
            $this->assign("chapter_category",$chapter_category);
            $this->assign("chapter_visit",$chapter_visit);
            $this->assign("chapter_key",$chapter_key);
            $this->assign("chapter_text",$chapter_text);
            $this->assign("info6",$info6);
        }

        $this->display();

    }


    //前台通用数据查询函数
    function selectdb(){
        //实例化数据库模型
        $chapter= new ChapterModel();
        $visitmsg=new VisitmsgModel();
        $category=D("category");
        //获取分页初始设置
        $total=$chapter->count();
        $pre=5;
        //载入分页模型
        $pagelist=new Pagelist($total,$pre);
        //执行查询
        //文章列表查询
        $sql1="SELECT * FROM wu_chapter,wu_category WHERE wu_chapter.chapter_category=wu_category.category_id ORDER BY chapter_id DESC ".$pagelist->limit;
        $info1=$chapter->query($sql1);
        //文章列表分页操作
        $fpage=$pagelist->fpage();
        //推荐文章查询
        $sql2="SELECT * FROM wu_chapter WHERE chapter_hot=1";
        $info2=$chapter->query($sql2);
        //评论列表查询
        $sql3="SELECT * FROM wu_chapter,wu_visitmsg WHERE wu_chapter.chapter_id=wu_visitmsg.visitmsg_from ORDER BY visitmsg_id DESC ".$pagelist->limit;
        $info3=$visitmsg->query($sql3);
        //导航条显示的分类查询
        $sql4="SELECT * FROM wu_category WHERE category_list=1";
        $info4=$category->query($sql4);
        //将信息添加入前台显示
        $this->assign("total",$total);
        $this->assign("info1",$info1);
        $this->assign("info2",$info2);
        $this->assign("info3",$info3);
        $this->assign("info4",$info4);
        $this->assign("pagelist",$fpage);
    }
}