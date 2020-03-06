/*
https://ithelp.ithome.com.tw/articles/10204869
https://www.itread01.com/content/1536238628.html

flip=> https://codepen.io/carlasartori/pen/Mwxxgj
*/

// load registration.html to modal
// $("#flipper").load('register.html');

function flip(){
  $('#flipper').toggleClass("flip");
}

// load event.html to modal
$("#loadevent").load('event_modal.html');

// LINKS TO ANCHORS
$('a[href^="#"]').on('click', function(event) {
  var $target = $(this.getAttribute('href'));
  if($target.length) {
    event.preventDefault();
    $('html, body').stop().animate({
      scrollTop: $target.offset().top
    }, 1000, 'easeOutCubic');
  }
});


function tomenu(){
  // $('#menu').toggle().removeAttr("class","d-none");
}

// event
function chk0(num){
  return (num<10)?"0"+num:num;
}
var arr=[];
function runtime(){
  let nowdate=new Date();
  let nowStamp=Math.floor((nowdate.getTime())/1000);
  let timenode=$('input[name=time]');
  for(let timeStamp of timenode){
      arr.push(timeStamp.value);
  }
  for(let i=0;i<arr.length;i++){
      let timeup=Number(arr[i]);
      let loadtime=timeup-nowStamp;
      let secs=Math.floor(loadtime%60);
      let mins=Math.floor((loadtime/60)%60);
      let hours=Math.floor((loadtime/60/60)%24);
      let days=Math.floor((loadtime/60/60)/24);
      if(loadtime<=0){
        $(".counttime").eq(i).text(`距離開始：00天 00:00:00`);
      }
      else{
        $(".counttime").eq(i).text(`距離開始：${chk0(days)}天 ${chk0(hours)}:${chk0(mins)}:${chk0(secs)}`);
      }
  }
  setTimeout(runtime,1000);
  arr=[];
}
runtime();


// member page
// $("input[name=contact]")


// registration
// https://iter01.com/366033.html
function regist(){
  var rform=$('#register-form').serialize();
  // var acc=$('input[name=acc]').val();
    $.post("php/api.php?do=regist",rform,function(data){
      $("#result").text(data);
    // console.log(data);
    //註冊後跳轉
    if (data == "註冊成功") {
      // location.href="LoginFrom.html";
      $('#register-form').submit();
    }
  });
}

// sign in
function login(){
  var sform=$('#login-form').serialize();
  // console.log(sform);
  $.post("php/api.php?do=login",sform,function(data){
    $("#result-2").text(data);
  // console.log(data);
  if (data == "登入成功") {
    // location.href="LoginFrom.html";
    $('#login-form').submit();
  }
});
}

// log out
function logout(){
  Swal.fire({
    title: '確定要登出？',
    text: "登出後無法繼續使用會員功能",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '確定登出',
    cancelButtonText: '取消'
  }).then((result) => {
    if (result.value) {
      $.post("php/api.php?do=logout",{logout:"logout"},function(re){
        Swal.fire({
          title: '成功登出',
          icon:'success',
          text: '登入後可再次使用會員功能',
          confirmButtonText: '確定'
        }).then(function(){
          // console.log(re);
          window.location.href="./index.php";
        });
      });
    }
  });
}

// admin login
function alogin(){
  var aform=$('#alogin-form').serialize();
  $.post("php/api.php?do=alogin",aform,function(data){
    $("#result-3").text(data);
  // console.log(data);
  if (data == "登入成功") {
    location.href="Dashio/admin.php";
    // $('#login-form').submit();
  }
});
}


// event booking login
function loginBook(){
  let bform=$('#login-form2').serialize();
  $.post("php/api.php?do=login",bform,function(data){
    $(".result-2").text(data);
  // console.log(data);
  if (data == "登入成功") {
    // location.href="LoginFrom.html";
    $('#login-form2').submit();
    // location.href="booking_event.php";
  }
});

}

// pwdmdy
function pwdmdy(){
  var pform=$("#pwdmdy-form").serialize();
  // console.log(pform);
  $.post("php/api.php?do=pwdmdy",pform,function(data){
    $("#result3").text(data);
    if (data == "更換密碼成功") {
      $('#pwdmdy-form').submit();
    }  
  });
}

// booking event
// function bookevent(e){
//   console.log(e.id);
//   let beform=$(`#booking_event${e.id}`).serialize();
//   $.post("php/api.php?do=bookevent",beform,function(data){
//     console.log(data);
//   });
// }

// filter search
function search(){
  // let fform=$('.filter-form').serialize();
  let locat=$('.filter-location').val();
  let type=$('.filter-property').val();
  let price1=$('#sprice1').text();
  let price2=$('#sprice2').text();
  let keyword=$('input[name=skeyword]').val();
  $.post("php/api.php?do=fsearch",{locat,type,price1,price2,keyword},function(data){
    // console.log(data);
    // $('.filter-form').submit();
    location.href=`search.php?${data}`;
  })
}

function esearch(){
  // let fform=$('.filter-form').serialize();
  let locat=$('#elocat').val();
  let type=$('#etpye').val();
  let time=$('#etime').val();
  let keyword=$('input[name=ekeyword]').val();
  $.post("php/api.php?do=esearch",{locat,type,time,keyword},function(data){
    console.log(data);
    // $('.filter-form').submit();
    location.href=`event.php?${data}`;
  })
}


// memberPage viewDetail for member
function viewUDetail(e){
  let id=$(e).parents('tr').find('input[name=id]').val()
  // console.log(id);
  $.post("php/api.php?do=viewUDetail",{id},function(data){
    // console.log(JSON.parse(data));
    data=JSON.parse(data); // 將字串轉換成JSON格式
    // console.log(data);
    $('#detail .modal-body').html(`
      <div class="col-lg-12 mx-auto p-4" style="border: 1px solid #000">
        <div class="row">
          <div class="col-3">申請對象</div>
          <div class="col-9"><a href="userprofile.php?id=${data[1].acc}" style="color:#7b8086" target="_blank">${data[1].nickname}</a></div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">性別</div>
          <div class="col-9">${data[2].sex}</div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">聯絡資訊</div>
          <div class="col-9">
            <div class="d-flex mb-3">
              <div>行動電話：</div>
              <div class="ml-4">${data[2].phone}</div>
            </div>
            <div class="d-flex mb-3">
              <div>Email：</div>
              <div class="ml-4">${data[2].email}</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">申請資訊</div>
          <div class="col-9">
            <div class="d-flex mb-3">
              <div>日期：</div>
              <div class="ml-4">${data[0].date.substr(0,16)}</div>
            </div>
            <div class="d-flex mb-3">
              <div>申請時數：</div>
              <div class="ml-4">${data[0].timelength}</div>
            </div>
            <div class="d-flex mb-3">
              <div>預計花費：</div>
              <div class="ml-4">${data[0].budget}</div>
            </div>
            <div class="d-flex mb-3">
              <div>地點：</div>
              <div class="ml-4">${data[0].place}</div>
            </div>
            <div class="d-flex">
              <div>行程：</div>
              <div class="ml-4">${data[0].schedule}</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">詳細行程</div>
          <div class="col-9">${data[0].memo}</div>
        </div>
      </div>
    `);
  });
}

function viewMDetail(e){
  let id=$(e).parents('tr').find('input[name=id]').val()
  $.post("php/api.php?do=viewMDetail",{id},function(data){
    // console.log(JSON.parse(data));
    data=JSON.parse(data); // 將字串轉換成JSON格式
    // console.log(data);
    $('#detail2 .modal-body').html(`
      <div class="col-lg-12 mx-auto p-4" style="border: 1px solid #000">
        <div class="row">
          <div class="col-3">申請人</div>
          <div class="col-9"><a href="userprofile.php?id=${data[1].acc}" style="color:#7b8086" target="_blank">${data[1].nickname}</a></div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">性別</div>
          <div class="col-9">${data[2].sex}</div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">聯絡資訊</div>
          <div class="col-9">
            <div class="d-flex mb-3">
              <div>行動電話：</div>
              <div class="ml-4">${data[2].phone}</div>
            </div>
            <div class="d-flex mb-3">
              <div>Email：</div>
              <div class="ml-4">${data[2].email}</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">申請資訊</div>
          <div class="col-9">
            <div class="d-flex mb-3">
              <div>日期：</div>
              <div class="ml-4">${data[0].date.substr(0,16)}</div>
            </div>
            <div class="d-flex mb-3">
              <div>申請時數：</div>
              <div class="ml-4">${data[0].timelength}</div>
            </div>
            <div class="d-flex mb-3">
              <div>預計花費：</div>
              <div class="ml-4">${data[0].budget}</div>
            </div>
            <div class="d-flex mb-3">
              <div>地點：</div>
              <div class="ml-4">${data[0].place}</div>
            </div>
            <div class="d-flex">
              <div>行程：</div>
              <div class="ml-4">${data[0].schedule}</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">詳細行程</div>
          <div class="col-9">${data[0].memo}</div>
        </div>
      </div>
    `);
  });
}


// memberPage viewDetail for event you start
function viewUEventDetail(e){
  let id=$(e).parents('tr').find('input[name=id]').val()
  $.post("php/api.php?do=viewUEventDetail",{id},function(data){
    data=JSON.parse(data);
    // console.log(data);
    $('#viewEvent .modal-body').html(`
      <div class="col-lg-12 mx-auto p-4" style="border: 1px solid #000">
        <div class="row">
          <div class="col-3">活動名稱</div>
          <div class="col-9">${data.eventname}</div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">活動時間</div>
          <div class="col-9">${data.date.substr(0,16)}</div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">活動地點</div>
          <div class="col-9">
            <div class="d-flex mb-3">
              <div>${data.locat}</div>
              <div class="ml-4">${data.place}</div>
            </div>
            <div class="d-flex mb-3">
              <div>${data.placeadd}</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">活動簡介</div>
          <div class="col-9">${data.intro}</div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">活動資訊</div>
          <div class="col-9">
            <div class="d-flex mb-3">
              <div>預算：</div>
              <div class="ml-4">$${data.budget}</div>
            </div>
            <div class="d-flex mb-3">
              <div>活動時長：</div>
              <div class="ml-4">${data.timelength}</div>
            </div>
            <div class="d-flex mb-3">
              <div>需求人數：</div>
              <div class="ml-4">${data.num}</div>
            </div>
            <div class="d-flex mb-3">
              <div>活動類型：</div>
              <div class="ml-4">${data.type}</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row mt-4">
          <div class="col-3">其他備註</div>
          <div class="col-9">${data.memo}</div>
        </div>
      </div>
    `);
  });
}


// memberPage viewDetail for event you join
function viewMEventDetail(e){
  let id=$(e).parents('tr').find('input[name=id]').val()
  $.post("php/api.php?do=viewMEventDetail",{id},function(data){
    data=JSON.parse(data);
    // console.log(data);
    $('#viewEvent .modal-body').html(`
      <div class="col-lg-12 mx-auto p-4" style="border: 1px solid #000">
        <div class="row">
          <div class="col-3">發起人</div>
          <div class="col-9"><a href="userprofile.php?id=${data[1]}" style="color:#7b8086" target="_blank">${data[0].organizer}</a></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-3">活動名稱</div>
          <div class="col-9">${data[0].eventname}</div>
        </div>
        <hr>
        <div class="row">
          <div class="col-3">活動時間</div>
          <div class="col-9">${data[0].date.substr(0,16)}</div>
        </div>
        <hr>
        <div class="row">
          <div class="col-3">活動地點</div>
          <div class="col-9">
            <div class="d-flex mb-3">
              <div>${data[2].locat}</div>
              <div class="ml-4">${data[2].place}</div>
            </div>
            <div class="d-flex mb-3">
              <div>${data[2].placeadd}</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-3">活動簡介</div>
          <div class="col-9">${data[2].intro}</div>
        </div>
        <hr>
        <div class="row">
          <div class="col-3">活動資訊</div>
          <div class="col-9">
            <div class="d-flex mb-3">
              <div>預算：</div>
              <div class="ml-4">$${data[2].budget}</div>
            </div>
            <div class="d-flex mb-3">
              <div>活動時長：</div>
              <div class="ml-4">${data[2].timelength}</div>
            </div>
            <div class="d-flex mb-3">
              <div>需求人數：</div>
              <div class="ml-4">${data[2].num}</div>
            </div>
            <div class="d-flex mb-3">
              <div>活動類型：</div>
              <div class="ml-4">${data[2].type}</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-3">其他備註</div>
          <div class="col-9">${data[2].memo}</div>
        </div>
      </div>
    `);
  });
}