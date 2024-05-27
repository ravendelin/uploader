<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'menu.php'; ?>

<script src='/bootstrap/ckeditor/ckeditor.js'></script>
<script>
    CKEDITOR.replace( 'pretext' );

    CKEDITOR.replace( 'text' );
</script>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">

            <div class="input-group">

                <input type="text" name="title" class="form-control" placeholder="Название">
                <span class="input-group-addon"></span>
            </div>
            <div class="horizontalIndent"></div>
            <div class="form-group">
                <label for="sel1">Категория:</label>
                <select class="form-control" id="category" name="category">
              <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->getCatid(); ?>"><?php echo $category->getCatname(); ?></option>

                    <?php endforeach; ?>
                </select>
            </div>

            <div class="horizontalIndent"></div>
            <br/>
            <div class="form-group">
                <label>Текст превью на главной</label><br/>
                <textarea name="pretext" class="ckeditor" rows="5" id="pretext" placeholder="Текст"></textarea>
            </div>
            <br/><br/>

            <div class="form-group">
                <label>Полный текст</label><br/>
                <textarea name="text" class="ckeditor" rows="5" id="text" placeholder="Текст"></textarea>
            </div>




            <div class="form-group">

                <input type="submit" value="Запостить">
            </div>
        </div>

    </form>
    <form id="uploadimage" action="" method="post" enctype="multipart/form-data">

        <div id="previewImg"><img id="previewing" src="/bootstrap/noimage.png" /></div><div id="filesize"></div>
        <hr id="line">
        <div id="selectImage">
            <label>Выберите изображения (MAX 10 - 100 KB)</label><br/>
            <input type="file" name="file[]" multiple accept="image/*,image/jpeg" id="file" required /><br/>  <input type="button" value="Загрузить фото" id="uploadjpg" />
        </div>
    </form>
    <h4 id='loading'>loading..</h4>
    <div id="error"></div>
    <div id="message"></div>

</div>

<?php include 'footer.php' ?>

</body>
</html>