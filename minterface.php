<?php
  $infos=select('t3_member_info','acc="'.$_SESSION['admin'].'"');
  $profs=select('t4_profile','acc="'.$_SESSION['admin'].'"');
  // echo $profs[0]['locat'];
?>
<h4>會員介面設定</h4>
<div class="row py-4">
  <div class="col-12 pr-4">
    <form action="php/api.php?do=profile" id="form23" method="POST" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="showName" class="col-sm-2 col-form-label">名稱顯示</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="showName" name="nickname" value="<?=$profs[0]['nickname']?>" required>
          <input type="hidden" name="sex" value="<?=$infos[0]['sex']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="showIntro" class="col-sm-2 col-form-label">個人簡介</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="showIntro" name="intro" rows="3" required><?=$profs[0]['intro']?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="showInterest" class="col-sm-2 col-form-label">興趣</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="showInterest" name="interest" value="<?=$profs[0]['interest']?>" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="showItem" class="col-sm-2 col-form-label">交友項目</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="showItem" name="item" value="<?=$profs[0]['item']?>" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="showInfo" class="col-sm-2 col-form-label">交友資訊</label>
        <div class="col-sm-10">
          <div class="d-flex mb-3">
            <label for="showPrice" class="col-form-label">預算</label>
            <label class="col-form-label ml-4">$</label>
            <input type="text" style="width: 15%" class="form-control ml-2" id="showPrice" name="price" value="<?=$profs[0]['price']?>" required>
          </div>
          <div class="d-flex mb-3">
            <label for="showTime" class="col-form-label">服務時間</label>
            <input type="text" style="width: 12%" class="form-control ml-4" id="showTime1" name="freetime1" value="<?=$profs[0]['freetime1']?>" required>
            <label class="col-form-label ml-3">~</label>
            <input type="text" style="width: 12%" class="form-control ml-3" id="showTime2" name="freetime2" value="<?=$profs[0]['freetime2']?>" required>
            <label class="col-form-label ml-3">點</label>
          </div>
          <div class="d-flex mb-3">
            <label for="showLocat" class="col-form-label">居住地點</label>
            <select class="custom-select ml-4" style="width: 35% !important" name="locat" required>
              <option value="1" <?=($profs[0]['locat']=="北部地區")?'selected':''?>>北部地區</option>
              <option value="2" <?=($profs[0]['locat']=="中部地區")?'selected':''?>>中部地區</option>
              <option value="3" <?=($profs[0]['locat']=="南部地區")?'selected':''?>>南部地區</option>
              <option value="4" <?=($profs[0]['locat']=="東部地區")?'selected':''?>>東部地區</option>
              <option value="5" <?=($profs[0]['locat']=="離島及其他地區")?'selected':''?>>離島及其他地區</option>
            </select>
            <input type="text" style="width: 20%" class="form-control ml-4" id="showLocat" name="location" value="<?=$profs[0]['location']?>" required>
          </div>
          <div class="d-flex mb-3">
            <label for="showPlace" class="col-form-label">活動範圍</label>
            <input type="text" style="width: 50%" class="form-control ml-4" id="showPlace" name="place" value="<?=$profs[0]['place']?>" required>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="showPhoto" class="col-sm-2 col-form-label">照片顯示</label>
        <div class="col-sm-10">
          <div class="row mb-5">
            <div class="col-5">
              <?php
              if ($profs[0]['img']!=null) {
              ?>
              <label for="showPlace" class="col-form-label mt-2 mb-1">目前使用照片</label>
              <img src="php/upload/<?=$profs[0]['img']?>" alt="">
              <?php
              }              
              ?>
            </div>
          </div>
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
              <span class="btn btn-theme02 btn-file">
                <span class="fileupload-new"><i class="fa fa-paperclip"></i> 更換照片</span>
              <span class="fileupload-exists"><i class="fa fa-undo"></i> 重新選擇</span>
              <input type="file" class="default" name="img" />
              </span>
              <a href="#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> 移除照片</a>
            </div>
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