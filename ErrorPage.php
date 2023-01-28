<?php

if (isset($_GET['e'])) {
    $errorCode = $_GET['e'];
    switch ($errorCode) {
        case 1:
            $nahhh = 1;
            $title = "Error 404";
            break;
        case 2:
            $nahhh = 2;
            $title = "Error 403";
            break;
        case 3:
            $nahhh = 3;
            $title = "Error 401";
            break;
        case 4:
            $nahhh = 4;
            $title = "Error 400";
            break;
        default:
            $nahhh = 0;
            $title = "Error 404";
            break;
    }
} else {
    $nahhh = 0;
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php echo $title ?></title>

    <style>
    /* Font */
    @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700');

    body {
        background-color: #2F3242;
    }

    svg {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -250px;
        margin-left: -400px;
    }

    .message-box {
        height: 200px;
        width: 380px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -100px;
        margin-left: 50px;
        color: #FFF;
        font-family: Roboto;
        font-weight: 300;
    }

    .message-box h1 {

        font-size: 40px;
        line-height: 46px;
        margin-bottom: 5px;
    }

    .buttons-con .action-link-wrap {
        margin-top: 40px;
    }

    .buttons-con .action-link-wrap a {
        background: #68c950;
        padding: 8px 25px;
        border-radius: 4px;
        color: #FFF;
        font-weight: bold;
        font-size: 14px;
        transition: all 0.3s linear;
        cursor: pointer;
        text-decoration: none;
        margin-right: 10px
    }

    .buttons-con .action-link-wrap a:hover {
        background: #5A5C6C;
        color: #fff;
    }

    #Polygon-1,
    #Polygon-2,
    #Polygon-3,
    #Polygon-4,
    #Polygon-4,
    #Polygon-5 {
        animation: float 1s infinite ease-in-out alternate;
    }

    #Polygon-2 {
        animation-delay: .2s;
    }

    #Polygon-3 {
        animation-delay: .4s;
    }

    #Polygon-4 {
        animation-delay: .6s;
    }

    #Polygon-5 {
        animation-delay: .8s;
    }

    @keyframes float {
        100% {
            transform: translateY(20px);
        }
    }

    @media (max-width: 450px) {
        svg {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -250px;
            margin-left: -190px;
        }

        .message-box {
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -190px;
            text-align: center;
        }
    }
    </style>
</head>

<body>

    <svg width='380px' height='500px' viewBox='0 0 837 1045' version='1.1' xmlns='http://www.w3.org/2000/svg'
        xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:sketch='http://www.bohemiancoding.com/sketch/ns'>
        <g id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd' sketch:type='MSPage'>
            <path d='M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z'
                id='Polygon-1' stroke='#007FB2' stroke-width='6' sketch:type='MSShapeGroup'></path>
            <path d='M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z'
                id='Polygon-2' stroke='#EF4A5B' stroke-width='6' sketch:type='MSShapeGroup'></path>
            <path d='M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z'
                id='Polygon-3' stroke='#795D9C' stroke-width='6' sketch:type='MSShapeGroup'></path>
            <path d='M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z'
                id='Polygon-4' stroke='#F2773F' stroke-width='6' sketch:type='MSShapeGroup'></path>
            <path d='M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z'
                id='Polygon-5' stroke='#36B455' stroke-width='6' sketch:type='MSShapeGroup'></path>
        </g>
    </svg>
    <?php
    if ($nahhh == 1) {
        echo "
    <div class='message-box'>
    <h1>Access Denied!</h1>
        <div>
            <img src='https://readme-typing-svg.demolab.com?font=Sriracha&duration=4500&pause=1500&vCenter=true&width=600&height=30&lines=Unfortunately%2C+we+were+unable+to+connect+to+our+Server.;It+might+not+be+running+or+it+may+have+been+deleted.;In+the+meantime+you+can+go+back+to+the+home+page.;Our+team+is+working+on+fixing+this.' alt='Typing SVG' />
        </div>
        <div class='buttons-con'>
        <div class='action-link-wrap'>
            <a href='./Home/HomePage.php' class='link-button' title='Home Page'>Go to Home Page</a>
        </div>
    </div>";
    } else if ($nahhh == 2) { # empty data passed to the page 
        echo "
    <div class='message-box'>
    <h1>Permission Denied!</h1>
        <div>
        <img src='https://readme-typing-svg.demolab.com?font=Sriracha&duration=4500&pause=500&vCenter=true&width=600&height=30&lines=This+file+cannot+be+opened+because+you+do+not+have;+enough+permissions' alt='Typing SVG' />
        </div>
        <div class='buttons-con'>
        <div class='action-link-wrap'>
            <a href='./Home/HomePage.php' class='link-button' title='Home Page'>Go to Home Page</a>
        </div>
    </div>";
    } else if ($nahhh == 3) { # Not a valid user
        echo "
    <div class='message-box'>
    <h1>User Not Found!</h1>
        <div>
        <img src='https://readme-typing-svg.demolab.com?font=Sriracha&duration=4500&pause=500&vCenter=true&width=600&height=30&lines=The+page+you+are+trying+to+access+requires+you+to+log+in+first.;Otherwise+You+are+using+the+wrong+account+to+access+this+page.' alt='User not found' />
        </div>
        <div class='buttons-con'>
        <div class='action-link-wrap'>
            <a href='./login.php' class='link-button' title='Sign In'>Sign In Here</a>
        </div>
    </div>";
    } else if ($nahhh == 4) { # Denied Account
        echo "
    <div class='message-box'>
    <h1>Account Denied!</h1>
        <div>
        <img src='https://readme-typing-svg.demolab.com?font=Sriracha&duration=4500&pause=500&vCenter=true&width=600&height=30&lines=Your+account+has+been+denied+by+the+admin.;Please+contact+the+admin+for+more+information.' alt='Account Denied' />
        </div>
        <div class='buttons-con'>
        <div class='action-link-wrap'>
            <a href='./Home/HomePage.php' class='link-button' title='Home Page'>Go to Home Page</a>
        </div>
    </div>";
    }else { # Default Error
        echo "
    <div class='message-box'>
    <h1>No Data Found!</h1>
        <div>
        <img src='https://readme-typing-svg.demolab.com?font=Sriracha&duration=4500&pause=1500&vCenter=true&width=600&lines=This+cannot+be+opened+directly%2C;you+need+to+go+through+the+process' alt='Try accessing though Files' />
        </div>
        <div class='buttons-con'>
        <div class='action-link-wrap'>
            <a href='./Home/HomePage.php' class='link-button' title='Home Page'>Go to Home Page</a>
        </div>
    </div>";
    }


    ?>
    </div>

</body>

</html>