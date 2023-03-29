<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile Settings</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    </head>
    <body>
        <h3> Hey <?= $member->full_name?> </h3>
        <br>
        <p> I know your emial address is <?= $member->mail ?>.</p>
        <br>
        <p>What elese can I do for you?</p>

        <a href="member/edit_profile"><button type="button" class="btn btn-outline-primary text-center" ">Edit profile</button></a>
        <br>
        <a href="member/update_password"><button type="button" class="btn btn-outline-primary text-center">Edit Password</button></a>
        <br>
    </body>
</html>