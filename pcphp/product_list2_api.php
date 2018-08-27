<?php
require __DIR__ . '/__db_connect.php';

$pageName = 'product_list';
$params = [];
$m_rs = $mysqli->query("SELECT * FROM categories");
$m_raw = [];
$m_ar = [];

while ($r = $m_rs->fetch_assoc()) {
    $m_raw[] = $r;
}

foreach ($m_raw as $k => $v) {
    if ($v['parent_sid'] == 0) {
        $m_ar[$v['sid']] = $v;
    } else {
        if (!empty($m_ar[$v['parent_sid']])) {
            $m_ar[$v['parent_sid']]['children'][$v['sid']] = $v;
        }
    }
}
$per_page = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;

$where = " WHERE 1 ";

if (!empty($cate)) {

    $where .= " AND category_sid=$cate ";
    $params['cate'] = $cate;
}

$total_sql = "SELECT COUNT(1) FROM products $where";
$total_rows = $mysqli->query($total_sql)->fetch_row()[0];
$total_pages = ceil($total_rows / $per_page);

$product_sql = "SELECT * FROM products $where ";
$product_rs = $mysqli->query($product_sql);
$p_ar = [];
while ($r = $product_rs->fetch_assoc()) {
    $p_ar[] = $r;

}
$result = [
    'success' => true,
    'total_rows' => $total_rows,
    'total_pages' => $total_pages,
    'per_page' => $per_page,
    'page' => $page,
    'p_data' => $p_ar,
];

echo json_encode($result, JSON_UNESCAPED_UNICODE);