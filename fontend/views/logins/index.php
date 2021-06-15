<div class="breadcrumbs-section plr-200 mb-80">
    <div class="breadcrumbs overlay-bg" style="background-image: url('assets/img/breadcrumb/1.png')">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Login / Register</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="index.php">Home</a></li>
                            <li>Login / Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="page-content" class="page-wrapper">
    <!-- LOGIN SECTION START -->
    <div class="login-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="registered-customers">
                        <h6 class="widget-title border-left mb-50">Đăng Nhập</h6>
                        <form action="" method="post">
                            <style>
                                input{
                                    border-radius: 10px;
                                    border: 1px solid red !important;
                                }
                            </style>
                            <?php
                            if (isset($_SESSION['error'])) {
                                //hiển thị mảng theo key trong 1 chuỗi mà ko cần nối chuỗi
                                //sử dụng ký tự {} bao lấy mảng đó
                                echo "<div class='alert alert-danger'>
                                                 {$_SESSION['error']}
                                                    </div>";
                                unset($_SESSION['error']);
                            }
                            if (!empty($this->error)) {
                                echo "<div class='alert alert-danger'>
        $this->error
        </div>";
                            }
                            if (isset($_SESSION['success'])) {
                                //hiển thị mảng theo key trong 1 chuỗi mà ko cần nối chuỗi
                                //sử dụng ký tự {} bao lấy mảng đó
                                echo "<div class='alert alert-success'>
        {$_SESSION['success']}
        </div>";
                                unset($_SESSION['success']);
                            }
                            ?>
                            <div class="login-account p-30 box-shadow">
                                <input type="text" name="username" placeholder="UserName" value="<?php echo isset($_POST['dangnhap'])?$_POST['username']:''?>">
                                <input type="password" name="password" placeholder="Password">
                                <input name="dangnhap" value="Đăng Nhập" class="submit-btn-1 btn-hover-1" type="submit">
                            </div>
                            <?php if(!empty($this->error)):?>
                                <div class="alert alert-danger">
                                    <b><?php echo $this->error?></b>
                                </div>
                            <?php endif;?>
                            <?php if(isset($_SESSION['error'])):?>
                                <div class="alert alert-danger">
                                    <b><?php echo $_SESSION['error']?></b>
                                    <?php unset($_SESSION['error'])?>
                                </div>
                            <?php endif;?>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="new-customers">
                        <form action="" method="post">
                            <h6 class="widget-title border-left mb-50">Đăng Ký</h6>
                            <div class="login-account p-30 box-shadow">
                                <div class="row">
                                </div>
                                <input type="text" value="<?php echo isset($_POST['dangki'])?$_POST['signupusername']:''?>" name="signupusername"  placeholder="Username..." >
                                <input type="password" value="" name="signuppassword"  placeholder="Password">
                                <input type="password" value="" name="repassword"  placeholder="Confirm Password">

                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="submit-btn-1 mt-20 btn-hover-1" name="dangki" type="submit" value="Đăng kí">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset" value="Nhập Lại">
                                    </div>

                                </div>
                                <?php if(!empty($this->error1)):?>
                                    <div class="alert alert-danger">
                                        <b><?php echo $this->error1?></b>
                                    </div>
                                <?php endif;?>
                                <?php if(!empty($this->success)):?>
                                    <div class="alert alert-danger">
                                        <b><?php echo $this->success?></b>
                                    </div>
                                <?php endif;?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN SECTION END -->

</div>
