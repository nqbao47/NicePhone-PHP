<p class="lietkedonhang">LIỆT KÊ ĐƠN HÀNG</p>

<?php
        $sql_lietke_donhang = "SELECT * FROM tbl_giohang, tbl_dangki 
                                WHERE TBL_GIOHANG.ID_KHACH=TBL_DANGKI.ID_DANGKI  
                                ORDER BY TBL_GIOHANG.ID_GIOHANG DESC";
        $query_lietke_donhang = mysqli_query($mysqli, $sql_lietke_donhang);
  ?>

<table border="1" width="100%" style="border-collapse: collapse;text-align:center">
    <tr>
        <th>ID</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
    </tr>

    <?php  
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_donhang)) {$i++;
    ?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['ma_giohang'] ?></td>
        <td><?php echo $row['ten_khach'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['sdt'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td>
            <?php if($row['trangthai_giohang'] == 1){
                echo '<a href="tongthe/qldonhang/xuly.php?code='.$row['ma_giohang'].'">  Đơn hàng mới </a>' ;
            } 
            else{
                echo 'Đã xử lí';
            }
            ?>
        </td>
        <td>
            <a href="index.php?action=kiemtra&query=kiemtradon&code=<?php echo $row['ma_giohang'] ?>">Kiểm tra đơn hàng</a>
        </td>
    </tr>

    <?php
        }
    ?>

</table>