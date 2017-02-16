    <nav class="navbar navbar-dark navbar-fixed-top bg-inverse">
      <button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><?php echo $website_title;?></a>
      <div id="navbar">
	  <!--
        <nav class="nav navbar-nav pull-xs-left">
          <a class="nav-item nav-link" href="#">Dashboard</a>
          <a class="nav-item nav-link" href="#">Settings</a>
          <a class="nav-item nav-link" href="#">Profile</a>
          <a class="nav-item nav-link" href="#">Help</a>
        </nav>-->
        <form class="pull-xs-right">
          <input type="text" class="form-control" placeholder="Search...">
        </form>
      </div>
    </nav>
	   <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="new.php">New Item <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
   
          </ul>