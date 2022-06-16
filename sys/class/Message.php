<?php


class Message{
 

    public function displayMessage($message, User $user){
        
        if(count($message)>0){

            $num = 0;

            $id = $user->getId();

            foreach($message as $msgs)
            {
              $num++;
              foreach($msgs as $key => $value)
              {
                    if($user->getUsername($id) == $key){?>
    
                    <div class="text-box1">
                    
                        <?= $value ?>
    
                        <span>(
                            <?php
                                if($user->getUsername($id) == $key){ echo "you";}
    
                                else{echo $key; } 
                        
                            ?>)
                            
                        </span>
                    
                    </div>
    
                    <div class="clear"></div>
                    
                    
                <?php }else{?>
    
                    <div class="text-box2">
                            
                        <?= $value ?>
    
                        <span>
                            (
                            <?php
                                if($user->getUsername($id) == $key){echo "you";}
                                else{ echo $key;} 
                            ?>
                            )
                        </span>
    
                    </div>
    
                    <div class="clear"></div>
                    <?php }
                
            }
          } 
        
            
        } else{
            echo "<div class='text-center'>Welcome to Chat Box. Start a chat.</div>";
        }
       
      
    }
}
