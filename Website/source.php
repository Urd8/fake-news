
<!-- Codes for displaying Sources -->

<?php

        // echo"<p style='color:red;'>Sources</p>";

        // Creating an Array to store sources
        $sources = array();

        //Locating the source 

        //locating <div class="div BNeawe UPmit AP7Wnd"> in HTML
        foreach($html->find('div.BNeawe.UPmit.AP7Wnd') as $sourceDiv)
        {  
            // Store source name as a var called author
            $author = strval($sourceDiv->plaintext);
                    // store variable into an array
                    $sources [] = $author; 
                
        }


?>
