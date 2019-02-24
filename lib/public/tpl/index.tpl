
<!DOCTYPE html>
<html lang="$lang">
  <head>
    <title>$title</title>
    <meta charset="$charset">
    <link rel="stylesheet" href="lib/public/css/dash.css">
  </head>

  <body>

    <div class="container-fluid navbarBase">
      %around/nav.tpl
    </div>

    <main class="container-fluid" id="main">
      %dashcontent.tpl
    </main>

    <script src="lib/public/js/dash.js"></script>

  </body>
</html>
