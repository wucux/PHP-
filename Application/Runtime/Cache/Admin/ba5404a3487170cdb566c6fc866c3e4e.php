<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>类别管理</title>

        <link href="<?php echo (ADMIN_VIEW_PATH); ?>css/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color {background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：文章管理-》类别管理</span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                分类列表：
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%" >
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>类别名称</td>
                        <td>导航栏</td>
                        <td>创建时间</td>
                        <td align="center" >操作</td>
                    </tr>
                    <?php if(is_array($info2)): $i = 0; $__LIST__ = $info2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr id="product<?php echo ($i); ?>">
                            <td><?php echo ($i); ?></td>
                            <td><a href="/index.php/home/index/showlist?id=<?php echo ($v['category_id']); ?>" target="_blank"><?php echo ($v["category_name"]); ?></a></td>
                            <td ><?php echo ($v["category_list"]); ?></td>
                            <td><?php echo ($v["category_time"]); ?></td>
                            <td><input type="button" value="删除" onclick="delete_category(<?php echo ($v['category_id']); ?>)"></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: right;" class="div_search">
                            <?php echo ($pagelist); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="div_head" style="margin-bottom:50px">
            新建分类
            <form action="/index.php/Admin/Chapter/chapterCategory" method="post" style="margin-top: 10px">
                <table  width="40%" style="margin: auto">
                    <tr  >
                        <td >分类名</td>
                        <td><input type="text" name="category_name"></td>
                        <td>添加至导航栏</td>
                        <td><select name="category_list">
                            <option id="0">不添加</option>
                            <option id="1">添加</option>
                        </select></td>
                        <td ><input type="submit" value="确定"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="div_head" style="margin-bottom:50px">
            修改分类
            <form action="/index.php/Admin/Chapter/chapterCategory" method="post" style="margin-top: 10px">
                <table  width="40%" style="margin: auto">
                    <tr >
                        <td><select name="category_id">
                            <option value="0">选择修改分类</option>
                            <?php if(is_array($info2)): $i = 0; $__LIST__ = $info2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v['category_id']); ?>"><?php echo ($v['category_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select></td>
                        <td >新分类名</td>
                        <td><input type="text" name="category_name"></td>
                        <td>添加至导航栏</td>
                        <td><select name="category_list">
                            <option value="0">不添加</option>
                            <option value="1">添加</option>
                        </select></td>
                        <td ><input type="submit" value="确定"></td>
                    </tr>
                </table>
            </form>
        </div>
    <script type="text/javascript">
        function delete_category(a) {
           if(confirm("你确认要删除此类别吗？此类别下的文章也会被删除。")){
               window.location.href="http://wblog.com/index.php/Admin/Chapter/ChapterCategory?delid="+a;
           }
        }
    </script>
    </body>
</html>