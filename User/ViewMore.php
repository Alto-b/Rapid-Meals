<?php
ob_start();
include("Head.php");
include("../Asset/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View More</title>
</head>
    <body>
        <div align="center" id="tab">
        <h2>Packages Details</h2>
            <table>
                <tr>
                     <?php
                        $selQry="select * from tbl_packagehead ph inner join tbl_packagebody pb on pb.package_id=ph.package_id where ph.package_id='".$_GET["pid"]."'";
                        $row=$con->query($selQry);
                        $i=0;
                        if($data=$row->fetch_assoc())
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
                                        <td>
                                        	Details :
                                        </td>
                                        <td>
                                            <?php echo $data["package_details"]; ?>
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
                        }
                    ?>
            </table>
            <hr />
            <table>
                <tr>
                     <?php
                        $row1=$con->query($selQry);
                        $i=0;
                        while($data1=$row1->fetch_assoc())
                        {
                            $i++;
                            
                        ?>
                            <td>
                                <table border="1">
                                    <tr>
                                        <td>
                                        	Day 
                                        </td>
                                        <td>
                                            <?php echo $data1["body_day"]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        	Breakfast 
                                        </td>
                                        <td>
                                            <?php echo $data1["body_breakfast"]; ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                        	Lunch 
                                        </td>
                                        <td>
                                            <?php echo $data1["body_lunch"]; ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                        	Snacks 
                                        </td>
                                        <td>
                                            <?php echo $data1["body_snacks"]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        	Dinner 
                                        </td>
                                        <td>
                                            <?php echo $data1["body_dinner"]; ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        <?php
                           
                        }
                    ?>
                    </tr>
            </table>
        </div>
    </body>
</html>
<?php
include("Foot.php");
ob_flush();
?>