<?php
    include('config.php');
    session_start();

    if(isset($_POST['text'])){
        $text= $_POST['text'];
        $query = "SELECT * FROM tbl_product WHERE product_name LIKE '%$text%' OR product_rate LIKE '%$text%' OR product_description LIKE '%$text%'";
        $result = mysqli_query($con,$query);

        if($result){
            while($q = mysqli_fetch_array($result)){
              $prod_id = $q['product_id'];
              $prod_name= $q['product_name'];
              $prod_img= $q['image'];
              $prod_price= $q['product_rate'];
              $prod_description= $q['product_description'];
        
              echo '
                <div class="display_row">
                    <a href="index.php?pid='.$prod_id.'" target="_blank">
                        <div class="db_img"><img src="../images/'.$prod_img.'" alt="'.$prod_name.'"></div>
                        <div class="db_pname">'.$prod_name.'</div>
                    </a>
                </div>
                ';
            }
          }
    }
?>