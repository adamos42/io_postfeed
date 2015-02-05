<div class="shoutbox-list">
   <?php $first = true;
   foreach ($items as $row):
      ?>

      <div class="shoutbox-item">          
         <div class="shoutbox-message">
            <?php
            if (isset($_POST['character_limit'])) {

               $message = character_limiter(auto_link($row->message), $_POST['character_limit']);

               $message = parse_smileys($row->message, "/themes/animetv/images/smileys/");
               
            } else {

               $message = parse_smileys($row->message, "/themes/animetv/images/smileys/");
            }
            
            // The Regular Expression filter
			$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

			// Check if there is a url in the text
			if(preg_match($reg_exUrl, $message, $url)) {

				   // make the urls hyper links
				   echo preg_replace($reg_exUrl, "<a href='".$url[0]."' target='_blank'>[linkelt tartalom]</a> ", $message);

			} else {

				   // if no urls in the text just return the text
				   echo $message;

			}

		//$message = $row->message;

            //echo $message;
            ?>
         </div>
         <div class="shoutbox-info">
	    <span class="date"><?= date("Y.m.d",$row->time)?></span>
            <span class="hour"><?= date("H:i",$row->time)?></span>
            <span class="username"><?= $row->username ?></span>
            
         </div>
      </div>



               <?php $first = false;
            endforeach;
            ?>
</div>

<?php if ($first): ?>

   <h4 class="no_messages">
      Nincsenek üzenetek!
   </h4>

   <?php endif; ?>

