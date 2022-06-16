<?php

    require_once 'sys/class/User.php';
    require_once 'sys/class/Message.php';

    if(isset($_SESSION['user']) && isset($_REQUEST['logout'])){

        $user  = $_SESSION['user'];
        $user->user_logout();
        header("location:login.php");
    }
   
    if(!isset($_SESSION['user']) && !isset($_SESSION['login']) ){

      header("location:login.php");

    } else{

      $user  = $_SESSION['user'];
      $id = $user->getId(); 
      $messages = new Message();

     ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" type="image/png" href="public/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="public/css/chat.css">

      <title>Chat Box | Index</title>
    </head>
    <body>

    
        <header>

            <div class="container text-right logout-btn">
                  <form action="" method="post">
                        <input class="btn btn-danger "type="submit" value="logout" name="logout"> ( <?= $user->getUserName($id); ?> )
                  </form>
                    
            </div>
           
        </header>
  

    <section >

      <?php

      if((isset($_REQUEST['send'])) && (!empty($_REQUEST['message']))){

          $username = $user->getUsername($id); 
          $message = $_REQUEST['message'];
          $_SESSION['name']['message'][] = array($username => $message);

          if(isset($_SESSION['name']['message'])){

            $msg = $_SESSION['name']['message'];
            
            $messages->displayMessage($msg, $user);
    
          }
       
        
      }else{

            $msg = $_SESSION['name']['message'] ?? array();
       
            $messages->displayMessage($msg, $user);
    
      }
  } ?>

          </section>


          <div class="container form">
              <form action=""  class="text-center" method="post">
                        <input  class="p-3 mb-2" type="text" name="message" placeholder="enter message" autocomplete="off">
                        <input class="btn btn-primary" type="submit" value="send" name="send">
              </form>
          </div>

        




    </body>
    </html>


