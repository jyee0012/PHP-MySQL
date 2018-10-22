<?php include("includes/admin-check.php"); ?>
<?php include("includes/header.php"); ?>

<div class="row">
	<div class="col-md-12">
		<?php
            $contactid = trim($_GET['contactid']);
            $contactid = filter_var($contactid, FILTER_SANITIZE_NUMBER_INT);
            if ($contactid != "")  {
                $result = mysqli_query($con, "SELECT * from $database WHERE cid = '$contactid'") or die(mysqli_error($con));
                
                while ($row = mysqli_fetch_array($result)){
                    $business = $row['jye_bname'];
                    $person = $row['jye_pname'];
                    $email = $row['jye_email'];
                    $website = $row['jye_url'];
                    $phone = $row['jye_phone'];
                    $address = $row['jye_address'];
                    $city = $row['jye_city'];
                    $province = $row['jye_province'];
                    $description = $row['jye_description'];
                    $sendletters = $row['jye_sendletters'];
                }
                switch($province) {
                    case "AB":
                        $useProvince = "Alberta"; 
                        break;
                    case "MB":
                        $useProvince = "Manitoba"; 
                        break;
                    case "ON":
                        $useProvince = "Ontario"; 
                        break;
                    case "QC":
                        $useProvince = "Quebec"; 
                        break;
                    case "BC":
                        $useProvince = "British Columbia"; 
                        break;
                    case "SK":
                        $useProvince = "Saskatchewan"; 
                        break;
                    case "NS":
                        $useProvince = "Nova Scotia"; 
                        break;
                    case "NB":
                        $useProvince = "New Brunswick"; 
                        break;
                    case "NL":
                        $useProvince = "Newfoundland"; 
                        break;
                    case "PE":
                        $useProvince = "Prince Edward Island"; 
                        break;
                    case "NT":
                        $useProvince = "Northwest Territories"; 
                        break;
                    case "YT":
                        $useProvince = "Yukon"; 
                        break;
                    case "NU":
                        $useProvince = "Nanavut"; 
                        break;
                    default:
                        $useProvince = "N/A"; 
                        break;
                }

                if ($person == "") {
                    $usePerson = "N/A";
                }else{
                    $usePerson = $person;
                }
                if ($address == "") {
                    $useAddress = "N/A";
                }else{
                    $useAddress = $address;
                }
                if ($city == "") {
                    $useCity = "N/A";
                }else{
                    $useCity = $city;
                }
                if ($description == "") {
                    $useDescrip = "N/A";
                }else{
                    $useDescrip = $description;
                }
            }
		?>
		<h1><?php if ($business) echo $business; ?></h1>
        <hr>
        <p>Contact: <?php if ($usePerson) echo $usePerson; ?></p>
        <p>Email: <?php if ($email) echo "<a href=\"mailto:$email\">$email</a>"; ?></p>
        <p>Phone: <?php if ($phone) echo $phone; ?></p>
        <p>Website: <?php if ($website) echo "<a href=\"$website\">$website</a>"; ?></p>
        <p>Address: <?php if ($useAddress) echo $useAddress; ?></p>
        <p>City: <?php if ($useCity) echo $useCity; ?></p>
        <p>Province: <?php if ($useProvince) echo $useProvince; ?></p>
        <p>Description: <?php if ($useDescrip) echo $useDescrip; ?></p>
        <a href="admin/edit.php?contactid=<?php echo $contactid; ?>" class="btn btn-info editbtn">Edit</a>
	</div>
</div>

<?php include ("includes/footer.php"); ?>