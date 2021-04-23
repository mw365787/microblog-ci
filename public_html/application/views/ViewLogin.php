<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		 html, 
		 body{height: 100%;}
        .wrapper{width: 600px;}
		.div_center{ position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);}
        ul{font-size: 1.5em; }
    </style>
<head><title>Login</title></head>

<body>
<div class="wrapper container div_center">
 <h2>Login</h2>
 <p>Please fill in your credentials to login.</p>
 <form class="align-items-center"action="<?php echo base_url(); ?>index.php/user/dologin" method="post">
    <div class="form-group">
     <label class="col-sm-2 col-form-label">Login:</label>
     <div class="col-sm-7"> 
     <input type="text" onfocus="this.value=''" name="username" class="form-control" placeholder="Your login">
    </div>
    <label class="col-sm-2 col-form-label">Password: </label>
    <div class="col-sm-7"> 
     <input type="password" onfocus="this.value=''" name="password" class="form-control" placeholder="Your password"><br>
    </div>
    <div class="col-sm-4 text-center">
     <button type="submit" class="btn btn-primary btn-block">Login</button>
     <?php echo $this->session->flashdata("error"); ?>
    </div>
    </div>
 </form>
</div>
</body>

</html>