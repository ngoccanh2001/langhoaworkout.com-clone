-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 10:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BillID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `TotalPrice` float NOT NULL,
  `Status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chờ xác nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`BillID`, `CustomerID`, `SellerID`, `Date`, `TotalPrice`, `Status`) VALUES
(3, 1, 2, '2021-05-21', 1150000, '1'),
(4, 1, 2, '2021-05-21', 200000, '1'),
(5, 2, 2, '2021-05-21', 900000, '1'),
(6, 1, 2, '2021-05-21', 689000, '1'),
(7, 1, 2, '2021-05-21', 920000, '1'),
(8, 1, 2, '2021-05-21', 150000, 'Đã hoàn tất'),
(9, 3, 2, '2021-05-21', 400000, 'Đã hoàn tất'),
(10, 3, 2, '2021-05-21', 200000, 'Đã hoàn tất'),
(11, 3, 2, '2021-05-21', 1000000, 'Đang giao hàng'),
(12, 3, 2, '2021-05-21', 200000, 'Đang giao hàng'),
(13, 3, 2, '2021-05-21', 150000, 'Đang giao hàng'),
(14, 3, 2, '2021-05-21', 200000, 'Đã xác nhận'),
(15, 3, 2, '2021-05-21', 150000, 'Đã xác nhận'),
(16, 3, 2, '2021-05-21', 400000, 'Đã xác nhận'),
(17, 3, 2, '2021-05-21', 1000000, 'Đã xác nhận'),
(18, 3, 2, '2021-05-21', 389000, 'Chờ xác nhận'),
(19, 1, 2, '2021-05-21', 1730000, 'Đã xác nhận'),
(20, 1, 2, '2021-05-21', 589000, 'Đã xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `billdetail`
--

CREATE TABLE `billdetail` (
  `BillID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `billdetail`
--

INSERT INTO `billdetail` (`BillID`, `ProductID`, `Quantity`, `Price`) VALUES
(3, 917000070, 1, 150000),
(3, 917000084, 5, 200000),
(4, 917000069, 1, 200000),
(5, 917000088, 3, 300000),
(6, 917000070, 2, 150000),
(6, 917000080, 1, 200000),
(6, 917000082, 1, 189000),
(7, 917000065, 4, 130000),
(7, 917000069, 2, 200000),
(7, 917000080, 6, 200000),
(8, 917000074, 1, 150000),
(9, 917000066, 1, 200000),
(9, 917000069, 1, 200000),
(10, 917000062, 1, 200000),
(11, 917000062, 5, 200000),
(12, 917000062, 1, 200000),
(13, 917000070, 1, 150000),
(14, 917000090, 1, 200000),
(15, 917000074, 1, 150000),
(16, 917000066, 2, 200000),
(17, 917000062, 5, 200000),
(18, 917000081, 1, 389000),
(19, 917000065, 1, 130000),
(19, 917000069, 1, 200000),
(19, 917000074, 1, 150000),
(19, 917000086, 1, 250000),
(19, 917000089, 1, 1000000),
(20, 917000080, 1, 200000),
(20, 917000081, 1, 389000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LockCustomer` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Username`, `Password`, `LastName`, `FirstName`, `Address`, `Email`, `LockCustomer`) VALUES
(1, 'canh1', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyễn Ngọc ', 'Cảnh', 'HCM', 'canh@gmail.com', 0),
(2, 'duy2', 'c81e728d9d4c2f636f067f89cc14862c', 'Bùi Nguyễn Khánh', 'Duy', 'HA NOI', 'duy@gmail.com', 1),
(3, 'huy3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Lưu Trần Quang', 'Huy', 'QUAN BINH THANH', 'huy@gmail.com', 0),
(4, 'tham4', 'a87ff679a2f3e71d9181a67b7542122c', 'Nguyễn Thị', 'Thắm', 'BINIH CHANH', 'tham@gmail.com', 0),
(5, 'huyen5', '5c4ca4238a0b923820dcc509a6f75849b', 'Lê Thị', 'Huyền', 'HA TINH', 'huyen@gmail.com', 1),
(6, 'quang6', '1679091c5a880faf6fb5e6087eb1b2dc', 'Nguyễn Minh', 'Quang', 'HCM', 'quang@gmail.com', 1),
(14, 'canh', '896bbde88ad9e63559e115ef45f48416', 'Nguyễn Minh Ngọc Khang', 'Sinh', 'hcm', 'thienbinhsw123@gmail.com', 0),
(15, 'thu8', 'c9f0f895fb98ab9159f51fd0297e236d', 'Thư', 'Lê', 'Nhà Bè, Hồ Chí Minh', 'thu@gmail.com', 1),
(23, 'duy123', 'e10adc3949ba59abbe56e057f20f883e', 'KhÃ¡nh', 'Duy', '5 ADV', 'nc@gmail.com', 0),
(28, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 'a', 'canh@gmail.com', 1),
(29, 'aa', '0cc175b9c0f1b6a831c399e269772661', 'Nguyễn ', 'Cảnh', 'a', 'canh@gmail.com', 0),
(30, 'aaa', '0cc175b9c0f1b6a831c399e269772661', 'Nguyen', 'Canh', 'a', 'canh@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `DiscountID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DateStart` date NOT NULL,
  `DateEnd` date NOT NULL,
  `Discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`DiscountID`, `Name`, `DateStart`, `DateEnd`, `Discount`) VALUES
(1, 'Ngày Quốc Khánh', '2021-09-01', '2021-09-02', 20),
(2, 'Ngày giải phóng-quốc tế lao động', '0000-00-00', '2021-05-03', 30),
(3, 'Ngày Quốc tế thiếu nhi', '2021-06-01', '2021-06-02', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product-ID` int(11) NOT NULL,
  `Picture` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `TypeID` int(11) NOT NULL,
  `Description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `LockProduct` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product-ID`, `Picture`, `Name`, `Quantity`, `Price`, `TypeID`, `Description`, `LockProduct`) VALUES
(917000062, './img/anh.aotanktop.jpg', 'Áo Tanktop', 35, 200000, 2, 'Áo Ba lỗ – Be Your Pride\r\nĐau đớn là tạm thời.\r\nNiềm tự hào là mãi mãi!\r\nNếu bạn chưa có điều gì để tự hào, hãy tự biến mình thành điều tự hào đó!', 0),
(917000065, './img/anh.aobody.jpg', 'Áo body fit', 29, 130000, 2, 'Bộ sưu tập những chiếc áo SML Body Fit có 02 màu sắc để bạn lựa chọn  Dưới đây là màu Gạch và màu Xám lông chuột là tone màu rất dễ mặc.  Size M: Dành cho các bạn có bắp tay dưới 34cm. Nặng từ 50kg – 65 kg  Size L: Dành cho các bạn có bắp tay dưới 37cm. Nặng từ 65kg – 78kg', 0),
(917000066, './img/anh.ngucocgym.jpg', 'Bột ngũ cốc', 41, 200000, 3, 'Bột ngũ cốc tập gym loại 1 cho người tập thể hình, có thêm thành phần óc chó tăng cường omega 3 cho người tập gym  Bột ngũ cốc tập gym được làm từ các loại hạt ngũ cốc dinh dưỡng như :  Đậu tương là thành phần quan trọng trong bột ngũ cốc tập gym  Đậu đen,Đậu xanh,Đậu đỏ.  Bổ sung yến mạch vào bột ngũ cốc tập gym  Quả óc chó bổ sung omega 3 trong thành phần bột ngũ cốc tập Gym', 0),
(917000068, './img/anh.suahanhnhan.jpg', 'Sữa hạnh nhân', 230, 150000, 3, 'Sữa hạnh nhân Pacific Foods được bộ Nông nghiệp Hoa Kỳ (USDA) chứng nhận là sản phẩm hữu cơ.\r\n\r\nPhù hợp với những người ăn kiêng, ăn chay trường.', 0),
(917000069, './img/anh.bonggai.jpg', 'Bóng gai', 29, 200000, 1, 'Giới thiệu: Bóng Tập Yoga Gai 65cm + Tặng Bơm Bóng, Kim Bơm Dự Phòng Có 4 màu : Xanh dương, Đỏ, Tím, Ghi Tặng kèm : 1 Bơm bóng + 1 Kim bơm + 1 Gảy bóng. Trọng lượng: 1000g ( Trọng lượng tiêu chuẩn - quý khách lưu ý kho chọn loại bóng gai 65cm ) Chất liệu: Cao su tự nhiên.', 0),
(917000070, './img/anh.aogoku1.png', 'Áo goku', 15, 150000, 2, 'Áo goku phiên bản đặc biệt!  Sản phẩm này không còn gì để nói, chỉ có 1 từ CHẤT  Vải áo tốt, mát, chống phai màu  Tình trạng sản phẩm: Còn hàng và đang trên đà CHÁY HÀNG', 0),
(917000074, './img/anh.3-day-chung.png', 'PowerPand', 44, 150000, 1, 'BUỒN BỰC, CHÁN NẢN, MUỐN BỎ TẬP VÌ CÁC BÀI HÀNH QUÁ KHÓ???  Anh em đừng lo, hãy sắm ngay DÂY TRỢ LỰC giúp các bài hành đỡ vất vả.  Chiều rộng 13mm - Độ dày 4.5mm - Kháng lực 7-14 kg', 0),
(917000080, './img/anh.conlan.jpg', 'Con lăn tập bụng', 49, 200000, 1, 'Con lăn tập cơ bụng 4 bánh chính hãng Amalife – Sản phẩm đã được TIKI kiểm duyệt. Sản phẩm đi kèm Đệm Lót – giúp tập luyện hiệu quả, mọi lúc, mọi nơi. Con Lăn Tập Cơ Bụng được thiết kế đơn giản, nhỏ gọn, hiện đại, hiệu quả cao và cực tiện lợi Thiết kế dạng 4 chân chắc chắn,giữ thăng bằng ổn định khi tập. Tập cơ bụng,cơ vai,cơ tay...giảm béo hiệu quả. Con Lăn Tập Cơ Bụng phù hợp với mọi lứa tuổi. Bánh xe Con lăn được phủ nhám chống trơn trượt. Sử dụng sản phẩm chính hãng để tránh bị hàng giả hàng nhái – kém chất lượng.', 0),
(917000081, './img/anh.paraletjpg.png', 'Paralletes', 99, 389000, 1, 'Dụng cụ hỗ trợ trong các động tác thể dục như :  Hít đất ( Push-up )  Trồng chuối ( Hand-stand )  Planche  L-sit / V-sit  Nhằm giúp cơ cảm nhận tốt hơn, tăng biên độ tập luyện . Tạo cảm giác chắc chắn và an toàn trong tập luyện  Và còn nhiều công dụng đi kèm GIÚP CHO BẠN ĐẠT ĐƯỢC MONG MUỐN TRONG TẬP LUYỆN NHANH VÀ AN TOÀN. ', 0),
(917000082, './img/anh.bangquan.png', 'Băng quấn cổ tay', 50, 189000, 1, 'BĂNG QUẤN CỔ TAY – TĂNG THÊM SỨC MẠNH  Sức mạnh của bạn liệu có bị phong ấn do quá ĐAU CỔ TAY??? Hãy giải phóng sức mạnh thật sự của bạn bằng sản phẩm này !!!  Nếu bạn muốn cổ tay không “phế” dài hạn do chấn thương thì đây là sản phẩm đáng chú ý , bảo vệ bạn xuyên suốt trong quá trình tập luyện.  Vừa ngầu lòi mà vừa giảm được chấn thương cho cổ tay khi tập những động tác khó!!!', 0),
(917000083, './img/anh.daydo.png', 'Dây nhảy', 100, 100000, 1, 'Dây Nhảy 50 Sắc Thái (2m6) là sản phẩm cao cấp được sử dụng đặc thù trong các môn thể thao:  Muay, Boxing, Kick Boxing, Street Workout,….  Thích hợp cho các đối tượng vận động viên sử dụng trong tập luyện, rèn luyện phát triển các tố chất  Chiều dài dây 2m6. Đường kính 12mm.  Chất liệu dây cao cấp.  Sử dụng lâu dài.', 0),
(917000084, './img/anh.quanhighpank.jpg', 'Quần double high pant', 74, 200000, 2, 'QUẦN HACK CHIỀU CAO  Sản phẩm này không còn gì để nói, chỉ có 1 từ CHẤT  Vải áo tốt, mát, chống phai màu  CHỈ CẦN CMT SỐ ĐO CHIỀU CAO VÀ CÂN NẶNG VÀO HỘP THƯ THOẠI. ANH EM SẼ ĐƯỢC TƯ VẤN SIZE QUẦN LIỀN NHÉ ', 0),
(917000086, './img/anh.quanmoi.jfif', 'Quần Chapion', 79, 250000, 2, 'Nếu bạn không biết chọn SIZE, hãy cho Lép biết cân nặng và chiều cao lúc đặt hàng để được tư vấn size phù hợp.  Dành cho các bạn có chiều cao dưới 173cm và cân nặng dưới 67kg', 0),
(917000087, './img/anh.ao3lo.jpg', 'Áo thun ba lỗ', 75, 80000, 2, 'Shop tự chọn tay chọn chất liệu thun cao cấp, kiểm tra từng đường may sợi chỉ nhằm mang đến Khách Hàng sản phẩm chất lượng. Áo thun ba lỗ nam trẻ trung, thoáng mát, thấm hút mồ hôi, có thiết kế kiểu cơ bản với dáng ôm vừa phải. Có nhiều màu sắc trẻ trung, dễ dàng phối cùng quần jeans, quần thể thao cùng những đôi giày thời trang Phù hợp đi chơi, tập thể dục hay mặc nhà Chất liệu cotton cao cấp', 0),
(917000088, './img/anh.yenmach1.jpg', 'Yến mạch Úc', 50, 300000, 3, 'Yến mạch hữu cơ – lại giàu dinh dưỡng', 0),
(917000089, './img/anh.whey.jpg', 'Whey protein banana', 49, 1000000, 3, 'Whey protein Banana là một thế hệ hoàn toàn mới của công thức protein dành cho tất cả các vận động viên  Người mới bắt đầu hoặc nâng cao và cho những người hoạt động nhiều.', 0),
(917000090, './img/anh.mass.jpg', 'Serious mass', 49, 200000, 3, 'Whey protein Banana là một thế hệ hoàn toàn mới của công thức protein dành cho tất cả các vận động viên  Người mới bắt đầu hoặc nâng cao và cho những người hoạt động nhiều.', 0),
(917000091, './img/anh.suahatde.jpg', 'Sữa hạt dẻ', 70, 140000, 3, 'Sữa hạt dẻ Pacific Foods được bộ Nông nghiệp Hoa Kỳ (USDA) chứng nhận là sản phẩm hữu cơ  Phù hợp với những người ăn kiêng, ăn chay trường.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `TypeID` int(11) NOT NULL,
  `NameType` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`TypeID`, `NameType`) VALUES
(1, 'Dụng cụ tập luyện'),
(2, 'Quần áo tập luyện'),
(3, 'Sản phẩm dinh dưỡng');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `SellerID` int(11) NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`SellerID`, `Username`, `Password`, `LastName`, `FirstName`, `PhoneNumber`, `Email`) VALUES
(1, 'ngoccanh1', '1', 'Nguyễn Ngọc', 'Cảnh', 351251268, 'nc@gmail.com'),
(2, 'khanhduy2', '2', 'Bùi Nguyễn Khánh', 'Duy', 361251268, 'kd@gmail.com'),
(3, 'quanghuy3', '3', 'Lưu Trần Quang', 'Huy', 371251268, 'qh@gmail.com'),
(4, 'admin4', '4', 'Nguyễn Ngọc', 'Nam', 381251268, 'ad@gmail.com'),
(5, 'lethu5', '5', 'Lê Thị', 'Thu', 381251268, 'lt@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `SellerID` (`SellerID`);

--
-- Indexes for table `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`BillID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`DiscountID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product-ID`),
  ADD KEY `TypeID` (`TypeID`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`SellerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `BillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `DiscountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product-ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=917000095;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `SellerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`SellerID`) REFERENCES `seller` (`SellerID`),
  ADD CONSTRAINT `bill_ibfk_3` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `billdetail`
--
ALTER TABLE `billdetail`
  ADD CONSTRAINT `billdetail_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`Product-ID`),
  ADD CONSTRAINT `billdetail_ibfk_2` FOREIGN KEY (`BillID`) REFERENCES `bill` (`BillID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `producttype` (`TypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
