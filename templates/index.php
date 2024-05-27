<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'menu.php'; ?>
<div class="container">
    <div class="row">
        <?php foreach ($news as $article): ?>
            <div class="col-sm-10 blog-main">
                <div class="blog-post">

                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) : ?>
                        <div style="float: right"><a class="btn btn-default btn-xs"
                                                     href="/?action=edit&id=<?php echo $article->id; ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>

                            <a class="btn btn-default btn-xs"
                               href="/?action=delete&id=<?php echo $article->id; ?>">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>

                        </div>

                    <?php endif; ?>
                    
                    <h2><a href="/article/<?php $article->id ?>"><?php echo $article->name; ?></a>
                    </h2>
                    <span class="glyphicon glyphicon-list"></span>  <?php echo $article->category_id; ?>
                    <hr>

                    <?php echo $article->name;  ?>
                </div>
                <hr>
            </div>

        <?php endforeach; ?>
    </div>

    <nav aria-label="...">
        <ul class="pager"><?php if ($page - 1 > 0) { ?>
                <li class="previous"><a href="/page/<?php echo $page - 1; ?>"><span
                            aria-hidden="true">&larr;</span> Сюда</a></li>
            <?php } ?>
            <?php if (!empty($news)) : ?>
                <li class="next"><a href="/page/<?php echo $page + 1; ?>">Туда <span
                            aria-hidden="true">&rarr;</span></a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>


<?php include 'footer.php' ?>

</body>
</html>