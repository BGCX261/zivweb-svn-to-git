<?php
function dirList ($directory) 
{
	// create an array to hold directory list
    $results = array();

    // create a handler for the directory
    $handler = opendir($directory);

    // keep going until all files in directory have been read
    while ($file = readdir($handler)) {

        // if $file isn't this directory or its parent, 
        // add it to the results array
        if ($file != '.' && $file != '..')
            $results[] = $file;
    }
    // tidy up: close the handler
    closedir($handler);
    // done!
    return $results;
}
?>
<html>
<head>
<title>My root</title>
</head>
<body>

<h1><center>Welcome</center></h1><br />
        <table width="100%">
            <tr><!-- row 1 logo and slogan-->
                <td>
                    <?php
                    echo<<<END
                    <img src="/img/Lbanner.JPG" width="100%"><br>
                    <b><center>logo</center></b>
END
                    ?>
                </td>
                <td>
                    <?php
                    echo<<<END
                    <img src="/img/Rbanner.JPG" width="100%"><br>
                    <b><center>slogen</center></b>
END
                    ?>
                </td>
            </tr>
            <tr><!-- row 2 news info and menus-->
                <td colspan="2">
                    <table width="100%">
                        <tr>
                            <td width="20%"><!-- new roller and general news-->
                                <table>
                                    <tr><!-- news roller-->
                                        <td>
                                            <?php
                                            echo "<b><center>news roller</center></b>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr><!-- static news-->
                                        <td>
                                            <?php
                                            echo "<b><center>static news</center></b>";
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="60%"><!-- info , pictures and articals-->
                                <table width="100%">
                                    <tr><!--  information about the organisation-->
                                        <td>
                                            <?php
                                            echo "<b><center>information</center></b>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr><!-- Organization Location and Picture Galleries-->
                                        <td>
                                            <?php
                                            echo "<b><center>Locations , picture galleries</center></b>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr><!-- Articles-->
                                        <td>
                                            <?php
                                            echo "<b><center>Articles</center></b>";
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="20%"><!-- menus-->
                                <table width="100%">
                                    <tr><!-- login menu-->
                                    	<td>
                                        <?php
                                        echo "<b><center>login Panel</center></b>";
                                        ?>
                                        <a href="login.php">LOGIN</a>
                                        <td>
                                    </tr>
                                    <tr>
                                        <?php
                                        echo "<b><center>links panel</center></b>";
                                        ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><!-- row 3 contact information-->
                <td colspan="2" bgcolor="lightblue" txtcolor="white" border="1">
                    <?php
                        echo "<center><b>CONTACT INFO</b></center>";
                    ?>
                </td>
            </tr>
        </table>
        <br>
<?php
	$results=dirList ("C:/xampp/htdocs/workspace/ZivNeurim/Code");
	echo	"<ul>";
	
	foreach($results as $key=>$val)
	echo "<li><a href=\"$val\">$val</a> <br>";
	echo	"<ul>";
	//phpinfo();
//	echo "$val<br>";
?>

</body>