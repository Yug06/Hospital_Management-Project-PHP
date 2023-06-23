-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 12:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `pass`) VALUES
(1001, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_payment`
--

CREATE TABLE `razorpay_payment` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `invoiceid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `razorpay_payment`
--

INSERT INTO `razorpay_payment` (`id`, `payment_id`, `invoiceid`, `patientid`, `date`) VALUES
(8, 'pay_LvLj4T4gg8vFZA', 2000004, 20230004, '2023-05-29 04:38:50'),
(9, 'pay_LvZKUHUUgn22LK', 202, 20230005, '2023-05-29 17:57:12'),
(10, 'pay_LzhxGMyyvse20j', 201, 20230001, '2023-06-09 04:59:28'),
(11, 'pay_LzjjRsKpmoFpYK', 201, 20230001, '2023-06-09 06:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `apid` int(11) NOT NULL,
  `doctorid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentTime` time NOT NULL,
  `fees` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`apid`, `doctorid`, `patientid`, `appointmentDate`, `appointmentTime`, `fees`, `status`) VALUES
(23004, 6003, 20230001, '2023-05-01', '15:30:00', 500, 1),
(23006, 6002, 20230001, '2023-05-02', '09:30:00', 500, 0),
(23007, 6002, 20230003, '2023-05-16', '09:30:00', 500, 1),
(23008, 6001, 20230005, '2023-05-20', '09:45:00', 500, 1),
(23009, 6003, 20230004, '2023-05-30', '09:30:00', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bed`
--

CREATE TABLE `tbl_bed` (
  `bedid` int(11) NOT NULL,
  `bednumber` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bed`
--

INSERT INTO `tbl_bed` (`bedid`, `bednumber`, `roomid`, `status`) VALUES
(1, 1, 101, 0),
(2, 2, 101, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bed_allocation`
--

CREATE TABLE `tbl_bed_allocation` (
  `bdid` int(11) NOT NULL,
  `bedid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `allotmentTime` varchar(100) NOT NULL,
  `dischargementTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bed_allocation`
--

INSERT INTO `tbl_bed_allocation` (`bdid`, `bedid`, `patientid`, `allotmentTime`, `dischargementTime`) VALUES
(5, 2, 20230001, '2023-05-15 23:28:37', '2023-05-15 23:31:07'),
(7, 1, 20230001, '2023-06-09 12:12:31', '2023-06-09 13:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(158, 'Kameko Andrews', 'ruka@mailinator.com', 'Do quia Nam hic veli', 'Et iure commodi volu', '2023-05-28 06:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `departmentid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `heading` varchar(5000) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`departmentid`, `name`, `heading`, `picture`, `description`) VALUES
(1, 'Ent', 'The ENT department provides comprehensive care for ear, nose, and throat conditions.', 'ent.jpg', '<p>The ENT department at our hospital provides comprehensive care for patients with ear, nose and throat disorders. Our team of experts includes board-certified otolaryngologists, audiologists, speech therapists and nurses. We offer a range of services, such as diagnosis and treatment of hearing loss, sinusitis, allergies, voice disorders, sleep apnea and head and neck cancers. We also perform advanced surgical procedures, such as cochlear implants, endoscopic sinus surgery and thyroidectomy. Our goal is to improve the quality of life of our patients by delivering personalized and compassionate care.\n</p>'),
(2, 'Orthopedics', 'Experience exceptional orthopedic care, tailored to your needs, for improved mobility and a better quality of life.', 'download.jpeg', '<p>At our Orthopedics Department, we prioritize your musculoskeletal health and well-being. Our team of experienced orthopedic specialists is dedicated to delivering personalized care and advanced treatments for a wide range of bone and joint conditions. Whether you&#39;re seeking relief from joint pain, recovering from an injury, or exploring options for joint replacement surgery, our compassionate experts are here to guide you every step of the way. Using the latest technologies and evidence-based practices, we strive to restore your mobility, reduce pain, and enhance your overall quality of life. Trust us to provide comprehensive orthopedic care, tailored to your unique needs, so you can get back to doing what you love with confidence.</p>'),
(3, 'Dermatology', 'Unveil your best skin with expert care from our Dermatology Department, offering personalized treatments for all your skin needs.', 'Dermatologynew.png', '<p>Our Dermatology Department is dedicated to helping you achieve and maintain healthy, radiant skin. Our team of expert dermatologists offers a wide range of personalized treatments and solutions for various skin conditions and concerns. Whether you are seeking treatment for acne, skin allergies, eczema, or looking to enhance your skin&#39;s appearance through cosmetic procedures, we are here to provide you with comprehensive care. Using the latest advancements in dermatology, we combine medical expertise with a patient-centered approach to address your unique skincare needs. From diagnosis to treatment and ongoing maintenance, we strive to deliver exceptional care and support, empowering you to feel confident and comfortable in your own skin.</p>'),
(4, 'Neurologist', 'Experience exceptional neurological care for a healthier brain and improved well-being at our Neurology Department.', 'Neurology-1.jpg', '<p>At our Neurology Department, we are committed to providing exceptional care for patients with neurological conditions. Our team of highly skilled neurologists specializes in diagnosing and treating a wide range of neurological disorders, including but not limited to stroke, epilepsy, multiple sclerosis, Parkinson&#39;s disease, and migraines. Using state-of-the-art technology and advanced treatment approaches, we aim to optimize brain health and enhance the overall well-being of our patients. With a patient-centered approach, we offer personalized treatment plans tailored to each individual&#39;s needs, focusing on symptom management, disease progression, and improving quality of life. Trust our dedicated team to provide compassionate care, expert guidance, and the latest advancements in neurology to help you navigate your neurological journey with confidence.</p>'),
(5, 'Gynecology', 'Empowering Optimal Wellness: Experience Exceptional Care at our Gynecology Department.', '2021-03-01.png', '<p>Our Gynecology Department is dedicated to empowering women by providing comprehensive and compassionate care for their reproductive health and well-being. Our team of experienced gynecologists offers a wide range of services, including routine check-ups, preventive screenings, family planning, fertility evaluations, and the diagnosis and treatment of gynecological conditions. We understand that each woman&#39;s journey is unique, and we strive to create a comfortable and supportive environment for every patient. With a focus on personalized care, we aim to educate and empower women to make informed decisions about their health.</p>'),
(6, 'Dental Care', 'Experience exceptional oral care and achieve a healthy, confident smile at our Dentistry Department.', 'types-of-dental-procedures-1080x675.jpeg', '<p>Our Dentistry Department is committed to providing comprehensive oral care for patients of all ages. From routine check-ups and cleanings to advanced treatments and cosmetic dentistry, our skilled dental professionals are dedicated to helping you achieve and maintain a healthy, beautiful smile. With a focus on patient comfort and state-of-the-art techniques, we offer a wide range of services, including preventive care, restorative procedures, orthodontics, and oral surgery. Our team takes pride in delivering personalized treatment plans tailored to your unique needs, ensuring optimal oral health and enhancing your overall well-being. Trust us to provide compassionate care, utilizing the latest advancements in dental technology, and to guide you towards a lifetime of excellent dental health.</p>'),
(8, 'Radiology', 'Welcome to our Radiology Department, where cutting-edge imaging technology meets expert diagnostics for precise healthcare.', 'download (1).jpeg', '<p>At our Radiology Department, we utilize advanced imaging technology to provide accurate and detailed diagnostic services. Our team of skilled radiologists and technicians are dedicated to delivering precise and comprehensive imaging interpretations, assisting in the diagnosis and treatment of various medical conditions. From X-rays and ultrasound to CT scans and MRI, we offer a wide range of imaging modalities to cater to diverse healthcare needs. With a commitment to patient care and safety, we strive to provide timely and accurate results, working collaboratively with other medical specialties to ensure seamless and effective patient management.</p>'),
(9, 'Psychiatry', 'Nurturing Mental Wellness: Discover Compassionate Care at our Psychiatry Department.', 'Psychiatry-Careers.jpg', '<p>Our Psychiatry Department is dedicated to providing compassionate care and support for individuals facing mental health challenges. Our team of experienced psychiatrists and mental health professionals offer comprehensive evaluations, personalized treatment plans, and therapeutic interventions to help individuals achieve emotional well-being and improve their quality of life. With a patient-centered approach, we address a wide range of mental health conditions, including anxiety disorders, depression, bipolar disorder, and schizophrenia, among others. We strive to create a safe and nurturing environment where patients can openly discuss their concerns, receive evidence-based treatments, and develop effective coping strategies.</p>'),
(10, 'Pediatrics', 'Providing Compassionate Care for Little Ones: Welcome to our Pediatrics Department.', 'shutterstock_371374753-scaled.jpg', '<p>&quot;Our Pediatrics Department is committed to providing compassionate and specialized care for infants, children, and adolescents. Our team of skilled pediatricians and healthcare professionals understands the unique needs of young patients and is dedicated to their overall health and well-being. From routine check-ups and vaccinations to managing acute and chronic illnesses, we offer a comprehensive range of services to support the growth and development of children. With a child-friendly environment and a gentle approach, we strive to create a comfortable and nurturing space for both patients and their families.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctorid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `departmentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctorid`, `name`, `lname`, `email`, `password`, `address`, `phone`, `picture`, `degree`, `departmentid`) VALUES
(6001, 'Jay', 'Shetty', 'jay@gmail.com', '07f230b8a9353e497fc738e1799343a449abf5b9', 'baroda gujarat', '1234567890', 'photo-1612349317150-e413f6a5b16d.jpeg', 'BDS', 2),
(6002, 'John', 'Doe', 'doe@gmail.com', '8b7f6d7358baeb10399a6f32f21e911e1f74fca6', 'Baroda', '4567891230', '1207971.jpg', 'MBBS', 4),
(6003, 'Walter', 'White', 'white@gmail.com', '47bbba5aaea1a7d726344115edb51a5a3bb447d6', 'mexico', '6549871230', 'thumb-1920-321927.jpg', 'MBBS', 5),
(6005, 'Mihir', 'Bhandari', 'mihir@gmail.com', 'c98c1dd20c7cfc540ded17c2e836a08da5306387', 'Surat', '9924888627', 'istockphoto-1124684854-612x612.jpg', 'MBBS', 9),
(6006, 'Komal', 'Hathi', 'komal@gmail.com', '5043a1720b60ac1ff489a5a817e9bad89a2deaea', 'Mumbai', '6549873012', '360_F_320744517_TaGkT7aRlqqWdfGUuzRKDABtFEoN5CiO.jpg', 'DDS', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `picture`) VALUES
(2, 'gallery-1.jpg'),
(3, 'gallery-2.jpg'),
(4, 'gallery-6.jpg'),
(5, 'gallery-4.jpg'),
(6, 'gallery-3.jpg'),
(7, 'gallery-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoiceid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL COMMENT '(lab fees+ appointment fees+amount)',
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` int(11) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoiceid`, `patientid`, `amount`, `totalamount`, `date`, `status`, `description`) VALUES
(201, 20230001, 4000, 5500, '2023-06-09 06:43:47.213943', 1, '<p>This is a demo payroll description for test!!</p>'),
(202, 20230005, 0, 500, '2023-05-29 17:57:12.592894', 1, '<p>Demo</p>'),
(2000004, 20230004, 100, 1100, '2023-05-29 04:38:50.288109', 1, '<p>vjhjh</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_labreport`
--

CREATE TABLE `tbl_labreport` (
  `lid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `prescriptionid` int(11) NOT NULL,
  `test` varchar(5000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `result` varchar(5000) NOT NULL,
  `fees` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_labreport`
--

INSERT INTO `tbl_labreport` (`lid`, `patientid`, `prescriptionid`, `test`, `date`, `result`, `fees`, `sid`) VALUES
(2, 20230001, 10, '<ul><li>Blood</li><li>Urine</li><li>cfkdhbsc</li><li>ghdfg</li><li>gnjdfkg</li><li>grfdgdf</li></ul>', '2023-05-02 19:23:20', '<ul><li>gdfvfdg</li></ul><ol><li>fgfdgdf</li><li>fdsfsd</li></ol>', 500, 7003),
(4, 20230003, 11, '<ul><li>fkjndslfjcsd</li><li>fdisuhnfoijsdfsdfsdf</li><li>jflkdsnlfndsffdsf</li></ul>', '2023-05-15 11:03:48', '<p>fdsfhsdlijfsd</p><p>nfoisndlfds</p><p>fnodsinfohspgihsdf</p>', 500, 7003),
(6, 20230003, 11, '<p>ijnvfdvfddvdvfdvc</p><p>aaje</p>', '2023-05-16 11:31:52', '<p>ha</p>', 500, 7003),
(7, 20230001, 10, '<p>blood</p><p>sugar</p><p>urine</p><p>xray</p>', '2023-05-16 13:04:17', '<p>blood o+ve</p><p>sugar very highh</p><p>urine yellow&nbsp;</p><p>xray done</p>', 500, 7003),
(10, 20230004, 14, '<p>bcbfc</p>', '2023-05-29 11:48:02', '<p>passs</p>', 500, 7003);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `medicineid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`medicineid`, `name`, `price`) VALUES
(1, 'Paracetamol', 135),
(2, 'Aspirin', 100),
(3, 'Metformin', 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patientid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `ptid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patientid`, `name`, `lname`, `email`, `password`, `gender`, `dob`, `address`, `phone`, `bloodgroup`, `ptid`) VALUES
(20230001, 'Lol', 'Sharma', 'pat@gmail.com', '87f1c7727f58092e0f2936badc5e731109cda547', 'Male', '1997-05-03', 'Mumbai', '1234567890', 'O+', 102),
(20230003, 'mann', 'patel', 'mann@gmail.com', 'c92b745946344ceee9229e93dd9f441f4edb9297', 'Male', '2002-11-01', 'surat', '6351247890', 'B+', 101),
(20230004, 'Dhruv', 'Tailor', 'dhruv@gmail.com', 'e4900c0727b7c2c0b164b9657f169de329400418', 'Male', '2002-09-16', 'Olpad', '8975462103', 'O+', 101),
(20230005, 'Anjali', 'Mehta', 'anjali@gmail.com', 'e8cd5c4ccba46a98885ceef7111d2a5b6dc4f7ec', 'Female', '1978-06-09', 'Mumbai', '6547891302', 'A-', 101);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_type`
--

CREATE TABLE `tbl_patient_type` (
  `ptid` int(11) NOT NULL,
  `ptype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patient_type`
--

INSERT INTO `tbl_patient_type` (`ptid`, `ptype`) VALUES
(101, 'OutPatient'),
(102, 'InPatient');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `prescriptionid` int(11) NOT NULL,
  `doctorid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`prescriptionid`, `doctorid`, `patientid`, `disease`, `description`, `date`) VALUES
(10, 6003, 20230001, 'Malaria', '<p><strong>Urgent need to admit in hospital</strong></p><ul><li><strong>contact the nurse fast</strong></li></ul>', '2023-05-02'),
(11, 6002, 20230003, 'Flu', '<ol><li>dsacszxsc</li><li>dsvc</li></ol>', '2023-05-14'),
(12, 6001, 20230005, 'fever', 'fdsvdsfvdsv', '2023-05-20'),
(14, 6003, 20230004, 'viral', '<p>fcdsjcdff</p>', '2023-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `roomid` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `roomtype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`roomid`, `number`, `roomtype`) VALUES
(101, '1A', 'General'),
(102, '2A', 'ICU'),
(103, '3A', 'General Female'),
(104, '3B', 'General Male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slideshow`
--

CREATE TABLE `tbl_slideshow` (
  `id` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slideshow`
--

INSERT INTO `tbl_slideshow` (`id`, `picture`) VALUES
(4, 'Healthcare.jpg'),
(8, 'gurneys-and-wheelchairs-in-empty-hospital-lobby-xbzxbrzdn8bmwc73.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `sid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `stid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`sid`, `name`, `lname`, `email`, `password`, `address`, `phone`, `picture`, `stid`) VALUES
(7001, 'Sunita', 'Ben', 'sunita@gmail.com', '8026ce993de353d07387b09567b1c16a1b5c2be2', 'bihar', '6548791230', '1446155.jpg', 1),
(7003, 'Amit ', 'Mehta', 'amit@gmail.com', 'befba4a2e726b20158453e1ffa1d1e1f2de439e7', 'Vesu', '7786961230', 'wp8430817.jpg', 3),
(7004, 'Akash', 'Rathod', 'akash@gmail.com', 'a082c5e1190dcc905d2eb223d7475d1cb31f98ef', 'Surat', '6548792031', 'wallpapersden.com_demon-slayer-kimetsu-no-yaiba-game_1920x1080.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_type`
--

CREATE TABLE `tbl_staff_type` (
  `stid` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff_type`
--

INSERT INTO `tbl_staff_type` (`stid`, `designation`) VALUES
(1, 'Nurse'),
(2, 'Pharmacist'),
(3, 'Pathologist'),
(4, 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `review` mediumtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`id`, `patientid`, `review`, `status`) VALUES
(1, 20230001, '<p>The hospital was great! The staff was friendly and helpful, making me feel comfortable during my visit. The facilities were clean and well-maintained. The doctors were knowledgeable and took the time to address my concerns.</p>', 1),
(2, 20230005, '<p>The hospital was great! The staff was friendly and attentive. The facilities were clean and modern. I received excellent care during my visit. I would definitely recommend this hospital to others.</p>', 1),
(3, 20230004, '<p>Wow, what a great hospital experience! The staff was friendly and attentive. The facilities were clean and modern. I felt well taken care of throughout my visit. Highly recommended!</p>', 1),
(4, 20230001, '<p>vbvbvh</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vitals`
--

CREATE TABLE `tbl_vitals` (
  `vid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `bloodpress` varchar(50) NOT NULL,
  `heartrate` varchar(50) NOT NULL,
  `bodytemp` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vitals`
--

INSERT INTO `tbl_vitals` (`vid`, `patientid`, `bloodpress`, `heartrate`, `bodytemp`, `date`) VALUES
(1, 20230001, '110/70', '78', '37', '2023-05-04 15:14:39'),
(2, 20230001, '110/70', '75', '40', '2023-05-16 13:10:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `razorpay_payment`
--
ALTER TABLE `razorpay_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ck_patientid7` (`patientid`),
  ADD KEY `ck_invoiceid` (`invoiceid`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`apid`),
  ADD KEY `ck_doctorid` (`doctorid`),
  ADD KEY `ck_patientid` (`patientid`);

--
-- Indexes for table `tbl_bed`
--
ALTER TABLE `tbl_bed`
  ADD PRIMARY KEY (`bedid`),
  ADD KEY `ck_roomid` (`roomid`);

--
-- Indexes for table `tbl_bed_allocation`
--
ALTER TABLE `tbl_bed_allocation`
  ADD PRIMARY KEY (`bdid`),
  ADD KEY `ck_patientid3` (`patientid`),
  ADD KEY `ck_bedid` (`bedid`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctorid`),
  ADD KEY `ck_departmentid` (`departmentid`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoiceid`),
  ADD KEY `ck_patientid4` (`patientid`);

--
-- Indexes for table `tbl_labreport`
--
ALTER TABLE `tbl_labreport`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `ck_sid` (`sid`),
  ADD KEY `ck_patientid2` (`patientid`),
  ADD KEY `ck_prid` (`prescriptionid`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`medicineid`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patientid`),
  ADD KEY `ck_ptid` (`ptid`);

--
-- Indexes for table `tbl_patient_type`
--
ALTER TABLE `tbl_patient_type`
  ADD PRIMARY KEY (`ptid`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`prescriptionid`),
  ADD KEY `ck_doctorid1` (`doctorid`),
  ADD KEY `ck_patientid1` (`patientid`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `ck_stid` (`stid`);

--
-- Indexes for table `tbl_staff_type`
--
ALTER TABLE `tbl_staff_type`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vitals`
--
ALTER TABLE `tbl_vitals`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `ck_patientid3` (`patientid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `razorpay_payment`
--
ALTER TABLE `razorpay_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23010;

--
-- AUTO_INCREMENT for table `tbl_bed`
--
ALTER TABLE `tbl_bed`
  MODIFY `bedid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bed_allocation`
--
ALTER TABLE `tbl_bed_allocation`
  MODIFY `bdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `departmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6008;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoiceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000005;

--
-- AUTO_INCREMENT for table `tbl_labreport`
--
ALTER TABLE `tbl_labreport`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `medicineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20230006;

--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `prescriptionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7005;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_vitals`
--
ALTER TABLE `tbl_vitals`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `razorpay_payment`
--
ALTER TABLE `razorpay_payment`
  ADD CONSTRAINT `ck_invoiceid` FOREIGN KEY (`invoiceid`) REFERENCES `tbl_invoice` (`invoiceid`),
  ADD CONSTRAINT `ck_patientid7` FOREIGN KEY (`patientid`) REFERENCES `tbl_patient` (`patientid`);

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `ck_doctorid` FOREIGN KEY (`doctorid`) REFERENCES `tbl_doctor` (`doctorid`),
  ADD CONSTRAINT `ck_patientid` FOREIGN KEY (`patientid`) REFERENCES `tbl_patient` (`patientid`);

--
-- Constraints for table `tbl_bed`
--
ALTER TABLE `tbl_bed`
  ADD CONSTRAINT `ck_roomid` FOREIGN KEY (`roomid`) REFERENCES `tbl_room` (`roomid`);

--
-- Constraints for table `tbl_bed_allocation`
--
ALTER TABLE `tbl_bed_allocation`
  ADD CONSTRAINT `ck_bedid` FOREIGN KEY (`bedid`) REFERENCES `tbl_bed` (`bedid`);

--
-- Constraints for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD CONSTRAINT `ck_departmentid` FOREIGN KEY (`departmentid`) REFERENCES `tbl_department` (`departmentid`);

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `ck_patientid4` FOREIGN KEY (`patientid`) REFERENCES `tbl_patient` (`patientid`);

--
-- Constraints for table `tbl_labreport`
--
ALTER TABLE `tbl_labreport`
  ADD CONSTRAINT `ck_patientid2` FOREIGN KEY (`patientid`) REFERENCES `tbl_patient` (`patientid`),
  ADD CONSTRAINT `ck_prid` FOREIGN KEY (`prescriptionid`) REFERENCES `tbl_prescription` (`prescriptionid`),
  ADD CONSTRAINT `ck_sid` FOREIGN KEY (`sid`) REFERENCES `tbl_staff` (`sid`);

--
-- Constraints for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD CONSTRAINT `ck_ptid` FOREIGN KEY (`ptid`) REFERENCES `tbl_patient_type` (`ptid`);

--
-- Constraints for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD CONSTRAINT `ck_doctorid1` FOREIGN KEY (`doctorid`) REFERENCES `tbl_doctor` (`doctorid`),
  ADD CONSTRAINT `ck_patientid1` FOREIGN KEY (`patientid`) REFERENCES `tbl_patient` (`patientid`);

--
-- Constraints for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD CONSTRAINT `ck_stid` FOREIGN KEY (`stid`) REFERENCES `tbl_staff_type` (`stid`);

--
-- Constraints for table `tbl_vitals`
--
ALTER TABLE `tbl_vitals`
  ADD CONSTRAINT `ck_patientid3` FOREIGN KEY (`patientid`) REFERENCES `tbl_patient` (`patientid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
