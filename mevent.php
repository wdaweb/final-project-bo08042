<?php
  $infos=select('t3_member_info','acc="'.$_SESSION['admin'].'"');
  $profs=select('t4_profile','acc="'.$_SESSION['admin'].'"');
?>
<form action="">
  <h4>活動紀錄</h4>
  <div class="row py-4">
    <div class="col-12 pr-4">
      <div class="h5">活動申請紀錄</div>
      <div class="form-group row">
        <form action="">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">活動名稱</th>
              <th scope="col">時間</th>
              <th scope="col">地點</th>
              <!-- <th scope="col">預算</th> -->
              <th scope="col">詳細資訊</th>
              <th scope="col">操作</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $uevents=select('t6_event_order','user_acc="'.$_SESSION['admin'].'"');
              $i=1;
              $now=strtotime(date("Y-m-d H:i:s"));
              foreach ($uevents as $uevent) {
                $eventData=select('t5_event','id='.$uevent['event_id']);
                $date=(strtotime($uevent['date'])<$now)?'活動已結束':'取消參加';
              ?>
                <tr>
                  <th scope="row"><?=$i?><input type="hidden" name="id" value="<?=$uevent['id']?>"></th>
                  <td><?=$uevent['eventname']?></td>
                  <td><?=substr($uevent['date'],0,16)?></td>
                  <td><?=$eventData[0]['place']?></td>
                  <!-- <td><?=$uevent['budget']?></td> -->
                  <td><a href="#" data-toggle="modal" class="his-btn" data-target="#viewEvent" onclick="viewMEventDetail(this)">點擊查看</a></td>
                  <td><a href="#" data-toggle="modal" class="his-btn" style="pointer-events:none"><?=$date?></a></td>
                </tr>
              <?php
              $i++;
              }
            ?>
          </tbody>
        </table>
        </form>
      </div>
      <div class="h5 mt-5">活動發起紀錄</div>
      <div class="form-group row">
        <form action="">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">活動名稱</th>
              <th scope="col">時間</th>
              <th scope="col">地點</th>
              <th scope="col">預算</th>
              <th scope="col">詳細資訊</th>
              <th scope="col">操作</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $user=select('t4_profile','acc="'.$_SESSION['admin'].'"');
              $uevents=select('t5_event','organizer="'.$user[0]['nickname'].'"');
              $i=1;
              $now=strtotime(date("Y-m-d H:i:s"));
              foreach ($uevents as $uevent) {
                $date=(strtotime($uevent['date'])<$now)?'活動已結束':'取消活動';
              ?>
                <tr>
                  <th scope="row"><?=$i?><input type="hidden" name="id" value="<?=$uevent['id']?>"></th>
                  <td><?=$uevent['eventname']?></td>
                  <td><?=substr($uevent['date'],0,16)?></td>
                  <td><?=$uevent['place']?></td>
                  <td><?=$uevent['budget']?></td>
                  <td><a href="#" data-toggle="modal" class="his-btn" data-target="#viewEvent" onclick="viewUEventDetail(this)">點擊查看</a></td>
                  <td><a href="#" data-toggle="modal" class="his-btn" style="pointer-events:none"><?=$date?></a></td>
                </tr>
              <?php
              $i++;
              }
            ?>
          </tbody>
        </table>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="viewEvent" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewEventTitle">活動詳細資訊</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>

  <hr class="py-3" style="border-top: 1px solid rgba(0,0,0,.3);">
  <h4>發起活動</h4>
  <div class="row py-4">
    <div class="col-12 pr-4">
      <form action="php/api.php?do=eventadd" method="POST">
      <div class="form-group row">
        <label for="eventName" class="col-sm-2 col-form-label">活動名稱</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="eventName" name="eventname" placeholder="請輸入活動名稱" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="eventWhen" class="col-sm-2 col-form-label">活動時間</label>
        <div class="col-sm-10 form_datetime input-append date d-flex">
          <input type="text" class="form-control" id="eventWhen" name="date" placeholder="請選擇活動時間" required>
          <span class="add-on move-1"><i class="icon-remove"></i></span>
          <span class="add-on move-2"><i class="icon-calendar"></i></span>
        </div>
      </div>
      <div class="form-group row">
        <label for="eventPlace" class="col-sm-2 col-form-label">活動地點</label>
        <div class="col-sm-10">
          <div class="d-flex mb-3">
            <select class="custom-select" style="width: 35% !important" name="locat" required>
              <option value="1">北部地區</option>
              <option value="2">中部地區</option>
              <option value="3">南部地區</option>
              <option value="4">東部地區</option>
              <option value="5">離島及其他地區</option>
            </select>
            <input type="text" style="width: 50%" class="form-control ml-4" id="eventPlacename" name="place" placeholder="請輸入活動場所名稱" required>
          </div>
          <input type="text" class="form-control" id="eventPlace" name="placeadd" placeholder="請輸入活動場所地址" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="eventIntro" class="col-sm-2 col-form-label">活動簡介</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="eventIntro" name="intro" rows="3" required>四個必要大約利益未知迅速重量，理論文章速度您現在，當時存在說出後來也不消失我現在請您出口破解比例形式，保證產品，那些推薦要求修改推坑王字幕有人我愛吃飯</textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="eventInfo" class="col-sm-2 col-form-label">活動資訊</label>
        <div class="col-sm-10">
          <div class="d-flex mb-3">
            <label for="eventPrice" class="col-form-label">花費預算</label>
            <label class="col-form-label ml-4">$</label>
            <input type="text" style="width: 15%" class="form-control ml-2" id="eventPrice" name="budget" value="100" required>
          </div>
          <div class="d-flex mb-3">
            <label for="eventTime" class="col-form-label">活動時長</label>
            <input type="text" style="width: 12%" class="form-control ml-4" id="eventTime" name="timelength" value="2" required>
            <label class="col-form-label ml-3">小時</label>
          </div>
          <div class="d-flex mb-3">
            <label for="eventNum" class="col-form-label">需求人數</label>
            <input type="text" style="width: 12%" class="form-control ml-4" id="eventNum" name="num" value="100" required>
            <label class="col-form-label ml-3">人</label>
          </div>
          <div class="d-flex mb-3">
            <label for="eventType" class="col-form-label">活動類型</label>
            <select class="form-control form-control-sm custom-select size-16 ml-4" name="type" style="width: 20%" required>
              <option>聚餐</option>
              <option>運動</option>
              <option>遊戲</option>
              <option>室內活動</option>
              <option>室外活動</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="showContact" class="col-sm-2 col-form-label">聯絡方式</label>
        <div class="col-sm-10">
          <div class="d-flex mb-3">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="showPhone" name="phonedpy" value="1">
              <label class="custom-control-label" for="showPhone">行動電話</label>
            </div>
            <input type="text" style="width: 50%" class="form-control ml-3" id="staticPhone" name="phone" value="<?=$infos[0]['phone']?>" required>
          </div>
          <div class="d-flex mb-3">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="showLine" name="linedpy" value="2">
              <label class="custom-control-label" for="showLine">Line ID</label>
            </div>
            <input type="text" style="width: 50%" class="form-control ml-3" id="staticLine" name="line" value="<?=$profs[0]['line']?>">
          </div>
          <div class="d-flex mb-3">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="showWapp" name="wappdpy" value="3">
              <label class="custom-control-label" for="showWapp">WhatsApp</label>
            </div>
            <input type="text" style="width: 50%" class="form-control ml-3" id="staticWapp" name="wapp" value="<?=$profs[0]['wapp']?>">
          </div>
          <div class="d-flex">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="showEmail" name="emaildpy" value="4">
              <label class="custom-control-label" for="showEmail">Email</label>
            </div>
            <input type="email" style="width: 50%" class="form-control ml-3" id="staticEmail" name="email" value="<?=$infos[0]['email']?>">
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="eventmemo" class="col-sm-2 col-form-label">其他備註</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="eventmemo" name="memo" rows="3">當時存在說出後來也不消失我現在請您出口破解比例形式，保證產品，那些推薦要求修改推坑王字幕有人我愛吃飯</textarea>
        </div>
      </div>
      <div class="text-center pt-2">
        <button type="submit" class="btn btn-primary">送出</button>
        <button type="reset" class="btn btn-secondary">重置</button>
      </div>
      </form>
    </div>
  </div>
</form>