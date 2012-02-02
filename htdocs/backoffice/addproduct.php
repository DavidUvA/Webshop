<?php
session_start();
	// Includes function: check_input($value)
	// Returns SQL injection proof value
	include "../include/check_input.php";

	// Product box function. Usage: backoffice_productbox($product_id);
	include "include/backoffice_productbox.php";

	// Places head content (css /scripts etc) in $backoffice_headcontent;
	include "include/backoffice_headcontent.php";

	// Places header content (shop name from site config) in $backoffice_header
	include "include/backoffice_header.php";

	// Puts html content for login form in $backoffice_loginform
	include "include/checklogin.php";

	// Places horizontal menu content for backoffice in $menu_backoffice
	include "include/menu_backoffice.php";

	// Places search box content in $main_search
	include "../phpcontent/main_search.php";

	// Places left sidebar content in $main_leftsidebar
	include "../phpcontent/main_leftsidebar.php";

	// Places footer content in $main_footer
	include "../phpcontent/main_footer.php";

	// Echo's dropdown list of categories where categorydropdown() is used
	include "include/categorydropdown.php";

	// Echo's dropdown list of brands where branddropdown() is used
	include "include/branddropdown.php";
?>
<?php
	function BBCode ($string) {
	  $search = array(
	      '/\[b\](.*?)\[\/b\]/is',
	      '/\[i\](.*?)\[\/i\]/is',
	      '/\[u\](.*?)\[\/u\]/is',
	      '/\[img\](.*?)\[\/img\]/is',
	      '/\[url\=(.*?)\](.*?)\[\/url\]/is',
	      '/\[code\](.*?)\[\/code/]/is'
	  );
	  $replace = array(
	      '<b>\\1</b>',
	      '<i>\\1</i>',
	      '<u>\\1</u>',
	      '<img src="\\1">',
	      '<a href="\\1">\\2</a>',
	      '<code>\\1</code>'
	  );
	  return preg_replace($search, $replace, $string);
	}
?>
<?php
	function addproduct() {
		include "../connection.php";
		$msg_style = "none";
		if ($_POST[hidden] == "add") {
			$category_id = check_input($_REQUEST[category]);
			$brand_id = check_input($_REQUEST[brand]);
			$product_name = check_input($_POST[product_name]);
			$product_description = check_input($_POST[product_description]);
			$product_price = check_input($_POST[product_price]);
			$product_quantity = check_input($_POST[product_quantity]);
			$product_deliverytime = check_input($_REQUEST[product_deliverytime]);
			$product_featured = check_input($_REQUEST[product_featured]);

			$insert_product = "INSERT into product VALUES (NULL, '$category_id', '$brand_id', '$product_name', '$product_description', '$product_price', '$product_quantity', now(), now(), '$product_deliverytime', '$product_featured')";
			mysql_query($insert_product) or die(mysql_error());
			$product_id = mysql_insert_id();

			if ((($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
			&& ($_FILES["file"]["size"] < 20000))
			  {
			  if ($_FILES["file"]["error"] > 0)
			    {
			    $file_msg = "Return Code: " . $_FILES["file"]["error"] . "<br />";
			    }
			  else
			    {
			    if (file_exists("upload/" . $product_id . ".jpg"))
			      {
			      $file_msg = $_FILES["file"]["name"] . " already exists. ";
			      }
			    else
			      {
			      move_uploaded_file($_FILES["file"]["tmp_name"],
			      "upload/" . $product_id . ".jpg");
			      $file_msg = "Product image uploaded to: " . "upload/" . $product_id . ".jpg";
			      }
			    }
			  }
			else
			  {
			  echo "Invalid file";
			  }

			$msg_style = "inline";
		}
		echo "<h1>Add product</h1><br />";
		echo "<form method=\"post\" action=\"$_SERVER[PHP_SELF]\" enctype=\"multipart/form-data\">\n
		<table>

			<tr>
				<td></td>
				<td>Category:</td>\n
				<td>";
				categorydropdown();
				echo "</td>
			</tr>
			<tr>
				<td></td>
				<td>Brand:</td>\n
				<td>";
				branddropdown();
				echo "</td>
			</tr>
			<tr>
				<td></td>
				<td>Product name:</td>
				<td><textarea name=\"product_name\" maxlength=\"255\" cols=\"50\" rows=\"2\" style=\"resize: none;\"></textarea></td>
			</tr>
			<tr>
				<td>
				<img src=\"images/icons/question-button.png\" class=\"simple-target\" id=\"simple-target-1\"/>
				<div class=\"simple-content\" id=\"simple-content-1\">
					<p> BBcode input allowed. HTML mark-up isn't. </p>
				</div>
				</td>
				<td>Product description:</td>
				<td><textarea name=\"product_description\" maxlength=\"65535\" cols=\"70\" rows=\"3\" style=\"resize: vertical; max-height: 400px;\"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>Resale price (incl. tax):</td>
				<td><input type=\"text\" name=\"product_price\" size=10 maxlength=8 placeholder=\"&#8364;\"></td>
			</tr>
			<tr>
				<td></td>
				<td>Stock quantity:</td>
				<td><input type=\"text\" name=\"product_quantity\" size=10 maxlength=3></td>
			</tr>
			<tr>
				<td>
				<img src=\"images/icons/question-button.png\" class=\"simple-target\" id=\"simple-target-2\"/>
				<div class=\"simple-content\" id=\"simple-content-2\">
					<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet enim... </p>
				</div>
				</td>
				<td>Delivery period:</td>
				<td>
					<select name=\"product_deliverytime\">
						<option id=\"1\" value=\"instock\">In stock</option>
						<option id=\"2\" value=\"2to5days\">2 to 5 business days</option>
						<option id=\"3\" value=\"7to10days\">7 to 10 business days</option>
						<option id=\"4\" value=\"\over14days\">>14 business days</option>
						<option id=\"0\" value=\"discontinued\">Discontinued</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
				<img src=\"images/icons/question-button.png\" class=\"simple-target\" id=\"simple-target-3\"/>
				<div class=\"simple-content\" id=\"simple-content-3\">
					<p> Set to yes to feature this product on the front page. </p>
				</div>
				</td>
				<td>
					Featured:
				</td>
				<td>
					<select name=\"product_featured\">
						<option id=\"1\" value=\"yes\">Yes</option>
						<option id=\"0\" value=\"no\">No</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Product image:</td>
				<td><input type=\"file\" name=\"file\" size=10 maxlength=3></td>
			</tr>
			
		</table>
		<br />
		<input type=\"hidden\" name=\"hidden\" value=\"add\">
		<input type=\"submit\" name=\"submit\" value=\"Add product\">
		</form><br />";
		if ($product_id) {
			echo "<div id=\"added_msg\" style=\"display: " . $msg_style . ";\">Product has succesfully been added.<br />";
			echo $file_msg . "<br /><br />";
				backoffice_productbox($product_id);
			echo "</div>";
		}
	}
?>

<html>
	<head>
		<title>Backoffice | Add product</title>
		<?php echo $backoffice_headcontent ; ?>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$(".simple-target").ezpz_tooltip();
			});
		</script>

		<style type="text/css" media="screen">

	        
	        h1 {
	            margin: 0px 0;
	            font-family: 'Trebuchet MS', Helvetica;
	        }
	        
	        p {
	            margin: 0px 0;
	            font-family: 'Trebuchet MS', Helvetica;
	        }

	        #added_msg {
	        	width: 500px;
	        	overflow: visible;
	        }

	        #added_msg table {
	        	font-size: 13px;
	        	border-width: 0px;
	        	border-style: solid;
	        	border-color: red;
	        	text-align: left;
	        }
	        
	        .bubbleInfo {
	            display: inline-block;
	            position: relative;
	            width: 490px;
	            margin-left: -225px;

	            padding: 0px;
	        }
	        .trigger {
	        	width: 45px;
	        	margin-left: auto;
	        	margin-right: auto;
	            position: relative;
	            text-align: center;
	        }
	     
	        /* Bubble pop-up */

	        .popup {
                position: absolute;
                display: none;
                z-index: 50;
                border-collapse: collapse;

                width: 450px;
                margin-left: 50px;
                margin-top: -40px;
	        }

	        .popup td.corner {
	                height: 15px;
	                width: 19px;
	        }

	        .popup td#topleft { background-image: url(http://static.jqueryfordesigners.com/demo/images/coda/bubble-1.png); }
	        .popup td.top { background-image: url(http://static.jqueryfordesigners.com/demo/images/coda/bubble-2.png); }
	        .popup td#topright { background-image: url(http://static.jqueryfordesigners.com/demo/images/coda/bubble-3.png); }
	        .popup td.left { background-image: url(http://static.jqueryfordesigners.com/demo/images/coda/bubble-4.png); }
	        .popup td.right { background-image: url(http://static.jqueryfordesigners.com/demo/images/coda/bubble-5.png); }
	        .popup td#bottomleft { background-image: url(http://static.jqueryfordesigners.com/demo/images/coda/bubble-6.png); }
	        .popup td.bottom { background-image: url(http://static.jqueryfordesigners.com/demo/images/coda/bubble-7.png); text-align: center;}
	        .popup td.bottom img { display: block; margin: 0 auto; }
	        .popup td#bottomright { background-image: url(http://static.jqueryfordesigners.com/demo/images/coda/bubble-8.png); }

	        /* Bubble content */
	        .popup table.popup-contents {
                font-size: 12px;
                line-height: 1.2em;
                background-color: #fff;
                color: #666;
                font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", sans-serif;
                width: 100%;
	        }

	       
      	  table.popup-contents th {
        		width: 30%;
                text-align: left;
	        }

	        table.popup-contents td {
        		width: 70%;
                text-align: left;
	        }
	        
	        /*
	        tr#edit th {
                text-align: left;
                text-indent: -9999px;
                background: url(http://jqueryfordesigners.com/demo/images/coda/starburst.gif) no-repeat;
                height: 17px;
	        }
	        */

	        tr#edit th a {
	        	text-decoration: none;
	            color: #333;
	        }
    	</style>

		<script type="text/javascript">
		    <!--
		    $(function () {
		        $('.bubbleInfo').each(function () {
		            var distance = 10;
		            var time = 250;
		            var hideDelay = 500;

		            var hideDelayTimer = null;

		            var beingShown = false;
		            var shown = false;
		            var trigger = $('.trigger', this);
		            var info = $('.popup', this).css('opacity', 0);


		            $([trigger.get(0), info.get(0)]).mouseover(function () {
		                if (hideDelayTimer) clearTimeout(hideDelayTimer);
		                if (beingShown || shown) {
		                    // don't trigger the animation again
		                    return;
		                } else {
		                    // reset position of info box
		                    beingShown = true;

		                    info.css({
		                        top: -90,
		                        left: -33,
		                        display: 'block'
		                    }).animate({
		                        top: '-=' + distance + 'px',
		                        opacity: 1
		                    }, time, 'swing', function() {
		                        beingShown = false;
		                        shown = true;
		                    });
		                }

		                return false;
		            }).mouseout(function () {
		                if (hideDelayTimer) clearTimeout(hideDelayTimer);
		                hideDelayTimer = setTimeout(function () {
		                    hideDelayTimer = null;
		                    info.animate({
		                        top: '-=' + distance + 'px',
		                        opacity: 0
		                    }, time, 'swing', function () {
		                        shown = false;
		                        info.css('display', 'none');
		                    });

		                }, hideDelay);

		                return false;
		            });
		        });
		    });
		    
		    //-->
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
				<?php addproduct(); ?>
			</div>
	
			<div id="box-footer">
				<?php echo $main_footer; ?>
			</div>

		</div>
	</body>
</html>