
<p>GIỎ HÀNG CỦA BẠN</p>
<?php
  if(isset($_SESSION['dangki'])){
    echo 'Bạn đã đăng nhập với tài khoản có tên: '.'<span style="color:green; font-weight:bold; font-size:20px">'.$_SESSION['dangki'].'</span>' ;

  }
?>
<?php 
    if(isset($_SESSION['giohang'])){
    }
?>
<table  style="width: 100% ; text-align:center; border-collapse: collapse;table-layout: fixed " border="1">
  <tr>
    <th>ID</th>
    <th>Hình ảnh</th>
    <th>Tên sản phẩm</th>
    <th>Mã sản phẩm</th>
    <th>Giá sản phẩm</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    <th>Hành động</th>
  </tr>
  <?php
    if (isset($_SESSION['giohang'])) {
        $i = 0;
        $tongtien = 0;
        foreach ($_SESSION['giohang'] as $giohang_item) {
            $thanhtien = $giohang_item['soluong']*$giohang_item['gia_sanpham'];
            $tongtien += $thanhtien;
            $i++; ?>
          <tr>
              <td><?php echo $i; ?></td>
              <td><img  src="admin/tongthe/sanpham/uploads/<?php echo $giohang_item['hinhanh'] ?>" width="100px"> </td>
              <td><?php echo $giohang_item['ten_sanpham']; ?></td>
              <td><?php echo $giohang_item['ma_sanpham']; ?></td>
              <td><?php echo number_format($giohang_item['gia_sanpham'], 0, ',', '.').' VND'; ?></td>
              
              <td>
                <a href="home/main/themgiohang.php?themsl=<?php echo $giohang_item['id'] ?>"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                <?php echo $giohang_item['soluong']; ?>
                <a href="home/main/themgiohang.php?botsl=<?php echo $giohang_item['id'] ?>"><i class="fa fa-minus" aria-hidden="true"></i> </a>
              </td>
              <td><?php echo number_format($thanhtien, 0, ',', '.').' VND'; ?></td>
              <td><a href="home/main/themgiohang.php?xoa=<?php echo $giohang_item['id'] ?>">Xoá sản phẩm</a></td>
            </tr>
            <?php
        }
        ?>
    <tr>
      <td colspan="8">
        <p class="tongtien" style="float:left ;">Tổng tiền <a style="color:red;font-weight: bold;font-size: 17px"><?php  echo number_format($tongtien , 0, ',', '.').' VND'; ?> </a></p>
        <div style="clear:bold;"></div>
              <?php 
                if(isset($_SESSION['dangki'])){
              ?>
                <p><a href="home/main/thanhtoan.php">Đặt hàng</a></p>
              <?php 
              }
              else{
              ?>
                <p><a class="dathang" href="index.php?quanly=dangki">Đặt hàng</a></p>
              <?php
                } 
              ?>
        <p style="float:right ;"><a class="xoaall" href="home/main/themgiohang.php?xoatatca=1">Xoá tất cả sản  phẩm </a></p>
        
        </td>
      </tr>
        <?php 
        }
        else{ ?>
        <tr>
    <td colspan="8"><p>Giỏ hàng trống</p></td>
  </tr>
    <?php } ?>
</table>