<?php
require_once 'models/MayTinh.php';
require_once 'controllers/Controller.php';

class MaytinhController extends Controller
{

    public function index()
    {
        $maytinh_model = new MayTinh();
        $maytinhs = $maytinh_model->getAll();
        $categories=$maytinh_model->loadcategories();
        $hangs=$maytinh_model->loadmanufacturer();
        $page = $maytinh_model->getPagination('computers');
        $this->content = $this->render('views/maytinhs/index.php', ['maytinhs' => $maytinhs, 'page' => $page,'categories'=>$categories,'hangs'=>$hangs]);
        require_once 'views/layouts/main.php';
    }

    public function view()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=maytinh&action=index');
            exit();
        }
        $id = $_GET['id'];
        $maytinh_model = new MayTinh();
        $maytinh = $maytinh_model->getOne($id);
        $this->content = $this->render('views/maytinhs/view.php', ['maytinh' => $maytinh]);
        require_once 'views/layouts/main.php';
    }

    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=maytinh&action=index');
            exit();
        }
        $id = $_GET['id'];
        $maytinh_model = new MayTinh();
        $is_delete = $maytinh_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = "Xóa ban ghi $id thành công";
        } else {
            $_SESSION['error'] = "Xóa bản ghi thất bại";
        }
        header("Location:index.php?controller=maytinh&action=index");
        exit();
    }

    public function create()
    {
        $maytinh_model = new MayTinh();
        $categories = $maytinh_model->loadcategories();
        $manufacturers = $maytinh_model->loadmanufacturer();
        if (isset($_POST['themmoi'])) {
            $name = $_POST['name'];
            $loai = $_POST['loai'];
            $manufacturer = $_POST['hang'];
            $price = $_POST['gia'];
            $cpu = $_POST['cpu'];
            $ram = $_POST['ram'];
            $card = $_POST['card'];
            $memory = $_POST['ocung'];
            $opsystem = $_POST['hdh'];
            $port = $_POST['port'];
            $webcam = $_POST['webcam'];
            $screem = $_POST['manhinh'];
            $color = $_POST['mausac'];
            $description = $_POST['mota'];
            $amount = $_POST['soluong'];
            $weight = $_POST['khoiluong'];
            $pin = $_POST['pin'];
            $arrpicture = $_FILES['anh'];
            $arrpicture1 = $_FILES['anh1'];
            $arrpicture2 = $_FILES['anh2'];
            $arrpicture3 = $_FILES['anh3'];
            if (empty($name) || empty($price) || empty($cpu) || empty($ram) || empty($card) || empty($memory)) {
                $_SESSION['error'] = "Không để trống nhập lại";
                $this->content = $this->render('views/maytinhs/create.php', ['categories' => $categories, 'manufacturers' => $manufacturers]);
                require_once "views/layouts/main.php";
                return;
            }
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {
                $extension = pathinfo($arrpicture['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $isError = 1;
                    $this->content = $this->render('views/maytinhs/create.php');
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content = $this->render('views/maytinhs/create.php');
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            if ($arrpicture1['size'] > 0 && $arrpicture1['error'] == 0) {
                $extension = pathinfo($arrpicture1['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $isError = 1;
                    $this->content = $this->render('views/maytinhs/create.php');
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture1['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content = $this->render('views/maytinhs/create.php');
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            if ($arrpicture2['size'] > 0 && $arrpicture2['error'] == 0) {
                $extension = pathinfo($arrpicture2['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $isError = 1;
                    $this->content = $this->render('views/maytinhs/create.php');
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture2['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content = $this->render('views/maytinhs/create.php');
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            if ($arrpicture3['size'] > 0 && $arrpicture3['error'] == 0) {
                $extension = pathinfo($arrpicture3['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $isError = 1;
                    $this->content = $this->render('views/maytinhs/create.php');
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture3['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content = $this->render('views/maytinhs/create.php');
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            $avatar = '';
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {
                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'computer-' . time() . $arrpicture['name'];
                $isUpload = move_uploaded_file($arrpicture['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar = $fileName;
                }
            }
            $avatar1 = '';
            if ($arrpicture1['size'] > 0 && $arrpicture1['error'] == 0) {
                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'computer-' . time() . $arrpicture1['name'];
                $isUpload = move_uploaded_file($arrpicture1['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar1 = $fileName;
                }
            }
            $avatar2 = '';
            if ($arrpicture2['size'] > 0 && $arrpicture2['error'] == 0) {
                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'computer-' . time() . $arrpicture2['name'];
                $isUpload = move_uploaded_file($arrpicture2['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar2 = $fileName;
                }
            }
            $avatar3 = '';
            if ($arrpicture3['size'] > 0 && $arrpicture3['error'] == 0) {
                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'computer-' . time() . $arrpicture3['name'];
                $isUpload = move_uploaded_file($arrpicture3['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar3 = $fileName;
                }
            }
            $maytinh_model = new MayTinh();
            $maytinh_model->name = $name;
            $maytinh_model->id_category = $loai;
            $maytinh_model->id_manufacturer = $manufacturer;
            $maytinh_model->price = $price;
            $maytinh_model->cpu = $cpu;
            $maytinh_model->card = $card;
            $maytinh_model->memory = $memory;
            $maytinh_model->ram = $ram;
            $maytinh_model->opsystem = $opsystem;
            $maytinh_model->screem = $screem;
            $maytinh_model->port = $port;
            $maytinh_model->webcam = $webcam;
            $maytinh_model->weight = $weight;
            $maytinh_model->color = $color;
            $maytinh_model->description = $description;
            $maytinh_model->amount = $amount;
            $maytinh_model->pin = $pin;
            $maytinh_model->picture = $avatar;
            $maytinh_model->picture1 = $avatar1;
            $maytinh_model->picture2 = $avatar2;
            $maytinh_model->picture3 = $avatar3;
            $is_create = $maytinh_model->create();
            if (!$is_create) {
                $_SESSION['error'] = "Thêm mới thất bại";
                $this->content = $this->render('views/maytinhs/create.php', ['categories' => $categories, 'manufacturers' => $manufacturers]);
                require_once "views/layout/main.php";
                exit();
            } else {
                $_SESSION['success'] = "Thêm mới thành công";
                header("Location:index.php?controller=maytinh&action=index");
                exit();
            }


        }
        $this->content = $this->render('views/maytinhs/create.php', ['categories' => $categories, 'manufacturers' => $manufacturers]);
        require_once 'views/layouts/main.php';
    }

    public function update()
    {

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=maytinh&action=index');
            exit();
        }
        $id = $_GET['id'];
        $maytinh_model = new MayTinh();
        $maytinh = $maytinh_model->getOne($id);
        $categoreis = $maytinh_model->loadcategories();
        $manufacturers = $maytinh_model->loadmanufacturer();
        if (isset($_POST['update'])) {
            $name = $_POST['name'];
            $loai = $_POST['loai'];
            $manufacturer = $_POST['hang'];
            $price = $_POST['gia'];
            $cpu = $_POST['cpu'];
            $ram = $_POST['ram'];
            $card = $_POST['card'];
            $memory = $_POST['ocung'];
            $opsystem = $_POST['hdh'];
            $port = $_POST['port'];
            $webcam = $_POST['webcam'];
            $screem = $_POST['manhinh'];
            $color = $_POST['mausac'];
            $description = $_POST['mota'];
            $amount = $_POST['soluong'];
            $weight = $_POST['khoiluong'];
            $pin = $_POST['pin'];
            $arrpicture = $_FILES['anh'];
            $arrpicture1 = $_FILES['anh1'];
            $arrpicture2 = $_FILES['anh2'];
            $arrpicture3 = $_FILES['anh3'];
            if (empty($name) || empty($price) || empty($cpu) || empty($ram) || empty($card) || empty($memory)) {
                $_SESSION['error'] = "Không để trống nhập lại";
                $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                require_once "views/layouts/main.php";
                return;
            }
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {
                $extension = pathinfo($arrpicture['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $isError = 1;
                    $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            if ($arrpicture1['size'] > 0 && $arrpicture1['error'] == 0) {
                $extension = pathinfo($arrpicture1['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $isError = 1;
                    $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture1['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            if ($arrpicture2['size'] > 0 && $arrpicture2['error'] == 0) {
                $extension = pathinfo($arrpicture2['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $isError = 1;
                    $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture2['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            if ($arrpicture3['size'] > 0 && $arrpicture3['error'] == 0) {
                $extension = pathinfo($arrpicture3['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $isError = 1;
                    $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture3['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            $avatar = $maytinh['picture'];
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {

                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                //thực hiện xóa ảnh cũ đi
                if (!empty($avatar)) {
                    @unlink($absolutePathUpload . '/' . $avatar);
                }

                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'computer-' . time() . $arrpicture['name'];
                $isUpload = move_uploaded_file($arrpicture['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar = $fileName;
                }
            }
            $avatar1 = $maytinh['picture1'];
            if ($arrpicture1['size'] > 0 && $arrpicture1['error'] == 0) {

                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                //thực hiện xóa ảnh cũ đi
                if (!empty($avatar1)) {
                    @unlink($absolutePathUpload . '/' . $avatar1);
                }

                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'computer-' . time() . $arrpicture1['name'];
                $isUpload = move_uploaded_file($arrpicture1['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar1 = $fileName;
                }
            }
            $avatar2 = $maytinh['picture2'];
            if ($arrpicture2['size'] > 0 && $arrpicture2['error'] == 0) {

                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                //thực hiện xóa ảnh cũ đi
                if (!empty($avatar2)) {
                    @unlink($absolutePathUpload . '/' . $avatar2);
                }

                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'computer-' . time() . $arrpicture2['name'];
                $isUpload = move_uploaded_file($arrpicture2['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar2 = $fileName;
                }
            }
            $avatar3 = $maytinh['picture3'];
            if ($arrpicture3['size'] > 0 && $arrpicture3['error'] == 0) {

                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                //thực hiện xóa ảnh cũ đi
                if (!empty($avatar3)) {
                    @unlink($absolutePathUpload . '/' . $avatar3);
                }

                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'computer-' . time() . $arrpicture3['name'];
                $isUpload = move_uploaded_file($arrpicture3['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar3 = $fileName;
                }
            }
            $maytinh_model2 = new MayTinh();
            $maytinh_model2->name = $name;
            $maytinh_model2->id_category = $loai;
            $maytinh_model2->id_manufacturer = $manufacturer;
            $maytinh_model2->price = $price;
            $maytinh_model2->cpu = $cpu;
            $maytinh_model2->card = $card;
            $maytinh_model2->memory = $memory;
            $maytinh_model2->ram = $ram;
            $maytinh_model2->opsystem = $opsystem;
            $maytinh_model2->screem = $screem;
            $maytinh_model2->port = $port;
            $maytinh_model2->webcam = $webcam;
            $maytinh_model2->weight = $weight;
            $maytinh_model2->color = $color;
            $maytinh_model2->description = $description;
            $maytinh_model2->amount = $amount;
            $maytinh_model2->pin = $pin;
            $maytinh_model2->picture = $avatar;
            $maytinh_model2->picture1 = $avatar1;
            $maytinh_model2->picture2 = $avatar2;
            $maytinh_model2->picture3 = $avatar3;
            $is_update = $maytinh_model2->update($id);
            if (!$is_update) {
                $_SESSION['error'] = "Update bản ghi $id thất bại";
                $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
                require_once "views/layouts/main.php";
                exit();
            } else {
                $_SESSION['success'] = "Update bản ghi $id thành công";
                header("Location:index.php?controller=maytinh&action=index");
                exit();
            }
        }
        $this->content = $this->render('views/maytinhs/update.php', ['maytinh' => $maytinh, 'categories' => $categoreis, 'manufacturers' => $manufacturers]);
        require_once "views/layouts/main.php";
    }
    public function seach(){
        if(isset($_GET['seach'])){
            echo "<pre>";
            print_r($_GET);
            echo "</pre>";
            die();
            $querySearch = ' WHERE TRUE';
            if (isset($_GET['name']) && !empty($_GET['name'])) {
                $querySearch .= " AND computers.name_computer LIKE '%{$_GET['name']}%'";
            }
            if(isset($_GET['loai'])&&$_GET['loai']!=0){
                $querySearch .= " AND computers.id_category={$_GET['loai']}'";
            }
            if(isset($_GET['hang'])&&$_GET['hang']!=0){
                $querySearch .= " AND computers.id_manufacturer={$_GET['hang']}'";
            }

            $maytinh_model = new MayTinh();
            $maytinhs = $maytinh_model->seach($querySearch);
            $categories=$maytinh_model->loadcategories();
            $hangs=$maytinh_model->loadmanufacturer();
            $page = $maytinh_model->getPagination('computers');
            $this->content = $this->render('views/maytinhs/index.php', ['maytinh' => $maytinhs, 'page' => $page,'categories'=>$categories,'hangs'=>$hangs]);
            require_once 'views/layouts/main.php';
        }
    }
}
