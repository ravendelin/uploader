<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'menu.php'; ?>
<script src="/bootstrap/js/lit.js"></script>
<script src='/bootstrap/ckeditor/ckeditor.js'></script>
<script>
    CKEDITOR.replace('pretext');

    CKEDITOR.replace('text');
</script>
<div class="container">
    <form action="" method="post" id="editArticle" enctype="multipart/form-data">
        <div class="row">

            <div class="input-group">

                <input type="text" name="title" class="form-control" placeholder="Название"
                       value="<?php echo $article->title; ?>">
                <span class="input-group-addon"></span>
            </div>

            <div class="horizontalIndent"> <?php if (!empty($articleImages)) {
                    foreach ($articleImages as $imageName) {
                        echo '<img style="max-width:100px;" src="/upload/' . $imageName . '"/> /upload/' . $imageName . '<br/>';
                    }
                }
                ?></div>

            <div class="form-group">
                <label for="sel1">Категория:</label>
                <select class="form-control" id="category" name="category">
                    <?php foreach($categories as $category): ?>

                        <option value="<?php echo $category->getCatid(); ?>"><?php echo $category->getCatname(); ?></option>

                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Текст превью на главной</label><br/>
                <textarea name="pretext" class="ckeditor" rows="5" id="pretext"
                          placeholder="Текст"><?php echo $article->pretext; ?></textarea>
            </div>
            <br/><br/>

            <div class="form-group">
                <label>Полный текст</label><br/>
                <textarea name="text" class="ckeditor" rows="5" id="text"
                          placeholder="Текст"><?php echo $article->text; ?></textarea>
            </div>

            <input type="hidden" name="id" value="<?php echo $article->id; ?>">
            <script>postId = <?php echo $article->id; ?>;</script>
            <a class="btn btn-default btn-lg"
               href="javascript:void(0)" id="updateArticle">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Сохранить изменения</a>

        </div>

    </form>
    <form id="uploadimage" action="" method="post" enctype="multipart/form-data">

        <div id="previewImg"><img id="previewing" src="/bootstrap/noimage.png"/></div>
        <div id="filesize"></div>
        <hr id="line">
        <div id="selectImage">
            <label>Выберите изображения (MAX 10 - 100 KB)</label><br/>
            <input type="file" name="file[]" multiple accept="image/*,image/jpeg" id="file" required/><br/> <input
                type="button" value="Загрузить фото" id="uploadjpg"/>
        </div>
    </form>
    <h4 id='loading'>loading..</h4>

    <div id="error"></div>
    <div id="message"></div>

</div>

<?php include 'footer.php' ?>

</body>
</html>