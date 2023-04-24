<p  class="kiemtradonhang">KIỂM TRA ĐƠN HÀNG</p>

<?php
        $code = $_GET['code'];
        $sql_lietke_donhang = "SELECT * FROM tbl_chitietgiohang, tbl_sanpham 
                                WHERE tbl_chitietgiohang.id_sanpham=tbl_sanpham.id_sanpham 
                                AND tbl_chitietgiohang.ma_don='".$code."'
                                ORDER BY tbl_chitietgiohang.id_chitietgiohang DESC";

        $query_lietke_donhang = mysqli_query($mysqli, $sql_lietke_donhang);
  ?>

<table width="100%" style="border-collapse: collapse;text-align:center" border="1">
    <tr>
        <th>ID</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>ĐƠn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>

    </tr>

    <?php  
        $i = 0;
        $tongtien = 0;
        while($row = mysqli_fetch_array($query_lietke_donhang)) {$i++;
            $thanhtien = $row['soluongspmua']*$row['gia_sanpham'];
            $tongtien += $thanhtien; 
    ?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['ma_don'] ?></td>
        <td><?php echo $row['ten_sanpham'] ?></td>
        <td><?php echo number_format($row['gia_sanpham'],0,',','.').' VND' ?></td>
        <td><?php echo $row['soluongspmua'] ?></td>
        <td><?php echo number_format($thanhtien,0,',','.').' VND' ?></td>

    </tr>

    <?php
        }
    ?>

    <tr> 
    <td colspan ="6">
            <p>TỔNG:   <a style="color:green;font-weight:bold"><?php  echo number_format($tongtien,0,',','.').' VND' ?> </a></p>

        </td>
    </tr>
</table>