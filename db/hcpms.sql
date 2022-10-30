-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2016 at 03:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET FOREIGN_KEY_CHECKS = 0;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy_baod_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--
INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(1, 'admin', 'admin_baod', 'Administrator', '', '');

--
-- Table structure for table `patients`
--
CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(12) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `purok_address` varchar(20) NOT NULL,
  `assigned_bhw` varchar(20) NOT NULL,
  `assigned_nurse` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `maternity`
--
CREATE TABLE `maternity` (
  `maternity_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `months_preg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `malnourished`
--
CREATE TABLE `malnourished` (
  `malnourished_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `bmi` int(11) NOT NULL,
  `guardian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `malnourished`
--
CREATE TABLE `tubercolusis` (
  `tubercolusis_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `days_medication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `malnourished`
--
CREATE TABLE `teenage_preg` (
  `teenage_preg_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `months_preg` int(11) NOT NULL,
  `guardian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `malnourished`
--
CREATE TABLE `hypertension` (
  `hypertension_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `bp` varchar(20) NOT NULL,
  `medicine_maintenance` varchar(20) NOT NULL,
  `amount_medicine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `malnourished`
--
CREATE TABLE `diabetic` (
  `diabetic_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medication_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `malnourished`
--
CREATE TABLE `pwd` (
  `pwd_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `disability` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `medicine`
--
CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `generic_name` varchar(20) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `dosage_form` varchar(20) NOT NULL,
  `dosage_strength` varchar(20) NOT NULL,
  `description` varchar(200) NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `dosage_form`
--
CREATE TABLE `dosage_form` (
  `dosage_form_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `dosage_form`
--
CREATE TABLE `medication` (
  `medication_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` text NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `maternity`
--
ALTER TABLE `maternity`
  ADD PRIMARY KEY (`maternity_id`);
ALTER TABLE `maternity`
  ADD FOREIGN KEY (`patient_id`)
  REFERENCES `patients` (`patient_id`);
  
--
-- Indexes for table `maternity`
--
ALTER TABLE `malnourished`
  ADD PRIMARY KEY (`malnourished_id`);
ALTER TABLE `malnourished`
  ADD FOREIGN KEY (`patient_id`)
  REFERENCES `patients` (`patient_id`);
    
--
-- Indexes for table `maternity`
--
ALTER TABLE `tubercolusis`
  ADD PRIMARY KEY (`tubercolusis_id`);
ALTER TABLE `tubercolusis`
  ADD FOREIGN KEY (`patient_id`)
  REFERENCES `patients` (`patient_id`);
      
--
-- Indexes for table `maternity`
--
ALTER TABLE `teenage_preg`
  ADD PRIMARY KEY (`teenage_preg_id`);
ALTER TABLE `teenage_preg`
  ADD FOREIGN KEY (`patient_id`)
  REFERENCES `patients` (`patient_id`);
      
--
-- Indexes for table `maternity`
--
ALTER TABLE `hypertension`
  ADD PRIMARY KEY (`hypertension_id`);
ALTER TABLE `hypertension`
  ADD FOREIGN KEY (`patient_id`)
  REFERENCES `patients` (`patient_id`);
      
--
-- Indexes for table `maternity`
--
ALTER TABLE `diabetic`
  ADD PRIMARY KEY (`diabetic_id`);
ALTER TABLE `diabetic`
  ADD FOREIGN KEY (`patient_id`)
  REFERENCES `patients` (`patient_id`);
      
--
-- Indexes for table `maternity`
--
ALTER TABLE `pwd`
  ADD PRIMARY KEY (`pwd_id`);
ALTER TABLE `pwd`
  ADD FOREIGN KEY (`patient_id`)
  REFERENCES `patients` (`patient_id`);

-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

-- Indexes for table `medicine`
--
ALTER TABLE `dosage_form`
  ADD PRIMARY KEY (`dosage_form_id`);
  
--
-- Indexes for table `maternity`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`medication_id`);
ALTER TABLE `medication`
  ADD FOREIGN KEY (`patient_id`)
  REFERENCES `patients` (`patient_id`);
ALTER TABLE `medication`
  ADD FOREIGN KEY (`patient_id`)
  REFERENCES `medicine` (`medicine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `maternity`
  MODIFY `maternity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `malnourished`
  MODIFY `malnourished_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  
--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `tubercolusis`
  MODIFY `tubercolusis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
    
--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `teenage_preg`
  MODIFY `teenage_preg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
      
--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `hypertension`
  MODIFY `hypertension_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
        
--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `diabetic`
  MODIFY `diabetic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
          
--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `pwd`
  MODIFY `pwd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosage_form`
--
ALTER TABLE `dosage_form`
  MODIFY `dosage_form_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `medication_id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- INSERT data in dosage_form
--
INSERT INTO `dosage_form` (`dosage_form_id`,`name`) 
VALUES (NULL, 'Effavescent tablet'),(NULL, 'Chewable tablet'),(NULL, 'Sublingual tablet'),(NULL, 'Enteric coated tablet'),(NULL, 'Capsule'),(NULL, 'Powder'),(NULL, 'Lozenges'),(NULL, 'Mixtures'),
(NULL, 'Implant'),(NULL, 'Irrigation solution'),(NULL, 'Lotion'),(NULL, 'Gargle'),(NULL, 'Drops'),(NULL, 'Ointment'),(NULL, 'Cream'),(NULL, 'Ointment'),(NULL, 'Intramuscular injection'),(NULL, 'IntSubcutaneous injection'),
(NULL, 'Intravenous injection'),(NULL, 'Suppository'),(NULL, 'Transdermal patch'),(NULL, 'Inhaler'),(NULL, 'Pessary'),(NULL, 'Enema');