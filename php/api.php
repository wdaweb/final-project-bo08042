<?php
require_once("sql.php");

switch($_GET['do']){
  case 'regist':
    $username = $_POST["acc"]; //獲取表單POST過來的使用者名稱
    $password = $_POST["pwd"]; //獲取表單POST過來的密碼
    $cpassword = $_POST["re_pwd"]; //獲取表單POST過來的重複密碼
    $email = $_POST['email']; //獲取表單POST過來的Email
    // print_r($_POST);
    $user = trim($username);//過濾空格
    $psw = trim($password);//過濾空格
    $cpsw = trim($cpassword);//過濾空格

    if($user == "" && $psw == "" && $cpsw == ""){
        echo '欄位未填';
    }
    else if($user == "" && $psw == ""){
        echo '帳號和密碼未填';
    }
    else if ($psw == "" && $cpsw == "") {
        echo '密碼未填';
    }
    else if($user == "" && $cpsw == ""){
        echo '帳號和重複密碼未填';
    }
    else if ($user == "") {
        echo '帳號未填';
    }
    else if ($psw == "") {
        echo '密碼未填';
    }
    else if ($email =="") {
      echo '電子郵件未填';
    }
    else if (!(preg_match('|@|',$email)>0)) {
      echo '電子郵件格式錯誤';
    }
    else if ($cpsw == "") {
        echo '重複密碼未填';
    }
    else if ($psw !== $cpsw) {
        echo '密碼不一致';
    }
    else if (strlen($user) < 4){
        echo '帳號不能小於5位數';
    }
    else if (strlen($psw) < 4){
        echo '密碼不能小於4位數';
    }
    // else if (preg_match(`/^[x{4e00}-x{9fa5}]+$/u`, $user)>0){
    //     echo '帳號不能為中文';
    // }
    // else if (preg_match(`/[x{4e00}-x{9fa5}]/u`, $user)>0){
    //     echo '帳號不能存在中文';
    // }
    // else if(preg_match("/[`.,:;*?~`!@#$%^&+=)(<>{}]|]|[|/|\|\"||/",$user)){
    //     echo '帳號不能存在特殊符號';
    // }
    else{
      $result=select("t3_member_info","acc='".$_POST['acc']."'");
      // print_r($result);
      if($result){
        echo '該帳號已被註冊';
      }
      else{
        // insert($_POST,'t3_member_info');
        $sql="INSERT INTO t3_member_info (id,acc,pwd,email,chk,registdate) VALUES (null,'".$_POST['acc']."','".$_POST['pwd']."','".$_POST['email']."',0,NOW())";
        $db->query($sql);
        $sql2="INSERT INTO t4_profile (id,acc) VALUES (null,'".$_POST['acc']."')"; //同時插入t4_profile
        $db->query($sql2);
        $_SESSION['admin']=$_POST['acc'];
        echo '註冊成功';
      }
        // //生成使用者ID，為簡單學習，隨機生成隨機數
        // $uid = rand(10000,99999);
        // //密碼MD5加密
        // $md5psw = MD5($psw);
        // // 資料庫連線
        // $con = mysql_connect("localhost","root","root");
        // mysql_select_db("test", $con);
        // mysql_query("SET NAMES UTF8");
    }
  break;

  case 'login':
    $username = $_POST["acc"]; //獲取表單POST過來的使用者名稱
    $password = $_POST["pwd"]; //獲取表單POST過來的密碼
    // print_r($_POST);
    $user = trim($username);//過濾空格
    $psw = trim($password);//過濾空格

    if($user == "" && $psw == ""){
      echo '帳號和密碼未填';
    }
    else if($user == ""){
        echo '帳號未填';
    }
    else if ($psw == "") {
        echo '密碼未填';
    }
    else{
      $result=select("t3_member_info","acc='".$_POST['acc']."' AND pwd='".$_POST['pwd']."'");
      if($result){
        $_SESSION['admin']=$_POST['acc'];
        echo '登入成功';
      }
      else{
        echo '帳號或密碼錯誤';
      }
    }
  break;

  case 'logout':
    // print_r($_POST['logout']);
    if($_POST['logout']='logout'){
    unset($_SESSION['admin']); //清除session
    // session_unset();
    }
  break;

  case 'alogin': // 管理者登入
    // print_r($_POST);
    $aacc=$_POST['aacc'];
    $apwd=$_POST['apwd'];

    $acc = trim($aacc);//過濾空格
    $pwd = trim($apwd);//過濾空格

    if($acc=="" && $pwd==""){
      echo "請輸入帳號密碼";
    }
    elseif($acc==""){
      echo "請輸入帳號";
    }
    elseif($pwd==""){
      echo "請輸入密碼";
    }
    else{
      $result=select('t1_admin','acc="'.$_POST['aacc'].'" AND pwd="'.$_POST['apwd'].'"');
      if($result){
        $_SESSION['aadmin']=$_POST['aacc'];
        echo '登入成功';
      }
      else {
        echo "帳號或密碼錯誤";
      }
    }
  break;

  case 'alogout': // 管理者登出
    unset($_SESSION['aadmin']); //清除session
    plo('../index.php');
  break;

  case 'first':
    $_POST['phonedpy']=(!empty($_POST['phonedpy']))?1:0;
    $_POST['linedpy']=(!empty($_POST['linedpy']))?1:0;
    $_POST['wappdpy']=(!empty($_POST['wappdpy']))?1:0;
    $_POST['emaildpy']=(!empty($_POST['emaildpy']))?1:0;
    // print_r($_POST);
    // $_POST['sex']=($_POST['sex']==1)?"男":"女";
    // $sql="UPDATE t3_member_info SET name='".$_POST['name']."',nickname='".$_POST['nickname']."',sex='".$_POST['sex']."',birth='".$_POST['birth']."',address='".$_POST['address']."',phone='".$_POST['phone']."' ,email='".$_POST['email']."',chk=1 WHERE acc='".$_POST['acc']."'";
    $sql="UPDATE t3_member_info SET name='".$_POST['name']."',sex='".$_POST['sex']."',birth='".$_POST['birth']."',address='".$_POST['address']."',phone='".$_POST['phone']."' ,email='".$_POST['email']."',phonedpy=".$_POST['phonedpy'].",line='".$_POST['line']."',linedpy=".$_POST['linedpy'].",wapp='".$_POST['wapp']."',wappdpy=".$_POST['wappdpy'].",emaildpy=".$_POST['emaildpy'].",chk=1,updatetime=NOW() WHERE acc='".$_POST['acc']."'";
    $db->query($sql);
    $_SESSION['admin']=$_POST['acc'];
    plo("../member_page.php?do=minfo");
  break;

  case 'last':
    $_POST['phonedpy']=(!empty($_POST['phonedpy']))?1:0;
    $_POST['linedpy']=(!empty($_POST['linedpy']))?1:0;
    $_POST['wappdpy']=(!empty($_POST['wappdpy']))?1:0;
    $_POST['emaildpy']=(!empty($_POST['emaildpy']))?1:0;

    // print_r($_POST);
    // $_POST['sex']=($_POST['sex']==1)?"男":"女";
    // $sql="UPDATE t3_member_info SET name='".$_POST['name']."',nickname='".$_POST['nickname']."',address='".$_POST['address']."',phone='".$_POST['phone']."' ,email='".$_POST['email']."' WHERE acc='".$_POST['acc']."'";
    $sql="UPDATE t3_member_info SET name='".$_POST['name']."',address='".$_POST['address']."',phone='".$_POST['phone']."' ,email='".$_POST['email']."',phonedpy=".$_POST['phonedpy'].",line='".$_POST['line']."',linedpy=".$_POST['linedpy'].",wapp='".$_POST['wapp']."',wappdpy=".$_POST['wappdpy'].",emaildpy=".$_POST['emaildpy'].",updatetime=NOW() WHERE acc='".$_POST['acc']."'";
    $db->query($sql);
    $_SESSION['admin']=$_POST['acc'];
    plo("../member_page.php?do=minfo");
  break;

  case 'profile':
    $locatary=[
      0=>'不限',
      1=>'北部地區',
      2=>'中部地區',
      3=>'南部地區',
      4=>'東部地區',
      5=>'離島及其他地區'
    ];

    $result=select("t4_profile","acc='".$_SESSION['admin']."'");
    $_POST['phonedpy']=(!empty($_POST['phonedpy']))?1:0;
    $_POST['linedpy']=(!empty($_POST['linedpy']))?1:0;
    $_POST['wappdpy']=(!empty($_POST['wappdpy']))?1:0;
    $_POST['emaildpy']=(!empty($_POST['emaildpy']))?1:0;

    if(!empty($_FILES['img']['name'])){
      $_POST['img']=addfile($_FILES['img']);
    }
    else{
      $_POST['img']=$result[0]['img'];
    }
    $sql="UPDATE t4_profile SET nickname='".$_POST['nickname']."',freetime1=".$_POST['freetime1'].",freetime2=".$_POST['freetime2'].",location='".$_POST['location']."',price=".$_POST['price'].",place='".$_POST['place']."',intro='".$_POST['intro']."',interest='".$_POST['interest']."',item='".$_POST['item']."',img='".$_POST['img']."',locat='".$locatary[$_POST['locat']]."',sex='".$_POST['sex']."',chk=1 WHERE acc='".$_SESSION['admin']."'";
    $db->query($sql);
    plo("../member_page.php?do=minterface");
  break;

  case 'pwdmdy':
    $result=select('t3_member_info','pwd="'.$_POST['oldPwd'].'"');
    if(strlen($_POST['oldPwd'])>0 && strlen($_POST['newPwd']) && strlen($_POST['chkPwd'])){
      if($result){
        if($_POST['newPwd']!=$_POST['chkPwd']){
          echo '密碼不一致，請重新輸入';
        }
        elseif(strlen($_POST['newPwd'])<4){
          echo '密碼不能小於4位數';
        }
        else{
          echo "更換密碼成功";
          unset($_POST['chkPwd']);
          $sql="UPDATE t3_member_info SET pwd='".$_POST['newPwd']."' WHERE acc='".$_SESSION['admin']."'";
          $db->query($sql);
        }
      }
      else{
        echo '密碼錯誤，請重新輸入';
      }
    }
    else{
      echo '欄位不能為空';
    }
  break;

  case 'eventadd':
    $result=select("t3_member_info","acc='".$_SESSION['admin']."'");
    $_POST['phonedpy']=(!empty($_POST['phonedpy']))?1:0;
    $_POST['linedpy']=(!empty($_POST['linedpy']))?1:0;
    $_POST['wappdpy']=(!empty($_POST['wappdpy']))?1:0;
    $_POST['emaildpy']=(!empty($_POST['emaildpy']))?1:0;
    $locatary=[
      0=>'不限',
      1=>'北部地區',
      2=>'中部地區',
      3=>'南部地區',
      4=>'東部地區',
      5=>'離島及其他地區'
    ];

    $sql="INSERT INTO t5_event (id,acc,organizer,eventname,date,place,placeadd,intro,budget,timelength,num,order_num,type,phonedpy,linedpy,wappdpy,emaildpy,memo,locat) VALUES (null,'".$_SESSION['admin']."','".$result[0]['nickname']."','".$_POST['eventname']."','".$_POST['date']."','".$_POST['place']."','".$_POST['placeadd']."','".$_POST['intro']."',".$_POST['budget'].",".$_POST['timelength'].",".$_POST['num'].",0,'".$_POST['type']."',".$_POST['phonedpy'].",".$_POST['linedpy'].",".$_POST['wappdpy'].",".$_POST['emaildpy'].",'".$_POST['memo']."','".$locatary[$_POST['locat']]."')";
    $sql2="UPDATE t3_member_info SET phone='".$_POST['phone']."' ,email='".$_POST['email']."' WHERE acc='".$_SESSION['admin']."'";
    $sql3="UPDATE t4_profile SET line='".$_POST['line']."' ,wapp='".$_POST['wapp']."' WHERE acc='".$_SESSION['admin']."'";
    $db->query($sql);
    $db->query($sql2);
    $db->query($sql3);
    plo("../member_page.php?do=mevent");
  break;

  case 'bookevent':
    $order=select('t6_event_order','event_id='.$_POST['id'].' AND organizer_acc="'.$_POST['uacc'].'" AND user_acc="'.$_POST['oacc'].'"');
    if($order){
      plo("../booking_event3.php?id=fail");
    }
    else{
      $event=select("t5_event","acc='".$_POST['oacc']."' AND id=".$_POST['id']);
      $user=select('t3_member_info','acc="'.$_POST['uacc'].'"');
  
      $_POST['ememo']=(!empty($_POST['ememo']))?$_POST['ememo']:null;
      $sql="INSERT INTO t6_event_order (id,eventname,organizer,event_id,date,organizer_acc,user_acc,ememo) VALUES (null,'".$event[0]['eventname']."','".$event[0]['organizer']."',".$_POST['id'].",'".$event[0]['date']."','".$_POST['oacc']."','".$_POST['uacc']."','".$_POST['ememo']."')";
      
      if($event[0]['num'] > $event[0]['order_num']){
        $sql2="UPDATE t5_event SET order_num=order_num+1 WHERE acc='".$_POST['oacc']."' AND id=".$_POST['id'];
        $db->query($sql);
        $returnid=$db->lastInsertId();
        $db->query($sql2);
        plo("../booking_event3.php?id=".$returnid);
      }
      else{
        plo("../booking_event3.php?id=fail2");
      }
    }
  break;

  case 'bookwho':
    print_r($_POST);
    $order=select("t7_member_order","whoacc='".$_POST['iacc']."' AND useracc='".$_POST['uacc']."' AND date='".$_POST['date']."'");
    if($order){
      plo("../booking3.php?id=fail");
    }
    else{
      $sql="INSERT INTO t7_member_order (id,whoacc,useracc,date,timelength,place,schedule,budget,updatetime,memo,chk) VALUES (null,'".$_POST['iacc']."','".$_POST['uacc']."','".$_POST['date']."',".$_POST['timelength'].",'".$_POST['place']."','".$_POST['schedule']."',".$_POST['budget'].",NOW(),'".$_POST['memo']."',0)";
      $db->query($sql);
      $returnid=$db->lastInsertId();
      plo("../booking3.php?id=".$returnid);
    }

  break;

  case 'fsearch':
    // print_r($_POST);
    echo 'locat='.$_POST['locat'].'&type='.$_POST['type'].'&price1='.substr($_POST['price1'],1).'&price2='.substr($_POST['price2'],1).'&keyword='.$_POST['keyword'];
  break;

  case 'esearch':
    // print_r($_POST);
    echo 'locat='.$_POST['locat'].'&type='.$_POST['type'].'&timemin='.substr($_POST['time'],0,1).'&timemax='.substr($_POST['time'],1).'&keyword='.$_POST['keyword'];
  break;

  case 'test':
    $locatary=[
      0=>'不限',
      1=>'北部地區',
      2=>'中部地區',
      3=>'南部地區',
      4=>'東部地區',
      5=>'離島及其他地區'
    ];
  echo $locatary[1];
  break;


  case 'amemberdel':
    $id=$_POST['id'];
    $sql="DELETE FROM t3_member_info WHERE id=".$id;
    $db->query($sql);
    echo 'OK';
  break;

  case 'aeventadd':
    $locatary=[
      0=>'不限',
      1=>'北部地區',
      2=>'中部地區',
      3=>'南部地區',
      4=>'東部地區',
      5=>'離島及其他地區'
    ];
    print_r($_POST);

    $sql="INSERT INTO t5_event (id,acc,organizer,eventname,date,place,placeadd,intro,budget,timelength,num,order_num,type,phonedpy,linedpy,wappdpy,emaildpy,memo,locat) VALUES (null,'".$_SESSION['aadmin']."','".$_POST['organizer']."','".$_POST['eventname']."','".$_POST['date']."','".$_POST['place']."','".$_POST['placeadd']."','".$_POST['intro']."',".$_POST['budget'].",".$_POST['timelength'].",".$_POST['num'].",0,'".$_POST['type']."',1,1,1,1,'".$_POST['memo']."','".$locatary[$_POST['locat']]."')";
    $db->query($sql);
    plo("../Dashio/aevent_org.php");
  break;

  case 'contact':
    $sql="INSERT INTO t8_contact (id,name,email,subject,content) VALUES (null,'".$_POST['name']."','".$_POST['email']."','".$_POST['subject']."','".$_POST['content']."')";
    $db->query($sql);
    plo("../contact.php");
  break;

  // viewDetail for member you booking
  case 'viewUDetail':
    // print_r($_POST);
    $morder=select('t7_member_order','id='.$_POST['id']);
    $whoProf=select('t4_profile','acc="'.$morder[0]['whoacc'].'"');
    $whoInfo=select('t3_member_info','acc="'.$morder[0]['whoacc'].'"');
    $user=select('t3_member_info','acc="'.$morder[0]['useracc'].'"');
    array_push($morder, $whoProf[0], $whoInfo[0], $user[0]); //合併陣列
    print_r(json_encode($morder)); //轉成JSON格式=>回傳會變成字串  
  break;

  // viewDetail for member booking you
  case 'viewMDetail':
    // print_r($_POST);
    $morder=select('t7_member_order','id='.$_POST['id']);
    $whoProf=select('t4_profile','acc="'.$morder[0]['useracc'].'"');
    $whoInfo=select('t3_member_info','acc="'.$morder[0]['useracc'].'"');
    $user=select('t3_member_info','acc="'.$morder[0]['whoacc'].'"');
    array_push($morder, $whoProf[0], $whoInfo[0], $user[0]); //合併陣列
    print_r(json_encode($morder)); //轉成JSON格式=>回傳會變成字串  
  break;

  // viewDetail for event you start
  case 'viewUEventDetail':
    // print_r($_POST);
    $uevent=select('t5_event','id='.$_POST['id']);
    print_r(json_encode($uevent[0]));
  break;

  // viewDetail for event you join
  case 'viewMEventDetail':
    // print_r($_POST);
    $mevent=select('t6_event_order','id='.$_POST['id']);
    $eventData=select('t5_event','id='.$mevent[0]['event_id']);
    $organizer=select('t4_profile','nickname="'.$eventData[0]['organizer'].'"');
    array_push($mevent, $organizer[0]['acc'] ,$eventData[0]); //合併陣列
    print_r(json_encode($mevent));
  break;
}
?>