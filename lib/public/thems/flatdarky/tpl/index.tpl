
<!DOCTYPE html>
<html lang="$lang">
  <head>
    <title>$title</title>
    <meta charset="$charset">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="portfolio, jrojets, adrien, boilley">

    <meta property="og:title" content="Portfolio" />
    <meta property="og:type" content="page" />
    <meta property="og:description" content="Portfolio personnel d'Adrien Boilley, revisité." />
    <meta property="og:url" content="https://boilley.info/other/OnlineFormaPro/portfolio2/" />
    <meta property="og:image" content="https://boilley.info/other/OnlineFormaPro/portfolio2/lib/medias/cute-owl-wallpaper.jpg" />

    $metaog

    <!-- froala external CSS. -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_style.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- end of froala  -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/public/bootstrap_4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="?CssFile=$themPath/css/style.css">


    $stylesheet



  </head>

  <body>

    <div class="container-fluid navbarBase">
      %around/nav.tpl
    </div>

    <header class="container-fluid" id="header" style='background-image:url("$thumbnail");'>
      %around/header.tpl
    </header>

    <main class="container-fluid" id="main">
      %page.tpl
    </main>

    <footer class="container-fluid" id="footer" style='background-image:url("$thumbnail");'>
      %around/footer.tpl
    </footer>

    <script src="lib/public/thems/flatdarky/js/style.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- froala external JS -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/js/froala_editor.pkgd.min.js"></script> -->
    <!-- <script> $(function() { $('#content').froalaEditor() }); </script> -->
    <!-- end of froala  -->


  </body>
</html>
