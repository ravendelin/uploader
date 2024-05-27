<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>

<?php include 'menu.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-10 blog-main">
            <div class="blog-post">
            <h3><?php echo $article->title; ?></h3>
            <?php echo $article->text; ?>

        </div>
        </div>
    </div>
    <div id="comments">  <?php include('comments.php'); ?></div>
<div id="message"></div>
    <div class="col-md-8">
        <div class="well">
            <form action="" method="post" enctype="multipart/form-data" id="comment-form">
                <?php echo '<input type="hidden" name = "post_id" value="' . $article->id . '">';?>
                <div class="input-group">
                    <label>Нам важны ваши мысли:</label><br/>
                    <input type="text" name="cname" id="cname" class="form-control" placeholder="Имя" size="15">
                </div>
                <br>
                <div class="form-group">

                    <textarea name="ctext" rows="5" cols="60" id="ctext" placeholder="Текст"></textarea>

                </div>


                <div class="input-group">
                    <div id="captcha-one"><img src="/components/antibot/antibot.php" /><br>
                        <a onclick="reload(); return false;" href="#">обновить, если не виден код</a>
                    </div><br>
                    <input type="text" name="cap" id="cap" class="form-control" placeholder="введите капчу" size="5">

                </div>

                <br>
                <a class="btn btn-default btn-sm"
                   href="#" id="postcomment">
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Добавить</a>
                <Br>

            </form>
            <br/><br/>
</div>
        </div>

</div>

<?php include 'footer.php' ?>
</body>
</html>