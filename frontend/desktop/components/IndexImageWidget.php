<?php class IndexImageWidget extends CWidget {  
       public function run() {  
         $random = rand(1,3);  
         if ($random == 1) {  
           $advert = "advert1.jpg";  
         }  else if ($random == 2) {  
           $advert = "advert2.jpg";  
         }  else {  
           $advert = "advert3.jpg";  
         }   
         $this->render('IndexImage',array(  
           "advert"=>$advert,  
         ));  
       }  
}  