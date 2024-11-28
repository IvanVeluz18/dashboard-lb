<?php
include('../lbo/utils.php');
include('incSecure.php');

$Date1 = cleanstr($_POST['Date1'], 'date');
$Date2 = cleanstr($_POST['Date2'], 'date');
$IP = $_SERVER['REMOTE_ADDR'];

if ($Date1 == ''){
 $Date1 = left($maniladate, 7) . '-01';
 $Date2 = $maniladate;
} else {
 $date1 = new DateTime($Date1);
 $date2 = new DateTime($Date2);
 $interval = $date2->diff($date1);
 $Days = $interval->days;
 if ($Days > 100){
  $Limit = "LIMIT 10000";
 }
}

DBOpen();
$rs = DBGetData2("SELECT 
  CONCAT(YEAR(so.created_at), '-', LPAD(MONTH(so.created_at), 2, '0')) AS Month, 
  b.name as 'Branch',
  p.name as 'Product',
  COUNT(1) AS Qty,
  SUM(ss.price) As Amount
 FROM sales_order_services ss 
  LEFT JOIN products p ON p.id=ss.product_id 
  LEFT JOIN sales_order so ON ss.sales_order_id=so.id 
  LEFT JOIN branches b ON b.id=so.branch_id
 WHERE so.created_at BETWEEN '$Date1' AND '$Date2 23:59:59' AND so.status='PAID' AND ss.product_id IS NOT NULL
 GROUP BY Month, Branch, Product");
DBClose();

foreach($rs as $r){
 
 $mon[$r['Month']]['Amount'] += $r['Amount'];
 $mon[$r['Month']]['Qty'] += $r['Qty'];

 $prod[$r['Product']]['Amount'] += $r['Amount'];
 $prod[$r['Product']]['Qty'] += $r['Qty'];

 $br[$r['Branch']]['Amount'] += $r['Amount'];
 $br[$r['Branch']]['Qty'] += $r['Qty'];

 $r['Amount'] = number_format($r['Amount'],2);
 $r['Qty'] = number_format($r['Qty'],0);
 $Details .= "<tr>
  <td>$r[Month]</td>
  <td>$r[Branch]</td>
  <td>$r[Product]</td>
  <td>$r[Amount]</td>
  <td>$r[Qty]</td>
  </tr>";

}

foreach($prod as $type => $val){
 $val['Amount'] = number_format($val['Amount'],2);
 $val['Qty'] = number_format($val['Qty'],0);
 $ByProduct .= "<tr><td>$type</td><td>$val[Amount]</td><td>$val[Qty]</td></tr>";
}

foreach($br as $branch => $val){
 $val['Amount'] = number_format($val['Amount'],2);
 $val['Qty'] = number_format($val['Qty'],0);
 $ByBranch .= "<tr><td>$branch</td><td>$val[Amount]</td><td>$val[Qty]</td></tr>";
}

foreach($mon as $mo => $val){
 $val['Amount'] = number_format($val['Amount'],2);
 $val['Qty'] = number_format($val['Qty'],0);
 $ByMonth .= "<tr><td>$mo</td><td>$val[Amount]</td><td>$val[Qty]</td></tr>";
}

wrjs(json_encode([
 'Details' => $Details,
 'ByProduct' => $ByProduct,
 'ByBranch' => $ByBranch,
 'ByMonth' => $ByMonth,
]));
?>