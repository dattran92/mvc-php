<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo $data['title'] != null ? $data['title'] : 'Admin Home Page'; ?></title>
        <!-- Bootstrap -->
        <link href="static/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="static/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="static/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="static/tageditor/jquery.tag-editor.css">
        <link href="static/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="static/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php">Admin Panel</a>
                    <div class="nav-collapse collapse">
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="content">   
                    <?php main_content(); ?>
                </div>
            </div>
            <hr>
            <footer>
                <p>Copyright &copy; CloudOne 2015</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="static/vendors/jquery-1.9.1.min.js"></script>
        <script src="static/bootstrap/js/bootstrap.min.js"></script>
        
        <script src="static/tinymce/tinymce.min.js"></script>
        <script src="static/tageditor/jquery.tag-editor.js"></script>
        <script src="static/ace/ace.js"></script>
        <script src="static/assets/scripts.js"></script>
        
        <?php foreach($scripts as $script) : ?>
        <script src="<?=$script?>"></script>
        <?php endforeach; ?>
        
        <?php foreach($inline_scripts as $script) : ?>
        <?=$script?>
        <?php endforeach; ?>
    </body>

</html>