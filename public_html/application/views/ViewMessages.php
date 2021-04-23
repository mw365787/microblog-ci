<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head><title>View Messages</title></head>
<style type="text/css">
      ul{font-size: 1.5em;}
      .div_center{ position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%)}
      .container{
        max-width: 50%;
      }
      
      a{
        padding: 0.5rem;
        font-size: 24px;
      }
    </style>
<body>
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/user/view/'.$name.'">Home</a>';?></li>
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/search/'.'">Search</a>';?></li>
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/message'.'">Message</a>';?></li>
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/user/feed/'.$name.'">Feed</a>';?></li>
    </ul>   

<div class="form-inline col-md-6">
<form action="<?php echo base_url(); ?>index.php/user/searchbar" method="get">
  <div class="form-group">
  
  <input class=" searchbar form-control form-control-sm" name="searchedUser" style="width: 25rem;" type="text" placeholder="Search for a user" aria-label="Search">  
  </div>
</form>
</div>

    <ul class="navbar-nav form-inline my-2 my-lg-0">
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/user/login'.'">Login</a>';?></li>
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/user/logout'.'">Logout</a>';?></li>
    </ul>

  </div>
</nav>
<div class="wrapper container p-5">




<div class="row d-flex mb-2">
  <h2><?php echo $Header ?></h2>
</div>


    <?php foreach ($results as $row) {?>
     <div class="card border-dark mb-4">
       <div class="card-header d-flex bg-darken-3">
          <div class="mr-auto"><h5><?php echo $row['user_username'];?> said: </h5></div>
          <div class="ml-auto"><?php echo $row['posted_at'];?></div>
       </div>
       <div class="card-body font-italic">
         <?php echo $row['text'];?>
       </div>
     </div>
    <?php } ?>
 <?php 
 if(!$test){
  echo '
        <div class="d-flex justify-content-center">
        <a  href="'.base_url().'index.php/user/follow/'.$nameFollow.'">Follow</a>
        </div>
        ';
 }?>
 </div>
</body>

</html>