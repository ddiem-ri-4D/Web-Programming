<?php
    if(isset($_SESSION["MaTaiKhoan"]) == false){
?>
<div class="container" >
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">   
        <h3 id="1111" style="text-align: center; color: #FDA30E; margin-top: 30px; margin-bottom: 30px; font-size: 40px;">LOGIN FORM</h3>                 
            <div class="panel panel-info" >
                <div class="panel-heading" style="display:flex; align-items:center; justify-content: space-between;">
                    <div class="panel-title" >ĐĂNG NHẬP</div>
                    <div style="font-size: 82%;"><a href="#">Forgot password?</a></div>
                </div>     

                <div style="padding-top:30px" class="panel-body">
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form id="loginform" action="modules/xlDangNhap.php" method="POST" class="form-horizontal" role="form"
                            >
                        <span class="err" id="eDangNhap" ></span>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Tên đăng nhập hoặc Email...">                                        
                        </div>
                                
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Mật khẩu...">
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <button id="btn-login" type="submit" class="btn btn-success"><i class="icon-hand-right"></i> &nbsp Đăng Nhập</button>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Không có tài khoản! 
                                    <a href="#2222" onClick="$('#loginbox').hide(); $('#signupbox').show()">Đăng ký ngay!</a>
                                </div>
                            </div>
                        </div>    
                    </form>    
                     
                </div>
            </div>
        </div>
    </div>

    <div id="signupbox" style="display:none; margin-top:50px; margin-bottom: 100px;" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
        <h3 id="2222" style="text-align: center; color: #FDA30E; margin-bottom: 30px; font-size: 40px; padding-top: 0px">REGISTER FORM</h3>       
        <div class="panel panel-info">
            <div class="panel-heading" style="display:flex; align-items:center; justify-content: space-between;">
                <div class="panel-title">ĐĂNG KÝ TÀI KHOẢN</div>
                <div style="font-size: 82%;"><a id="signinlink" href="#1111" onclick="$('#signupbox').hide(); $('#loginbox').show()">Đăng nhập</a></div>
            </div>  
        <div class="panel-body" >
            <form id="signupform" class="form-horizontal" action="pages/TaoTaiKhoan/xlTaoTaiKhoan.php" method="POST" role="form" onsubmit="return KiemTraDangKy()">                              
                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>
                                    
                <div class="form-group" >
                    <span class="err" id="eHoTen" ></span>
                    <div>
                        <label for="txtHoTen" class="col-md-3 control-label">Họ và tên của bạn</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="txtHoTen" id="txtHoTen" placeholder="Họ tên...">
                        </div>
                    </div>
                 </div>

                <div class="form-group">
                    <label for="txtNgaySinh" class="col-md-3 control-label">Ngày sinh</label>
                    <div class="col-md-3" >
                    <tr>                      
                        <td>
                        <select name="BirthDay" id="Birthday_Day" class="form-control col-md-3" style="margin-bottom: 10px;">
                            <option value="-1">[Ngày]</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        
                        <select name="BirthdayMonth" id="Birthday_Month" class="form-control col-md-3" style="margin-bottom: 10px;">
                            <option value="-1">[Tháng]</option>
                            <option value="January">Jan(1)</option>
                            <option value="February">Feb(2)</option>
                            <option value="March">Mar(3)</option>
                            <option value="April">Apr(4)</option>
                            <option value="May">May(5)</option>
                            <option value="June">Jun(6)</option>
                            <option value="July">Jul(7)</option>
                            <option value="August">Aug(8)</option>
                            <option value="September">Sep(9)</option>
                            <option value="October">Oct(10)</option>
                            <option value="November">Nov(11)</option>
                            <option value="December">Dec(12)</option>
                        </select>
                        
                        <select name="BirthdayYear" id="Birthday_Year" class="form-control col-md-3" style="margin-bottom: 10px;">
                        
                            <option value="-1">[Năm]</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                        </select>
                        </td>
                        </tr>

                    </div>
                </div>  

                <div class="form-group">
                    <label for="txtThanhPho" class="col-md-3 control-label">Bạn sống tại</label>
                    <div class="col-md-9" >
                    <tr>                      
                        <td>
                        <select name="ThanhPho" id="ThanhPho" class="form-control">
                            <option value="-1">--Chọn thành phố--</option>
                            <option value="1">Hà Nội</option>
                            <option value="2">Hải Phòng</option>
                            <option value="3">Đà Nẵng</option>
                            <option value="4">Hồ Chí Minh</option>
                            <option value="5">Cần Thơ</option>
                            <option value="5">Khác</option>
                        </select>
                        </td>
                        </tr>
                    </div>
                </div>  

                <div class="form-group">
                    <span class="err" id="eDienThoai"></span>
                    <div>
                        <label for="txtDienThoai" class="col-md-3 control-label">Số điện thoại<span style="color: red;"> *</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" pattern="[0-9]{10,11}" title="Số điện thoại phải là số 0-9 và từ 10-11 kí tự" 
                                name="txtDienThoai" id="txtDienThoai" placeholder="Số điện thoại..." >
                        </div>
                    </div>
                 </div>

                <div class="form-group">
                    <span class="err" id="eTaiKhoan"></span>
                    <div>
                        <label for="txtTaiKhoan" class="col-md-3 control-label">Tên đăng nhập<span style="color: red"> *</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"  name="txtTaiKhoan" id="txtTaiKhoan" placeholder="Tên đăng nhập...">
                        </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <span class="err" id="eMatKhau"></span>
                    <div>
                        <label for="matkhau" class="col-md-3 control-label">Mật khẩu<span style="color: red"> *</span></label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" title="phải có ít nhất 7 kí tự và có ít nhất 1 chữ hoa hoặc 1 chữ thường hoặc 1 số hoặc 1 kí tự đặc biệt: ~<>?_+=!@#$%^&*(){}|;:,." name="txtMatKhau" id="txtMatKhau" onkeyup="checkPassword()" placeholder="Mật khẩu..."
                                pattern="[~<>?_+=!@#$%^&*(){}|;:,.a-zA-Z0-9]{7,20}">
                            <div class="progressBar-container">
                                <span>Độ bảo mật:</span>
                                <div class="progressBar">
                                    <div class="progressBar-separate">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div style="border:none;"></div>
                                    </div>
                                    <div id="status" class="progressBar-status"></div>
                                </div>
                                <span id="progressBar-mess"></span>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <span class="err" id="eXNMatKhau" style="color:red"></span> 
                    <div>
                        <label for="txtXNMatKhau" class="col-md-3 control-label">Xác nhận mật khẩu<span style="color: red"> *</span></label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="txtXNMatKhau" placeholder="Xác nhận mật khẩu...">
                        </div>
                    </div>
                 </div>

                 <div class="form-group">
                    <span class="err" id ="eEmail" style="color:red"></span>
                    <div>
                        <label for="txtEmail" class="col-md-3 control-label">Email<span style="color: red"> *</span></label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email...">
                        </div>
                    </div>
                 </div>
               
                 <div class="form-group">
                    <label for="txtMaKiemTra" class="col-md-3 control-label">Mã kiểm tra</label>
                    <div class="col-md-9" >
                        <label id="captcha-code" style="padding:6px 10px; user-select:none; background-color: #FDA30E;"><?php include "pages/TaoTaiKhoan/pCaptcha.php"; ?></label>	                         
                    </div>
                 </div>
                 <div class="form-group">
                    <span class="err" id ="eMaKiemTra"></span>
                    <div>               
                        <label for="txtMaKiemTra" class="col-md-3 control-label">Nhập mã kiểm tra<span style="color: red"> *</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="txtMaKiemTra" name="txtMaKiemTra" placeholder="Nhập mã kiểm tra...">
                        </div>
                    </div>
                 </div>
               
                 <div class="form-group">
                     <!-- Button -->                                        
                     <div class="col-md-offset-3 col-md-9">
                         <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Đăng ký</button>
                     </div>
                 </div>
                 
                 <!-- <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">                  
                     <div class="col-md-offset-3 col-md-9">
                         <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i> Sign Up with Facebook</button>
                     </div>                                                                   
                 </div> -->
            </form>
            </div>
		</div>
    </div> 
</div>
<div class="clearfix"></div>
<?php
    } 
?>


<script type="text/javascript">
    var strength;
    function checkPassword(){
        var pass = document.getElementById('txtMatKhau').value;
        var s = document.getElementById('status');

        strength = 0;
    
        if(pass.match(/[a-z]/) != null){
            strength += 1;
        }
        if(pass.match(/[0-9]/) != null){
            strength += 1;
        }
        if(pass.match(/[A-Z]/) != null){
            strength += 1;
        }
        if(pass.match(/[~<>?_+=!@#$%^&*(){}|;:,.]/) != null){
            strength += 1;
        }
        if(pass.length > 6){
            strength += 1;
        }
        

        switch(strength){
            case 0:
                s.style.width = 0;
                break;
            case 1:
                s.style.backgroundColor = "#DC3545";
                s.style.width = "20%";
                break;
            case 2:
                s.style.backgroundColor = "#FFC107";
                s.style.width = "40%";
                break;
            case 3:
                s.style.backgroundColor = "#28A745";
                s.style.width = "60%";
                break;
            case 4:
                s.style.backgroundColor = "#28A745";
                s.style.width = "80%";
                break;
            case 5:
                s.style.backgroundColor = "#28A745";
                s.style.width = "100%";
                break;
        }

    }

    function KiemTraDangKy(){
        var co = true;
        
        var control = document.getElementById('txtTaiKhoan');
        var err = document.getElementById('eTaiKhoan');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Tên đăng nhập không được rỗng";
        }
        else
        {
            err.innerHTML ="";
        }

        control = document.getElementById('txtHoTen');
        err = document.getElementById('eHoTen');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Họ và tên không được rỗng";
        }
        else
        {
            err.innerHTML ="";
        }
        
        control = document.getElementById('txtMatKhau');
        err = document.getElementById('eMatKhau');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Mật khẩu không được rỗng";
        }
        else
        {
            err.innerHTML ="";
        }

        control1 = document.getElementById('txtXNMatKhau');
        err = document.getElementById('eXNMatKhau');
        if(control.value !=  control1.value)
        {
            co = false;
            err.innerHTML = "Nhập lại mật khẩu không trùng";
        }
        else
        {
            err.innerHTML ="";
        }

        control = document.getElementById('txtDienThoai');
        err = document.getElementById('eDienThoai');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Số điện thoại không dược rỗng";
        }
        else
        {
            err.innerHTML ="";
        }

        control = document.getElementById('txtEmail');
        err = document.getElementById('eEmail');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Email không được rỗng";
        }
        else
        {
            err.innerHTML ="";
        }
        
        control = document.getElementById('txtMaKiemTra');
        err = document.getElementById('eMaKiemTra');
        var captcha = document.getElementById('captcha-code');
        if(control.value != captcha.innerHTML)
        {
            
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              captcha.innerHTML = this.responseText;
            }
            };
            xhttp.open("GET", "pages/TaoTaiKhoan/pCaptcha.php", true);
            xhttp.send();

            co = false;
            err.innerHTML = "Mã Captcha không hợp lệ";
        }
        else
        {
            err.innerHTML = "";
        }

        return co;
    }

</script>
<?php
    if(isset($_GET["err"]))
    {
        ?>
            <div>
                <span class="err">Tên đăng nhập đã tồn tại</span>
            </div>
        <?php
    }

?>