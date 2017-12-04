<?php


{
  $qry=



  $stmt->bind_param('i, $')
}
if (isset($_POST['update'])) {
  $sql = 'UPDATE content SET title=?, para=? WHERE content_id=?'
  if ($stmt->prepare($query)) {
    $stmt->bind_param('ssi', $_POST['title'], $_POST['para'], $_POST['content_id']);
    $done=$stmt->execute();
  }
}

if($done || !isset($_GET['content_id'])) {
  header ('Location: http://db.izzybellaphoto.com/page_list.php');
  exit;
}

if (isset($stmt) && !OK && !done) {
  $error = $stmt->error;
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
    <div>
    <?php
    {
    }
    if ($content_id == 0) { ?>
      <p>Invalid request: record does not exist.</p>
    <?php } else { ?>
      <form name="form1" method="post" action="">
      <p>
        <label for="">Page</label>
        <textarea name="" type="text" id="" value="<?= htmlentities(); ?>"
      </p>
      <p>
        <label for="">Page</label>
        <textarea name="" type="text" id="" value="<?= htmlentities(); ?>"
      </p>
      <p>
        <label for="">Page</label>
        <textarea name="" type="text" id="" value="<?= htmlentities(); ?>"
      </p>
      <p>
        <input name="content_id" type="hidden" value="<?= $content_id; ?>">
        <input type="submit"


      </p>
    </form>
    </div>
  </body>
</html>
