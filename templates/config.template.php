<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'menu.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-10 blog-main">
            <div class="blog-post">
                <div id="configanswer"></div>
                <form action="" method="post" enctype="multipart/form-data" id="config-form">
                    <div class="form-group">
                        <label for="base">База данных:</label>
                        <input type="text" name="base" class="form-control" id="base" placeholder="имя базы данных">

                        <label for="loginbase">Логин базы:</label>
                        <input type="text" name="loginbase" class="form-control" id="loginbase" placeholder="логин базы - обычно root">

                        <label for="passbase">Пароль базы:</label>
                        <input type="text" name="passbase" class="form-control" id="passbase" placeholder="пароль от базы">


                        <label for="pwd">Пароль блога:</label>
                        <input type="password" name="pwd" class="form-control" id="pwd" size="15" placeholder="главный пароль админа блога">
                         <label for="pwd">News on page:</label>
                        <input type="password" name="newscount" class="form-control" id="news-count" size="15" placeholder="Count of new per page, for pagination">
                    </div>

                    <input type="button" class="btn btn-default" id="sendconfig" value="СОХРАНИТЬ">
                </form>

            </div>
        </div>
    </div>


</div>

<?php include 'footer.php' ?>
</body>
</html>