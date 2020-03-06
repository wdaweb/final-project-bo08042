<?php
require_once("./php/sql.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Homes Template">
    <meta name="keywords" content="Homes, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page | iFRIEND</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/regist_style_ver2.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo">
                        <a class="h3 text-white" href="./index.php">
                            iFRIEND
                            <span style="font-size:16px" class="ml-1">邊緣人的最後救贖</span>
                        </a>
                    </div>
                    <ul class="main-menu">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./search.php">尋找 iFRIEND</a></li>
                        <li><a href="./event.php">iFRIEND 活動</a></li>
                        <li><a href="#">聊天室</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown">關於 iFRIEND</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">成為 iFRIEND</a>
                                <!-- <a class="dropdown-item" href="#">最新消息</a> -->
                                <a class="dropdown-item" href="./contact.php">聯繫我們</a>
                            </div>
                        </li>
                        <?php
                        if(empty($_SESSION['admin'])){
                            echo '<li><a href="#login" data-toggle="modal">登入</a></li>';
                        }
                        else{
                            echo '
                            <li><a href="./member_page.php">會員專區</a></li>
                            <li><a onclick="logout()" class="logoutbtn">登出</a></li>
                            ';
                        }
                        ?>    
                    </ul>
                    <div id="mobile-menu-wrap"></div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Modal 登入-->
    <div class="modal fade" id="login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content2" id="flipper">
                <!-- insert register.html -->
                <?php
                require_once("register.php");
                ?>
            </div>
        </div>
    </div>
    <!-- Modal 登入 end -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg single-property-r" data-setbg="img/mybg2.jpg">
    </section>
    <!-- Hero Section End -->
    <!-- Filter Search Section Begin -->
    <div class="filter-search search-opt">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <form class="filter-form" method="POST">
                        <div class="location">
                            <p>地區</p>
                            <select class="filter-location">
                                <option value="0">不限</option>
                                <option value="1">北部地區</option>
                                <option value="2">中部地區</option>
                                <option value="3">南部地區</option>
                                <option value="4">東部地區</option>
                                <option value="5">離島及其他地區</option>
                            </select>
                        </div>
                        <div class="search-type">
                            <p>興趣</p>
                            <select class="filter-property">
                                <option value="0">不限</option>
                                <option value="1">美食</option>
                                <option value="2">運動</option>
                                <option value="3">室內活動</option>
                                <option value="4">戶外活動</option>
                            </select>
                        </div>
                        <div class="price-range">
                            <p>預算</p>
                            <div class="range-slider">
                                <div id="slider-range">
                                    <span tabindex="0"
                                        class="ui-slider-handle ui-corner-all ui-state-default slider-left" id="sprice1">$100</span>
                                    <span tabindex="0"
                                        class="ui-slider-handle ui-corner-all ui-state-default slider-right" id="sprice2">$2000</span>
                                </div>
                            </div>
                        </div>
                        <div class="keyword">
                            <p>其他條件</p>
                            <input type="text" placeholder="關鍵字" name="skeyword">
                        </div>
                        <div class="search-btn">
                            <button type="button" onclick="search()"><i class="flaticon-search"></i>Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter Search Section End -->    
    <!-- Single Property Deatails Section Begin -->
    <?php
    $info=select('t3_member_info','acc="'.$_GET['id'].'"');
    $prof=select('t4_profile','acc="'.$_GET['id'].'"');
    ?>
    <section class="property-details">
        <div class="container">
            <div class="row sp-40 spt-40 align-items-stretch mb-3">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="p-ins" style="height: 100% !important">
                        <div class="row details-top">
                            <div class="col-lg-12">
                                <div class="t-details">
                                    <div class="register-id">
                                        <p class="ml-2">加入時間： <span><?=substr($info[0]['registdate'],0,10)?></span></p>
                                    </div>
                                    <div class="popular-room-features single-property">
                                        <div class="size">
                                            <p>預算</p>
                                            <span>$<?=$prof[0]['price']?></span>
                                        </div>
                                        <div class="beds">
                                            <p>時間</p>
                                            <span><?=$prof[0]['freetime1']?>~<?=$prof[0]['freetime2']?>點</span>
                                        </div>
                                        <div class="baths">
                                            <p>居住地</p>
                                            <span><?=$prof[0]['location']?></span>
                                        </div>
                                        <div class="garage">
                                            <p>活動範圍</p>
                                            <span><?=$prof[0]['place']?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="property-description">
                                    <h4>興趣</h4>
                                    <p><?=$prof[0]['interest']?></p>
                                </div>
                                <div class="property-description mt-auto">
                                    <h4>簡介</h4>
                                    <p><?=$prof[0]['intro']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-service">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-5">
                                        <img src="php/upload/<?=$prof[0]['img']?>" alt="" style="border-radius: .375rem">
                                    </div>
                                </div>
                                <h5><?=$prof[0]['nickname']?></h5>
                                <!-- <p>評價<span>★★★☆☆</span><span class="ml-2" style="font-size: 14px;color: #da6161;"><span>6</span> 人評價</span></p> -->
                                <table>
                                    <tr><td style="color:#30304e;font-size:18px;font-weight:500">交友項目</td></tr>
                                    <tr><td><?=$prof[0]['item']?></td></tr>
                                </table>
                                <a href="booking.php?acc=<?=$prof[0]['acc']?>" class="site-btn list-btn">我要申請</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 p-45">
                    <div class="found-items">
                        <h4><span><?=$prof[0]['nickname']?></span> 的活動</h4>
                    </div>

                </div>
            </div>
            <div class="row">
            <?php
                    $events=select("t5_event","acc='".$_GET['id']."'");
                    foreach ($events as $key => $event) {
                        $startTimeStamp=strtotime($event['date']);
                        $datetime=date("Y-m-d H:i:s");
                        $endTimeStamp=strtotime($datetime);
                        $btw=$startTimeStamp-$endTimeStamp;
                        ?>
                        <div class="col-lg-4 col-md-6">
                        <form id="booking_event<?=$event['id']?>" action="booking_event.php" method="POST">
                        <div class="room-items">
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-title">
                                        <h5><?=$event['eventname']?></h5>
                                        <input type="hidden" name="eventname" value="<?=$event['eventname']?>">
                                        <input type="hidden" name="id" value="<?=$event['id']?>">
                                        <div class="no-margin">發起人 <a href="userprofile.html" class="organizer"><?=$event['organizer']?></a></div>
                                        <input type="hidden" name="organizer" value="<?=$event['organizer']?>">
                                    </div>
                                </div>
                                <div class="room-details">
                                    <div class="room-title">
                                        <a href="#" style="pointer-events: none;"><i class="flaticon-placeholder move-top-1"></i> <span><?=$event['place']?></span></a>
                                        <input type="hidden" name="place" value="<?=$event['place']?>">
                                        <a href="#" style="pointer-events: none;" class="large-width ml-2"><i class="far fa-calendar-alt" style="padding-top: 5px;"></i> <span><?=substr($event['date'],0,16)?></span></a>
                                        <input type="hidden" name="date" value="<?=$event['date']?>">
                                    </div>
                                </div>
                                <div class="room-features">
                                    <div class="room-info d-flex justify-content-between padding-32">
                                        <div class="size no-margin-right">
                                            <p class="fontsize-14">需求人數</p>
                                            <span><?=$event['num']?> 人</span>
                                            <input type="hidden" name="num" value="<?=$event['num']?>">
                                        </div>
                                        <div class="beds no-margin-right">
                                            <p class="fontsize-14">時間</p>
                                            <span><?=$event['timelength']?> h</span>
                                            <input type="hidden" name="timelength" value="<?=$event['timelength']?>">
                                        </div>
                                        <div class="baths no-margin-right">
                                            <p class="fontsize-14">活動類型</p>
                                            <span><?=$event['type']?></span>
                                            <input type="hidden" name="type" value="<?=$event['type']?>">
                                        </div>
                                        <div class="garage">
                                            <p class="fontsize-14">預算</p>
                                            <span>$<?=$event['budget']?></span>
                                            <input type="hidden" name="budget" value="<?=$event['budget']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="room-price">
                                    <p class="counttime">
                                        距離開始：2天 10:59:59
                                    </p>
                                    <input type="hidden" name="time" value="<?=$startTimeStamp?>">
                                    <input type="hidden" name="" value="<?=$endTimeStamp?>">
                                    <span class="fontsize-20">剩餘名額　<?=$event['num']-$event['order_num']?>人</span>
                                </div>
                                <?php
                                if(!empty($_SESSION['admin'])){
                                    if($event['num'] > $event['order_num']){
                                        if($btw<=0){
                                        ?>
                                        <input type="submit" id="<?=$event['id']?>" style="pointer-events: none" class="site-btn btn-line mybtn-1 input-btn1" value="已結束">
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <input type="submit" id="<?=$event['id']?>" class="site-btn btn-line mybtn-1 input-btn1" value="我要參加">
                                        <?php
                                        }
                                    }
                                    else{
                                    ?>
                                        <input type="button" id="<?=$event['id']?>" style="pointer-events: none" class="site-btn btn-line mybtn-1 input-btn1" value="人數已滿">
                                    <?php
                                    }
                                }
                                else{
                                    if($event['num'] > $event['order_num']){
                                        if($btw<=0){
                                        ?>
                                        <input type="submit" id="<?=$event['id']?>" style="pointer-events: none" class="site-btn btn-line mybtn-1 input-btn1" value="已結束">
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <a href="#login" data-toggle="modal" class="site-btn btn-line mybtn-1">我要參加</a>
                                        <?php
                                        }
                                    }
                                    else{
                                    ?>
                                        <input type="button" id="<?=$event['id']?>" style="pointer-events: none" class="site-btn btn-line mybtn-1 input-btn1" value="人數已滿">
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        </form>
                        </div>
                    <?php
                    }
                    ?>
            </div>
        </div>
    </section>
    <!-- Single Property Deatails Section End -->
    <!-- Footer Section Begin -->
    <footer class="footer-section p-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center sp-60">
                    <img src="img/only-logo.png" alt="">
                </div>
            </div>
            <div class="row p-37">
                <div class="col-lg-4">
                    <div class="about-footer">
                        <h5>關於 iFRIEND</h5>
                        <p>邊緣人的最後救贖<br>加入會員，立即展開交友機會</p>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-blog">
                        <h5>最新消息</h5>

                        <div class="single-blog">
                            <div class="lt-side">
                                <img src="img/footer-blog-1.jpg" alt="">
                            </div>
                            <div class="rt-side">
                                <h6>參與官方活動有機會抽大獎</h6>
                                <div class="blog-time">
                                    <i class="flaticon-clock"></i>
                                    <span>5 分鐘前</span>
                                </div>
                                <a href="#" class="read-more">
                                    <i class="flaticon-right-arrow-1"></i>
                                    <span>了解更多</span>
                                </a>
                            </div>
                        </div>
                        <div class="single-blog">
                            <div class="lt-side">
                                <img src="img/footer-blog-2.jpg" alt="">
                            </div>
                            <div class="rt-side">
                                <h6>iFREIND 上線福利滿滿</h6>
                                <div class="blog-time">
                                    <i class="flaticon-clock"></i>
                                    <span>5 分鐘前</span>
                                </div>
                                <a href="#" class="read-more">
                                    <i class="flaticon-right-arrow-1"></i>
                                    <span>了解更多</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-address">
                        <h5>聯繫我們</h5>
                        <ul>
                            <li><i class="flaticon-placeholder"></i><span>132 Liberty Streetelit, Plano, Texas</span>
                            </li>
                            <li><i class="flaticon-envelope"></i><span>hello@ifriend.com</span></li>
                            <li><i class="flaticon-smartphone"></i><span>02-1234-5678</span></li>
                        </ul>
                        <p>Monday – Friday: 8:30 am – 5:00 pm</p>
                        <p>Saturday: 9:00 am – 1:00 pm</p>
                    </div>
                </div>
            </div>

            <div class="row p-20">
                <div class="col-lg-12 text-center">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/main.js"></script>
    <script src="js/myjs.js"></script>
</body>

</html>