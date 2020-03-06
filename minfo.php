<?php
if(!empty($_SESSION['admin'])){
  $infos=select('t3_member_info','acc="'.$_SESSION['admin'].'"');
  // print_r($infos);
  if($infos[0]['chk']==0){
    ?>
    <h3 class="mb-5" style="color:#414146">恭喜您完成註冊！請先填寫基本資料</h3>
    <h4>會員基本資料</h4>
    <div class="row py-4">
      <div class="col-12 pr-4">
        <form action="php/api.php?do=first" id="first" method="POST">
          <div class="form-group row">
            <label for="infoName" class="col-sm-2 col-form-label">姓名</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="infoName" name="name" placeholder="請輸入真實姓名" required>
            </div>
            <input type="hidden" name="id_number" value="">
          </div>
          <!-- <div class="form-group row">
            <label for="infoId" class="col-sm-2 col-form-label">暱稱</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="infoId" name="nickname" placeholder="請輸入暱稱" required>
            </div>
          </div> -->
          <div class="form-group row">
            <label for="infoSex" class="col-sm-2 col-form-label">性別</label>
            <div class="col-sm-10 d-flex align-items-center">
              <div class="custom-control custom-radio mr-3">
                <input type="radio" id="infoSexM" name="sex" class="custom-control-input" value="男" required>
                <label class="custom-control-label" for="infoSexM">男</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="infoSexW" name="sex" class="custom-control-input" value="女" required>
                <label class="custom-control-label" for="infoSexW">女</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="infoAcc" class="col-sm-2 col-form-label">會員帳號</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="infoAcc" name="acc" value="<?=$infos[0]['acc']?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputBirth" class="col-sm-2 col-form-label">生日</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="inputBirth" name="birth" placeholder="請輸入生日" required>
            </div>
            <div class="text-space-custom">(輸入格式範例：1980-01-30)</div>
          </div>
          <div class="form-group row">
            <label for="infoAddr" class="col-sm-2 col-form-label">聯絡地址</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="infoAddr" name="address" placeholder="請輸入聯絡地址" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="showContact" class="col-sm-2 col-form-label">聯絡方式</label>
            <div class="col-sm-10">
              <div class="d-flex mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="showPhone" name="phonedpy" value="1" <?=($infos[0]['phonedpy']==1)?"checked":""?>>
                  <label class="custom-control-label" for="showPhone">行動電話</label>
                </div>
                <input type="text" style="width: 50%" class="form-control ml-3" id="staticPhone" name="phone" value="<?=$infos[0]['phone']?>" placeholder="輸入格式範例：0912-345-678" required>
                <div class="col-form-label contact-dpy"><?=($infos[0]['phonedpy']==1)?"已顯示":"不顯示"?></div>
              </div>
              <div class="d-flex mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="showLine" name="linedpy" value="2" <?=($infos[0]['linedpy']==1)?"checked":""?>>
                  <label class="custom-control-label" for="showLine">Line ID</label>
                </div>
                <input type="text" style="width: 50%" class="form-control ml-3" id="staticLine" name="line" value="<?=$infos[0]['line']?>">
                <div class="col-form-label contact-dpy"><?=($infos[0]['linedpy']==1)?"已顯示":"不顯示"?></div>
              </div>
              <div class="d-flex mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="showWapp" name="wappdpy" value="3" <?=($infos[0]['wappdpy']==1)?"checked":""?>>
                  <label class="custom-control-label" for="showWapp">WhatsApp</label>
                </div>
                <input type="text" style="width: 50%" class="form-control ml-3" id="staticWapp" name="wapp" value="<?=$infos[0]['wapp']?>">
                <div class="col-form-label contact-dpy"><?=($infos[0]['wappdpy']==1)?"已顯示":"不顯示"?></div>
              </div>
              <div class="d-flex">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="showEmail" name="emaildpy" value="4" <?=($infos[0]['emaildpy']==1)?"checked":""?>>
                  <label class="custom-control-label" for="showEmail">Email</label>
                </div>
                <input type="email" style="width: 50%" class="form-control ml-3" id="staticEmail" name="email" value="<?=$infos[0]['email']?>" required>
                <div class="col-form-label contact-dpy"><?=($infos[0]['emaildpy']==1)?"已顯示":"不顯示"?></div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="infoEmail" class="col-sm-10 col-form-label ml-auto" style="color: #da6161">部分資訊填寫後無法再次修改，請謹慎填寫</label>
          </div>      
          <div class="text-center pt-2">
            <button type="submit" class="btn btn-primary">送出</button>
            <button type="reset" class="btn btn-secondary">重置</button>
          </div>
        </form>
      </div>
    </div>
    <?php
  }
  else {
    ?>
    <h4>會員基本資料修改</h4>
    <div class="row py-4">
      <div class="col-12 pr-4">
        <form action="php/api.php?do=last" id="last" method="POST">
          <div class="form-group row">
            <label for="infoName" class="col-sm-2 col-form-label">姓名</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="infoName" name="name" value="<?=$infos[0]['name']?>" required>
            </div>
            <input type="hidden" name="id_number" value="">
          </div>
          <div class="form-group row">
            <label for="infoSex" class="col-sm-2 col-form-label">性別</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="infoSex" name="sex" value="<?=$infos[0]['sex']?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="infoAcc" class="col-sm-2 col-form-label">會員帳號</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="infoAcc" name="acc" value="<?=$infos[0]['acc']?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputBirth" class="col-sm-2 col-form-label">生日</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="inputBirth" name="birth" value="<?=$infos[0]['birth']?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="infoAddr" class="col-sm-2 col-form-label">聯絡地址</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="infoAddr" name="address" value="<?=$infos[0]['address']?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="showContact" class="col-sm-2 col-form-label">聯絡方式</label>
            <div class="col-sm-10">
              <div class="d-flex mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="showPhone" name="phonedpy" value="1" <?=($infos[0]['phonedpy']==1)?"checked":""?>>
                  <label class="custom-control-label" for="showPhone">行動電話</label>
                </div>
                <input type="text" style="width: 50%" class="form-control ml-3" id="staticPhone" name="phone" value="<?=$infos[0]['phone']?>" required>
                <div class="col-form-label contact-dpy"><?=($infos[0]['phonedpy']==1)?"已顯示":"不顯示"?></div>
              </div>
              <div class="d-flex mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="showLine" name="linedpy" value="2" <?=($infos[0]['linedpy']==1)?"checked":""?>>
                  <label class="custom-control-label" for="showLine">Line ID</label>
                </div>
                <input type="text" style="width: 50%" class="form-control ml-3" id="staticLine" name="line" value="<?=$infos[0]['line']?>">
                <div class="col-form-label contact-dpy"><?=($infos[0]['linedpy']==1)?"已顯示":"不顯示"?></div>
              </div>
              <div class="d-flex mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="showWapp" name="wappdpy" value="3" <?=($infos[0]['wappdpy']==1)?"checked":""?>>
                  <label class="custom-control-label" for="showWapp">WhatsApp</label>
                </div>
                <input type="text" style="width: 50%" class="form-control ml-3" id="staticWapp" name="wapp" value="<?=$infos[0]['wapp']?>">
                <div class="col-form-label contact-dpy"><?=($infos[0]['wappdpy']==1)?"已顯示":"不顯示"?></div>
              </div>
              <div class="d-flex">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="showEmail" name="emaildpy" value="4" <?=($infos[0]['emaildpy']==1)?"checked":""?>>
                  <label class="custom-control-label" for="showEmail">Email</label>
                </div>
                <input type="email" style="width: 50%" class="form-control ml-3" id="staticEmail" name="email" value="<?=$infos[0]['email']?>" required>
                <div class="col-form-label contact-dpy"><?=($infos[0]['emaildpy']==1)?"已顯示":"不顯示"?></div>
              </div>
            </div>
          </div>
          <div class="text-center pt-2">
            <button type="submit" class="btn btn-primary">修改</button>
            <button type="reset" class="btn btn-secondary">重置</button>
          </div>
        </form>
      </div>
    </div>
    <?php
  }
}
?>


