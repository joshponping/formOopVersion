<?php
if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $middlename = $_POST['middlename'];
    $title = $_POST['title'];
    $dietarypreference = $_POST['dietarypreference'];
    
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $phoneno = $_POST['phoneno'];
    $company = $_POST['company'];
    $pemail = $_POST['pemail'];
    $sponsor = $_POST['sponsor'];
    $companyaddress = $_POST['companyaddress'];
    $participanttype = $_POST['participanttype'];
    $specialneeds = $_POST['specialneeds'];
    
    
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    
    $sql = "SELECT COUNT(email) AS num FROM user WHERE email = :email";
    $stmt = $db->connect()->prepare($sql);
    $stmt->bindValue(':email', $email);
    
    $stmt->execute();
    
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['num'] > 0){die('The registration cannot be completed because email already exists!');
    
    }
    
    $sql = "INSERT INTO user (firstname, surname, middlename, title, email, gender, address, country, state, phoneno, pemail, sponsor, company, companyaddress, participanttype, dietarypreference, specialneeds)
 VALUES (:firstname, :surname, :middlename, :title, :email, :gender, :address, :country, :state, :phoneno, :pemail, :sponsor, :company, :companyaddress, :participanttype, :dietarypreference, :specialneeds)";
    
    $stmt = $db->connect()->prepare($sql);
    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':surname', $surname);
    $stmt->bindValue(':middlename', $middlename);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':gender', $gender);
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':country', $country);
    $stmt->bindValue(':state', $state);
    $stmt->bindValue(':pemail', $pemail);
    $stmt->bindValue(':phoneno', $phoneno);
    $stmt->bindValue(':sponsor', $sponsor);
    $stmt->bindValue(':company', $company);
    $stmt->bindValue(':companyaddress', $companyaddress);
    $stmt->bindValue(':participanttype', $participanttype);
    $stmt->bindValue(':dietarypreference', $dietarypreference);
    $stmt->bindValue(':specialneeds', $specialneeds);
    $result = $stmt->execute();
    
    
    // More headers
    
    
    
    
    
    if($count > 0){
        
        $_SESSION['email'] = $email;
        
        
        
        
        
        $_SESSION['message'] = 'Thank you for completing your registration.';
        
        //         $to = $email;
        //         $subject = "Conference Registration";
        //         $message = " Thank you for registering for the conference";
        //     $headers = "From: cicadi@covenantuniversity.edu.ng \r\n";
        //         $headers .= "Reply-To: ".strip_tags('cicadi@covenantuniversity.edu.ng')."\r\n";
        //         $headers .= "MIME-Version: 1.0" . "\r\n";
        //         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        //        mail($to,$subject,$message,$headers);
        //         $price = 'Academics Registration-Regular = #30000.';
        //         if($participanttype === 'Academics Registration-Regular'){
        //             $_SESSION['message'] = 'Academics Registration-Regular = #30000.';
        //         }
        
        
        //         $id = '1';
        //         $price = $db->connect()->prepare ("SELECT regprice FROM regfees WHERE id = '$id'");
        //         $result = $price->fetch(PDO::FETCH_ASSOC);
        //         echo $result['regprice'];
        
        header("location:welcome.php");
        $_SESSION['message'] = 'Thank you for completing your registration.';
        
    }
    
    else{
        $_SESSION['message'] = "Your registration cannot be completed";
    }
}

?>