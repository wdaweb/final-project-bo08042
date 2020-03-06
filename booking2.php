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
    <title>Booking Page | iFRIEND</title>

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
    <!-- bootstrap datetimepicker -->
    <link rel="stylesheet" href="BTDatetimepicker2/bootstrap-datetimepicker.css">
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
    <section class="hero-section set-bg search-result" data-setbg="img/mybg2.jpg">
    </section>
    <!-- Hero Section End -->
    <?php
      // print_r($_POST);
      // $getevent=select('t5_event','id='.$_POST['id']);
      // print_r($getevent);
      $prof=select("t4_profile",'acc="'.$_POST['iacc'].'"');
      $user=select("t3_member_info","acc='".$_SESSION['admin']."'");
      // print_r($event);
    ?>
    <div class="container">
      <div class="row mt-3">
        <div class="col">
          <div class="row justify-content-center">
            <div class="col-3 col-lg-auto">
              <img src="img/order/member/step1.png" alt="">
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center" style="font-size:30px;color:#996EB8">
              <i class="fas fa-arrow-right"></i>
            </div>
            <div class="col-3 col-lg-auto">
              <img src="img/order/member/step2_alt.png" alt="">
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center" style="font-size:30px;color:#996EB8">
              <i class="fas fa-arrow-right"></i>
            </div>
            <div class="col-3 col-lg-auto">
              <img src="img/order/member/step4.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <form action="php/api.php?do=bookwho" method="POST">
        <div class="row mt-4">
          <div class="col col-lg-8 mx-auto">
            <h4>請填寫訂單資訊</h4>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-8 mx-auto p-4 mb-5" style="border: 1px solid #000">
            <div class="row">
              <div class="col-3">申請資訊</div>
              <div class="col-9">
                <div class="d-flex mb-3">
                  <div class="d-flex align-items-center"><div>申請日期：</div></div>
                  <div class="ml-4 form_datetime input-append date d-flex">
                    <input type="text" class="form-control" id="eventWhen" name="date" placeholder="請選擇活動時間" required>
                    <span class="add-on date-size"><i class="icon-remove" style="background-position: -311px -1px;"></i></span>
                    <span class="add-on date-size"><i class="icon-calendar" style="background-position: -191px -121px;"></i></span>
                  </div>
                </div>
                <div class="d-flex mb-3">
                <div class="d-flex align-items-center"><div>申請時數：</div></div>
                  <div class="ml-4 d-flex">
                    <input type="text" style="width: 20%" class="form-control" name="timelength" placeholder="3" required>
                    <div class="d-flex align-items-center ml-2"><div>/h</div></div>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="d-flex align-items-center"><div>地點：</div></div>
                  <div class="ml-4">
                    <input type="text" style="width: 100%" class="form-control" name="place" placeholder="請輸入目的地名稱" required>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="d-flex align-items-center"><div>行程：</div></div>
                  <div class="ml-4">
                    <input type="text" style="width: 100%" class="form-control" name="schedule" placeholder="看電影" required>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="d-flex align-items-center"><div>預計花費：</div></div>
                  <div class="ml-4">
                    <input type="text" style="width: 100%" class="form-control" name="budget" placeholder="300" required>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row mt-4">
              <div class="col-3">詳細行程</div>
              <div class="col-9">
                <textarea name="memo" rows="3" style="width: 90%" placeholder="請寫出詳細地址、行程規劃等內容"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mb-4">
          <button type="submit" class="btn btn-primary">繼續</button>
          <button type="button" class="btn btn-secondary" onclick="history.back(-2)">取消</button>
          <input type="hidden" name="iacc" value="<?=$prof[0]['acc']?>">
          <input type="hidden" name="id" value="<?=$prof[0]['id']?>">
          <input type="hidden" name="uacc" value="<?= $_SESSION['admin'] ?>">
        </div>
      </form>
    </div>

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
    <script src="BTDatetimepicker2/bootstrap-datetimepicker.js"></script>
    <script src="js/datetimepicker_tw.js"></script>
    <script src="js/main.js"></script>
    <script src="js/myjs.js"></script>
</body>

</html>