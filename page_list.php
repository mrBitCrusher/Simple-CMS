<?php


$conn = dbConnect();

$sql = "SELE CT content_id, page, title, "
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
    <table>
      <tr>
        <th>Page</th>
        <th>Title</th>
        <th>Content</th>
        <th></th>
      </tr>
      <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
  </body>
</html>
