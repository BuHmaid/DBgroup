<?php

class Database
{
    private $LOCAL_DB=0;
 
    private $dbc = NULL;
    
    public function getConnection()
    {

        if (!$this->LOCAL_DB){
            if($this->dbc==NULL)
              $this->dbc = mysqli_connect('studev2','201100013','polytechnic','201100013');
           //  $this->dbc = mysqli_connect('localhost','root','','201100013');
           if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                die('b0ther');
            }
               
        }
        else
        {
           $this->dbc = @mysqli_connect('studev2','201100013','polytechnic','201100013');
              //  $this->dbc = @mysqli_connect('localhost','root','','201100013');
           if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                die('b0ther');
            }
        }

        return $this->dbc;
    }
        public function getDBConnection()
    {
        return getConnection();
    }
     public function closeDB()
    {
         mysqli_close($this->dbc);  
    }
     
 }

?>
