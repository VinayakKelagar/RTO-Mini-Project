<?php
    $RTO_Code = '';
    $Branch_Name = '';
    $Branch_City = '';
    $STD_Code = '';
    $RTO_Codeerr = '';
    if (isset($_POST['submit']))
    {
        session_start();
        require_once('Connection.php');
        $RTO_Code = $_POST['RTO_Code'];
        $Branch_Name = $_POST['Branch_Name'];
        $Branch_City = $_POST['Branch_City'];
        $STD_Code = $_POST['STD_Code'];
    
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $q = "select * from RTO_Branch where RTO_Code=$RTO_Code";
        $r = $db->query($q);
        // if ($r->num_rows > 0)
        // {
        //     $$RTO_Codeerr = "RTO Branch is already Exist";
        // }
        // else 
        // {
            
            $sql = "insert into RTO_Branch(RTO_Code, Branch_Name, Branch_City, STD_Code) 
                    values('$RTO_Code', '$Branch_Name', '$Branch_City', '$STD_Code') ";
            $res = $db->query($sql);
            $sql1 = "select id, status from RTO_Branch where RTO_Code='$RTO_Code'";
            $result = $db->query($sql1);
            header("Location: RegRTOBranch.php");
            die();
            // $row = $result->fetch_array();
            // $id = $row[0];
            // $status = $row[1];
            $db->close();
        //}
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RTO BRANCH DETAILS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <br>
    <h1 class="text-white text-center font-weight-bold bg-warning" style="font-size: 55px;"> NEW RTO BRANCH</h1>
    <div class="container"><br>
        <div class="col-lg-6 m-auto d-block">
            <form method="POST" onsubmit="return validation()" class="bg-light">
                <div class="form-group">
					<label for="RTO_Code" class="font-weight-bold"> Enter Branch Code: </label>
					<input type="text" name="RTO_Code" class="form-control" id="RTO_Code" value="<?php echo $RTO_Code; ?>">
					<span id="RTO_Codeerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="Branch_Name" class="font-weight-bold"> Enter Branch Name: </label>
					<input type="text" name="Branch_Name" class="form-control" id="Branch_Name" value="<?php echo $Branch_Name; ?>">
					<span id="Branch_Nameerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="Branch_City" class="font-weight-bold"> Enter Branch City: </label>
					<input type="text" name="Branch_City" class="form-control" id="Branch_City" value="<?php echo $Branch_City; ?>">
					<span id="Branch_Cityerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="STD_Code" class="font-weight-bold"> Enter STD Code: </label>
					<input type="text" name="STD_Code" class="form-control" id="STD_Code" value="<?php echo $STD_Code; ?>">
					<span id="STD_Codeerr" class="text-danger font-weight-bold"> </span>
				</div>
                <center><input type="submit" name="submit" value="SUBMIT" class="btn btn-success"><center>
            </form>
            <br>
        </div>
    </div>
    <script type="text/javascript">
        function validation() {
            var RTO_Code = document.getElementById('RTO_Code').value;
            var Branch_Name = document.getElementById('Branch_Name').value;
            var Branch_City = document.getElementById('Branch_City').value;
            var STD_Code = document.getElementById('STD_Code').value;
    
            if (RTO_Code == "") {
                document.getElementById('RTO_Codeerr').innerHTML =" ** Please fill the RTO_Code field";
                return false;
            }
            if (Branch_Name == "") {
                document.getElementById('Branch_Nameerr').innerHTML =" ** Please fill the Branch_Name field";
                return false;
            }
            if (Branch_City == "") {
                document.getElementById('Branch_Cityerr').innerHTML =" ** Please fill the Branch_City field";
                return false;
            }
            if (STD_Code == "") {
                document.getElementById('STD_Codeerr').innerHTML =" ** Please fill the STD_Code field";
                return false;
            }
            return true;
        }
    </script>
    <?php require_once('footer.php'); ?>
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
</html>