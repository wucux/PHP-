<?php
$mysql=new mysqli("localhost","root","root");
$sql="use wu_blog";
$mysql->query($sql);
$sql="select * from wu_chapter,wu_category WHERE wu_chapter.chapter_category=wu_category.category_id";
$res=$mysql->query($sql);
while ($row=$res->fetch_assoc()){
    echo "<pre>";
    print_r( $row);
    echo "</pre>";
}