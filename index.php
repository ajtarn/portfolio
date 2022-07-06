<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <meta charset="UTF-8">
<style>
a:link {
  color: pink;
}
body {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
.style1 {color: #0000FF}
</style>
</head>

<body>
    <form action = "" method="POST">
  <h1> Products </h1>
    <h4 style="text-align:right;"><a href="insert.php">เพิ่มสินค้า</a></h4> 
    </p>
    <input name="pname" type ="text" id="pname" value maxlength="20" size = "20=" width = "20" required>
    <input type="submit" value ="Search">
    <input name="Reset" type="reset" value="Reset" onClick="parent.location.href='index.php'"> 
    <hr><br>
    <table>
                <tr>
               	  <th><div align="center">ลำดับ</div></th> 
                    <th><div align="center">ชื่อสินค้า</div></th>
                    <th><div align="center">รูปภาพ</div></th>
                    <th><div align="center">ประเภทสินค้า</div></th>
                    <th><div align="center">คำอธิบายสินค้า</div></th>
                  	<th><div align="center">ราคา</div></th>
                  <th><div align="center">จำนวนสินค้า</div></th>
                    <th><div align="center">แก้ไข</div></th>
                  <th><div align="center">ลบ</div></th>
                    
                </tr>

                <?php
               require 'connect.php';
                $text = null;
                if (isset($_POST["pname"])) {
                    $text = $_POST["pname"];
                }
                $query = "SELECT * FROM Products WHERE ProductName 
                LIKE '%" . $text . "%' OR Category LIKE '%" . $text . "%' OR ProductDescription LIKE '%" . $text . "%'";
                $result = mysqli_query($con, $query);         
                while ($row = mysqli_fetch_array($result))
				
                    {
                        $image = $row["Picture"];
                        $imageData = base64_encode(file_get_contents($image)); 
                        https://stackoverflow.com/questions/31793512/php-display-image-from-url-into-homepage
                        echo "<tr>";
                        echo "<td align='center'>" . $row["ProductID"] . "</td>";
                        echo "<td align='center'>". $row["ProductName"] . "</a>" . "</td>";
                        echo "<td><img style= 'width:70px;' src='data:image/jpeg;base64," .$imageData."'></td>";
                        echo "<td align='center'>" . $row["Category"] . "</td>";
                        echo "<td align='center'>" . $row["ProductDescription"] . "</td>";
                        echo "<td>" . $row["Price"] . "</td>";
                        echo "<td>" . $row["QuantityStock"] . "</td>";
						echo "<td>" ." <a href= 'DelUpd.php?ProductID=$row[0]' > " ."แก้ไข". "</a>" . "</td>";
						echo "<td>" ." <a href= 'DelUpd.php?ProductID=$row[0]' > " ."ลบ". "</a>" . "</td>";
                        echo "</tr>";

                    }
                
                echo "</table>";
                ?>              
            </table>
    </form>
</body>

</html>