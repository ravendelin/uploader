                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'menu.php'; ?>

<div class="container">

    <div class="row">
        <div id="message"></div>
        <?php foreach ($categories as $category) : ?>
            <div class="form-inline">
                <form action="" method="post" enctype="multipart/form-data" id="editcategoryform<?php echo $category->getCatid(); ?>">
                <input type="text" name="catposition" class="form-control" placeholder="Поз"
                       size="5"
                       value="<?php echo $category->getCatposition(); ?>"> <input
                    type="text"
                    name="catname"
                    class="form-control"
                    placeholder="Название" value="<?php echo $category->getCatname(); ?>"> <input type="text"
                                                                                              name="alt_name"
                                                                                              class="form-control"
                                                                                              placeholder="Альт название"
                                                                                              value="<?php echo $category->getAltName(); ?>">&nbsp;&nbsp;
                <a class="btn btn-default btn-xs"
                   href="javascript:void(0)" onclick="updatecategory(<?php echo $category->getCatid(); ?>)">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</a> <a
                    class="btn btn-default btn-xs"
                    href="javascript:void(0)" onclick="deletecategory(<?php echo $category->getCatid(); ?>)">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
</form>
            </div>
            <br/>
        <?php endforeach; ?>
        <form action="" method="post" enctype="multipart/form-data" id="categoryform">
            <div id="newcategory"></div>
            <br/>
            <button type="button" class="btn btn-default" id="addnewcat">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-default" id="sendnewcat"><span class="glyphicon glyphicon-save"
                                                                                aria-hidden="true"></span> Создать
            </button>
        </form>
    </div>

</div>