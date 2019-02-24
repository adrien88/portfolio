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

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <label for="description">description</label><br>
      <input id="description" type="text" name="description" value="$description"><br>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <label for="archive">archive (*.zip)</label><br>
      <input id="archive" type="file" name="archive" value=""><br>
    </div>

    <!-- Hidden Elements -->
    <input id="id_owner" type="int" name="id_owner" value="$id_owner" hidden>
    <input id="id_page" type="int" name="id_page" value="$id_page" hidden>
    <input id="publication" type="int" name="publication" placeholder="$publication" value="$publication" hidden><br>

    <div class="col-12">
      <hr>
      <input type="submit" name="" value="envoyer">
      <input type="reset" name="" value="effacer">
    </div>


</form>
