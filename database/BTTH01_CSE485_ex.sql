
-- dem so luong ban ghi trong cac bang
SELECT COUNT(*) FROM users;
SELECT COUNT(*) FROM theloai;
SELECT COUNT(*) FROM tacgia;
SELECT COUNT(*) FROM baiviet;
-- them ten the loai
INSERT INTO theloai(ten_tloai) VALUES ( '$ten_tloai')
-- a,dem cac bai hat thuoc the loai tru tinh

-- b,liet ke baibiet cua tac gia “Nhacvietplus"
SELECT baiviet.ma_bviet, baiviet.ten_bhat, baiviet.ngayviet, baiviet.hinhanh, baiviet.ma_tloai, baiviet.ma_tgia, baiviet.tieude, baiviet.tomtat, baiviet.noidung, tacgia.ten_tgia, theloai.ten_tloai FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE tacgia.ten_tgia = 'Nhacvietplus'
-- c,Liệt kê các thể loại nhạc chưa có bài viết nào
SELECT theloai.ten_tloai FROM theloai LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai WHERE baiviet.ma_tloai IS NULL
-- d,Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết. 
SELECT baiviet.ma_bviet, baiviet.ten_bhat,tacgia.ten_tgia,  baiviet.tieude, baiviet.tomtat,  theloai.ten_tloai, baiviet.ngayviet FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
--e,Tìm thể loại có số bài viết nhiều nhất
SELECT theloai.ten_tloai, COUNT(baiviet.ma_bviet) AS 'So_bai_viet' FROM theloai INNER JOIN 
baiviet ON theloai.ma_tloai = baiviet.ma_tloai GROUP BY theloai.ten_tloai ORDER BY COUNT(baiviet.ma_bviet) DESC LIMIT 1
-- f,Liệt kê 2 tác giả có số bài viết nhiều nhất 
SELECT tacgia.ten_tgia, COUNT(baiviet.ma_bviet) AS 'So_bai_viet' 
FROM tacgia INNER JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia GROUP BY tacgia.ten_tgia ORDER BY COUNT(baiviet.ma_bviet) DESC LIMIT 2
--g,Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”,“em
SELECT baiviet.ma_bviet, baiviet.ten_bhat, tacgia.ten_tgia, baiviet.ngayviet, baiviet.hinhanh, baiviet.tomtat, baiviet.noidung, baiviet.ma_tloai FROM baiviet,tacgia WHERE baiviet.ten_bhat LIKE '%yêu%' OR baiviet.ten_bhat LIKE '%thương%' OR baiviet.ten_bhat LIKE '%anh%' OR baiviet.ten_bhat LIKE '%em%';
--i,Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả
CREATE VIEW vw_Music AS SELECT baiviet.ma_bviet, baiviet.ten_bhat, baiviet.ten_tgia, baiviet.ngayviet, baiviet.hinhanh, baiviet.tomtat, baiviet.noidung, baiviet.ma_tloai, theloai.ten_tloai, tacgia.ten_tgia FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;
-- j,Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi

-- k,Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo. 

-- Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web.
CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
`level` int(1) DEFAULT '0';
)                  