<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
      <?php if(isset($article)) {
    echo $article->title.' - блог о технике';
}
      if(isset($news)) {
          echo 'интересный блог о технике';
      }
        ?>
    </title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/bootstrap/blog.css" rel="stylesheet">
    <link href="/bootstrap/main.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <style>
        .leftClass {
            float: left; /* Обтекание по правому краю */
            border: 1px solid black; /* Параметры рамки */
            padding: 10px; /* Поля вокруг текста */
            margin-right: 20px; /* Отступ справа */

             /* Ширина блока */


        }
        .leftClass img {
            max-width: 250px;
        }

        .thumb img {
            clear: both;
            max-width: 300px;
            padding: 20px;
            text-align: center;
        }
        </style>
   
</head>