<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./static/bt3/css/bootstrap.min.css">
    <style>
        body{
            background: #eee;
        }
    </style>
</head>
<body>
<div class="jumbotron" style="text-align: center">
    <h1>Hello, lumiya! (:</h1>
    <p>
        欢迎使用全球最强大的框架：


         ... ...
    </p>
    <p><a class="btn btn-primary btn-lg" href="http://nickblog.cn" role="button">lumiya</a></p>
</div>
<div class="container">
    <a href="?s=home/entry/add" class="btn btn-info">添加</a>
    <br>
    <br>
    <table border="1" class="table table-hover">
        <tr>
            <td>aid</td>
            <td>标题</td>
            <td>操作</td>
        </tr>
		<?php foreach($data as $v): ?>
            <tr>
                <td><?php echo $v['aid'] ?></td>
                <td><?php echo $v['title'] ?></td>
                <td>
                    <a href="">编辑</a>
                    <a href="javascript:if(confirm('Are you sure?')) location.href='?s=home/entry/remove&aid=<?php echo $v['aid'] ?>';">删除</a>
                </td>
            </tr>
		<?php endforeach ?>
    </table>
</div>

</body>
</html>