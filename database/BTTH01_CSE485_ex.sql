
-- dem so luong ban ghi trong cac bang
"SELECT COUNT(*) FROM users";
"SELECT COUNT(*) FROM theloai";
"SELECT COUNT(*) FROM tacgia";
"SELECT COUNT(*) FROM baiviet";
-- them ten the loai
"INSERT INTO theloai(ten_tloai) VALUES ( '$ten_tloai')"
-- dem cac bai hat thuoc the loai tru tinh

-- liet ke baibiet cua tac gia “Nhacvietplus”

-- Liệt kê các thể loại nhạc chưa có bài viết nào

--Tìm thể loại có số bài viết nhiều nhất
"SELECT theloai.ten_tloai, COUNT(baiviet.ma_bviet) AS 'So_bai_viet' FROM theloai INNER JOIN 
baiviet ON theloai.ma_tloai = baiviet.ma_tloai GROUP BY theloai.ten_tloai ORDER BY COUNT(baiviet.ma_bviet) DESC LIMIT 1"
-- Liệt kê 2 tác giả có số bài viết nhiều nhất 
"SELECT tacgia.ten_tgia, COUNT(baiviet.ma_bviet) AS 'So_bai_viet' 
FROM tacgia INNER JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia GROUP BY tacgia.ten_tgia ORDER BY COUNT(baiviet.ma_bviet) DESC LIMIT 2"
--Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”,“em"
"SELECT baiviet.ma_bviet, baiviet.ten_bhat, baiviet.ten_tgia, baiviet.ngayviet, baiviet.hinhanh, 
baiviet.tomtat, baiviet.noidung, baiviet.ma_tloai FROM baiviet WHERE baiviet.ten_bhat LIKE '%yêu%' OR baiviet.ten_bhat LIKE '%thương%' OR baiviet.ten_bhat LIKE '%anh%' OR baiviet.ten_bhat LIKE '%em%'"

--Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả
"CREATE VIEW vw_Music AS SELECT baiviet.ma_bviet, baiviet.ten_bhat, baiviet.ten_tgia, baiviet.ngayviet, baiviet.hinhanh, baiviet.tomtat, baiviet.noidung, baiviet.ma_tloai, theloai.ten_tloai, tacgia.ten_tgia FROM baiviet INNER JOIN 
theloai ON baiviet.ma_tloai = theloai.ma_tloai INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia"
