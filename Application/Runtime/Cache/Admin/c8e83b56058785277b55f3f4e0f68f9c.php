<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="<?php echo (ADMIN_VIEW_PATH); ?>css/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：文章管理-》文章列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="/index.php/Admin/Chapter/Chapteradd">【新建文章】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="/index.php/Admin/Chapter/Chapterlist"method="POST">
                    类别<select name="category_id" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                    <?php if(is_array($info2)): $i = 0; $__LIST__ = $info2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v['category_id']); ?>"><?php echo ($v['category_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%" >
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>文章名称</td>
                        <td>作者</td>
                        <td>关键词</td>
                        <td width="50%">文章摘要</td>
                        <td>文章类别</td>
                        <td>创建时间</td>
                        <td align="center" colspan="2">操作</td>
                    </tr>
                    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr id="product<?php echo ($i); ?>">
                            <td><?php echo ($i); ?></td>
                            <td><a href="/index.php/home/index/reading?id=<?php echo ($v['chapter_id']); ?>" target="_blank"><?php echo ($v["chapter_title"]); ?></a></td>
                            <td><?php echo ($v["chapter_writer"]); ?></td>
                            <td><?php echo ($v["chapter_key"]); ?></td>
                            <td style="text-align: left;" width="50%"><?php echo ($v["chapter_intro"]); ?></td>
                            <td ><?php echo ($v["category_name"]); ?></td>
                            <td><?php echo ($v["chapter_time"]); ?></td>
                            <td><input type="button" value="修改" onclick="update_chapter(<?php echo ($v['chapter_id']); ?>)"></td>
                            <td><input type="button" value="删除" onclick="delete_chapter(<?php echo ($v['chapter_id']); ?>)"></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($pagelist); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <script type="text/javascript">
        function update_chapter(a) {
            window.location.href="/index.php/Admin/Chapter/Chapterupdate?id="+a;
        }
        function delete_chapter(b) {
           if(confirm("你确认要删除此文章吗？")){
               window.location.href="http://wblog.com/index.php/Admin/Chapter/Chapterdelete?id="+b;
           }
        }
    </script>
    </body>
</html>