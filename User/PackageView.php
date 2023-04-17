<?php
ob_start();
include("Head.php");
include("../Asset/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Package View</title>
</head>
    <body>
        <div align="center" id="tab">
        <h2>Packages</h2>
            <table>
                <tr>
                     <?php
                        $selQry="select * from tbl_packagehead";
                        $row=$con->query($selQry);
                        $i=0;
                        while($data=$row->fetch_assoc())
                        {
                            $i++;
                            
                        ?>
                            <td>
                                <table>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <img src="../Asset/Files/PackageHead/<?php echo $data["package_photo"]; ?>" width="120" height="120" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        	Title :
                                        </td>
                                        <td>
                                            <?php echo $data["package_title"]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        	Price :
                                        </td>
                                        <td>
                                            <?php echo $data["package_price"]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <a href="ViewMore.php?pid=<?php echo $data["package_id"]; ?>">View More</a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td colspan="2" align="center">
                                            <a href="Payment.php?pid=<?php echo $data["package_id"]; ?>">Book Now</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        <?php
                            if($i==3)
                            {
                                echo "</tr><tr>";
                                $i=0;
                               
                            }
                        }
                    ?>
            </table>
        </div>
    </body>
</html>
<?php
include("Foot.php");
ob_flush();
?>