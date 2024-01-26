<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Grape Nuts' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=DM Serif Display' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <title><?php echo $template_params["title"]; ?></title>  
</head>
<body>
    <h1 class="display-1">Postcards</h1>
    <h2 class="display-3">Write your story.</h2>
    <?php require($template_params["type"]); ?>
</body>
</html>