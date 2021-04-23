<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body, html{height:100%;}
        .wrapper{width: 600px; padding:25px;}
        ul{font-size: 1.5em;}
        .div_center{ position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);}
    </style>
<head><title>Search</title></head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/user/view/'.$name.'">Home</a>';?></li>
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/search/'.'">Search</a>';?></li>
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/message'.'">Message</a>';?></li>
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/user/feed/'.$name.'">Feed</a>';?></li>
    </ul>

    <div class="form-inline col-md-6">
<form action="<?php echo base_url(); ?>index.php/user/searchbar" method="get">
  <div class="form-group">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class=" searchbar form-control form-control-sm" name="searchedUser" type="text" style="width: 25rem;" placeholder="Search for a user" aria-label="Search">  
  </div>
</form>
</div>

    <ul class="navbar-nav form-inline my-2 my-lg-0">
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/user/login'.'">Login</a>';?></li>
      <li class="nav-item"><?php echo '<a class="nav-link" href="'.base_url().'index.php/user/logout'.'">Logout</a>';?></li>
    </ul>

  </div>
</nav>
<div class="wrapper div_center">
 <h4>Please insert the phrase you are looking for.</h4>
 <form action="<?php echo base_url(); ?>index.php/search/dosearch" method="get">
    <div class="form-group">
     <div class="col-sm-10"> 
     <input type="text" onfocus="this.value=''" name="string" class="form-control" placeholder="Your phrase" id="string">
    </div>
   </div>
    <div class="text-center col-sm-4 form-group">
     <button type="submit" class="btn btn-primary btn-block">Search</button>
    </div>
    
 </form>
</div>
</body>

</html>