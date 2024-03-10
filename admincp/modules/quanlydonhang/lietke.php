<p>Liệt kê đơn hàng</p>
<?php
$sql_lietke_dh = "SELECT *
FROM tbl_cart
INNER JOIN tbl_dangky ON tbl_cart.id_khachhang = tbl_dangky.id_dangky
INNER JOIN tbl_shipping ON tbl_cart.cart_shipping = tbl_shipping.id_shipping
WHERE tbl_dangky.id_dangky = tbl_shipping.id_dangky
ORDER BY tbl_cart.id_cart DESC;
";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Note</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
    <th>Ngày đặt</th>
    <th>Quản lý</th>
    <th>In</th>

  </tr>
  <?php

  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_dh)) {
    $i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['code_cart'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><?php echo $row['note'] ?></td>
      <td><?php echo $row['dienthoai'] ?></td>
      <td>
        <?php if ($row['cart_status'] == 1) {
          echo '<a href="modules/quanlydonhang/xuly.php?code=' . $row['code_cart'] . '">Đơn hàng mới</a>';
        } else {
          echo 'Đã duyệt';
        }
        ?>
      </td>
      <td><?php echo $row['cart_date'] ?></td>
      <td>
        <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
      </td>
      <td>
        <a href="modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_cart'] ?>">In Đơn hàng</a>
      </td>

    </tr>
  <?php
  }
  ?>

</table>