<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body, html{height:100%;}
        .wrapper{width: 600px; padding:25px;}
		.div_center{ position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%)}
        ul{
            font-size: 1.5em;
        }
    </style>
<head><title>Post</title></head>
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
 <h2>Create a new post!</h2>
 <form action="<?php echo base_url(); ?>index.php/message/dopost" method="post">
    <div class="form-group">
     <div class="col-sm-9"> 
     <textarea type="text" rows="6" name="message" class="form-control" placeholder="Your message"></textarea>
    </div>
    </div>
    <div class="col-sm-4 text-center">
     <button type="submit" class="btn btn-primary btn-block">Post</button>
     <?php echo $this->session->flashdata("error"); ?>
    </div>
    </div>
 </form>

</div>
</body>

</html>