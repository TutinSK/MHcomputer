<?php require_once 'views/layouts/header.php'?>
<section class="content-header">
    <?php if(isset($_SESSION['error'])):?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error']?>
            <?php unset($_SESSION['error'])?>
        </div>
    <?php endif;?>
    <?php if(!empty($this->error)):?>
        <div class="alert alert-danger">
            <?php echo $this->error?>
        </div>
    <?php endif;?>
    <?php if(isset($_SESSION['success'])):?>
        <p class="alert alert-success"> <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?></p>
    <?php endif;?>
</section>
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">-->
<!--        <h1>-->
<!--            Dashboard-->
<!--            <small>Quản Lý Thông tin Máy Tính</small>-->
<!--        </h1>-->
<!--        <ol class="breadcrumb">-->
<!--            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
<!--            <li class="active">Quản Lý Thông tin Máy Tính</li>-->
<!--        </ol>-->
<!--    </section>-->

    <!-- Main content -->
    <?php echo $this->content?>

<?php require_once 'views/layouts/footer.php'?>
