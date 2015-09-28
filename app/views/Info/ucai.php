<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo base_url();?>static/css/common.css">
    <link rel="stylesheet" href="<?php echo base_url();?>static/css/style.css">

    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #container{background-color: #fff;
            max-width: 700px; margin: 0 auto;
            font-size: 15px;}
        .mybutton2 a,.mybutton2 a:visted,.mybutton2 a:focus{ 
            color: #fff;text-decoration: none;
        }
        .btn{width: 79%;  margin: 20px 5%; color: #FFF;text-decoration: none; }
        #header{
            background-color: #2FB4E9;
            width: 100%;
            text-align: center;
            float: left;
            font-weight: bold;
            color: #fff;
            padding-top: 0.3em;
            padding-bottom: 0.2em;
            -moz-box-shadow: 0px 3px 0px #2FB4E9; /* 老的 Firefox */
            box-shadow: 0px 3px 0px #2FB4E9;
        }
        #headerwrap span{
            font-size: 20px; float: left;
            padding-top: 5px;
        }
        #headerwrap img{height: 30px; float: left; margin-left: 8px;}
        .line1,.line2{width: 100%; height: 1px; background-color: #83A4B0;}
        .line2{
            background-color: #4499A7;            
        }
        
    
        .content .con_title{
            font-size: 16px; font-weight: bold;color: #ee7218;
            padding-left: 10px;margin-top: 40px; line-height: 30px;
            border-bottom: 1px #ee7218 solid;
            padding-bottom: 0;margin-bottom: 0;
        }
        .content ul ,.content ul li{
            list-style: none;margin: 0; padding: 0px;
        }
        .content ul li{
            margin-top: 15px;
        }
        
        .btn-default {
            background-color: #fff;
            border-color: #ccc;
            color: #333;
        }
        .form-control {
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            color: #555;
            display: block;
            font-size: 14px;
            height: 34px;
            line-height: 1.42857;
            padding: 6px 12px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            width: 90%;
            margin: 0 auto;
        }
        .form-control:focus {
            border-color: #66afe9;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(102, 175, 233, 0.6);
            outline: 0 none;
        }
        .btn-2{width: 90%;}
        .mybutton2{margin: 0;padding: 0;}

        
    </style>
</head>
<body>
<!-- the bag of page -->
<div id="container">
    <div id="header" class="fluid">
        <div class="clearfix" id="headerwrap">
            <img class="mylogo" src="<?php echo base_url();?>static/images/for/hblog.gif">
            <span class="welcome">&nbsp;<?php echo $title;?></span>
        </div>
    </div>
    <div class="line1"></div>
    <div class="line2"></div>

    <div class="content">
        <div style="height:10px;">&nbsp;</div>
        <div class="con_title">
            炎症性肠病完整诊断
        </div>
        <form action="<?php echo site_url("Info/ucai2");?>" method="post" id="myform">
        <ul class="con_ul">
            <li class="item">
                <input type="text" class="form-control" placeholder="姓名" value="" name="name" id="name">
            </li>
            <li class="item">
                <input type="text" class="form-control" placeholder="门诊/住院号" value="" name="hospital_id" id="hospital_id" >
            </li>
            <li class="item">
                <input type="text" class="form-control" placeholder="联系方式" value="" name="phone" id="phone">
            </li>

        </ul>
        <input class="btn btn-success btn-2" type="submit"  value="提交->下一步">
        </form>
      
    </div>
    
    <div class="mybutton2">        
        <a href="<?php echo site_url ('info/index'); ?>"  class="btn btn-default" role="button" style="color:#444; margin-top:0px;">
            返回
        </a>
    </div>
</div>



<!-- end of page  -->
<!-- beggin of js -->
<script src="<?php echo base_url();?>static/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function()
    {
        $("#name").focus();
        $("#myform").submit(function()
        {
    
            if($("#name").val()==""){
                alert("病人姓名不能为空");
                $("#name").focus();
                return false;
            }
            
            if($("#hospital_id").val()==""){
                alert("门诊/住院号不能为空");
                $("#hospital_id").focus();
                return false;
            }
            if($("#phone").val()==""){
                alert("病人手机号码不能为空");
                $("#phone").focus();
                return false;
            }
        });
        //return true;
    });

</script>
<!-- end of js -->
</body>
</html>