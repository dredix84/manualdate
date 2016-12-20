<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>

        <!-- Bootstrap core CSS -->
        <link href="<?= WEBROOT ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= WEBROOT ?>css/jquery-ui.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="<?= WEBROOT ?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?= WEBROOT ?>css/blog.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="<?= WEBROOT ?>js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="<?= WEBROOT ?>js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
        var WEBROOT = '<?= WEBROOT ?>';
        </script>
    </head>

    <body>

        <div class="blog-masthead">
            <div class="container">
                <nav class="blog-nav">
                    <a class="blog-nav-item active" href="#">Home</a>
                </nav>
            </div>
        </div>

        <div class="container">
            <?= $this->Flash->render() ?>
            
            <?= $this->fetch('content') ?>


        </div><!-- /.container -->

        <footer class="blog-footer">
            <p>Manual date difference calculator by <a href="http://resume.dredix.net" target="_blank">Andre Dixon </a> (<a href="https://twitter.com/dredix84" target="_blank">@dredix84</a>).</p>
            <p>
                <a href="#">Back to top</a>
            </p>
        </footer>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
        <script src="<?= WEBROOT ?>js/jquery.js"></script>
        <script src="<?= WEBROOT ?>js/jquery-ui.js"></script>
        <script>window.jQuery || document.write('<script src="<?= WEBROOT ?>js/vendor/jquery.min.js"><\/script>')</script>
        <script src="<?= WEBROOT ?>js/bootstrap.min.js"></script>
        <script src="<?= WEBROOT ?>js/calc_index.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?= WEBROOT ?>js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

