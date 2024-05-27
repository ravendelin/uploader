<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'menu.php'; ?>

<div class="container">
    <div class="row">


        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <div class="signin-form">

                <div class="container">


                    <form class="form-signin" method="post" id="login-form" action="/index.php?action=upload" enctype="multipart/form-data">

                        <h2 class="form-signin-heading">Upload file:</h2>
                        <hr/>

                        <div id="error">
                            <!-- error will be shown here ! -->
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="file" class="form-control" placeholder="Upload" name="uploadform" id="upload"/>
                                <span id="check-e"></span>
                            </div>
                        </div>
                    

                        <div class="form-group">
                             <input type="submit" value="&nbsp; UPLOAD" class="btn btn-default" name="btn-login" id="btn-login">
                         
                        </div>


                    </form>


                </div>

            </div>

        </div>


    </div>


</div>

<?php include 'footer.php' ?>
<script type="application/javascript" src="/bootstrap/js/logincheck.js"></script>
</body>
</html>