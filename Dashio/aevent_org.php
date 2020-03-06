<?php
require_once("../php/sql.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- bootstrap datetimepicker -->
    <link rel="stylesheet" href="BTDatetimepicker2/bootstrap-datetimepicker.css">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link href="css/table-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="admin.php" class="logo"><b>iFRIEND</b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="admin.php#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="admin.php#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="admin.php#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="admin.php#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="admin.php#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="admin.php#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="admin.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="admin.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="admin.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="admin.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="admin.php#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="admin.php#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="admin.php#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="admin.php#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="admin.php#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="admin.php#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="admin.php#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../php/api.php?do=alogout">登出</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html" style="pointer-events: none"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Admin</h5>
          <li class="mt">
            <a href="admin.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-list-alt"></i>
              <span>會員管理</span>
              </a>
            <ul class="sub">
              <li><a href="amember.php">會員清單</a></li>
              <li><a href="#">會員訂單</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-calendar"></i>
              <span>活動管理</span>
              </a>
            <ul class="sub">
              <li><a href="aevent.php">會員活動</a></li>
              <li class="active"><a href="aevent_org.php">官方活動</a></li>
            </ul>
          </li>
          <li>
            <a href="inbox.php">
              <i class="fa fa-envelope"></i>
              <span>信件管理 </span>
              <span class="label label-theme pull-right mail-info">2</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>即時交談</span>
              </a>
            <ul class="sub">
              <li><a href="lobby.html" style="pointer-events: none">Lobby</a></li>
              <li><a href="chat_room.php"> 聊天室</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>官方活動清單</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> 正在舉行</h4>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                    <th>#</th>
                      <th>活動名稱</th>
                      <th class="numeric">發起人</th>
                      <th class="numeric">時間</th>
                      <th class="numeric">地區</th>
                      <th class="numeric">活動場所</th>
                      <th class="numeric">活動地址</th>
                      <th class="numeric">人數</th>
                      <th class="numeric">時數</th>
                      <th class="numeric">類型</th>
                      <th class="numeric">預算</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $events=select('t5_event','(organizer="官方" AND date >NOW())');
                    $i=1;
                    foreach ($events as $event) {
                    ?>
                    <tr>
                      <td data-title="#"><?=$i?></td>
                      <td data-title="活動名稱"><?=$event['eventname']?></td>
                      <td class="numeric" data-title="發起人"><?=$event['organizer']?></td>
                      <td class="numeric" data-title="時間"><?=substr($event['date'],0,16)?></td>
                      <td class="numeric" data-title="地區"><?=mb_substr($event['locat'],0,2)?></td>
                      <td class="numeric" data-title="活動場所"><?=$event['place']?></td>
                      <td class="numeric" data-title="活動地址"><?=$event['placeadd']?></td>
                      <td class="numeric" data-title="人數"><?=$event['num']?></td>
                      <td class="numeric" data-title="時數"><?=$event['timelength']?></td>
                      <td class="numeric" data-title="類型"><?=$event['type']?></td>
                      <td class="numeric" data-title="預算">$<?=$event['budget']?></td>
                    </tr>
                    <?php
                      $i++;
                    }
                    ?>
                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
        <!-- /row -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> 已結束</h4>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                    <th>#</th>
                      <th>活動名稱</th>
                      <th class="numeric">發起人</th>
                      <th class="numeric">時間</th>
                      <th class="numeric">地區</th>
                      <th class="numeric">活動場所</th>
                      <th class="numeric">活動地址</th>
                      <th class="numeric">人數</th>
                      <th class="numeric">時數</th>
                      <th class="numeric">類型</th>
                      <th class="numeric">預算</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $events=select('t5_event','(organizer="官方" AND date <NOW())');
                    $i=1;
                    foreach ($events as $event) {
                    ?>
                    <tr>
                      <td data-title="#"><?=$i?></td>
                      <td data-title="活動名稱"><?=$event['eventname']?></td>
                      <td class="numeric" data-title="發起人"><?=$event['organizer']?></td>
                      <td class="numeric" data-title="時間"><?=substr($event['date'],0,16)?></td>
                      <td class="numeric" data-title="地區"><?=mb_substr($event['locat'],0,2)?></td>
                      <td class="numeric" data-title="活動場所"><?=$event['place']?></td>
                      <td class="numeric" data-title="活動地址"><?=$event['placeadd']?></td>
                      <td class="numeric" data-title="人數"><?=$event['num']?></td>
                      <td class="numeric" data-title="時數"><?=$event['timelength']?></td>
                      <td class="numeric" data-title="類型"><?=$event['type']?></td>
                      <td class="numeric" data-title="預算">$<?=$event['budget']?></td>
                    </tr>
                    <?php
                      $i++;
                    }
                    ?>
                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
        <!-- /row -->
        <h3 style="margin-top: 50px"><i class="fa fa-angle-right"></i>新增官方活動</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <!-- <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4> -->
              <form action="../php/api.php?do=aeventadd" class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">發起人</label>
                  <div class="col-lg-10">
                    <p class="form-control-static">官方</p>
                    <input type="hidden" name="organizer" value="官方">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">活動名稱</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="eventname" placeholder="請輸入活動名稱" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">活動時間</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="date" placeholder="2020-01-15 17:00" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">活動地點</label>
                  <div class="col-sm-4 col-lg-3">
                    <select class="form-control" name="locat" required>
                      <option value="1">北部地區</option>
                      <option value="2">中部地區</option>
                      <option value="3">南部地區</option>
                      <option value="4">東部地區</option>
                      <option value="5">離島及其他地區</option>
                    </select>
                  </div>
                  <div class="col-sm-6 col-lg-7">
                    <input type="text" class="form-control" name="place" placeholder="請輸入活動場所名稱" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">活動地址</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="placeadd" placeholder="請輸入活動場所地址" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">活動資訊</label>
                  <div class="col-sm-2">
                    花費預算($)
                    <input type="text" class="form-control" name="budget" placeholder="100" required>
                  </div>
                  <div class="col-sm-2">
                    活動時長/H
                    <input type="text" class="form-control" name="timelength" placeholder="2" required>
                  </div>
                  <div class="col-sm-2">
                    需求人數
                    <input type="text" class="form-control" name="num" placeholder="10" required>
                  </div>
                  <div class="col-sm-3 col-lg-2">
                    活動類型
                    <select class="form-control" name="type" required>
                      <option>聚餐</option>
                      <option>運動</option>
                      <option>遊戲</option>
                      <option>室內活動</option>
                      <option>室外活動</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">活動簡介</label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="intro" id="contact-message" placeholder="請輸入活動簡介" rows="5" data-rule="required"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">行動電話</label>
                  <div class="col-lg-10">
                    <p class="form-control-static">0912-345-678</p>
                    <input type="hidden" name="phone" value="0912-345-678">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">Line ID</label>
                  <div class="col-lg-10">
                    <p class="form-control-static">ifriend123456</p>
                    <input type="hidden" name="line" value="ifriend123456">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">WhatsApp</label>
                  <div class="col-lg-10">
                    <p class="form-control-static">0987-654-321</p>
                    <input type="hidden" name="wapp" value="0987-654-321">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">Email</label>
                  <div class="col-lg-10">
                    <p class="form-control-static">email@example.com</p>
                    <input type="hidden" name="email" value="email@example.com">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 col-sm-2 control-label">其他備註</label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="memo" id="contact-message" placeholder="其他備註" rows="5"></textarea>
                  </div>
                </div>
                <div style="display:flex;justify-content:center">
                  <button type="submit" class="btn btn-primary">送出</button>
                  <button type="reset" class="btn btn-default" style="margin-left: 10px">重置</button>
                </div>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="responsive_table.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="BTDatetimepicker2/bootstrap-datetimepicker.js"></script>
</body>

</html>
