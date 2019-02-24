<form id="pageform" action="" method="post">

  <!-- Hidden Elements -->
  <input id="id_owner" type="int" name="id_owner" value="$id_owner" hidden>
  <input id="pageDelete" type="int" name="pageDelete" value="$id_page" hidden>

  <p>Je confirme la suppression de la page <i>"$title"</i>.</p>
  <p>
    <label for="confirm">confirmation</label>
    <input id="confirm" type="checkbox" required>
  </p>

  <input type="submit" name="" value="supprimer">
</form>
