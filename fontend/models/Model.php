<?php
require_once 'configs/database.php';
class Model
{
    public $connection;
    public $page;
    //số item trên mỗi page, dùng trong phân trang
    public $per_page = 9;
    public $startpoint;
    public $querySearch;

    //param search từ form search
    public function __construct()
    {
        $this->connection = $this->getConnection();
        $this->page = (int)!isset($_GET['page']) ? 1 : $_GET['page'];
        if ($this->page < 0) $this->page = 1;
        $this->startpoint = ($this->page * $this->per_page) - $this->per_page;
        //set giá trị cho query_search, trong trường hợp có form search
        $this->querySearch = $this->getQuerySearch();
    }

    public function getConnection()
    {
        $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        if (!$connection) {
            die('Kết nối thất bại');
        }
        return $connection;
    }
    public function getCategories(){
        $sql_select="SELECT * FROM manufacturer";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $manufacturers=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $manufacturers;
    }
    public function getQuerySearch()
    {
        //xử lý trường hợp nếu có tham số truyền lên từ form search
        $querySearch = ' WHERE TRUE';
        $str_price='';
        $str_hsx="";
        $str_seach="";
        if(isset($_GET['hsx'])){
            $str_hsx=implode(',',$_GET['hsx']);
            $str_hsx="($str_hsx)";
            $str_hsx=" AND computers.id_manufacturer IN $str_hsx";
        }
        if(isset($_GET['price'])){
            foreach ($_GET['price'] as $price){
                switch ($price){
                    case 1: $str_price.=" OR computers.price < 5000000"; break;
                    case 2: $str_price.=" OR (computers.price >= 5000000 AND computers.price < 10000000)"; break;
                    case 3: $str_price.=" OR (computers.price >= 10000000 AND computers.price <= 15000000)"; break;
                    case 4: $str_price.=" OR (computers.price >= 150000000 AND computers.price <= 20000000)"; break;
                    case 5: $str_price.=" OR computers.price > 20000000"; break;
                }
            }
            $str_price = substr($str_price,3);
            $str_price=" AND ($str_price)";
        }

        if(isset($_GET['seach'])){
            $str_seach.=" AND name_computer LIKE '%{$_GET['name']}%'";
        }
        $querySearch.="$str_hsx $str_price $str_seach";
        return $querySearch;
    }
    public function getPagination($table)
    {
        $url = $_SERVER['REQUEST_URI'];
        if (!empty($_SERVER['QUERY_STRING'])) {
            $url .= '&';
        }else{
            $url = $_SERVER['REQUEST_URI'];
        }
        //thực hiện truy vấn lấy ra toàn bộ tổng số bản ghi đang có trong tham số $table truyền vào
        //gắn thêm param search này vào câu truy vấn lấy tổng số bản ghi để phân trang
        $querySelect = "SELECT COUNT(*) as `num` FROM {$table}{$this->querySearch}";
        $obj=$this->connection->prepare($querySelect);
        $obj->execute();
        $rowArr = $obj->fetch(PDO::FETCH_ASSOC);

        $total = $rowArr['num'];

        //sau khi có được tổng số bản ghi là $total, thực hiện tính toán logic đễ xử lý hiển thị phân trang
        $adjacents = "2";

        $prevlabel = "&lsaquo; Prev";
        $nextlabel = "Next &rsaquo;";
        $lastlabel = "Last &rsaquo;&rsaquo;";

        $this->page = ($this->page == 0 ? 1 : $this->page);
        $start = ($this->page - 1) * $this->per_page;
        $prev = $this->page - 1;
        $next = $this->page + 1;
        $lastpage = ceil($total / $this->per_page);
        $lpm1 = $lastpage - 1; // //last page minus 1
        $pagination = "";
        if($lastpage==1){
            return '';
        }
        $pagination.="<ul class='pagination'>";
        $pagination.="<li class='page_info'><a>Page {$this->page} of {$lastpage}</a></li>";
        if($this->page>1) $pagination.="<li><a href='{$url}page=$prev'>$prevlabel</a></li>";
        if($lastpage<7){
            for ($i=1;$i<=$lastpage;$i++){
                if($this->page==$i){
                    $pagination.="<li class='active'><a href='#'>$i</a></li>";
                }else{
                    $pagination.="<li><a href='{$url}page=$i'>$i</a></li>";
                }
            }
        }
        if($lastpage>=7){
            for ($i=1;$i<=$lastpage;$i++){
                if(in_array($i,[1,$this->page-1,$this->page+1,$lastpage])){
                    $pagination.="<li><a href='{$url}page=$i'>$i</a></li>";


                }elseif ($this->page==$i){
                    $pagination.="<li class='active'><a href='#'>$i</a></li>";
                }elseif (in_array($i,[2,3,$lastpage-1,$lastpage-2])){
                    $pagination.="<li><a>...</a></li>";
                }
            }
        }
        if($this->page<$lastpage){
            $pagination.="<li><a href='{$url}page=$next'>$nextlabel</a></li>";

        }elseif ($this->page==$lastpage){
            $pagination.="";
        }
        $pagination.="</ul>";
        return $pagination;

        return $pagination;
    }
    public function getPaginationHsx($table,$id)
    {
        $url = $_SERVER['REQUEST_URI'];
        if (!empty($_SERVER['QUERY_STRING'])) {
            $url .= '&';
        }else{
            $url = $_SERVER['REQUEST_URI'];
        }
        //thực hiện truy vấn lấy ra toàn bộ tổng số bản ghi đang có trong tham số $table truyền vào
        //gắn thêm param search này vào câu truy vấn lấy tổng số bản ghi để phân trang
        $querySelect = "SELECT COUNT(*) as `num` FROM {$table} where id_manufacturer=$id";
        $obj=$this->connection->prepare($querySelect);
        $obj->execute();
        $rowArr = $obj->fetch(PDO::FETCH_ASSOC);
        $total = $rowArr['num'];
        //sau khi có được tổng số bản ghi là $total, thực hiện tính toán logic đễ xử lý hiển thị phân trang
        $adjacents = "2";

        $prevlabel = "&lsaquo; Prev";
        $nextlabel = "Next &rsaquo;";
        $lastlabel = "Last &rsaquo;&rsaquo;";

        $this->page = ($this->page == 0 ? 1 : $this->page);
        $start = ($this->page - 1) * $this->per_page;
        $prev = $this->page - 1;
        $next = $this->page + 1;
        $lastpage = ceil($total / $this->per_page);
        $lpm1 = $lastpage - 1; // //last page minus 1
        $pagination = "";
        if($lastpage==1){
            return '';
        }
        $pagination.="<ul class='pagination'>";
        $pagination.="<li class='page_info'><a>Page {$this->page} of {$lastpage}</a></li>";
        if($this->page>1) $pagination.="<li><a href='{$url}page=$prev'>$prevlabel</a></li>";
        if($lastpage<7){
            for ($i=1;$i<=$lastpage;$i++){
                if($this->page==$i){
                    $pagination.="<li class='active'><a href='#'>$i</a></li>";
                }else{
                    $pagination.="<li><a href='{$url}page=$i'>$i</a></li>";
                }
            }
        }
        if($lastpage>=7){
            for ($i=1;$i<=$lastpage;$i++){
                if(in_array($i,[1,$this->page-1,$this->page+1,$lastpage])){
                    $pagination.="<li><a href='{$url}page=$i'>$i</a></li>";


                }elseif ($this->page==$i){
                    $pagination.="<li class='active'><a href='#'>$i</a></li>";
                }elseif (in_array($i,[2,3,$lastpage-1,$lastpage-2])){
                    $pagination.="<li><a>...</a></li>";
                }
            }
        }
        if($this->page<$lastpage){
            $pagination.="<li><a href='{$url}page=$next'>$nextlabel</a></li>";

        }elseif ($this->page==$lastpage){
            $pagination.="";
        }
        $pagination.="</ul>";
        return $pagination;

        return $pagination;
    }
}
