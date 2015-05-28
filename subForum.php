<?php
include 'header.html';
include_once "Header.php";

//$dbc = mysqli_connect('localhost','root','','201100013');
$dbc=mysqli_connect('studev2','201100013','polytechnic','201100013');
if( isset($_GET['id']) )
{
    $id=$_GET['id'];  
}

elseif(isset($_POST['id']))
{
    $id=$_POST['id'];    
}
else
{

     echo '<p class="error">No message id Parameter</p>';   
     
     include 'footer.html';
     
     exit();
}
        echo '
           <td><a href="createThread.php?subForumId=' .$id. '">Create Thread</a></td>';
 $q = "select * from thread where subForumId = $id";

  $r = mysqli_query($dbc, $q);
  
  if($r)
  {
    echo '<br />';
    //display a table of results
    echo '<table align="center" cellspacing = "2" cellpadding = "4" width="75%">';
    echo '<tr bgcolor="#87CEEB">
          <td><b>View</b></td>
          
          <td><b><a href="view_users.php?sort=fn">Name</a></b></td>
          <td><b><a href="view_users.php?sort=ln">User ID</a></b></td>';   
    
    $bg = '#eeeeee';
    
    while($row = mysqli_fetch_array($r))
    {
        $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
        
        echo '<tr bgcolor="' . $bg. '">
            <td><a href="showthread.php?id=' .$row[0]. '">View</a></td>
            <td>'.$row[1].'</td>
            <td>'.$row[2].'</td>
              </tr>';

    }
    
    echo '</table>';
  }
  else
  {
      echo '<p class="error">' . $q . '</p>';
      echo '<p class="error"> Oh dear. There was an error</p>';
      echo '<p class="error">' . mysqli_error($dbc) .'</p>';
  }
  
   mysqli_free_result($r);
   //$db->close();
   
   //makes links to other pages if required
 
   


include "footer.html";
?>
