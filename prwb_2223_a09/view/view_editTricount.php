<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    </head>
    <body>

<form method="post" action="Tricount/edittricount">
<label for="html">Title :</label> <br>
  <input type="text" value= "test" name="title"><br>
  <label for="html">Description (optional) :</label> <br>
  <textarea type="textarea" value= "<?php echo $description ; ?>" name="description" ></textarea>
  <input type="submit" name="save" value="Save">
</form>

 </body>
</html>