<!DOCTYPE html>
<html>
<head>
  <title>Spice-Hut|Quality Spices</title>
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }

  </script>
  <!--booststrap-->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <!--//booststrap end-->
  <!-- font-awesome icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!--stylesheets-->
  <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
  <!--//stylesheets-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="//fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Libre+Franklin:400,500" rel="stylesheet">

<style>

#search_bar_input {
    border-radius: 5px;
    border: 1px solid grey;
    padding: 10px 5px;
    margin-left: 40px;
    margin-top: 5px;
}

#search_bar_input:focus {
    padding-left: 10px;
    transition: 0.3s all ease-in-out;
}

#search_bar_searchbtn {
    padding: 10px 15px;
    margin-left: 10px;
    margin-top: 5px;
    border: 1px solid grey;
    border-radius: 5px;
    color: grey;
    cursor: pointer;
}

#search_bar_searchbtn:hover {
    border: 1px solid grey;
    background-color: white;
    border-radius: 5px;
    color: #94d924;
    cursor: pointer;
    transition: 0.3s all ease-in-out;
}

.display-box {
    position: absolute;
    max-height: 350px;
    overflow-y: scroll;
    background: white;
    overflow-x: hidden;
    width: 40%;
    margin-left: 40px;
    margin-top:2px;
    font-size: 13px;
    border-radius: 0px 0px 5px 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5), 0 1px 20px rgba(0, 0, 0, 0.0) inset;
}

.display-box::-webkit-scrollbar {
    width: 10px;
}

.display-box::-webkit-scrollbar-thumb {
    background: #94d924;
    border-radius: 5px;
    height: 100px;
    scroll-behavior: smooth;
}

.display-box::-webkit-scrollbar-thumb:hover {
    background: #94d924;
}

.hide {
    display: none;
}

.show {
    display: block;
}

.display_row {
    margin: 10px 0px;
}

.display_row a {
    display: flex;
}

.db_img {
    margin-left: 0px;
}

.db_pname {
    margin-left: 20px;
    font-size: small;
    color: black;
}

.db_img img {
    max-width: 40px;
    max-height: 40px;
    border-radius: 0px;
}


</style>


</head>

<body>
  
    <!-- header -->
    <div class="headder-top d-md-flex" style="margin-top:-15px;background-color:#000000;">
      <div id="logo">
        <h1>
          <a href="index.php"><img src=""alt="" /></a> 
          <a href="index.php">Spice-Hut</a>
        </h1>
      </div>
      <!-- nav -->
      <nav class="mx-md-auto" >

        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop">
        <ul class="menu mt-2">
          <li class="active">
            <a href="index.php">Home</a>
          </li>
         <li>
            <a href="index.php">About</a>
          </li>
          <li>
            <a href="categoryview.php">Category?</a>
          </li>
          <li>
            <a href="customerlogin.php">Login</a>
          </li>
          <li>
            <a href="customerreg.php">SignUp</a>
          </li>
          <li>
 

          <div id="search_container">
                <input type="text" name="search_bar_input" onkeyup="searchFunc();" id="search_bar_input" placeholder="Search..">
                <span id="search_bar_searchbtn"><i class="fa fa-search"></i></span>
                <div class="display-box hide" id="db_result_box">
                </div>

          </li>  

        </ul>
      </nav>
      </div>
      <!-- //nav -->
    </div>
</div>
</body>


<script>

function searchFunc(){
        var search = document.getElementById("search_bar_input").value;
        var element = document.getElementById("db_result_box");
        if(search!=""){
          element.classList.remove("hide");
          element.classList.add("show");
          $.ajax({
              url:"search.php",
              method:"POST",
              data:{text:search},
              success:function(data){
                  $('.display-box').html(data);            
              },
              error: function(error){
                alert(error);
              }
          });
        }
        else{
          element.classList.remove("show");
          element.classList.add("hide");
        }
    }

</script>
</html>
