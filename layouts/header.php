<header class="shadow mb-5">
    <nav class="container d-flex justify-content-between py-3">
        <!-- <pre style="text-align:left!important"> -->
        <?php //print_r($_SERVER);?>
        <!-- </pre> -->
        <?php
        /**
         * 使用$_SERVER['PHP_SELF]來取得網址請求的檔案時，
         * 如果檔案不是在網站的根目錄下，可能會拿到一串完成的路徑字串，如：
         * '/classroom/1112/1112-PHP-MYSQL/index.php'
         * 因為我們只需要最後面的index字串做為判斷的依據，
         * 所以要先把$_SERVER['PHP_SELF']字串做處理來因應更多不確定的路徑狀況
         * 原則就是我們只取$_SERVER['PHP_SELF']的最後一個字串，並去掉副檔名
         * 
         * 因為路徑的字串型式都是以"/"做區隔，所以可以使用explode這個函式來把字串拆成陣列
         * 而要取出陣列的最後一個值，則可以使用count()-1的方式(陣列個數-1就是陣列的最後一個元素的索引值)
         * 也可以使用函式array_pop()來取得最後一個值(array_pop()的作用為回傳陣列的最後一個值)
         * 要注意的是array_pop()會使原陣列中的最後一個值從陣列中被刪除，所以要先設一個變數來代表陣列
         */
        $file_str=explode("/",$_SERVER['PHP_SELF']);
        $local=str_replace('.php','',array_pop($file_str)) ;
            switch($local){
                case "index":
                    echo "<div>";
                    echo "<a class='mx-2' href='index.php'>回首頁</a>";
                    echo "</div>";
                    echo "<div>";
                    echo "<!-----新增功能預定----->";
                    echo "<a class='mx-2' href='index.php?do=main'>最新消息</a>";
                    echo "<a class='mx-2' href='index.php?do=students_list'>學生列表</a>";
                    echo "<a class='mx-2' href='index.php?do=survey'>意見調查</a>";
                    echo "</div>";
                    echo "<div>";
                    if(isset($_SESSION['login'])){
                        echo "<a class='mx-2' href='admin_center.php'>回管理中心</a>";
                        echo "<a class='mx-2' href='logout.php'>教師登出</a>";
                    }else{
                        echo "<a class='mx-2' href='index.php?do=reg'>教師註冊</a>";
                        echo "<a class='mx-2' href='index.php?do=login'>教師登入</a>";
                    }
                    echo "</div>";
                break;
                case "admin_center":
                    echo "<div>";
                    echo "<a class='mx-2' href='admin_center.php'>回管理首頁</a>";
                    echo "<a class='mx-2' href='index.php'>回網站首頁</a>";
                    echo "</div>";
                    echo "<div>";
                    echo "<a class='mx-2' href='admin_center.php?do=students_list'>學生管理</a>";
                    echo "<a class='mx-2' href='admin_center.php?do=news'>新聞管理</a>";
                    echo "<a class='mx-2' href='admin_center.php?do=survey'>問卷管理</a>";
                    echo "</div>";
                    echo "<div>";
                    //<!-- <a href="?do=add">新增學生</a> -->
                    echo "<a class='mx-2' href='logout.php'>教師登出</a>";
                    echo "</div>";
                break;
            }
        ?>
    </nav>
</header>