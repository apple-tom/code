<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>客户与CDAI标准体重对比</title>
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
        .mybutton2 a,.mybutton2 a:visited,.mybutton2 a:focus{ 
            color: #fff;text-decoration: none;
        }
        a { color: #fff; }
        a:visited { color: #fff; }
        a:hover { color: #fff; }
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
        
        .content ul ,.content ul li{
            list-style: none;margin: 0; padding: 0px;
        }

        .content ul li{
            margin-top: 10px;
            padding-bottom: 10px;
            /*border-bottom: 2px solid #666;*/
        }

        .content .content_li{padding-top: 50px;}
        .con_name{border-bottom: 1px solid #bbb;}
        .con_name span{font-size: 16px; line-height: 30px;}
        .con_name .name1{padding-left: 10px;color: #000;}
        .con_name .name2{color: #666;}
        .con_tent{margin-top: 10px; }
        .con_tent span{display: block;}
        .con_tent .con_img1 img{width: 80px; }
        .con_tent .con_img1{width: 80px; float: left; padding-left: 10px; }

        .con_tent .con_img2{
            box-sizing:border-box;
            -moz-box-sizing:border-box; /* Firefox */
            -webkit-box-sizing:border-box; /* Safari */
            width:100%; margin-left: 95px;
        }
        .con_tent .con_img2 span{color: #666;}
        .my_btn a{
            text-decoration: none; background-color: #337ab7; 
            padding: 6px 8px;color: #Fff;border-radius: 3px;
            font-size: 15px;
        }
        .my_btn{padding-left: 10px;padding-top: 10px;}
    </style>
</head>
<body>
<!-- the bag of page -->
<div id="container">
    <div id="header" class="fluid">
        <div class="clearfix" id="headerwrap">
            <img class="mylogo" src="<?php echo base_url();?>static/images/for/hblog.gif">
            <span class="welcome">&nbsp;客户管理</span>
        </div>
    </div>
    <div class="line1"></div>
    <div class="line2"></div>

    <div class="content">
        <ul class="content_li">
        <?php foreach ($customer as $row) { ?>
            <li class="clearfix">
                <div class="con_name">
                    <span class="name1"><?php echo $row["name"]; ?></span>
                    <span class="name2"><?php echo $row["id"]; ?></span>
                </div>
                <div class="con_tent">
                    <div class="con_img1">
                        <img src="<?php echo base_url(); ?>static/images/customer/<?php if($row['sex'] ==1){echo "man.jpg";}else{echo "girl.png";} ?>">
                    </div>
                    <div class="con_img2">
                        <span>手机号码：<?php echo $row["phone"]; ?></span>
                        <span>性别：<?php if($row['sex'] ==1){echo "男";}else{echo "女";} ?>
                        ，身高：<?php echo $row["height"]; ?>cm</span>
                        <span class="my_btn">
                            <a href="<?php echo site_url ('info/cdai/'.$row['id']); ?>"  class="" role="button" style="width=50px;">
                                体重CDAI
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href=""  class="" role="button" style="width=50px;">
                                内镜诊断EI
                            </a>
                        </span>
                    </div>
                </div>
            </li>
        <?php } ?>
            
        </ul>
    </div>
    
    <div class="mybutton2">        
        <a href="<?php echo site_url ('info/index'); ?>"  class="btn btn-primary" role="button">
            返回
        </a>
    </div>
</div>

<!-- end of page  -->
<!-- beggin of js -->
<script src="<?php echo base_url();?>static/js/jquery.min.js" type="text/javascript"></script>


<!-- end of js -->
</body>
</html>