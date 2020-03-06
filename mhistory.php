<h4>申請紀錄</h4>
<div class="row py-4">
  <div class="col-12">
    <form action="">
      <div class="h5">交友申請紀錄</div>
      <div class="form-group row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">申請對象</th>
              <th scope="col">申請時間</th>
              <th scope="col">預算</th>
              <th scope="col">行程</th>
              <th scope="col">申請狀態</th>
              <th scope="col">詳細資訊</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require_once("./php/sql.php");
              $uorders=select('t7_member_order','useracc="'.$_SESSION['admin'].'"');
              // print_r($uorders);
              
              $i=1;
              foreach ($uorders as $uorder) {
                $chk2=($uorder['chk2']==0)?'申請失敗':'申請成功';
                $uorder['chk']=($uorder['chk']==0)?'等待審核中':$chk2;
                $whos=select('t3_member_info','acc="'.$uorder['whoacc'].'"');
                ?>
                  <tr>
                    <th scope="row">
                      <?=$i?>
                      <input type="hidden" name="id" value="<?=$uorder['id']?>">
                    </th>
                    <td><a href="userprofile.php?id=<?=$uorder['whoacc']?>" style="color:#212529" target="_blank"><?=$whos[0]['nickname']?></a></td>
                    <!-- <td><?=$uorder['whoacc']?></td> -->
                    <td><?=substr($uorder['date'],0,10)?></td>
                    <td><?=$uorder['budget']?></td>
                    <td><?=$uorder['schedule']?></td>
                    <td><?=$uorder['chk']?></td>
                    <td><a href="#" data-toggle="modal" data-target="#detail" class="his-btn" onclick="viewUDetail(this)">點擊查看</a></td>
                  </tr>
                <?php
                $i++;
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="h5 mt-5">交友服務紀錄</div>
      <div class="form-group row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">申請人</th>
              <th scope="col">申請時間</th>
              <th scope="col">預算</th>
              <th scope="col">行程</th>
              <th scope="col">申請狀態</th>
              <th scope="col">詳細資訊</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require_once("./php/sql.php");
              $morders=select('t7_member_order','whoacc="'.$_SESSION['admin'].'"');
              // print_r($morders);
              
              $i=1;
              foreach ($morders as $morder) {
                $chk2=($morder['chk2']==0)?'已拒絕':'已接受';
                $morder['chk']=($morder['chk']==0)?'等待審核中':$chk2;
                $users=select('t3_member_info','acc="'.$morder['useracc'].'"');
                ?>
                  <tr>
                    <th scope="row">
                      <?=$i?>
                      <input type="hidden" name="id" value="<?=$morder['id']?>">
                    </th>
                    <td><a href="userprofile.php?id=<?=$morder['useracc']?>" style="color:#212529" target="_blank"><?=$users[0]['nickname']?></a></td>
                    <td><?=substr($morder['date'],0,10)?></td>
                    <td><?=$morder['budget']?></td>
                    <td><?=$morder['schedule']?></td>
                    <td><?=$morder['chk']?></td>
                    <td><a href="#" data-toggle="modal" data-target="#detail2" class="his-btn" onclick="viewMDetail(this)">點擊查看</a></td>
                  </tr>
                <?php
                $i++;
              }
            ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
</div>


<!-- viewUDetail modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailTitle">訂單詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>


<!-- viewMDetail modal -->
<div class="modal fade" id="detail2" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detail2Title">訂單詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary">拒絕申請</button>
        <button type="button" class="btn btn-primary">接受申請</button>
      </div>
      
    </div>
  </div>
</div>


<script src="js/myjs.js"></script>