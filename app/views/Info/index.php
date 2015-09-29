<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="" xmlns="http://www.w3.org/1999/html">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>慢性病信息管理！</title>

    <script src="<?php echo base_url();?>static/js/respond.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>static/js/html5shiv.min.js"></script>
    <![endif]-->
    <link href="<?php echo base_url();?>static/css/boilerplate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>static/css/for.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #container{
            max-width: 900px;
            width: 80%;
            margin: auto;
            text-align: center;
            margin-left: 10%;
        }
        ul ,ul li{list-style: none; text-align: center; margin: 0; padding: 0;}
        ul li{width: 45%; float: left; margin-top: 2em; }
        ul li a:hover img{
            filter:alpha(opacity=70); /*IE滤镜，透明度50%*/
            -moz-opacity:0.7; /*Firefox私有，透明度50%*/
            opacity:0.7;/*其他，透明度50%*/
        }
        #headerwrap{max-width: 960px; margin: auto; width: 90%;}
        .mytitle {font-size: 1.1em; margin-top: 0.8em;}
    </style>


</head>
<body>
<div class="gridContainer">
    <div id="header" class="fluid">
        <div class="clearfix" id="headerwrap">
            <img class="mylogo" src="<?php echo base_url();?>static/images/for/hblog.gif">
            <span class="welcome">&nbsp;慢性病信息管理</span>
        </div>
    </div>
    <div class="line1"></div>
    <div class="line2"></div>


    <div id="container" class="fluid">
        <ul class="clearfix ">
            <li>
                <div><a href="<?php echo site_url ( 'info/cdai' ); ?>"><img src="<?php echo base_url();?>static/images/for/1.gif"></a></div>
                <div class="mytitle">CDAI对照表</div>
            </li>

            <li style="margin-left: 10%;">
                <div><a href="<?php echo site_url ( 'info/ucai' ); ?>"><img src="<?php echo base_url();?>static/images/for/3.gif"></a></div>
                <div class="mytitle">UCAI评分</div>
            </li>

            <li>
                <div><a href="#"><img src="<?php echo base_url();?>static/images/for/5.gif"></a></div>
                <div class="mytitle">待定模块</div>
            </li>

            <li  style="margin-left: 10%;">
                <div><a href="<?php echo site_url ( 'info/customer' ); ?>"><img src="<?php echo base_url();?>static/images/for/4.gif"></a></div>
                <div class="mytitle">客户信息管理</div>
            </li>
        </ul>
    </div>


</div>

</body>
</html>
