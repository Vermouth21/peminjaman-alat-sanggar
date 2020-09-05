<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <title>Administrator | Sanggar Seni Sabai Nan Aluih</title>
   <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body class="sticky-header">

 
 <!--Start login Section-->
  <section class="login-section">
       <div class="container">
           <div class="row">
               <div class="login-wrapper">
                   <div class="login-inner">
                       <a href="http://localhost/Sagar%20SNA">
                       <div class="logo">
                         <img src="assets/images/logo.png" alt="logo"/>
                       </div>
                       </a>
                   		
                   		<h2 class="header-title text-center">Login</h2>
                        
                       <form role="form" action="cek_login.php" method="post">
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                           </div>
                           
                           <div class="form-group">
                               <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                           </div>
                          
                           <div class="form-group">
                               <input type="submit" value="submit" name="login" class="btn btn-primary btn-block" >
                           </div>
                           
                       </form>
                       
                        <div class="copy-text"> 
                         <p class="m-0"><?php echo date("Y"); ?> &copy; Devisri</p>
                        </div>
                    
                   </div>
               </div>
               
           </div>
       </div>
  </section>
 <!--End login Section-->




    <!--Begin core plugin -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- End core plugin -->

</body>

</html>
