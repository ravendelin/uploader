<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3 class="page-header">Комментарии</h3>
            <div id="message"></div>
            <section class="comment-list">
                <!-- First Comment -->
             <?php foreach($comments as $comment) : ?>
                <article class="row">

                    <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body"><div align="right"><a class="btn btn-default btn-xs"
                                                       href="javascript:void(0)" onclick="deletecomment('<?php echo $comment->getCid(); ?>')">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></div>
                                <header class="text-left">
                                    <div class="comment-user"><i class="fa fa-user"><?php echo $comment->getCname(); ?></i></div>

                                    <time class="comment-date" ><i class="fa fa-clock-o"></i><?php echo $comment->getCdate();  ?></time>
                                </header>
                                <div class="comment-post">
                                    <p>
                                        <?php echo $comment->getCtext(); ?>
                                         </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
                </section>
            </div>
        </div>
    </div>