</html>
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
        
        .btn-2{width: 90%;}
        .mybutton2{margin: 0;padding: 0;}
    
        input[type=radio] {
            border: 2px solid #999;width: 19px; height: 19px; border-radius: 9px;
            background-color: transparent;
        }   
        input[type=radio]:checked {
            background: #fff;
        }
        input[type=radio]:checked::after {
            content: '';
            display: block;
            position: relative;
            top: 3px;
            left: 3px;
            width: 9px;
            height: 9px;
            background: #5cb85c;
            -webkit-border-radius: 1em;
            -moz-border-radius: 1em;
            border-radius: 1em;
        }
        .item .item-title{
            font-size: 16px; margin-left: 12px;font-weight: bold;
        }
        .item .radio{
            font-size: 15px;line-height: 30px; height: 30px; margin-left: 22px;
        }


        
        
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
        <form action="<?php echo site_url("Info/ucai3_do");?>" method="post" id="myform">
        <ul class="con_ul">


            <?php 
            $i =1;
            foreach ($question as $row1) { ?>
            <li class="item">
                <div class="item-title"><?php echo $i."、".$row1['title']; ?></div>
                <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                <?php  foreach ($answer as $row2) { 
                    if($row2['qid'] == $row1['id']){
                ?>
                   
                <div class="radio">
                    <label>
                        <input type="radio" class="ucai" name="ucai<?php echo $i;?>" value="<?php echo $row2['core']; ?>">
                        &nbsp;<?php echo $row2['answer']; ?>
                    </label>
                </div>
                <?php }} ?>
                
            </li>
            <?php $i++;} ?>
           
            
        </ul>
        <input class="btn btn-success btn-2" type="submit"  value="提交">
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
            <?php $i=1;
                foreach ($question as $row3) {
            ?>
                    var val<?php echo $i;?>=$('input:radio[name="ucai<?php echo $i;?>"]:checked').val();
                    if(val<?php echo $i;?>==null){
                        alert("还未输入所有选项!");
                        return false;
                    }
            <?php
                $i++;
            }
            ?>
        });
        //return true;
    });

</script>
<!-- end of js -->
</body>
</html>