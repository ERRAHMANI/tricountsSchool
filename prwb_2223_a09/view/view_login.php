<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
       <!-- Jquery -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body style="background-color:black">
        
            <!-- <form action="main/login" method="post">
                <table>
                    <tr>
                        
                        <td><input id="pseudo" name="pseudo" type="text" placeholder="borverhagen@epfc.eu" value="<?= $email ?>"></td>
                    </tr>
                    <tr>
                        
                        <td><input id="password" name="password" type="password"  placeholder="**********" value="<?= $password ?>"></td>
                    </tr>
                </table>
                <input type="submit" value="Log In">
            </form> -->

            
<div class= "m-5">
        <main  class="bg-light">

       
<div class="d-flex align-items-center bg-primary text-white  fw-bold fs-5"><span class="me-1"><svg fill="#ffffff" width="30px" height="40px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M290.59 192c-20.18 0-106.82 1.98-162.59 85.95V192c0-52.94-43.06-96-96-96-17.67 0-32 14.33-32 32s14.33 32 32 32c17.64 0 32 14.36 32 32v256c0 35.3 28.7 64 64 64h176c8.84 0 16-7.16 16-16v-16c0-17.67-14.33-32-32-32h-32l128-96v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V289.86c-10.29 2.67-20.89 4.54-32 4.54-61.81 0-113.52-44.05-125.41-102.4zM448 96h-64l-64-64v134.4c0 53.02 42.98 96 96 96s96-42.98 96-96V32l-64 64zm-72 80c-8.84 0-16-7.16-16-16s7.16-16 16-16 16 7.16 16 16-7.16 16-16 16zm80 0c-8.84 0-16-7.16-16-16s7.16-16 16-16 16 7.16 16 16-7.16 16-16 16z"></path></g></svg></span> Tricount</div>
<?php if (count($errors) != 0): ?>
                <div class='errors text-center'>
                    <p class="ms-3">Please correct the following error(s) :</p>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li style="list-style: none;" class="text-danger"><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
<div class="my-5 mx-1 p-5 rounded"  style="border: 2px solid #A9A9A9;"
         >
         <form action="main/login" method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Sign in</h1>
            <hr>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                <input type="email" required class="form-control" id="mail" name="mail"  placeholder="borverhagen@epfc.eu" value="<?= $mail ?>">
               
            </div>
            <span class="text-danger" id="mail-error"></span>

                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                <input type="password" required class="form-control" id="password" name="password"  placeholder="**********" value="<?= $password ?>">
                </div>
            <span class="text-danger" id="password-error"></span>

            <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            </div>
            <input class="w-100 btn btn-lg btn-primary" value="Login" type="submit">

        </form>
        <div class="text-center">
        <a href="main/signup">New here ?Click here to join the party<i class="fas fa-party-popper"></i> &#127881;!</a>
        </div>

        </div>
       </main>
          
        </div>
      
     
    </body>
    <script>
        $(document).ready(function() {

   // Check mail

    $('#mail').keyup(function(e){

   if ($(this).val() == "") {
     $('#mail-error').html('Please enter  mail address');

   
    } else if (!isValidmail($(this).val())) {
    
     $('#mail-error').html('Please enter a valid mail address');

     
    }else{
     $('#mail-error').html('');

    }
    })
    
 // Check Password
    
$('#password').keyup(function(e){
 if ($(this).val() == "") {
        $('#password-error').html("Please enter your password.");
    
    } else if ($(this).val().length < 8) {
        $('#password-error').html("Your password must be at least 8 characters long.");
      
    }else{
        $('#password-error').html('');
    }
})
function isValidmail(email) {
    // Regular expression for email validation
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return emailRegex.test(email);
  }

    })

    </script>
</html>
