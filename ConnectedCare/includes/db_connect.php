<?php
/********************************************************** 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
* Ref: http://code.tutsplus.com/tutorials/simple-php-class-based-querying--net-11863
***********************************************************/

/*-Required for the db_connect file-*/
include_once 'psl-config.php';/*inc.in the (session.class.php, login_attempts.php)*/

class DALQueryResult {
     
  private $_results = array();
 
  public function __construct(){}
 
  public function __set($var,$val){
    $this->_results[$var] = $val;
  }
 
  public function __get($var){  
    if (isset($this->_results[$var])){
      return $this->_results[$var];
    }
    else{
      return null;
    }
  }
}
 
class DAL {
 
  public function __construct(){}
   
  /**********************************************************************************
  * Originally set as 'private' but the (Tutsplus) tutorial had the queries within 
  * the DAL class so this doesn't help for external files that require the connection.
  ***************************************************************************************/ 
  public function dbconnect() {
    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE)
        or die ("<br/>Could not connect to MySQL server");

    return $conn;
  }
   
  private function query($sql){
 
    $this->dbconnect();
 
    $res = mysql_query($sql);
 
    if ($res){
      if (strpos($sql,'SELECT') === false){
        return true;
      }
    }
    else{
      if (strpos($sql,'SELECT') === false){
        return false;
      }
      else{
        return null;
      }
    }
 
    $results = array();
 
    while ($row = mysql_fetch_array($res)){
 
      $result = new DALQueryResult();
 
      foreach ($row as $k=>$v){
        $result->$k = $v;
      }
 
      $results[] = $result;
    }
    return $results;        
  }  
}

// instantiate a new DAL
$dal = new DAL();
$mysqli = $dal -> dbconnect();

?>