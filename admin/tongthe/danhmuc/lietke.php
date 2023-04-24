<p class="lietkedanhmuc">-- TẤT CẢ DANH MỤC --</p>

<?php
  $sql_lietke_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY sothutu DESC";
  $query_lietke_danhmuc = mysqli_query($mysqli, $sql_lietke_danhmuc);
  ?>

<table border="1" width="100%"  style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Hành động</th>
        <th>Thứ tự</th>
    </tr>
    <?php  
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_danhmuc)) {
            $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['ten_danhmuc'] ?></td>
        <td>
            <a href="tongthe/danhmuc/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xoá</a>|
            <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>" >Sửa</a>  
            
        </td>
        <td><?php echo $row['sothutu']  ?></td>
    </tr>
    <?php
        }
    ?>

</table>