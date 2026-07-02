<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Successful</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;

    background:
    linear-gradient(
        rgba(0,0,0,0.35),
        rgba(0,0,0,0.35)
    ),
    url('../images/imagesbg.jpg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
}


.icon:nth-child(1){
    top:10%;
    left:10%;
}

.icon:nth-child(2){
    top:20%;
    right:15%;
}

.icon:nth-child(3){
    bottom:15%;
    left:20%;
}

.icon:nth-child(4){
    bottom:10%;
    right:10%;
}

@keyframes float{
    0%,100%{
        transform:translateY(0);
    }
    50%{
        transform:translateY(-25px);
    }
}


.success-box{
    width:500px;
    padding:45px;
    text-align:center;
    border-radius:30px;

    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,0.3);

    box-shadow:
    0 8px 32px rgba(0,0,0,0.25);

    animation:zoomIn .8s ease;
}
background:
linear-gradient(rgba(0,0,0,0.35),
                rgba(0,0,0,0.35)),
url('../images/imagesbg.jpg');

@keyframes zoomIn{
    from{
        transform:scale(.6);
        opacity:0;
    }
    to{
        transform:scale(1);
        opacity:1;
    }
}


.circle{
    width:110px;
    height:110px;
    margin:auto;
    border-radius:50%;
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:60px;
    color:#2e7d32;
    box-shadow:0 0 30px rgba(255,255,255,.8);
    animation:pulse 2s infinite;
}

@keyframes pulse{
    0%{
        transform:scale(1);
    }
    50%{
        transform:scale(1.08);
    }
    100%{
        transform:scale(1);
    }
}

h1{
    color:white;
    margin-top:20px;
    font-size:34px;
}

p{
    color:white;
    margin-top:15px;
    line-height:1.8;
    font-size:18px;
}

.order-id{
    margin-top:15px;
    color:#fff;
    font-weight:bold;
    font-size:18px;
}

.btn{
    display:inline-block;
    margin-top:30px;
    text-decoration:none;
    background:white;
    color:#2e7d32;
    padding:14px 30px;
    border-radius:50px;
    font-size:18px;
    font-weight:bold;
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(0,0,0,.2);
}

</style>
</head>
<body>


<div class="success-box">

<div class="circle">✓</div>

<h1>Order Successful!</h1>

<p>
Thank you for choosing our Dairy Farm 🥛<br>
Your order has been placed successfully and is being processed.
</p>

<div class="order-id">
📦 Order Confirmed
</div>

<a href="../index.html" class="btn">
🏠 Back to Home
</a>

</div>

</body>
</html>