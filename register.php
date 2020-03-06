    <!-- sign in -->
    <div class="signin-content fontfamily-1">
        <div class="signin-image">
            <figure><img src="img/register/signin-image.jpg" alt="sing up image"></figure>
            <a class="signup-image-link" onclick="flip()">尚未建立帳號？</a>
        </div>
        <p id="result-2" for="agree-term" class="label-agree-term"></p>
        <div class="signin-form">
            <h2 class="form-title fontfamily-1">會員登入</h2>
            <form method="POST" class="register-form" id="login-form">
                <div class="form-group">
                    <label for="your_acc"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="acc" id="your_acc" placeholder="帳號"/>
                </div>
                <div class="form-group">
                    <label for="your_pwd"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="pwd" id="your_pwd" placeholder="密碼"/>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                    <label for="remember-me" class="label-agree-term"><span><span></span></span>記住帳號密碼</label>
                </div>
                <div class="form-group form-button">
                    <input type="button" onclick="login()" name="signin" id="signin" class="form-submit" value="登入"/>
                </div>
            </form>
            <div class="social-login">
                <span class="social-label">其他登入方式</span>
                <ul class="socials">
                    <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                    <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                    <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- sign up -->
    <div class="signup-content fontfamily-1">
        <div class="signup-form">
            <h2 class="form-title fontfamily-1">會員註冊</h2>
            <form method="POST" class="register-form" id="register-form">
                <div class="form-group">
                    <label for="acc"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="acc" id="acc" placeholder="帳號"/>
                </div>
                <div class="form-group">
                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                    <input type="email" name="email" id="email" placeholder="Email"/>
                </div>
                <div class="form-group">
                    <label for="pwd"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="pwd" id="pwd" placeholder="密碼"/>
                </div>
                <div class="form-group">
                    <label for="re_pwd"><i class="zmdi zmdi-lock-outline"></i></label>
                    <input type="password" name="re_pwd" id="re_pwd" placeholder="確認密碼"/>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>我已同意  <a href="#" class="term-service">iFRIEND 服務規範</a></label>
                </div>
                <p id="result" for="agree-term" class="label-agree-term"></p>
                <div class="form-group form-button">
                    <input type="button" onclick="regist()" name="signup" id="signup" class="form-submit" value="註冊"/>
                </div>
            </form>
        </div>
        <div class="signup-image">
            <figure><img src="img/register/signup-image.jpg" alt="sing up image"></figure>
            <a class="signup-image-link" onclick="flip()" style="padding-top: 9px;">已經是 iFRIEND 會員？</a>
        </div>
    </div>
