<div class="container">
    <br/>
    <h1 class="glyphicon glyphicon-phone">SMARTBLOG</h1>

    <div class="row">
        <div class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Главная</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Test menu <b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">выпад 1</a></li>
                                <li><a href="#">выпад 2</a></li>
                                <li><a href="#">выпад 3</a></li>
                                <li><a href="#">выпад 4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Punkt 2</a></li>
                        <li><a href="#">Punkt 3</a></li>
                        <li><a href="#">Punkt 4</a></li>
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) { ?>
                        <li><a href="/?action=new">Cоздать страницу</a></li>
                            <li><a href="/?action=newcategory">Новая категория</a></li>
                        <li><a href="/?action=admin&section=exit">Выход</a></li>
                        <?php } else { ?>
                            <li><a href="/?action=login">Логин</a></li>
                    <?php } ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>