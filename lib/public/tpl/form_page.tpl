<div id="returnmessage">
</div>
<form id="pageform" action="" method="post">
  <label for="url">url</label><br>
    <input id="url" type="text" name="url" value="$url"><br>
    <span id="errorUrl"></span>
  <br>
  <label for="title">titre</label><br>
    <input id="title" type="text" name="title" value="$title"><br>
    <span id="errorTitle"></span>
  <br>
  <label for="author">Auteur (vous)</label><br>
    <input id="author" type="text" name="title" value="$login" disabled><br>
    <span id="errorAuthor"></span>
  <br>
  <label for="description">description</label><br>
    <textarea id="description" name="description" placeholder="Description rapide.">$description</textarea><br>
    <span id="errorDescription"></span>
  <br>
  <label for="content">Contenu</label><br>
    <textarea id="content" name="content" placeholder="Contenu de l\'article.">$content</textarea><br>
    <span id="errorContent"></span>
  <br>
  <label for="content">Mots Clés</label><br>
    <textarea id="keywords" name="keywords" placeholder="Mots, clés, article, etc.">$keywords</textarea><br>
    <span id="errorkeywords"></span>
  <br>
  <label for="publication">Date de publication</label><br>
    <input type="date" id="publication" name="publication" placeholder="$publication" value="$publication"><br>
    <span id="errorPublication"></span>
  <br>
  <input type="submit" name="" value="envoyer">
  <input type="reset" name="" value="effacer">
</form>
<!--<script  src="lib/public/js/ajax.login.js">
</script>-->
