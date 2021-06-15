<?php
require_once 'configs/database.php';
class Model{
    public $connection;
    public $page;
    //số item trên mỗi page, dùng trong phân trang
    public $per_page = 5;
    public $startpoint;
    public $querySearch;
    //param search từ form search
    public function __construct()
    {
        $this->connection=$this->getConnection();
        $this->page = (int)!isset($_GET['page']) ? 1 : $_GET['page'];
        if ($this->page < 0) $this->page = 1;
        $this->startpoint = ($this->page * $this->per_page) - $this->per_page;
        //set giá trị cho query_search, trong trường hợp có form search
        $this->querySearch = $this->getQuerySearch();
    }

    public function getConnection(){
        $connection=new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
        if(!$connection){
            die('Kết nối thất bại');
        }
        return $connection;
    }
    public function getQuerySearch()
    {
        //xử lý trường hợp nếu có tham số truyền lên từ form search
        $querySearch = ' WHERE TRUE';
        if (isset($_GET['name']) && !empty($_GET['name'])) {
            $querySearch .= " AND computers.name_computer LIKE '%{$_GET['name']}%'";
        }
        if(isset($_GET['loai'])&&$_GET['loai']!=0){
            $querySearch .= " AND computers.id_category={$_GET['loai']}";
        }
        if(isset($_GET['hang'])&&$_GET['hang']!=0){
            $querySearch .= " AND computers.id_manufacturer={$_GET['hang']}";
        }
        if(isset($_GET['loaiocung'])&&$_GET['loaiocung']!=0){
            $querySearch.=" AND harddrive.category_harddrive={$_GET['loaiocung']}";
        }
        if (isset($_GET['dungluong']) && !empty($_GET['dungluong'])) {
            $querySearch .= " AND harddrive.capacity ={$_GET['dungluong']}";
        }
        if (isset($_GET['tencocung']) && !empty($_GET['tencocung'])) {
            $querySearch .= " AND harddrive.name LIKE '%{$_GET['dungluong']}%'";
        }
        if(isset($_GET['bus'])&&!empty($_GET['bus'])){
            $querySearch.=" AND ram.bus={$_GET['bus']}";
        }
        if(isset($_GET['memory'])&&!empty($_GET['memory'])){
            $querySearch.=" AND ram.memory={$_GET['memory']}";
        }
        if(isset($_GET['tenram'])&&!empty($_GET['tenram'])){
            $querySearch.=" AND ram.name_ram LIKE '%{$_GET['tenram']}%'";
        }
        if(isset($_GET['seachuser'])&& !empty($_GET['username'])){
            $querySearch.=" AND username_tb.username LIKE'%{$_GET['username']}%'";
        }
        return $querySearch;
    }
    public function getPagination($table)
    {
        $url = $_SERVER['REQUEST_URI'];
        if (!empty($_SERVER['QUERY_STRING'])) {
            $url .= '&';
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


}
