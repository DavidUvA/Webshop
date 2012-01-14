<?php
  include "connection.php";
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
        <h2><a href="index.htm" style="text-decoration:none; color:white">Header</a></h2>           
      </div>
      
      <div id="box-login">
      
        <form name="input" action="checklogin.php" method="post">
          Username: <input type="text" name="myusername" size="20" /> </br>
          Password: <input type="password" name="mypassword" size="20" /> </br>
          <a href="register.htm" style="text-decoration:none;"><button type="button">Sign up</button></a><button type="submit">Login</button>
        </form>
        </br>
      </div>
      
          <div id="horizontalmenu">

            <ul>
          <li class="active"><a href="index.htm">Home</a>
                    <ul>
                    </ul>
                </li>
                <li><a href="webshop.htm">Webshop</a>
                    <ul>
                       <li><a href="webshop.htm">All products</a></li>
                       <li><a href="webshop.htm">Nokia</a></li>
                       <li><a href="webshop.htm">Apple</a></li>
               <li><a href="webshop.htm">Samsung</a></li>
               <li><a href="webshop.htm">Htc</a></li>
                    </ul>
                
                <li><a href="#">My account</a>
                    <ul>
              <li><a href="register.htm">Register</a></li>
                        <li><a href="helpdesk.htm">Helpdesk</a></li>
                        <li><a href="profile.htm">Profile</a></li>
                        <li><a href="history.htm">History</a></li>
                    </ul>
                </li>
                <li><a href="contact.htm">Contact</a>
              
                </li>
                <li><a href="about.htm">About</a></li>
            </ul>
        </div>  
        
        <div id="box-search">
        <form> 
          <input type="text" name="search query" size="20"/>
          <button type="button">Search</button>
        </form>
      </div>
    
      <div id="sidebar-left">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed elit ante. Nunc luctus tempus nibh, ac pellentesque dolor rhoncus vitae. Donec ac ipsum ut elit suscipit varius. Donec urna turpis, porta nec tincidunt suscipit, dapibus at neque. Nulla cursus risus vitae diam egestas in feugiat arcu consectetur. Vivamus dapibus tincidunt dictum. Aliquam nec volutpat libero. Phasellus et arcu elit. Praesent nunc ante, placerat sagittis pharetra non, rutrum vitae nisl. Sed sollicitudin dui non lacus semper in lacinia sapien sollicitudin. Praesent lobortis urna sapien. Sed sed eros neque, in posuere massa. Quisque sit amet nisi dolor, id elementum libero. Mauris pharetra ultricies tellus non laoreet. Ut rutrum rutrum libero quis aliquet. Nulla mauris ipsum, gravida ac dictum non, dictum eget est.
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
  
      <div id="box-footer">Developed by David Sondervan, Nicolas Martos, Artiom Emelianov, Nisjaat Sheik Joesoef, Willem van Dijk in Amsterdam 2012.</div>

    </div>
  </body>
</html>