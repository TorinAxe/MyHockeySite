<?php
header('Content-Type: text/html; charset=utf-8');
?>

<style>
    .wrapper
    {
        margin: auto;
        padding-top: 20% ;
    }

    a {
        font-size: 24px;
        color: white;
    }

    .wrapper img{
        display: block;
        margin: auto;
    }

    body {
        background: white;
        animation: move-shadow 0.1s infinite;
    }
    @keyframes move-shadow {
        0%{
            background: blue;
        }
        50%{
            background: red;
        }
    }
</style>

<script>
    function run(){
        let y=Math.floor(Math.random()*301);
        let x=Math.floor(Math.random()*301);
        document.getElementById("exit").style.top = "" + y;
        document.getElementById("exit").style.left = "" + x;
    }
</script>

<link href="css/main_style.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css"/>

<body id="home">
    <div class="wrapper" >
        <img src="images/404page.jpg"></center>
    </div>
    <a id="exit" href="index.php?page=1" color="white" onmouseover="run()"> Вернуться на Главную</a>
</body>

