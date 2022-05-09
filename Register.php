<?php
session_start();

$name_regex="/^([a-zA-Z' ]+)$/";
$email_regex="/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
$phoneNumber_regex="/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})?[-.\\s]?([0-9]{4})$/";

if (isset($_POST['submit'])){
$_SESSION['firstName']=$_POST['firstname'];
$_SESSION['secondname']=$_POST['secondname'];
$_SESSION['thirdname']=$_POST['thirdname'];
$_SESSION['fourthname']=$_POST['fourthname'];
$_SESSION['email']=$_POST['signUpEmail'];
$_SESSION['password']=$_POST['signUpPassword'];
$_SESSION['confirmPassword']=$_POST['signUpConfirmPassword'];
$_SESSION['PhoneNumbers']=$_POST['phonenumber'];

$_SESSION['dateOfBirth']=$_POST['DOB'];
// $_SESSION['array']=array('');
$_SESSION['date_create']=date("Y-m-d"); //this is for Date Create
    // this is forFirst name check
    if(preg_match($name_regex,$_SESSION['firstName'])){
        $firstName_result="<span style=' color:green'>Correct Name</span> <br>";
        $firstName_correct=true;
    }else{
        $firstName_result="<span style=' color:red'>InCorrect Name</span> <br>";
        $firstName_correct=false;
    }
    //this is forMiddle name check
    if(preg_match($name_regex,$_SESSION['secondname'])){
        $secondname_result="<span style=' color:green'>Correct Name</span> <br>";
        $secondName_correct=true;
    }else{
        $secondname_result="<span style=' color:red'>InCorrect Name</span> <br>";
        $secondName_correct=false;
    }
       //this is for middle name check
       if(preg_match($name_regex,$_SESSION['thirdname'])){
        $thirdname_result="<span style=' color:green'>Correct Name</span> <br>";
        $thirdname_correct=true;
    }else{
        $thirdname_result="<span style=' color:red'>InCorrect Name</span> <br>";
        $thirdname_correct=false;
    }
    //this is for family Name
    if(preg_match($name_regex,$_SESSION['fourthname'])){
        $fourthname_result="<span style=' color:green'>Correct Name</span> <br>";
        $fourthname_correct=true;
    }else{
        $fourthname_result="<span style=' color:red'>InCorrect Name</span> <br>";
        $fourthname_correct=false;
    }
    // this is for email
    if(preg_match($email_regex,$_SESSION['email'])){
        $email_result="<span style=' color:green'>Correct Email</span> <br>";
        $email_correct=true;
    }
    else{
        $email_result="<span style=' color:red'>Incorrect Email</span> <br>";
        $email_correct=false;
    }
    // this is for phone
    if(preg_match($phoneNumber_regex,$_SESSION['PhoneNumbers'])){
      $phone_result="<span style=' color:green'>Correct phonenumber</span> <br>";
      $phone_correct=true;
  }
  else{
      $phone_result="<span style=' color:red'>Incorrect phonenumber</span> <br>";
      $phone_correct=false;
  }
    // this is for password
    if(preg_match($password_regex,$_SESSION['password'])){
        $password_result="<span style=' color:green'>Correct Password</span> <br>";
        $password_correct=true;
    }
    else{
        $password_result="<span style=' color:red'>Incorrect Password, your password shoud have:<br>1- 8 characters at least<br>2- At least one uppercase English letter<br>3- At least one lowercase English letter<br>4- At least one digit<br>5- At least one special character </span> <br>";
        $paswword_correct=false;
    }



    // this is for confirm Password
    if(preg_match($password_regex,$_SESSION['confirmPassword'])){
        if ($_SESSION['confirmPassword'] == $_SESSION['password']){
            $password_match=true;
            $confirmPassword_correct=true;
            $confirmPassword_result="<span style=' color:green'>Correct Password</span> <br>";
        }
        else{
            $password_match=false;
            $confirmPassword_result="<span style=' color:red'>Password doesn't match</span> <br>";
        }
        
    }
    else{
        $confirmPassword_result="<span style=' color:red'>Incorrect Password, your password shoud have:<br>1- 8 characters at least<br>2- At least one uppercase English letter<br>3- At least one lowercase English letter<br>4- At least one digit<br>5- At least one special character </span> <br>";
        $confirmPaswword_correct=false;
    }


    
    //this is for date Of Birth
    if((floor((time() - strtotime($_SESSION['dateOfBirth'])) / 31556926)) >16){
        $dob_result="<span style=' color:green'>Your age is greater than 16</span> <br>";
        $confirmDob_correct=true;
    }
    
    else{
        $dob_result="<span style=' color:red'>Your age is less than 16</span> <br>";
        $confirmDob_correct=false;
    }

    $_SESSION["sessionarr"] = array ();
    if(empty($_SESSION["sessionarr"])){
        $_SESSION["sessionarr"]= [];
    }

    if(
        $firstName_correct && $secondName_correct && $thirdname_correct && $fourthname_correct && $email_correct && $phone_correct && $confirmPassword_correct  && $confirmDob_correct
    ){
        $dat_array=[
            'First Name'=> $_SESSION['firstName'],
            'second Name'=> $_SESSION['secondname'],
            'Last Name'=>$_SESSION['thirdname'],
            'Family Name'=> $_SESSION['fourthname'],
            'Email'=> $_SESSION['email'],
            'Phonenumber' => $_SESSION['PhoneNumbers'],
            'Password'=> $_SESSION['password'],
            'Password Confirmation'=> $_SESSION['confirmPassword'],
            'when create' => $_SESSION['date_create'],
            'Date Of Birth'=>$_SESSION['dateOfBirth']
        ];
        array_push($_SESSION["sessionarr"],$dat_array);
        
        header('location:login.php');
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form method="post" >
    <section  class="h-100 bg-dark">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-4">
                <div class="row g-0">
                  <div class="col-xl-6 d-none d-xl-block">
                    <img src="./img/pexels-pixabay-33684.jpg"
                      alt="Sample photo" class="imgg"
                      style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                  </div>
                  <div class="col-xl-6">
                    <div class="card-body p-md-5 text-black">
                      <h3 class="mb-5 text-uppercase">Student registration form</h3>
      
                      <div class="row">
                        
                        <div class="col-md-6 mb-4">
                        <?php if(isset($firstName_result)){echo $firstName_result;}?>
                          <div class="form-outline">
                            <input type="text" name="firstname" id="form3Example1m" class="form-control form-control-lg" required />
                            <label class="form-label" for="form3Example1m">First name</label>
                            
                          </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                        <?php if(isset($secondname_result)){echo $secondname_result;}?>
                          <div class="form-outline">
                            <input type="text" name="secondname" id="form3Example1n" class="form-control form-control-lg" required />
                            <label class="form-label" for="form3Example1n">middle name</label>
                          </div>
                        </div>
                      </div>
                      
      
                      <div class="row">
                        <div class="col-md-6 mb-4">
                        <?php if(isset($thirdname_result)){echo $thirdname_result;}?>
                          <div class="form-outline">
                            <input type="text" name="thirdname" id="form3Example1m1" class="form-control form-control-lg" required />
                            <label class="form-label" for="form3Example1m1">last name</label>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                        <?php if(isset($fourthname_result)){echo $fourthname_result;}?>
                          <div class="form-outline">
                            <input type="text" name="fourthname" id="form3Example1n1" class="form-control form-control-lg"  required />
                            <label class="form-label" for="form3Example1n1">family name</label>
                          </div>
                        </div>
                      </div>
      
                      <div class="form-outline mb-4">
                      <?php if(isset($email_result)){echo $email_result;}?>
                        <input type="text" name="signUpEmail" id="form3Example8" class="form-control form-control-lg" required />
                        <label class="form-label" for="form3Example8">E-mail</label>
                      </div>

                      <div class="form-outline mb-4">
                      <?php if(isset($phone_result)){echo $phone_result;}?>
                        <input type="text" name="phonenumber" id="form3Example99" class="form-control form-control-lg" required />
                        <label class="form-label" for="form3Example99">phone number</label>
                      </div>
      
                      <!-- <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
      
                        <h6 class="mb-0 me-4">Gender: </h6>
      
                        <div class="form-check form-check-inline mb-0 me-4">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                            value="option1" />
                          <label class="form-check-label" for="femaleGender">Female</label>
                        </div>
      
                        <div class="form-check form-check-inline mb-0 me-4">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                            value="option2" />
                          <label class="form-check-label" for="maleGender">Male</label>
                        </div>
      
                        <div class="form-check form-check-inline mb-0">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                            value="option3" />
                          <label class="form-check-label" for="otherGender">Other</label>
                        </div>
      
                      </div>
       -->
                      <!-- <div class="row">
                        <div class="col-md-6 mb-4">
      
                          <select class="select">
                            <option value="1">State</option>
                            <option value="2">Option 1</option>
                            <option value="3">Option 2</option>
                            <option value="4">Option 3</option>
                          </select>
      
                        </div>
                        <div class="col-md-6 mb-4">
      
                          <select class="select">
                            <option value="1">City</option>
                            <option value="2">Option 1</option>
                            <option value="3">Option 2</option>
                            <option value="4">Option 3</option>
                          </select>
      
                        </div>
                      </div>
       -->
                      <div class="form-outline mb-4">
                      <?php if(isset($dob_result)){echo $dob_result;}?>
                        <input type="date" name="DOB" id="form3Example9" class="form-control form-control-lg" required />
                        <label class="form-label" for="form3Example9">DOB</label>
                      </div>
      
                      <div class="form-outline mb-4">
                      <?php if(isset($password_result)){echo $password_result;}?>
                        <input type="password" name="signUpPassword" id="form3Example90" class="form-control form-control-lg" required />
                        <label class="form-label" for="form3Example90">password</label>
                      </div>
      
                      <div class="form-outline mb-4">
                      <?php if(isset($confirmPassword_result)){echo $confirmPassword_result;}?>
                        <input type="password" name="signUpConfirmPassword" id="form3Example99" class="form-control form-control-lg" required />
                        <label class="form-label" for="form3Example99">confirm password</label>
                      </div>
      
                      <!-- <div class="form-outline mb-4">
                        <input type="text" id="form3Example97" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example97">Email ID</label>
                      </div> -->
      
                      <div class="d-flex justify-content-end pt-3">
                        <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                        <input type="submit" class="btn btn-warning btn-lg ms-2" name="submit" value="submit">
                      </div>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      </form>


</body>
</html>