<?php

namespace Admin\Model;
use Think\Model;

class ChapterModel extends Model
{
    public $chapterStr;
    //生成摘要函数
    public  function getIntro($chapterStr){
        $this->chapterStr=$chapterStr;
        if (!empty($chapterStr)){
            if (strlen($this->chapterStr)>800){
                $str1=strip_tags($this->chapterStr);
                $str2=substr($str1,0,800);
                $site=strripos($str2,"。");
                $this->chapterStr=substr($str2,0,$site-3)."...";
            }
        }
            return $this->chapterStr;
    }
}