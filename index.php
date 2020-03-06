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
    <title>iFRIEND | Find your friends</title>

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
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
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
                            <!-- <img src="img/logo.png" alt=""> -->
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
    <section class="hero-section home-page set-bg" data-setbg="img/mybg2.jpg">
    </section>
    <!-- Hero Section End -->
    <!-- Filter Search Section Begin -->
    <div class="filter-search" id="search">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <form class="filter-form" method="POST">
                        <div class="location">
                            <p>地區</p>
                            <select class="filter-location" name="slocat">
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
                            <select class="filter-property" name="stype">
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
                                    <div tabindex="0"
                                        class="ui-slider-handle ui-corner-all ui-state-default slider-left" id="sprice1">$100</div>
                                    <div tabindex="0"
                                        class="ui-slider-handle ui-corner-all ui-state-default slider-right" id="sprice2">$2000</div>
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
    <!-- Hotel Room Section Begin -->
    <section class="hotel-rooms spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-45 d-flex justify-content-between">
                    <div class="found-items">
                        <h4>熱門 iFRIEND</h4>
                    </div>
                    <div class="found-items mr-3">
                        <a href="./search.php"><h4>查看全部</h4></a>
                    </div>
                </div>
            </div>
            <!-- popular ifriend -->
            <div class="row popUser">
                <?php
                $members=select("t4_profile",'1 LIMIT 12');
                // print_r($members);
                foreach ($members as $member ) {
                ?>
                <div class="col-4 col-md-3 col-lg-2">
                    <a href="userprofile.php?id=<?=$member['acc']?>">
                        <div>
                            <img src="php/upload/<?=$member['img']?>">
                            <div>
                                <span class="fontsize-18"><?=$member['nickname']?></span>
                                <span class="fontsize-16"><?=$member['location']?></span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="row mt-4" id="event">
                <div class="col-lg-12 p-45 d-flex justify-content-between padd-26">
                    <div class="found-items">
                        <h4>熱門活動</h4>
                    </div>
                    <div class="found-items mr-3">
                        <a href="./event.php"><h4>查看全部</h4></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    // $events=select("t5_event",1);
                    $sql="SELECT * FROM t5_event WHERE (num-order_num>0) AND (date >NOW()) LIMIT 6";
                    $events=$db->query($sql);
                    // print_r($events);
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
    <!-- Hotel Room Section End -->
    <!-- Newslatter Section Begin -->
    <section class="newslatter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="newslatter-text">
                        <div class="row justify-content-between">
                            <div class="col-4 col-lg-3">
                                <img class="rounded-circle" src="img/guide/search.jpg">
                                <h5>1. <span>搜尋 iFRIEND</span></h5>
                            </div>
                            <div class="col-4 col-lg-3">
                                <img class="rounded-circle" src="img/guide/communication.jpg">
                                <h5>2. <span>提出申請</span></h5>
                            </div>
                            <div class="col-4 col-lg-3">
                                <img class="rounded-circle" src="img/guide/gotrip2-2.jpg">
                                <h5>3. <span>享受 iFRIEND</span></h5>
                            </div>
                        </div>
                        <h4>快來尋找你的 iFRIEND 吧！</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newslatter Section End -->
    <!-- Servies Section Begin -->
    <section class="services-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-side">
                        <h2><span>如何加入 iFRIEND ？</span><br>註冊會員即可開始交友！</h2>
                        <p>每天一個人吃飯，一個人上課，一個人看電影，一個人旅遊，是否厭倦孤單的邊緣人生？加入 iFRIEND 擺脫邊緣稱號，讓生活更有趣！</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-side">
                        <ul>
                            <li><img src="img/check.png" alt="">擺脫邊緣人的稱號</li>
                            <li><img src="img/check.png" alt="">隨時隨地交友</li>
                            <li><img src="img/check.png" alt="">參與各種類型的活動</li>
                            <!-- <li><img src="img/check.png" alt="">即時線上聊天室</li> -->
                            <li><img src="img/check.png" alt="">不定時官方活動</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Servies Section End -->
    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 text-center sp-60">
                    <a href="#" data-toggle="modal" data-target="#alogin">
                        <img src="img/only-logo.png" alt="">
                    </a>
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
    <!-- Modal -->
    <div class="modal fade" id="alogin" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">管理者登入</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="alogin-form" action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="aacc" style="position:relative;transform:translateY(0%)">帳號</label>
                        <input type="text" class="form-control" id="aacc" name="aacc" placeholder="請輸入帳號" required>
                    </div>
                    <div class="form-group">
                        <label for="apwd" style="position:relative;transform:translateY(0%)">密碼</label>
                        <input type="password" class="form-control" id="apwd" name="apwd" placeholder="請輸入密碼" required>
                    </div>
                    <p id="result-3" style="color:#ed5565;font-size: 16px;margin-left: 5px;" class="label-agree-term"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="alogin()" class="btn btn-primary">登入</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                </div>                
                </form>
            </div>
        </div>
    </div>
    <!-- Js Plugins -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/main.js"></script>
    <script src="js/myjs.js"></script>
</body>

</html>