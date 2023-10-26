<?php
require_once './datahelper.php';
function pager($page, $datacount, $countperpage=10) {
    $pagerString = '';
    $pagecount = ceil($datacount/$countperpage);
    for ($i = 1; $i <= $pagecount; $i++) {
        if ($i == $page) {
            $pagerString .= '<a href="#"> _ ' . $i . ' _ </a>';
        } else {
            $pagerString .= '<a href="index.php?p=' . $i . '">' . $i . '</a>';
        }
    }
    return $pagerString;
}

function pageData(int $page, int $count = 10) {
    $from = (($page)-1) * $count;
    require_once './conn.php';
    $conn = mysqli_connect($server, $user, $password, $db);

    if (!$conn) {
        die("Connection failed" . mysqli_connect_errno());
    }
    $data = getData($conn, $from, $count);
    mysqli_close($conn);
    return $data;
}