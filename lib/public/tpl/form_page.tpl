<br>
<form class="row" id="pageform" action="" method="post">


    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <label for="url">url</label><br>
      <input id="url" type="text" name="url" value="$url"><br>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <label for="title">titre</label><br>
      <input id="title" type="text" name="title" value="$title"><br>
    </div>

    <div class="col-12">
      <label for="content">contenu</label><br>
      <textarea id="content" name="content" placeholder="Contenu de l\'article.">$content</textarea><br>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <label for="description">description</label><br>
      <textarea id="description" name="description" placeholder="Description rapide.">$description</textarea><br>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <label for="keywords">mots clés</label><br>
      <textarea id="keywords" name="keywords" placeholder="Mots, clés, article, etc.">$keywords</textarea><br>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <label for="thumbnail">thumbnail</label><br>
      <input id="thumbnail" type="text" name="thumbnail" value="$thumbnail"><br>
    </div>

    <!-- Hidden Elements -->
    <input id="id_owner" type="int" name="id_owner" value="$id_owner" hidden>
    <input id="id_page" type="int" name="id_page" value="$id_page" hidden>
    <input id="publication" type="int" name="publication" placeholder="$publication" value="$publication" hidden><br>

    <div class="col-12">
      <input type="submit" name="" value="envoyer">
      <input type="reset" name="" value="effacer">
    </div>


</form>
