<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <title>Liste Tricounts</title>
  </head>
  <body>
    <div class="container mt-5">
       <div>
        <h1 class="text-left">Your Tricounts</h1>
        <a href="AddTricount "><input type="button" class="btn btn-primary float-right" name="save" value="Add"></a>
      </div>
      <ul class="list-group mt-5">
      <?php /* $last   = end($tricounts);*/ ?>
        <?php
        // var_dump($tricounts);
        foreach ($tricounts as $tricount) { ?>
         <?php /* if ( $last != $tricount ): */?>
          <li class="list-group-item">
             <?php    $id= $tricount[0];     ?>
           <a href='edittricount?id=<?php echo $id; ?>' > 
            <?php
            if($tricount["title"]==NULL): ?>
            <h3><?php echo $tricount["title"]; ?></h3>
            <?php else: ?>
              <h3><?php echo $tricount["title"]; ?></h3>
              <?php /*endif;*/ ?>

            <?php
            if($tricount["description"]==NULL): ?>
            <p> No description </p>
            

            <?php else: ?>
            <p> <?php echo $tricount["description"] ?></p>
            <p class="text-right"> <?php echo "With "; echo ($friends[0]['friends']) ; echo" friend";?></p>

            <?php endif; ?>
            <?php endif; ?>

            </a>
          </li>
        <?php } ?>

      </ul>
            
    </div>
  </body>
</html>
