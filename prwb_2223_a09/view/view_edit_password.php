<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit Password</title>
</head>
<body>
<div class="title mx-auto">Update Your Password:</div>
        <div class="main col-6 mx-auto">
            <form method='post' action='update_password' enctype='multipart/form-data'>  
            <input class="my-3" type="password" placeholder="Insert current password">
            <br>
            <input class="my-3" name="new_password" type="password" placeholder=" Insert new password">
            <br>
            <input class="my-3" name="confirm_password"  type="password" placeholder="Confirm new password">
            <br>
            <button class="btn btn-primary" type="submit">Update Password</button>
            </form>

            <?php if (count($errors) != 0): ?>
                <div class='errors'>
                    <p>Please correct the following error(s) :</p>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php elseif (strlen($success) != 0): ?>
                <p><span class='success'><?= $success ?></span></p>
            <?php endif; ?>


        </div>
</body>
</html>