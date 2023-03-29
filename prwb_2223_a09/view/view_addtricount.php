<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AddTricount</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    </head>
    <body>
    <main class="d-flex justify-content-center">

        <form method="post" action="Tricount/addtricount">
        <main class="d-flex">
            <div class="d-flex justify-content-end">
               <input class="btn btn-primary" value="Save" type="submit"><br>
            </div>

          <div class="d-flex justify-content-start">
            <a href="main/login" class="btn btn-outline-danger" role="button" aria-pressed="true">cancel</a> 
          </div>
        </main>
        <label for="html">Title :</label> <br>
          <input type="text" name="title"><br>
          <label for="html">Description (optional) :</label> <br>
          <textarea type="textarea" name="description" ></textarea>
       
        </form>

    </main>

 </body>
</html>