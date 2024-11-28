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
  LEFT(sd.created_at,7) AS 'Month',
  br.name AS 'Branch',
  ds.name AS 'Discount',
  SUM(sd.amount) AS 'Amount',
  SUM(so.grand_total) AS 'Total',
  COUNT(1) AS 'Qty'
  FROM sales_discount sd 
  LEFT JOIN discounts ds ON sd.discount_id=ds.id
  LEFT JOIN sales_order so ON so.id=sd.sales_order_id
  LEFT JOIN branches br ON br.id=so.branch_id
  WHERE sd.created_at BETWEEN '$Date1' AND '$Date2'
  GROUP BY `Month`, Branch, Discount
  ORDER BY `Month`, Branch, Discount, Amount DESC
  $Limit");
DBClose();

$disc = [];
foreach($rs as $r){
 
 $mon[$r['Month']]['Amount'] += $r['Amount'];
 $mon[$r['Month']]['Total'] += $r['Total'];
 $mon[$r['Month']]['Qty'] += $r['Qty'];

 $disc[$r['Discount']]['Amount'] += $r['Amount'];
 $disc[$r['Discount']]['Total'] += $r['Total'];
 $disc[$r['Discount']]['Qty'] += $r['Qty'];

 $br[$r['Branch']]['Amount'] += $r['Amount'];
 $br[$r['Branch']]['Total'] += $r['Total'];
 $br[$r['Branch']]['Qty'] += $r['Qty'];

 $r['Amount'] = number_format($r['Amount'],2);
 $r['Total'] = number_format($r['Total'],2);
 $r['Qty'] = number_format($r['Qty'],0);
 $Details .= "<tr>
  <td>$r[Month]</td>
  <td>$r[Branch]</td>
  <td>$r[Discount]</td>
  <td>$r[Amount]</td>
  <td>$r[Total]</td>
  <td>$r[Qty]</td>
  </tr>";

}

foreach($disc as $type => $val){
 $val['Amount'] = number_format($val['Amount'],2);
 $val['Total'] = number_format($val['Total'],2);
 $val['Qty'] = number_format($val['Qty'],0);
 $ByDiscount .= "<tr><td>$type</td><td>$val[Amount]</td><td>$val[Total]</td><td>$val[Qty]</td></tr>";
}

foreach($br as $branch => $val){
 $val['Amount'] = number_format($val['Amount'],2);
 $val['Total'] = number_format($val['Total'],2);
 $val['Qty'] = number_format($val['Qty'],0);
 $ByBranch .= "<tr><td>$branch</td><td>$val[Amount]</td><td>$val[Total]</td><td>$val[Qty]</td></tr>";
}

foreach($mon as $mo => $val){
 $val['Amount'] = number_format($val['Amount'],2);
 $val['Total'] = number_format($val['Total'],2);
 $val['Qty'] = number_format($val['Qty'],0);
 $ByMonth .= "<tr><td>$mo</td><td>$val[Amount]</td><td>$val[Total]</td><td>$val[Qty]</td></tr>";
}

wrjs(json_encode([
 'IP' => $IP,
 'Details' => $Details,
 'ByDiscount' => $ByDiscount,
 'ByBranch' => $ByBranch,
 'ByMonth' => $ByMonth,
]));
?>