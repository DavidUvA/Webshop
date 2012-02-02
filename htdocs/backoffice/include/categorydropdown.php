<?php
/*
 Description:
  - Prints a dropdown list of all categories
  - Only to be used within a <form> </form>
 Usage:
  - categorydropdown()
*/
  include "../connection.php";
  function categorydropdown() {
    echo "<select name=\"category\">\n";
    echo "<option value=\"x\">Please select</option>";
    $sql = "SELECT * from category order by category_name ASC";
    $result = mysql_query($sql) or die("Could not select category");
    recursive(0,0,$result);
    echo "</select>\n";
  }

  function recursive($root, $depth, $sql) {
    $row = 0;
    while ($catarray = mysql_fetch_array($sql)) {
      if ($catarray['category_parentid'] == $root) {
          echo "<option value=\"" . $catarray['category_id'] . "\">";

          $c = 0;
          while ($c < $depth) {
            echo "&nbsp;&nbsp;";
            $c++;
          }
          if($depth>0) echo "-";

          echo $catarray['category_name'] . "</option>\n";

          mysql_data_seek($sql,0);
          recursive($catarray['category_id'], $depth+1,$sql);
      }
      $row++; 
      if(mysql_num_rows($sql)!= $row) {
        mysql_data_seek($sql,$row);
      }
    }
  }
?>