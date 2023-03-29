<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Edit Profile</title>
</head>
<body>
    <div class="main col-6 mx-auto">
        <form method='post'  class="my-3" action='edit_profile' enctype='multipart/form-data'>  
            <label for="full_name">Name: </label>
            <input class="my-3" name="full_name"  type="text" placeholder="<?= $member->full_name?>" value="<?= $member->full_name?>">
            <br>
            <label for="full_name">Email: </label>
            <input class="my-3" name="email" type="text" placeholder=" <?= $member->mail ?> " value="<?= $member->mail?>">
            <br>
            <label for="iban">IBAN</label>
            <input class="my-3" name="iban" type="text" placeholder="<?= $member->iban ?>" value="<?= $member->iban?>">
            <br>
            <button class="btn btn-primary" type="submit">Edit Profile</button>
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