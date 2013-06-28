<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>TV Shows</title>
  <meta name="description" content="Fabriquant et importateur de lunettes solaires de qualité">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="/css/main.css">
  
  <!-- Responsive Bootstrap: insert after main CSS -->
  <link rel="stylesheet" href="/bootstrap/css/bootstrap-responsive.min.css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
  <script>Modernizr || document.write('<script src="js/vendor/modernizr-2.6.2.min.js"><\/script>')</script>
</head>
<body>
  <!--[if lt IE 7]>
      <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
  <![endif]-->

  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="/">TV Shows</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="#about" data-toggle="modal">About</a></li>
          </ul>
          <form class="navbar-form pull-right form-search">
            <div class="input-append">
              <input type="text" class="span2 search-query" placeholder="Search">
              <button type="submit" class="btn"><i class="icon-search"></i></button>
            </div>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>

  <div class="container">

    <?php echo $sf_content ?>

  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p class="credit">Copyright © 2013 <a href="https://www.linkedin.com/in/yefrederic" target="_blank">Frederic Ye</a>.</p>
    </div>
  </footer>

  <!-- jQuery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

  <!-- Bootstrap -->
  <script src="/bootstrap/js/bootstrap.min.js"></script>

  <!-- Boilerplate -->
  <script src="/js/plugins.js"></script>

  <script src="/js/main.js"></script>

  <!-- <script src="/js/retina.js"></script> -->

</body>
</html>
