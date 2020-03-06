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
    <title>Search Page | iFRIEND</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
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
                                <a class="dropdown-item" href="./about.html">成為 iFRIEND</a>
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
    <section class="hero-section set-bg search-result" data-setbg="img/mybg2.jpg">
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

    <!-- Hotel Room Section Begin -->
    <?php
    if(isset($_GET['locat'])){
        $locatary=[
            0=>'區',
            1=>'北部地區',
            2=>'中部地區',
            3=>'南部地區',
            4=>'東部地區',
            5=>'離島及其他地區'
        ];
        // http://127.0.0.1/project/ver2/search.php?locat=0&type=0&price1=50&price2=300&keyword=
        $smembers=select('t4_profile','locat LIKE "%'.$locatary[$_GET['locat']].'%" AND price>='.$_GET['price1'].' AND price<='.$_GET['price2'].' AND nickname LIKE "%" AND location LIKE "%" AND intro LIKE "%" AND interest LIKE "%" AND sex LIKE "%'.$_GET['keyword'].'%"');
        // print_r($smembers);
    ?>
        <section class="hotel-rooms spad-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-45">
                        <div class="found-items">
                            <h4>搜尋到 <span><?=count($smembers)?></span> 個結果</h4>
                            <select class="date-select">
                                <!-- <option value="0">評價 高 到 低</option>
                                <option value="0">評價 低 到 高</option> -->
                                <option>預算 低 到 高</option>
                                <option>預算 高 到 低</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row popUser">
                <?php
                // print_r($members);
                foreach ($smembers as $smember ) {
                ?>
                <div class="col-4 col-md-3 col-lg-2">
                    <a href="userprofile.php?id=<?=$smember['acc']?>">
                        <div>
                            <img src="php/upload/<?=$smember['img']?>">
                            <div>
                                <span class="fontsize-18"><?=$smember['nickname']?></span>
                                <span class="fontsize-16"><?=$smember['location']?></span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                }
                ?>
                </div>
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <a href="./search.php" class="btn btn-theme02">查看全部</a>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    else{
    ?>
        <section class="hotel-rooms spad-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-45">
                        <div class="found-items">
                            <?php
                            $members=select("t4_profile",'chk=1');
                            ?>
                            <h4>搜尋到 <span><?=count($members)?></span> 個結果</h4>
                            <select class="date-select">
                                <!-- <option value="0">評價 高 到 低</option> -->
                                <!-- <option value="0">評價 低 到 高</option> -->
                                <option value="1">預算 低 到 高</option>
                                <option value="1">預算 高 到 低</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row popUser">
                <?php
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
            </div>
        </section>
    <?php
    }
    ?>

    <!-- Hotel Room Section End -->
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