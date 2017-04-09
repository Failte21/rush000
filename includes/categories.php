<?php
 ?>
 <html>
 <head>
 <style>
.green {
     background-color: #32CD32;
 }
 .size {
   width: auto;
 }
 </style>
 </head>
 <body>
 <ul class="green">
   <?php
   $db = mysqli_connect("localhost", "root", "root", "market");
   $tab = mysqli_query($db, "SELECT `nom` FROM `categorie`");
   $find = true;
   while ($array = mysqli_fetch_assoc($tab)) { ?>
     <li class="size"><a href=<?php echo "?Categorie=".$array['nom'];?>><?php echo $array['nom'];?></a></li>
   <?php } ?>
 </ul>
 </body>
 </html>
