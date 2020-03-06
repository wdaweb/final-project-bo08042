<?php
  $infos=select('t3_member_info','acc="'.$_SESSION['admin'].'"');
?>
<h4>修改密碼</h4>
<div class="row py-4">
  <div class="col-12 pr-4">
    <form action="" method="POST" id="pwdmdy-form">
      <div class="form-group row">
        <label for="infoAcc" class="col-sm-2 col-form-label">會員帳號</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="infoAcc" value="<?=$infos[0]['acc']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="infoPwd" class="col-sm-2 col-form-label">原始密碼</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="oldPwd" placeholder="請輸入舊密碼">
        </div>
      </div>
      <div class="form-group row">
        <label for="infoPwd" class="col-sm-2 col-form-label">更改密碼</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="newPwd" placeholder="請輸入新密碼">
        </div>
      </div>
      <div class="form-group row">
        <label for="infoPwd" class="col-sm-2 col-form-label">確認密碼</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="chkPwd" placeholder="請再次輸入新密碼">
        </div>
      </div>
      <div class="text-center pt-2">
        <p id="result3" for="agree-term" class="label-agree-term" style="font-size: 16px;color:#ed5565"></p>
        <button type="button" class="btn btn-primary" onclick="pwdmdy()">修改</button>
        <button type="reset" class="btn btn-secondary">重置</button>
      </div>
    </form>
  </div>
</div>