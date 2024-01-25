<?php
date_default_timezone_set('Europe/Rome');
function printDate() {
  echo date("D d, M Y"); 
}
?>

<!DOCTYPE html>
<html lang="eng">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<header>
  <p><?php printDate() ?> </p>
</header>

<body>

</body>

</html>