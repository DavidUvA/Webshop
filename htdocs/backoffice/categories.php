<?php
session_start();
  // Places head content (css /scripts etc) in $backoffice_headcontent;
  include "include/backoffice_headcontent.php";

  // Places header content (shop name from site config) in $backoffice_header
  include "include/backoffice_header.php";
  
  // Places horizontal menu content for backoffice in $menu_backoffice
  include "include/menu_backoffice.php";

  // Places search box content in $main_search
  include "../phpcontent/main_search.php";

  // Places left sidebar content in $main_leftsidebar
  include "../phpcontent/main_leftsidebar.php";

  // Places footer content in $main_footer
  include "../phpcontent/main_footer.php";

  // Puts html content for stylesheets in $css_backoffice
  include "include/css_backoffice.php";

  // Puts html content for login form in $backoffice_loginform
  include "include/checklogin.php";
?>
<?php
  include "../connection.php";
  function printcategories($root, $depth, $sql) {
    $row = 0;
    while ($catarray = mysql_fetch_array($sql)) {
      if ($catarray['category_parentid'] == $root) {
          $class = ($catarray['category_position'] % 2 === 0) ? 'odd' : 'even';
          print "<tr class=\"$class\">\n";
          print "<td><input type=\"checkbox\" name=\"checkall-toggle\" value=\"" . $catarray['category_id'] . "\" onclick=\"isChecked(this.checked);\"/></td>\n";
          print "<td style:\"align: left;\">";

          $c = 0;
          while ($c < $depth) {   
            print "&nbsp;&nbsp;";
            $c++; 
          }
          if($depth>0) print "-";

          print $catarray['category_name'] . "</td>\n";

          $description = $catarray['category_description'];
          print "<td>" . $description . "</td>\n"; 

          $visible = ($catarray['visible'] = 1) ? "<a href=\"?visible=" . $catarray['category_id'] . "\"><img src=\"icons/tick.png\"></a>" : "<img src=\"icons/cross-button.png\">";
          print "<td> $visible </td>\n";
          
          $moveup = "<img src=\"icons/arrow-090.png\">";
          $movedown = "<img src=\"icons/arrow-270.png\">";
          print "<td> $moveup $movedown </td>\n";
          
          $edit = "Edit";
          print "<td>" . $edit . "</td>\n";

          $id = $catarray['category_id'];
          print "<td>" . $id . "</td>\n";

          print "</tr>\n";

          mysql_data_seek($sql,0);
          printcategories($catarray['category_id'], $depth+1,$sql);
      }
      $row++; 
      if(mysql_num_rows($sql)!= $row) {
        mysql_data_seek($sql,$row);
      }
    }
  }
?>

<html>
  <head>
    <title>Categories</title>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> 
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script> 
    <script>
    $(document).ready(function() { 
        // extend the default setting to always include the zebra widget. 
        // $.tablesorter.defaults.widgets = ['zebra']; 
        // extend the default setting to always sort on the first column 
        // $.tablesorter.defaults.sortList = [[0,0]]; 
        // call the tablesorter plugin 
        
        //$("table").tablesorter(); 
    }); 
    </script>
    <script type="text/javascript">
      <!-- w3 asp php script here -->
    </script>
    <!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
    <!-- <link rel="stylesheet" href="css/table.css" type="text/css"> -->
    <link rel="stylesheet" href="css/box.css" type="text/css">
  </head>
  <body>
    <table class="tablesorter" id="box-table-a" style="width: 900px;"> 
      <thead>
        <tr>
          <th><input type="checkbox" name="checkall-toggle" title="Check all" onclick="isChecked(this.checked);"/></th>
          <th>Name</th>
          <th>Description</th>
          <th>Visible</th>
          <th>Order</th>
          <th>Actions</th>
          <th>ID</th>
        </tr>
      </thead>

      <tbody>


        <?php
          $sql = "SELECT * from category order by category_name ASC";
          $result = mysql_query($sql) or die("Could not select category");
          printcategories(0,0,$result);
        ?>

      </tbody>
    </table>

  </body>
</html>

<html>
  <head>
    <title>Add entry</title>
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <style type="text/css">
      
      html {
        background: #73add7 url(images/header_back.gif) repeat-x left top;
        background-color: white;
      }

      body {
        width: 100%;
        margin-left: 0px;
        margin-top: 0px;
        background: url(images/back_mic.jpg) no-repeat center 143px;
      }
        
    </style>
    <script type="text/javascript" language="javascript">
     function toggleVisibility(cb)
     {
      var checkboxid = document.getElementById("shippingaddress");
      if(cb.checked==true)
       checkboxid.style.display = "block";
      else
       checkboxid.style.display = "none";
     }
    </script>
  </head>
  <body>
    <div id="maincontainer">
            
      <div id="header">   
        <?php echo $main_header; ?>
      </div>
      
      <div id="box-login">
        <?php echo $backoffice_loginform; ?>
      </div>
      
          <div id="horizontalmenu">
            <?php echo $menu_backoffice; ?>
        </div>  
        
        <div id="box-search">
        <?php echo $main_search; ?>
      </div>
    
      <div id="sidebar-left">
        <?php echo $main_leftsidebar; ?>
      </div>
    
      <div id="box-carousel">
        
            <table class="tablesorter" id="box-table-a" style="width: 900px;"> 
            <thead>
              <tr>
                <th><input type="checkbox" name="checkall-toggle" title="Check all" onclick="isChecked(this.checked);"/></th>
                <th>Name</th>
                <th>Description</th>
                <th>Visible</th>
                <th>Order</th>
                <th>Actions</th>
                <th>ID</th>
              </tr>
            </thead>

            <tbody>


          <?php
            $sql = "SELECT * from category order by category_name ASC";
            $result = mysql_query($sql) or die("Could not select category");
            printcategories(0,0,$result);
          ?>

            </tbody>
          </table>
        
      </div>
  
      <div id="box-footer">
        <?php echo $main_footer; ?>
      </div>

    </div>
  </body>
</html>