function Xoa_Game(ma_game) {
    if(confirm('Bạn muốn xoá sản phẩm')){
        window.location="xoa.php?ma_game=" + ma_game
    }
}
function Sua_Game(ma_game) {
    if(confirm('Cập nhật sản phẩm')){
        window.location="sua.php?ma_game=" + ma_game
    }
}