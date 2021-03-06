<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="index.css"> -->
    <title>Document</title>

    <style>
        body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url("https://images.unsplash.com/photo-1462332420958-a05d1e002413?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1807&q=80");
       background-size: cover;
  }
  
  button, button::after {
    width: 380px;
    height: 86px;
    font-size: 36px;
    font-family: 'Bebas Neue', cursive;
    background: linear-gradient(45deg, transparent 5%, #FFC312 5%);
    border: 0;
    color: #fff;
    letter-spacing: 3px;
    line-height: 88px;
    box-shadow: 6px 0px 0px #00E6F6;
    outline: transparent;
    position: relative;
    
  }
  
  button::after {
    --slice-0: inset(50% 50% 50% 50%);
    --slice-1: inset(80% -6px 0 0);
    --slice-2: inset(50% -6px 30% 0);
    --slice-3: inset(10% -6px 85% 0);
    --slice-4: inset(40% -6px 43% 0);
    --slice-5: inset(80% -6px 5% 0);
    
    content: 'Login';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 3%, #0083f6 3%, #009cf6 5%, #FFC312 5%);
    text-shadow: -3px -3px 0px #F8F005, 3px 3px 0px #00bdf6;
    clip-path: var(--slice-0);
  }
  
  button:hover::after {
    animation: 1s glitch;
    animation-timing-function: steps(2, end);
  }
  
  @keyframes glitch {
    0% {
      clip-path: var(--slice-1);
      transform: translate(-20px, -10px);
    }
    10% {
      clip-path: var(--slice-3);
      transform: translate(10px, 10px);
    }
    20% {
      clip-path: var(--slice-1);
      transform: translate(-10px, 10px);
    }
    30% {
      clip-path: var(--slice-3);
      transform: translate(0px, 5px);
    }
    40% {
      clip-path: var(--slice-2);
      transform: translate(-5px, 0px);
    }
    50% {
      clip-path: var(--slice-3);
      transform: translate(5px, 0px);
    }
    60% {
      clip-path: var(--slice-4);
      transform: translate(5px, 10px);
    }
    70% {
      clip-path: var(--slice-2);
      transform: translate(-10px, 10px);
    }
    80% {
      clip-path: var(--slice-5);
      transform: translate(20px, -10px);
    }
    90% {
      clip-path: var(--slice-1);
      transform: translate(-10px, 0px);
    }
    100% {
      clip-path: var(--slice-1);
      transform: translate(0);
    }
  }

  .btn1::after
  {
      content: "Register";
  }

  a 
  {
      margin: 5%;
  }

  .btns
  {
    display:flex;
    flex-direction: row;
    justify-content: space-around;
  }
    </style>
</head>
<body>
  <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/5ff7df69230675.5b7a9e106f89c.gif" alt="">
  <div class="btns">
    <a href="login.php"><button>Login </button></a>
    
   <a href="Register.php"><button class="btn1" >Register </button> </a> 
   </div>
</body>
</html>