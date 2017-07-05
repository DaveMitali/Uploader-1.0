<html>
<head>
<title> PHP File Uploader</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
<br>
<h2><center><u>Upload CSV Files to a MySQL Database </u></center></h2>
<br><br>
<form class="well">
<div class="container">
<ol>
<h4>STEPS: </h4>
<h4><li>Upload the .csv file to the Uploads folder </li></h4>
<h4><li>Upload the .csv file to the MySQL database </li></h4></ol>
</div></form></center>
<!--Upload the file to "uploads" folder-->
<div class="container">
        <div class="row">
           <?php 
            //scan "uploads" folder and display them accordingly
           $folder = "uploads";
           $results = scandir('uploads');
           foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
           
            if (is_file($folder . '/' . $result)) {
                echo '
                <div class="col-md-3">
                    <div class="thumbnail">
                        '.$result.'
                            
                    </div>
                </div>';
            }
           }
           ?>
        </div>
<div class="row">
            <div class="col-lg-12">
               <form class="" action="upload.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="file">Select a file to upload to "Uploads" folder</label>
                    <input type="file" name="file" id="file">
                    <p class="help-block">Only .csv files are allowed.</p>
                  </div>
                  <input type="submit" class="btn btn btn-primary" value="Upload">
                </form>
            </div>
          </div>
    </div> <hr>
<!--Form to upload the file to database-->
<div class="container">
<form class="form-horizontal" action="process.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
        <label for="table" class="control-label col-xs-2">Project Name:</label>
		<div class="col-xs-3">
        <input type="text" class="form-control" name="pname" id="pname" required>
       	</div>
        Use underscore(_) to specify space
    </div>
    <div class="form-group">
        <label for="table" class="control-label col-xs-2">Project Lead Name:</label>
		<div class="col-xs-3">
        <input type="text" class="form-control" name="plname" id="plname" >
		</div>
        Use underscore(_) to specify space
    </div>
    <div class="form-group">
        <label for="table" class="control-label col-xs-2">File Description:</label>
		<div class="col-xs-3">
        <textarea class="form-control" name="fd" rows="5" cols="40"></textarea>
		</div>
    </div>
    <div class="form-group">
        <label for="table" class="control-label col-xs-2">Share Type (Public/Private):</label>
		<div class="col-xs-3">
        <input type="radio" name="sharetype" value="Public" checked>Public<br>
		<input type="radio" name="sharetype" value="Private">Private<br>
		</div>
    </div>
    <div class="form-group">
        <label for="mysql" class="control-label col-xs-2">Mysql Server address (or)<br>Host name</label>
		<div class="col-xs-3">
        <input type="text" class="form-control" name="mysql" id="mysql" placeholder="" >
		</div>
    </div>
	<div class="form-group">
        <label for="username" class="control-label col-xs-2">Username</label>
		<div class="col-xs-3">
        <input type="text" class="form-control" name="username" id="username" placeholder="" >
		</div>
    </div>
	<div class="form-group">
        <label for="password" class="control-label col-xs-2">Password</label>
		<div class="col-xs-3">
        <input type="password" class="form-control" name="password" id="password" placeholder="" >
		</div>
    </div>
	<div class="form-group">
        <label for="db" class="control-label col-xs-2">Database name</label>
		<div class="col-xs-3">
        <input type="text" class="form-control" name="db" id="db" placeholder="" >
		</div>
    </div>
	<div class="form-group">
        <label for="csvfile" class="control-label col-xs-2">Name a file present in Uploads Folder to send it to Mysql database</label>
		<div class="col-xs-3">
        <input type="name"  class="form-control" name="csv"  id="csv"> 
		</div>
		eg. MYDATA.csv
    </div>
	<div class="form-group">
	   <label for="login" class="control-label col-xs-2"></label>
        <div class="col-xs-3">
        <button type="submit" class="btn btn-primary">Upload to Database</button>
	   </div>
   </div>
   </div>
</form>
</div>
</body>
</html>