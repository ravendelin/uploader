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


                    <form class="form-signin" enctype="multipart/form-data" method="post" id="uploadform" name="uploadform" action="/index.php?action=autorization" >

                        <h2 class="form-signin-heading">Log In</h2>
                        <hr/>

                        <div id="error">
                            <!-- error will be shown here ! -->
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Login" name="login" id="login"/>
                                <span id="check-e"></span>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                       id="password"/>
                            </div>
                        </div>

                        <div class="form-group">
                             <input type="submit" value="&nbsp; Sign In" class="btn btn-default" name="btn-login" id="btn-login">
                         
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