<?php
if(array_key_exists('HTTPS',$_SERVER) != 1){
 header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
 exit();
}

include('../utils.php');
include('incTop.php');
?>
<div class="container"><div class="row">
 
 <div class="col-md-2 offset-md-3 text-center my-5 px-4">
  <img src="../assets/ei-icon.jpg" class="w-100 rounded-5 mb-2">
  <div>by Lay Bare</div>
 </div>
 <div class="col-md-4 my-5">
  <h3>EI Branch</h3>
  <form action="login2.php" method="post" onsubmit="loading('.btn')">
   <label>Email</label>
   <input type="email" class="form-control" name="Email" value="<?=$_COOKIE['Email']?>">
   <label>Password</label>
   <input type="password" class="form-control" name="Password">
   <button class="btn my-3 w-50 btn-primary">LOGIN</button>
  </form>
 </div>

</div></div>
<?php
include('incFoot.php');
?>