<html>
<head>
<title>PHP User Registration Form</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <form name="frmRegistration" method="post" action="db.php" onsubmit="return validateMember()">
        <div class="demo-table">
        <div class="form-head">Sign Up</div>
            
<?php
if (! empty($errorMessage) && is_array($errorMessage)) {
    ?>	
            <div class="error-message">
            <?php 
            foreach($errorMessage as $message) {
                echo $message . "<br/>";
            }
            ?>
            </div>
<?php
}
?>
            </div>
            <div class="field-column">
                <label>Email</label>
                <div>
                    <input type="text" class="demo-input-box"
                        name="userEmail"
                        value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
                </div>
            <div class="field-column">
                <label>Password</label>
                <div><input type="password" class="demo-input-box"
                    name="password" value=""></div>
            </div>
            <div class="field-column">
                <label>Confirm Password</label>
                <div>
                    <input type="password" class="demo-input-box"
                        name="confirm_password" value="">
                </div>
            </div>
            <div class="field-column">
                <label>user type</label>
                <div><select name="usertype" id="usertype" class="form-control" required>
       <option value="">Select Order</option>
       <option value="user">user</option>
        <option value="master">master</option>
                </div>

            </div>
            
            </div>
            <div class="field-column">
                <div class="terms">
                    <input type="checkbox" name="terms"> I accept terms
                    and conditions
                </div>
                <div>
                    <input type="submit"  
                        name="register-user" value="Register"
                        class="btnRegister">
                </div>
            </div>
        </div>
    </form>
    <?php
    function validateMember()
{
    $valid = true;
    $errorMessage = array();
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $valid = false;
        }
    }
    
    if($valid == true) {
        if ($_POST['password'] != $_POST['confirm_password']) {
            $errorMessage[] = 'Passwords should be same.';
            $valid = false;
        }
        
        if (! isset($error_message)) {
            if (! filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
                $errorMessage[] = "Invalid email address.";
                $valid = false;
            }
        }
        
        if (! isset($error_message)) {
            if (! isset($_POST["terms"])) {
                $errorMessage[] = "Accept terms and conditions.";
                $valid = false;
            }
        }
    }
    else {
        $errorMessage[] = "All fields are required.";
    }
    
    if ($valid == false) {
        return $errorMessage;
    }
    return;
}?>
</body>
</html>