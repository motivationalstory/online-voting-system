<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location:../");
}
$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];
if($_SESSION['userdata']['status']==0){
  $status = '<b style="color:red">not voted</b>';
}
else{
  $status = '<b style="color:green"> voted</b>';
}
?>
<html>
        <head>
            <title> online voting system - dashboard</title>
            <link rel="stylesheet" href="css/mystylesheet.css">
        </head>
              <body>
                <style>
                    #backbtn{
                padding: 5px;
                  background-color: blue;
                  color: rgba(255, 243, 240, 0.96);
                   border-radius: 5px;
                   float: left;
              }
                  #logoutbtn{
                padding: 5px;
                  background-color: blue;
                  color: rgba(255, 243, 240, 0.96);
                   border-radius: 5px;
                   float:right;
              }
              #profile{
                background-color: white;
                width: 30%;
                padding: 10;
                float: left;
              }
              #Group{
                background-color:white;
                width: 65%;
                padding: 20px;
                float: right;
              }
              #votebtn{
                padding: 5px;
                  background-color: blue;
                  color: rgba(255, 243, 240, 0.96);
                   border-radius: 5px; 
                  }
                  #mainpanel{
                   padding: 10px;
                  }
                  #voted{
                    padding: 5px;
                  background-color: red;
                  color: rgba(255, 243, 240, 0.96);
                   border-radius: 5px; 
                  }
                </style>
                <div id="mainsection">
                <center>
                <div id="headersection">
                <a href="index1.html"><button id="backbtn">back</button></a>
                <a href="logout.php"><button id="logoutbtn">logout</button></a>
                <h1>online vote</h1>
                </div>
                </center>
                <hr>
                <div id="Profile">
                <center><img src="uploads/<?php echo $userdata['photo']?>" height="200"width="200"></center>
                <b>name</b><?php echo $userdata['name']?><br><br>
                <b>mobile</b><?php echo $userdata['mobile']?><br><br>
                <b>address</b><?php echo $userdata['address']?><br><br>
                <b>status</b><?php echo $status?><br><br>
                </div>
                <div id="Group">
                  <?php
                  if( $_SESSION['groupsdata']){
                  for($i=0;$i<count($groupsdata); $i++){
                    ?>
                    <div>
                    <img style="float: right;" src="uploads/<?php echo $groupsdata[$i]['photo']?>" height="100"width="100"><br>
                      <b>group name:</b><?php echo $groupsdata[$i]['name']?><br><br>
                      <b>Votes:</b><?php echo $groupsdata[$i]['votes']?><br><br>
                      <form action="api/vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                        <?php
                        if ($_SESSION['userdata']['status']==0){
                          ?>
                            <input type="submit" name="votebtn" value="vote" id="votebtn">
                            <?php
                        }
                        else{
                          ?>
                            <button disabled type="button" name="votebtn" value="vote" id="voted">voted</button>
                            <?php
                        }
                       ?> 
                      
                      </form>
                    </div>
                    <hr>
                    <br><br>
                    <?php
                  }}
                  else{
                    
                  }
                  ?>
                </div>
                </div>
            </body>
</html>