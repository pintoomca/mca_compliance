-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 12:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_dev_20_05_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_max_director`
--

CREATE TABLE `a_max_director` (
  `uID` int(11) NOT NULL,
  `CID` int(11) DEFAULT NULL,
  `CIN` varchar(45) DEFAULT NULL,
  `total_director_begin` int(11) DEFAULT NULL,
  `total_director_end` int(11) DEFAULT NULL,
  `yearoffiling` int(11) DEFAULT NULL,
  `company_class` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category_module_map`
--

CREATE TABLE `category_module_map` (
  `catID` int(10) NOT NULL,
  `mID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chatter_categories`
--

CREATE TABLE `chatter_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chatter_discussion`
--

CREATE TABLE `chatter_discussion` (
  `id` int(10) UNSIGNED NOT NULL,
  `chatter_category_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sticky` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `answered` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '#232629',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_reply_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chatter_post`
--

CREATE TABLE `chatter_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `chatter_discussion_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `markdown` tinyint(1) NOT NULL DEFAULT '0',
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chatter_user_discussion`
--

CREATE TABLE `chatter_user_discussion` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `discussion_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cin_map_director`
--

CREATE TABLE `cin_map_director` (
  `PAN` char(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `DIN` char(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `din_pan` char(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `CIN` char(21) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email_addr` char(128) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Yearoffiling` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `ID` int(36) UNSIGNED NOT NULL,
  `cID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cin_map_director_final`
--

CREATE TABLE `cin_map_director_final` (
  `CIN` varchar(21) DEFAULT NULL,
  `Yearoffiling` int(11) DEFAULT NULL,
  `SNo` int(11) DEFAULT NULL,
  `Name` varchar(1024) DEFAULT NULL,
  `DIN_PAN` varchar(1024) DEFAULT NULL,
  `Designation` varchar(1024) DEFAULT NULL,
  `EMAIL_ADDR` varchar(315) DEFAULT NULL,
  `PAN` varchar(30) DEFAULT NULL,
  `DIN` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `designation_domain` varchar(400) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cin_map_director_final_2018`
--

CREATE TABLE `cin_map_director_final_2018` (
  `CIN` varchar(21) CHARACTER SET latin1 DEFAULT NULL,
  `Yearoffiling` int(11) DEFAULT NULL,
  `SNo` int(11) DEFAULT NULL,
  `Name` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `DIN_PAN` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `Designation` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `email_addr` varchar(315) CHARACTER SET latin1 DEFAULT NULL,
  `PAN` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `DIN` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cin_map_director_final_old`
--

CREATE TABLE `cin_map_director_final_old` (
  `CIN` varchar(21) CHARACTER SET latin1 NOT NULL,
  `Yearoffiling` int(11) DEFAULT NULL,
  `SNo` int(11) DEFAULT NULL,
  `Name` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `DIN_PAN` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `Designation` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `EMAIL_ADDR` varchar(315) CHARACTER SET latin1 DEFAULT NULL,
  `PAN` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `DIN` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `id` int(11) NOT NULL DEFAULT '0',
  `designation_domain` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cmp_inspector_status_report`
--

CREATE TABLE `cmp_inspector_status_report` (
  `_count` bigint(21) NOT NULL DEFAULT '0',
  `uID` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `fName` varchar(250) DEFAULT NULL,
  `YearOfFilling` varchar(45) CHARACTER SET utf8 NOT NULL,
  `action` varchar(45) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmp_prvoision_company_class`
--

CREATE TABLE `cmp_prvoision_company_class` (
  `_count` bigint(21) NOT NULL,
  `COMPANY_CLASS` varchar(180) DEFAULT NULL,
  `provision_id` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `YearOfFiling` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cms_criteria_table`
--

CREATE TABLE `cms_criteria_table` (
  `MGT7_CIN` varchar(21) DEFAULT NULL,
  `PUC` double DEFAULT NULL,
  `Turnover` double DEFAULT NULL,
  `NET_WORTH` double DEFAULT NULL,
  `AOC_CIN` varchar(21) DEFAULT NULL,
  `Profit_Before_Tax` double DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cms_otp`
--

CREATE TABLE `cms_otp` (
  `id` int(11) NOT NULL,
  `cms_otp_no` varchar(45) DEFAULT NULL,
  `cms_verify_otp` varchar(45) DEFAULT NULL,
  `csm_otpsent_time` varchar(45) DEFAULT NULL,
  `cms_otpvarify_time` varchar(45) DEFAULT NULL,
  `cms_otp_success` varchar(45) DEFAULT NULL,
  `cms_no` varchar(45) DEFAULT NULL,
  `cms_comapny_email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `count_violation`
--

CREATE TABLE `count_violation` (
  `deptid` bigint(20) NOT NULL,
  `count` int(11) NOT NULL,
  `deptname` varchar(255) NOT NULL,
  `violationid` int(11) NOT NULL,
  `violation_name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `csr_applicable_1_1`
--

CREATE TABLE `csr_applicable_1_1` (
  `CIN` varchar(21) DEFAULT NULL,
  `cID` int(11) DEFAULT NULL,
  `CUID` varchar(20) DEFAULT NULL,
  `yearoffilling` int(11) DEFAULT NULL,
  `CompanyNameinCAPS` varchar(256) DEFAULT NULL,
  `email_company` varchar(256) DEFAULT NULL,
  `ROC_name` varchar(45) DEFAULT NULL,
  `ROC_code` varchar(45) DEFAULT NULL,
  `csr_applicable_check` varchar(45) DEFAULT NULL,
  `csr_applicable_reporting` varchar(45) DEFAULT NULL,
  `prescribedCSR_calu` varchar(45) DEFAULT NULL,
  `prescribedCSR` double DEFAULT NULL,
  `expenditureCSR` double DEFAULT NULL,
  `difference` double DEFAULT NULL,
  `difference_PP-P` varchar(45) DEFAULT NULL,
  `Turnover_2013` varchar(45) DEFAULT NULL,
  `Turnover_2014` varchar(45) DEFAULT NULL,
  `Turnover_2015` varchar(45) DEFAULT NULL,
  `PBT_2013` varchar(45) DEFAULT NULL,
  `PBT_2014` varchar(45) DEFAULT NULL,
  `PBT_2015` varchar(45) DEFAULT NULL,
  `NetWorth_2013` varchar(45) DEFAULT NULL,
  `NetWorth_2014` varchar(45) DEFAULT NULL,
  `NetWorth_2015` varchar(45) DEFAULT NULL,
  `CFI_call` varchar(45) DEFAULT NULL,
  `Compliance_code` varchar(45) DEFAULT NULL,
  `CFI_number` varchar(256) DEFAULT NULL,
  `Net_Profit_2013` varchar(45) DEFAULT NULL,
  `Net_Profit_2014` varchar(45) DEFAULT NULL,
  `Net_Profit_2015` varchar(45) DEFAULT NULL,
  `mail_update` varchar(500) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `officer_name` varchar(128) DEFAULT NULL,
  `officer_email` varchar(256) DEFAULT NULL,
  `officer_designation` varchar(256) DEFAULT NULL,
  `parity_bit_email` int(16) DEFAULT NULL,
  `company_addres` varchar(1000) DEFAULT NULL,
  `officerID` int(16) DEFAULT NULL,
  `deptID` int(11) NOT NULL,
  `rocID` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desc_category`
--

CREATE TABLE `desc_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fk_deptID` int(11) NOT NULL,
  `fk_locID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `desc_dept`
--

CREATE TABLE `desc_dept` (
  `depID` int(11) NOT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=in-active, 1=active',
  `dept_Code` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `desc_location`
--

CREATE TABLE `desc_location` (
  `uID` int(11) NOT NULL,
  `location_name` varchar(45) NOT NULL,
  `fk_deptID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `desc_module`
--

CREATE TABLE `desc_module` (
  `mID` int(11) NOT NULL DEFAULT '0',
  `moduleName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `moduleCode` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desc_module_1`
--

CREATE TABLE `desc_module_1` (
  `mID` int(11) NOT NULL,
  `moduleName` varchar(50) NOT NULL,
  `moduleCode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `desc_module_prod_20_05_2020`
--

CREATE TABLE `desc_module_prod_20_05_2020` (
  `mID` int(11) NOT NULL DEFAULT '0',
  `moduleName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `moduleCode` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desc_module_prod_26_5_2020`
--

CREATE TABLE `desc_module_prod_26_5_2020` (
  `mID` int(11) NOT NULL DEFAULT '0',
  `moduleName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `moduleCode` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desc_rd`
--

CREATE TABLE `desc_rd` (
  `uID` int(11) NOT NULL,
  `rdName` varchar(255) DEFAULT NULL,
  `rdCode` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desc_roc`
--

CREATE TABLE `desc_roc` (
  `uID` int(11) NOT NULL,
  `rocName` varchar(255) DEFAULT NULL,
  `rocCode` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desc_roles`
--

CREATE TABLE `desc_roles` (
  `role_Id` int(3) DEFAULT NULL,
  `role_name` varchar(40) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `desc_violation`
--

CREATE TABLE `desc_violation` (
  `violationID` int(11) NOT NULL DEFAULT '0',
  `violationName` varchar(255) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `parentID` int(11) DEFAULT '0',
  `violation_alert` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `section` varchar(45) DEFAULT NULL,
  `companyCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desc_violation_1`
--

CREATE TABLE `desc_violation_1` (
  `violationID` int(11) NOT NULL,
  `violationName` varchar(255) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `parentID` int(11) DEFAULT '0',
  `violation_alert` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `section` varchar(45) DEFAULT NULL,
  `companyCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desc_violation_prod_20_05_2020`
--

CREATE TABLE `desc_violation_prod_20_05_2020` (
  `violationID` int(11) NOT NULL DEFAULT '0',
  `violationName` varchar(255) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `parentID` int(11) DEFAULT '0',
  `violation_alert` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `section` varchar(45) DEFAULT NULL,
  `companyCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desc_violation_prod_26_5_2020`
--

CREATE TABLE `desc_violation_prod_26_5_2020` (
  `violationID` int(11) NOT NULL DEFAULT '0',
  `violationName` varchar(255) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `parentID` int(11) DEFAULT '0',
  `violation_alert` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `section` varchar(45) DEFAULT NULL,
  `companyCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_data`
--

CREATE TABLE `email_data` (
  `reff_num` varchar(64) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `message` blob,
  `sent_time` timestamp NULL DEFAULT NULL,
  `company_name` varchar(300) DEFAULT NULL,
  `cin` varchar(45) DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hibernate_sequence`
--

CREATE TABLE `hibernate_sequence` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mailverification`
--

CREATE TABLE `mailverification` (
  `approvalSent` int(11) DEFAULT NULL,
  `token_id` varchar(20) NOT NULL,
  `mailID` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sentRetry` int(11) DEFAULT NULL,
  `sentTime` datetime DEFAULT NULL,
  `verificationStatus` varchar(45) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `map_cat_loc`
--

CREATE TABLE `map_cat_loc` (
  `uID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `locID` int(11) NOT NULL,
  `depID` int(11) NOT NULL,
  `reportingCatID` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `cat_name` varchar(255) DEFAULT NULL,
  `loc_name` varchar(45) DEFAULT NULL,
  `department_name` varchar(45) DEFAULT NULL,
  `reporting_cat_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `map_dept_work_location`
--

CREATE TABLE `map_dept_work_location` (
  `dept_id` int(11) DEFAULT '0',
  `work_location_id` int(11) DEFAULT '0',
  `STATUS` tinyint(1) DEFAULT '1' COMMENT '0=deactive,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `map_notice`
--

CREATE TABLE `map_notice` (
  `uID` int(11) NOT NULL,
  `sentTime` datetime DEFAULT NULL,
  `subject` text,
  `body` text,
  `officerID` int(10) DEFAULT NULL,
  `cID` int(11) DEFAULT NULL,
  `noticeType` varchar(25) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `CIN` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `map_notice_num`
--

CREATE TABLE `map_notice_num` (
  `uID` int(11) NOT NULL,
  `noticeID` int(11) DEFAULT NULL,
  `noticeNumber` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `map_rd_roc`
--

CREATE TABLE `map_rd_roc` (
  `uID` int(11) NOT NULL,
  `rdID` int(11) DEFAULT '0',
  `rocID` int(11) DEFAULT '0',
  `deptID` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `map_reporting`
--

CREATE TABLE `map_reporting` (
  `uID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `reportingID` int(11) NOT NULL,
  `deptID` int(11) NOT NULL,
  `locID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `map_violation`
--

CREATE TABLE `map_violation` (
  `violationID` int(11) DEFAULT NULL,
  `yearOfFiling` int(11) DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `uID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `map_violation_attributes`
--

CREATE TABLE `map_violation_attributes` (
  `id` int(11) NOT NULL,
  `violationId` varchar(45) DEFAULT NULL,
  `violationName` varchar(45) DEFAULT NULL,
  `attributeLabel` varchar(45) DEFAULT NULL,
  `attributeValue` varchar(45) DEFAULT NULL,
  `deptId` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_companies_distinct`
--

CREATE TABLE `master_companies_distinct` (
  `SEQ` decimal(20,0) DEFAULT NULL,
  `MANDT` varchar(9) DEFAULT NULL,
  `CIN` varchar(63) DEFAULT NULL,
  `CIN_GUID` varchar(255) DEFAULT NULL,
  `COMPANY_STATUS` varchar(18) DEFAULT NULL,
  `PARTNER` varchar(30) DEFAULT NULL,
  `NAME_ORG1` varchar(120) DEFAULT NULL,
  `NAME_ORG2` varchar(120) DEFAULT NULL,
  `NAME_ORG3` varchar(120) DEFAULT NULL,
  `NAME_ORG4` varchar(120) DEFAULT NULL,
  `ROC_CODE` varchar(120) DEFAULT NULL,
  `COMPANY_CLASS` varchar(180) DEFAULT NULL,
  `ADDR_LINE1` varchar(180) DEFAULT NULL,
  `ADDR_LINE2` varchar(180) DEFAULT NULL,
  `ADDR_LINE3` varchar(180) DEFAULT NULL,
  `ADDR_LINE4` varchar(180) DEFAULT NULL,
  `CITY_1` varchar(120) DEFAULT NULL,
  `CITY_2` varchar(120) DEFAULT NULL,
  `COUNTRY` varchar(9) DEFAULT NULL,
  `POSTALCODE` varchar(36) DEFAULT NULL,
  `REGION` varchar(9) DEFAULT NULL,
  `EMAIL_ADDR` varchar(315) DEFAULT NULL,
  `NUM_AUDITORS` varchar(6) DEFAULT NULL,
  `NUM_OF_DIRECTOR` varchar(6) DEFAULT NULL,
  `COMPANY_SUBCAT` varchar(180) DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(180) DEFAULT NULL,
  `LISTED_FLAG` varchar(180) DEFAULT NULL,
  `PRSNT_ADDR_LINE1` varchar(180) DEFAULT NULL,
  `PRSNT_ADDR_LINE2` varchar(180) DEFAULT NULL,
  `PRSNT_ADDR_CITY1` varchar(120) DEFAULT NULL,
  `PRSNT_ADDR_CITY2` varchar(120) DEFAULT NULL,
  `PRSNT_ADD_REGION` varchar(9) DEFAULT NULL,
  `PRSNT_AD_COUNTRY` varchar(9) DEFAULT NULL,
  `PRSNT_POST_CODE` varchar(36) DEFAULT NULL,
  `DISTRICT_CODE` varchar(15) DEFAULT NULL,
  `TELEPHONE_NUMBER` varchar(90) DEFAULT NULL,
  `FAX_NUMBER` varchar(90) DEFAULT NULL,
  `TEHSIL` varchar(120) DEFAULT NULL,
  `UPDATED_ON` decimal(15,0) DEFAULT NULL,
  `ROC_NAME` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `compname` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `ID` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_companies_distinct_all`
--

CREATE TABLE `master_companies_distinct_all` (
  `SEQ` decimal(20,0) NOT NULL,
  `MANDT` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `CIN` varchar(63) CHARACTER SET latin1 DEFAULT NULL,
  `CIN_GUID` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `COMPANY_STATUS` varchar(18) CHARACTER SET latin1 DEFAULT NULL,
  `PARTNER` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG1` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG2` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG3` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG4` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `ROC_CODE` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `COMPANY_CLASS` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE1` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE2` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE3` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE4` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `CITY_1` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `CITY_2` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `COUNTRY` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `POSTALCODE` varchar(36) CHARACTER SET latin1 DEFAULT NULL,
  `REGION` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `EMAIL_ADDR` varchar(315) CHARACTER SET latin1 DEFAULT NULL,
  `NUM_AUDITORS` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `NUM_OF_DIRECTOR` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `COMPANY_SUBCAT` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `LISTED_FLAG` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_LINE1` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_LINE2` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_CITY1` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_CITY2` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADD_REGION` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_AD_COUNTRY` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_POST_CODE` varchar(36) CHARACTER SET latin1 DEFAULT NULL,
  `DISTRICT_CODE` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `TELEPHONE_NUMBER` varchar(90) CHARACTER SET latin1 DEFAULT NULL,
  `FAX_NUMBER` varchar(90) CHARACTER SET latin1 DEFAULT NULL,
  `TEHSIL` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `UPDATED_ON` decimal(15,0) DEFAULT NULL,
  `ROC_NAME` varchar(45) DEFAULT NULL,
  `compname` varchar(1000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_companies_distinct_prod_20_05_2020`
--

CREATE TABLE `master_companies_distinct_prod_20_05_2020` (
  `SEQ` decimal(20,0) NOT NULL,
  `MANDT` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `CIN` varchar(63) CHARACTER SET latin1 NOT NULL,
  `CIN_GUID` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `COMPANY_STATUS` varchar(18) CHARACTER SET latin1 DEFAULT NULL,
  `PARTNER` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG1` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG2` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG3` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG4` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `ROC_CODE` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `COMPANY_CLASS` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE1` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE2` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE3` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE4` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `CITY_1` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `CITY_2` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `COUNTRY` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `POSTALCODE` varchar(36) CHARACTER SET latin1 DEFAULT NULL,
  `REGION` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `EMAIL_ADDR` varchar(315) CHARACTER SET latin1 DEFAULT NULL,
  `NUM_AUDITORS` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `NUM_OF_DIRECTOR` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `COMPANY_SUBCAT` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `LISTED_FLAG` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_LINE1` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_LINE2` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_CITY1` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_CITY2` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADD_REGION` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_AD_COUNTRY` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_POST_CODE` varchar(36) CHARACTER SET latin1 DEFAULT NULL,
  `DISTRICT_CODE` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `TELEPHONE_NUMBER` varchar(90) CHARACTER SET latin1 DEFAULT NULL,
  `FAX_NUMBER` varchar(90) CHARACTER SET latin1 DEFAULT NULL,
  `TEHSIL` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `UPDATED_ON` decimal(15,0) DEFAULT NULL,
  `ROC_NAME` varchar(45) DEFAULT NULL,
  `compname` varchar(1000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_companies_distinct_prod_26_5_2020`
--

CREATE TABLE `master_companies_distinct_prod_26_5_2020` (
  `SEQ` decimal(20,0) NOT NULL,
  `MANDT` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `CIN` varchar(63) CHARACTER SET latin1 NOT NULL,
  `CIN_GUID` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `COMPANY_STATUS` varchar(18) CHARACTER SET latin1 DEFAULT NULL,
  `PARTNER` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG1` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG2` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG3` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `NAME_ORG4` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `ROC_CODE` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `COMPANY_CLASS` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE1` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE2` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE3` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `ADDR_LINE4` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `CITY_1` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `CITY_2` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `COUNTRY` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `POSTALCODE` varchar(36) CHARACTER SET latin1 DEFAULT NULL,
  `REGION` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `EMAIL_ADDR` varchar(315) CHARACTER SET latin1 DEFAULT NULL,
  `NUM_AUDITORS` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `NUM_OF_DIRECTOR` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `COMPANY_SUBCAT` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `LISTED_FLAG` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_LINE1` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_LINE2` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_CITY1` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADDR_CITY2` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_ADD_REGION` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_AD_COUNTRY` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `PRSNT_POST_CODE` varchar(36) CHARACTER SET latin1 DEFAULT NULL,
  `DISTRICT_CODE` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `TELEPHONE_NUMBER` varchar(90) CHARACTER SET latin1 DEFAULT NULL,
  `FAX_NUMBER` varchar(90) CHARACTER SET latin1 DEFAULT NULL,
  `TEHSIL` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `UPDATED_ON` decimal(15,0) DEFAULT NULL,
  `ROC_NAME` varchar(45) DEFAULT NULL,
  `compname` varchar(1000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_composite_mailing`
--

CREATE TABLE `master_composite_mailing` (
  `id` int(11) NOT NULL,
  `cin` varchar(45) DEFAULT NULL,
  `companyName` varchar(256) DEFAULT NULL,
  `provision` varchar(45) DEFAULT NULL,
  `section` varchar(45) DEFAULT NULL,
  `dept` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `isNoticeApplicable` varchar(45) DEFAULT NULL,
  `cfi` varchar(45) DEFAULT NULL,
  `isMailSent` varchar(45) DEFAULT NULL,
  `SEQ` int(20) DEFAULT NULL,
  `Alert` varchar(45) DEFAULT NULL,
  `turnover` double DEFAULT NULL,
  `puc` double DEFAULT NULL,
  `net_worth` double DEFAULT NULL,
  `profit_before_tax` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_users`
--

CREATE TABLE `master_users` (
  `uID` int(11) NOT NULL DEFAULT '0',
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `emailID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_Time` datetime DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `depID` int(11) DEFAULT NULL,
  `locID` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `isEmailVerified` int(11) DEFAULT '0',
  `activatedDateTime` datetime DEFAULT NULL,
  `deactivatedDateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL,
  `catName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `department_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `location_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `designation_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `reportingUserID` int(11) DEFAULT NULL,
  `roleId` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_users_prod_20_05_2020`
--

CREATE TABLE `master_users_prod_20_05_2020` (
  `uID` int(11) NOT NULL,
  `firstName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `middleName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `emailID` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `create_Time` datetime DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `depID` int(11) DEFAULT NULL,
  `locID` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `isEmailVerified` int(11) DEFAULT '0',
  `activatedDateTime` datetime DEFAULT NULL,
  `deactivatedDateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL,
  `catName` varchar(255) DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `location_name` varchar(45) DEFAULT NULL,
  `designation_name` varchar(255) DEFAULT NULL,
  `reportingUserID` int(11) DEFAULT NULL,
  `roleId` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_user_1`
--

CREATE TABLE `master_user_1` (
  `uID` int(11) NOT NULL DEFAULT '0',
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `emailID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_Time` datetime DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `depID` int(11) DEFAULT NULL,
  `locID` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `isEmailVerified` int(11) DEFAULT '0',
  `activatedDateTime` datetime DEFAULT NULL,
  `deactivatedDateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL,
  `catName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `department_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `location_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `designation_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `reportingUserID` int(11) DEFAULT NULL,
  `roleId` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_v2_2018`
--

CREATE TABLE `master_v2_2018` (
  `uID` int(11) NOT NULL,
  `CompanyCUID` varchar(20) DEFAULT NULL,
  `DeletionFlag` text,
  `CompanyREGNo` text,
  `CompanyRegistrationDate` text,
  `CompanyPAN` text,
  `SharedCapitalFlag` text,
  `NoofDirectors` text,
  `AuthorizedCapital` text,
  `SubscribedCapital` text,
  `PaidupCapital` text,
  `IssuedCapital` text,
  `AuthorizedCapital_act` text,
  `SubscribedCapital_act` text,
  `PaidupCapital_act` text,
  `IssuedCapital_act` text,
  `NoofShareholders` text,
  `CompanyEmailID` text,
  `CIN` varchar(25) DEFAULT NULL,
  `lang` text,
  `CompanyName` varchar(120) DEFAULT NULL,
  `CompanyNameinCAPS` text,
  `SourceSRNNumber` text,
  `Address Valid From` text,
  `Address Vaild To` text,
  `Adress Type` text,
  `Addess 1` text,
  `Address 2` text,
  `Address 3` text,
  `City Code` text,
  `Dist Code` text,
  `State Code` text,
  `Pin Code` text,
  `Company Website` text,
  `Company Country` text,
  `CompanyCategory` text,
  `CompanyClass` varchar(30) DEFAULT NULL,
  `CompanyIndian/Foreign Company` text,
  `CompanyStatus` text,
  `CompanyType` varchar(30) DEFAULT NULL,
  `Country Code` text,
  `CompanyIndustrialClassification` text,
  `CompanyStateCode` text,
  `ComapnyROCCode` text,
  `CompanySubCategory` text,
  `NetFixedAssets` text,
  `TotalRevenue` text,
  `ProfitORLoss` text,
  `Share Capital` text,
  `NetFixedAssets_act` text,
  `TotalRevenue_act` text,
  `ProfitORLoss_act` text,
  `Share Capital_act` text,
  `YearOfIncorporation_act` text,
  `ListingStatus` text,
  `NoOfCompanies` text,
  `mgt7busact` text,
  `parityNewAdd` int(11) DEFAULT '0',
  `CompanyEmailIDOriginal` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_section10a_b_commencement_of_buisness`
--

CREATE TABLE `p_section10a_b_commencement_of_buisness` (
  `CIN` varchar(21) DEFAULT NULL,
  `Date_of_Incorporation` date DEFAULT NULL,
  `ELR/Fields` varchar(255) DEFAULT NULL,
  `Days_exceeded_since_DOI` double DEFAULT NULL,
  `Alert` varchar(255) DEFAULT NULL,
  `Form` varchar(255) DEFAULT NULL,
  `comp_email_addr` varchar(315) DEFAULT NULL,
  `companyname` varchar(480) DEFAULT NULL,
  `ROC_CODE` varchar(120) DEFAULT NULL,
  `ProvisionID` varchar(9) DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(180) DEFAULT NULL,
  `COMPANY_STATUS` varchar(18) DEFAULT NULL,
  `YEAR_RECEIVED` int(11) DEFAULT NULL,
  `yearoffiling` int(11) DEFAULT NULL,
  `SEQ` int(11) DEFAULT NULL,
  `cfi_number` varchar(45) DEFAULT NULL,
  `id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_section10a_commencement_of_buisness`
--

CREATE TABLE `p_section10a_commencement_of_buisness` (
  `CIN` varchar(21) DEFAULT NULL,
  `Date_of_Incorporation` varchar(21) DEFAULT NULL,
  `Spice_Reply` varchar(255) DEFAULT NULL,
  `ELR/Field` varchar(255) DEFAULT NULL,
  `Form` varchar(255) DEFAULT NULL,
  `Alert` varchar(255) DEFAULT NULL,
  `comp_email_addr` varchar(315) DEFAULT NULL,
  `companyname` varchar(480) DEFAULT NULL,
  `ROC_CODE` varchar(120) DEFAULT NULL,
  `ProvisionID` varchar(4) DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(180) DEFAULT NULL,
  `COMPANY_STATUS` varchar(18) DEFAULT NULL,
  `YEAR_RECEIVED` int(11) DEFAULT NULL,
  `yearoffiling` int(11) DEFAULT NULL,
  `SEQ` int(11) DEFAULT NULL,
  `cfi_number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_section68_buybackofsecurities`
--

CREATE TABLE `p_section68_buybackofsecurities` (
  `cin` varchar(21) DEFAULT NULL,
  `Alert` varchar(64) DEFAULT NULL,
  `Form_Name` varchar(255) DEFAULT NULL,
  `Field` varchar(255) DEFAULT NULL,
  `Number_of_shares_bought_back` double DEFAULT NULL,
  `PUC` double DEFAULT NULL,
  `NET_WORTH` double DEFAULT NULL,
  `Turnover` double DEFAULT NULL,
  `NEW_CIN` varchar(21) DEFAULT NULL,
  `comp_email_addr` varchar(315) DEFAULT NULL,
  `companyname` varchar(480) DEFAULT NULL,
  `ROC_CODE` varchar(120) DEFAULT NULL,
  `ProvisionID` int(3) DEFAULT NULL,
  `COMPANY_STATUS` varchar(18) DEFAULT NULL,
  `YEAR_RECEIVED` int(11) DEFAULT NULL,
  `yearoffiling` int(11) DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(180) DEFAULT NULL,
  `ROC_NAME` varchar(45) DEFAULT NULL,
  `cfi_number` varchar(45) DEFAULT NULL,
  `SEQ` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_section77_creationofcharge`
--

CREATE TABLE `p_section77_creationofcharge` (
  `CIN` varchar(100) DEFAULT NULL,
  `Secured loans for 2017` varchar(100) DEFAULT NULL,
  `SRN of CHG 1` varchar(100) DEFAULT NULL,
  `Date of SRN of the Form CHG 1` varchar(100) DEFAULT NULL,
  `Date of creation of Charge` varchar(100) DEFAULT NULL,
  `Days` varchar(10) DEFAULT NULL,
  `Non-convertible debentures` varchar(100) DEFAULT NULL,
  `Partly convertible debentures` varchar(100) DEFAULT NULL,
  `Fully convertible debentures` varchar(100) DEFAULT NULL,
  `Unsecured Debentures` varchar(100) DEFAULT NULL,
  `Provision_Exception` varchar(100) DEFAULT NULL,
  `Alert` varchar(100) DEFAULT NULL,
  `Form` varchar(150) DEFAULT NULL,
  `Field` varchar(250) DEFAULT NULL,
  `YearOfFiling` int(11) DEFAULT NULL,
  `Companyname` varchar(480) DEFAULT NULL,
  `SEQ` decimal(20,0) DEFAULT NULL,
  `Turnover` decimal(20,2) DEFAULT NULL,
  `PUC` decimal(20,2) DEFAULT NULL,
  `NET_WORTH` decimal(20,2) DEFAULT NULL,
  `Profit_Before_Tax` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `cfi_number` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `comp_email_addr` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `ROC_CODE` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `ROC_NAME` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `provisionId` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_section77_creationofcharge_prod_26_5_2020`
--

CREATE TABLE `p_section77_creationofcharge_prod_26_5_2020` (
  `CIN` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Secured loans for 2017` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `SRN of CHG 1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Date of SRN of the Form CHG 1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Date of creation of Charge` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Days` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Non-convertible debentures` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Partly convertible debentures` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Fully convertible debentures` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Unsecured Debentures` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Provision_Exception` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Alert` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Form` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `Field` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `YearOfFiling` int(11) DEFAULT NULL,
  `Companyname` varchar(480) CHARACTER SET latin1 DEFAULT NULL,
  `SEQ` decimal(20,0) DEFAULT NULL,
  `Turnover` decimal(20,2) DEFAULT NULL,
  `PUC` decimal(20,2) DEFAULT NULL,
  `NET_WORTH` decimal(20,2) DEFAULT NULL,
  `Profit_Before_Tax` varchar(45) DEFAULT NULL,
  `cfi_number` varchar(400) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `comp_email_addr` varchar(400) DEFAULT NULL,
  `ROC_CODE` varchar(400) DEFAULT NULL,
  `ROC_NAME` varchar(400) DEFAULT NULL,
  `provisionId` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `p_section82_satisfaction_of_charge`
--

CREATE TABLE `p_section82_satisfaction_of_charge` (
  `cin` varchar(21) DEFAULT NULL,
  `company_status_chekc` varchar(16) DEFAULT NULL,
  `Alert` varchar(255) DEFAULT NULL,
  `sec_loan_py` double DEFAULT NULL,
  `sec_loan_cy` double DEFAULT NULL,
  `PUC` double DEFAULT NULL,
  `NET_WORTH` double DEFAULT NULL,
  `Turnover` double DEFAULT NULL,
  `Turnover_cr` double DEFAULT NULL,
  `Form_Name` varchar(64) DEFAULT NULL,
  `FIELD` varchar(255) DEFAULT NULL,
  `new_cin` varchar(4) DEFAULT NULL,
  `comp_email_addr` varchar(315) DEFAULT NULL,
  `companyname` varchar(480) DEFAULT NULL,
  `ROC_CODE` varchar(120) DEFAULT NULL,
  `ProvisionID` int(3) DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(180) DEFAULT NULL,
  `company_status` varchar(18) DEFAULT NULL,
  `YEAR_RECEIVED` int(11) DEFAULT NULL,
  `yearoffiling` int(11) DEFAULT NULL,
  `ROC_NAME` varchar(45) DEFAULT NULL,
  `cfi_number` varchar(45) DEFAULT NULL,
  `SEQ` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_section96_agm`
--

CREATE TABLE `p_section96_agm` (
  `CIN` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `YearOfFiling` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `INCORPORATION_DATE` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `FY_FROM_DATE` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `FY_END_DATE` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `RB_AGM_HELD` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DATE_AGM` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DUE_DATE_AGM` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `RB_AGM_EXTENSION` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DUE_DATE_AGM_2` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `INCORPORATION_DATES` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DIFF_MONTH` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DAYS_DIFF` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DATE_AGM_2016` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DATE_AGM_2017` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DIFF_MONTH_1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DAYS_DIFF_1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DIFF_MONTH_2` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DAYS_DIFF_2` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DIFF_MONTH_3` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `DAYS_DIFF_3` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `EXCEPTION_REASON` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Alert` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Form` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Field` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `Companyname` varchar(480) CHARACTER SET latin1 DEFAULT NULL,
  `SEQ` decimal(20,0) DEFAULT NULL,
  `Turnover` decimal(20,2) DEFAULT NULL,
  `PUC` decimal(20,2) DEFAULT NULL,
  `NET_WORTH` decimal(20,2) DEFAULT NULL,
  `Profit_Before_Tax` decimal(20,2) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `cfi_number` varchar(400) DEFAULT NULL,
  `ROC_NAME` varchar(400) DEFAULT NULL,
  `ROC_CODE` varchar(400) DEFAULT NULL,
  `comp_email_addr` varchar(400) DEFAULT NULL,
  `provisionId` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `p_section168_resignation_of_director`
--

CREATE TABLE `p_section168_resignation_of_director` (
  `CIN` varchar(255) DEFAULT NULL,
  `Alert` varchar(255) DEFAULT NULL,
  `ELR/Fields` varchar(255) DEFAULT NULL,
  `Field No#` varchar(255) DEFAULT NULL,
  `company_status` varchar(255) DEFAULT NULL,
  `ProvisionID` int(11) DEFAULT NULL,
  `Form` varchar(255) DEFAULT NULL,
  `NATURE_OF_CHANGE` varchar(255) DEFAULT NULL,
  `Provision_ID_section` varchar(255) DEFAULT NULL,
  `DATE_APP_CD_CESS` date DEFAULT NULL,
  `DESIGNATION` varchar(255) DEFAULT NULL,
  `DIN_PAN` double DEFAULT NULL,
  `net_worth` double DEFAULT NULL,
  `puc` double DEFAULT NULL,
  `SNo` double DEFAULT NULL,
  `SRN_MGT7` varchar(255) DEFAULT NULL,
  `turnover` double DEFAULT NULL,
  `Yearoffiling` double DEFAULT NULL,
  `KMP_NAME` varchar(255) DEFAULT NULL,
  `comp_email_addr` varchar(315) DEFAULT NULL,
  `companyname` varchar(480) DEFAULT NULL,
  `ROC_CODE` varchar(120) DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(180) DEFAULT NULL,
  `year_received` int(11) DEFAULT NULL,
  `cfi_number` varchar(45) DEFAULT NULL,
  `id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_section204_secretarialaudit_latest`
--

CREATE TABLE `p_section204_secretarialaudit_latest` (
  `CIN` varchar(21) DEFAULT NULL,
  `Companyname` varchar(240) DEFAULT NULL,
  `YearOfFiling` int(11) DEFAULT NULL,
  `SecretarialAuditReport` varchar(5000) DEFAULT NULL,
  `RB_SHARE_LISTED` varchar(1024) DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(1024) DEFAULT NULL,
  `Company_status` varchar(18) DEFAULT NULL,
  `Fields` varchar(5000) DEFAULT NULL,
  `Form_Name` varchar(5000) DEFAULT NULL,
  `TURNOVER` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `PUC` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Form_Name_source` varchar(10) DEFAULT NULL,
  `TOT_AMT_ES_P_CAP` double DEFAULT NULL,
  `TOT_AMT_PS_P_CAP` double DEFAULT NULL,
  `SEQ` decimal(20,0) DEFAULT NULL,
  `Alert` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `NET_WORTH` double DEFAULT NULL,
  `Profit_Before_Tax` double DEFAULT NULL,
  `ROC_CODE` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `ROC_NAME` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `comp_email_addr` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `cfi_number` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `company_sub_catogery` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `provisionId` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_section204_secretarialaudit_latest_prod_20_05_2020`
--

CREATE TABLE `p_section204_secretarialaudit_latest_prod_20_05_2020` (
  `CIN` varchar(21) CHARACTER SET latin1 DEFAULT NULL,
  `Companyname` varchar(240) CHARACTER SET latin1 DEFAULT NULL,
  `YearOfFiling` int(11) DEFAULT NULL,
  `SecretarialAuditReport` varchar(5000) CHARACTER SET latin1 DEFAULT NULL,
  `RB_SHARE_LISTED` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `Company_status` varchar(18) CHARACTER SET latin1 DEFAULT NULL,
  `Fields` varchar(5000) CHARACTER SET latin1 DEFAULT NULL,
  `Form_Name` varchar(5000) CHARACTER SET latin1 DEFAULT NULL,
  `TURNOVER` varchar(50) DEFAULT NULL,
  `PUC` varchar(50) DEFAULT NULL,
  `Form_Name_source` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `TOT_AMT_ES_P_CAP` double DEFAULT NULL,
  `TOT_AMT_PS_P_CAP` double DEFAULT NULL,
  `SEQ` decimal(20,0) DEFAULT NULL,
  `Alert` varchar(45) DEFAULT NULL,
  `NET_WORTH` double DEFAULT NULL,
  `Profit_Before_Tax` double DEFAULT NULL,
  `ROC_CODE` varchar(128) DEFAULT NULL,
  `ROC_NAME` varchar(128) DEFAULT NULL,
  `comp_email_addr` varchar(400) DEFAULT NULL,
  `cfi_number` varchar(800) DEFAULT NULL,
  `company_sub_catogery` varchar(400) DEFAULT NULL,
  `provisionId` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `p_section204_secretarialaudit_latest_prod_26_5_2020`
--

CREATE TABLE `p_section204_secretarialaudit_latest_prod_26_5_2020` (
  `CIN` varchar(21) CHARACTER SET latin1 DEFAULT NULL,
  `Companyname` varchar(240) CHARACTER SET latin1 DEFAULT NULL,
  `YearOfFiling` int(11) DEFAULT NULL,
  `SecretarialAuditReport` varchar(5000) CHARACTER SET latin1 DEFAULT NULL,
  `RB_SHARE_LISTED` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `TYPE_OF_COMPANY` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `Company_status` varchar(18) CHARACTER SET latin1 DEFAULT NULL,
  `Fields` varchar(5000) CHARACTER SET latin1 DEFAULT NULL,
  `Form_Name` varchar(5000) CHARACTER SET latin1 DEFAULT NULL,
  `TURNOVER` varchar(50) DEFAULT NULL,
  `PUC` varchar(50) DEFAULT NULL,
  `Form_Name_source` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `TOT_AMT_ES_P_CAP` double DEFAULT NULL,
  `TOT_AMT_PS_P_CAP` double DEFAULT NULL,
  `SEQ` decimal(20,0) DEFAULT NULL,
  `Alert` varchar(45) DEFAULT NULL,
  `NET_WORTH` double DEFAULT NULL,
  `Profit_Before_Tax` double DEFAULT NULL,
  `ROC_CODE` varchar(128) DEFAULT NULL,
  `ROC_NAME` varchar(128) DEFAULT NULL,
  `comp_email_addr` varchar(400) DEFAULT NULL,
  `cfi_number` varchar(800) DEFAULT NULL,
  `company_sub_catogery` varchar(400) DEFAULT NULL,
  `provisionId` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `replies_section77_loan_details`
--

CREATE TABLE `replies_section77_loan_details` (
  `id` int(11) NOT NULL,
  `loanAmount` varchar(45) NOT NULL,
  `nameOfChargeHolder` varchar(45) NOT NULL,
  `srnOfFilingOfCharge` varchar(45) NOT NULL,
  `remarksOnNonFiling` varchar(45) DEFAULT NULL,
  `cmsRefNum` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `yearOfFilling` varchar(45) NOT NULL,
  `cfiNum` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `RID` int(10) DEFAULT NULL,
  `ROLE_NAME` varchar(50) DEFAULT NULL,
  `ROLE_PID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions_details`
--

CREATE TABLE `role_permissions_details` (
  `PID` int(5) DEFAULT NULL,
  `ROLE_PERMISSION_NAME` varchar(100) DEFAULT NULL,
  `READ_PERMISSION` tinyint(1) DEFAULT NULL,
  `UPDATE_PERMISSION` tinyint(1) DEFAULT NULL,
  `DELETE_PERMISSION` tinyint(1) DEFAULT NULL,
  `BULKMAIL_SEND_PERMISSION` tinyint(1) DEFAULT NULL,
  `MAIL_SEND_PERMISSION` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_director_min_max_data`
--

CREATE TABLE `table_director_min_max_data` (
  `Company Name` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `Company Status` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `listing Status` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `ROC` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `Company Sub-Category` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `Company Type` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `Company Industrial Classification` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `Company Class` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `CIN` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `Year of filing` int(11) DEFAULT NULL,
  `Total Executive Directors at Beginning of Year` int(11) DEFAULT NULL,
  `Total Non-Executive Directors Beginning of Year` int(11) DEFAULT NULL,
  `total_director_year_beginning` int(16) DEFAULT NULL,
  `comp_code_year_beginning` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `Total Executive Directors End of Year` int(11) DEFAULT NULL,
  `Total Non-Executive Directors End of Year` int(11) DEFAULT NULL,
  `total_director_year_end` int(16) DEFAULT NULL,
  `comp_code_year_end` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `comp_code_year_beg_rul2` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `comp_code_year_end_rul2` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `ID` int(11) NOT NULL DEFAULT '0',
  `roc_code` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `CFI_number` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `mail_update` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `email_company` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `deptId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tble_director_email_sent`
--

CREATE TABLE `tble_director_email_sent` (
  `tblid` int(11) NOT NULL,
  `CIN` varchar(21) CHARACTER SET latin1 DEFAULT NULL,
  `Yearoffiling` varchar(100) DEFAULT NULL,
  `SNo` int(11) DEFAULT NULL,
  `Name` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `DIN_PAN` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `Designation` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `EMAIL_ADDR` varchar(315) CHARACTER SET latin1 DEFAULT NULL,
  `PAN` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `DIN` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `id` int(11) NOT NULL DEFAULT '0',
  `Companyname` varchar(240) CHARACTER SET latin1 DEFAULT NULL,
  `Alert` varchar(45) DEFAULT NULL,
  `dir_cfi` varchar(128) DEFAULT NULL,
  `provision_id` varchar(45) DEFAULT NULL,
  `ROC_CODE` varchar(45) DEFAULT NULL,
  `company_address` varchar(1000) DEFAULT NULL,
  `designation_domain` varchar(128) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tble_director_meta_data`
--

CREATE TABLE `tble_director_meta_data` (
  `master_designation` varchar(128) DEFAULT NULL,
  `designation_domain` varchar(264) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tble_email_sent`
--

CREATE TABLE `tble_email_sent` (
  `reff_num` varchar(64) NOT NULL,
  `emai_id_recepient` varchar(400) CHARACTER SET latin1 NOT NULL,
  `subject` varchar(4000) CHARACTER SET latin1 DEFAULT NULL,
  `company_name` varchar(400) CHARACTER SET latin1 NOT NULL,
  `cin` varchar(255) CHARACTER SET latin1 NOT NULL,
  `uID` int(11) NOT NULL,
  `deptId` int(11) NOT NULL,
  `cfi_number` varchar(45) NOT NULL,
  `Alert` varchar(400) NOT NULL,
  `id` int(11) NOT NULL,
  `YearOfFilling` varchar(45) NOT NULL,
  `catId` int(11) NOT NULL,
  `provisionId` varchar(45) NOT NULL,
  `companyId` int(15) NOT NULL,
  `isEmailSent` int(1) NOT NULL DEFAULT '0',
  `mailSentTime` datetime DEFAULT NULL,
  `rocCode` varchar(45) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `mail_data` varchar(9000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tble_inspector_details`
--

CREATE TABLE `tble_inspector_details` (
  `uID` int(11) NOT NULL DEFAULT '0',
  `rocName` varchar(255) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `rdName` varchar(255) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `rocID` int(11) DEFAULT NULL,
  `rdID` int(11) DEFAULT NULL,
  `lastUpdatedDate` date DEFAULT NULL,
  `firstName` varchar(250) DEFAULT NULL,
  `lastName` varchar(250) DEFAULT NULL,
  `middleName` varchar(250) DEFAULT NULL,
  `rocCode` varchar(12) DEFAULT NULL,
  `rocEmail` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tble_inspector_details_prod_20_05_2020`
--

CREATE TABLE `tble_inspector_details_prod_20_05_2020` (
  `uID` int(11) NOT NULL,
  `rocName` varchar(255) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `rdName` varchar(255) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `rocID` int(11) DEFAULT NULL,
  `rdID` int(11) DEFAULT NULL,
  `lastUpdatedDate` date DEFAULT NULL,
  `firstName` varchar(250) DEFAULT NULL,
  `lastName` varchar(250) DEFAULT NULL,
  `middleName` varchar(250) DEFAULT NULL,
  `rocCode` varchar(12) DEFAULT NULL,
  `rocEmail` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tble_mov_meta_data`
--

CREATE TABLE `tble_mov_meta_data` (
  `sno` int(2) NOT NULL,
  `current_status` int(2) DEFAULT NULL,
  `dept_ID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tble_notesheet_set`
--

CREATE TABLE `tble_notesheet_set` (
  `id` int(11) NOT NULL,
  `cin` varchar(21) CHARACTER SET utf8 NOT NULL,
  `cfi_number` varchar(255) DEFAULT NULL,
  `remark` varchar(4000) CHARACTER SET utf8 DEFAULT NULL,
  `remarktime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `file1Path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `file2Path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `officer_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `companyName` varchar(450) CHARACTER SET utf8 DEFAULT NULL,
  `roc_code` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `provision_Id` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `yearOfFiling` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `file_status` int(4) DEFAULT '0',
  `uid` int(10) DEFAULT NULL,
  `category_id` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tble_provision_master_final_set`
--

CREATE TABLE `tble_provision_master_final_set` (
  `id` int(11) NOT NULL DEFAULT '0',
  `CIN` varchar(100) NOT NULL,
  `Companyname` varchar(480) DEFAULT NULL,
  `YearOfFiling` varchar(20) DEFAULT NULL,
  `Alert` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `comp_email_addr` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `cfi_number` varchar(65) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `provision_id` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `current_status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tble_provision_master_final_set_1`
--

CREATE TABLE `tble_provision_master_final_set_1` (
  `id` int(11) NOT NULL,
  `CIN` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Companyname` varchar(480) CHARACTER SET latin1 DEFAULT NULL,
  `YearOfFiling` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `Alert` varchar(100) DEFAULT NULL,
  `comp_email_addr` varchar(400) DEFAULT NULL,
  `cfi_number` text,
  `address` varchar(1000) DEFAULT NULL,
  `provision_id` varchar(40) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tble_provision_master_final_set_prod_20_05_2020`
--

CREATE TABLE `tble_provision_master_final_set_prod_20_05_2020` (
  `id` int(11) NOT NULL DEFAULT '0',
  `CIN` varchar(100) NOT NULL,
  `Companyname` varchar(480) DEFAULT NULL,
  `YearOfFiling` varchar(20) DEFAULT NULL,
  `Alert` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `comp_email_addr` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `cfi_number` text CHARACTER SET utf8,
  `address` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `provision_id` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tble_provision_master_final_set_prod_26_5_2020`
--

CREATE TABLE `tble_provision_master_final_set_prod_26_5_2020` (
  `id` int(11) NOT NULL DEFAULT '0',
  `CIN` varchar(100) NOT NULL,
  `Companyname` varchar(480) DEFAULT NULL,
  `YearOfFiling` varchar(20) DEFAULT NULL,
  `Alert` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `comp_email_addr` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `cfi_number` text CHARACTER SET utf8,
  `address` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `provision_id` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tble_provision_meta_data`
--

CREATE TABLE `tble_provision_meta_data` (
  `sno` int(2) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tble_roc_name_map`
--

CREATE TABLE `tble_roc_name_map` (
  `roc_code` varchar(210) DEFAULT NULL,
  `roc_name` varchar(210) DEFAULT NULL,
  `rocID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `uID` int(11) NOT NULL,
  `remark` varchar(1000) DEFAULT NULL,
  `remarkTime` datetime DEFAULT NULL,
  `cfi` varchar(255) NOT NULL,
  `officer_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_data`
--

CREATE TABLE `tbl_form_data` (
  `id` int(11) NOT NULL,
  `cin` varchar(45) DEFAULT NULL,
  `provisionid` varchar(45) DEFAULT NULL,
  `path` varchar(1000) DEFAULT NULL,
  `formname` varchar(1000) DEFAULT NULL,
  `yearoffilling` varchar(45) DEFAULT NULL,
  `formtype` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `firstName` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleName` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `depID` int(11) DEFAULT NULL,
  `locID` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `isEmailVerified` tinyint(2) NOT NULL DEFAULT '0',
  `activatedDateTime` datetime DEFAULT NULL,
  `deactivatedDateTime` datetime DEFAULT NULL,
  `catName` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reportingUserID` int(11) DEFAULT NULL,
  `roleId` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_info_view`
-- (See below for the actual view)
--
CREATE TABLE `user_info_view` (
`uid` int(11)
,`firstName` varchar(255)
,`middleName` varchar(255)
,`lastName` varchar(255)
,`emailID` varchar(255)
,`dept_name` varchar(255)
,`catName` varchar(255)
,`location_name` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_module_map`
--

CREATE TABLE `user_module_map` (
  `uID` int(10) NOT NULL,
  `mID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_module_map_1`
--

CREATE TABLE `user_module_map_1` (
  `uID` int(10) NOT NULL,
  `mID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_module_map_prod_20_05_2020`
--

CREATE TABLE `user_module_map_prod_20_05_2020` (
  `uID` int(10) NOT NULL,
  `mID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_module_map_prod_26_5_2020`
--

CREATE TABLE `user_module_map_prod_26_5_2020` (
  `uID` int(10) NOT NULL,
  `mID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `ID` bigint(20) NOT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  `ROLE_ID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `valid_token_log`
--

CREATE TABLE `valid_token_log` (
  `uID` int(11) NOT NULL,
  `emailID` varchar(150) NOT NULL,
  `encryptedToken` varchar(500) DEFAULT NULL,
  `isValidStatus` tinyint(4) DEFAULT NULL,
  `loginDate` date DEFAULT NULL,
  `logoutDate` date DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  `lastupdateDate` date DEFAULT NULL,
  `fakeEncryptedToken` varchar(500) DEFAULT NULL,
  `forcedLogoutDate` date DEFAULT NULL,
  `isForcedLogout` tinyint(4) DEFAULT NULL,
  `forcedLogoutBy` varchar(45) DEFAULT NULL,
  `createdBy` varchar(150) DEFAULT NULL,
  `updatedBy` varchar(150) DEFAULT NULL,
  `ipAddressCaptured` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `v_min_director`
--

CREATE TABLE `v_min_director` (
  `uID` int(11) NOT NULL,
  `CIN` varchar(45) DEFAULT NULL,
  `CID` int(11) DEFAULT NULL,
  `company_class` varchar(45) DEFAULT NULL,
  `total_director_begin` int(11) DEFAULT NULL,
  `total_director_end` int(11) DEFAULT NULL,
  `violationYear` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_prov_204`
-- (See below for the actual view)
--
CREATE TABLE `v_prov_204` (
`Turnover` varchar(50)
,`Puc` varchar(50)
,`form` varchar(5000)
,`field` varchar(5000)
,`Alert` varchar(45)
,`CIN` varchar(21)
,`YearOfFiling` int(11)
,`CompanyName` varchar(240)
);

-- --------------------------------------------------------

--
-- Table structure for table `_tble_email_sent`
--

CREATE TABLE `_tble_email_sent` (
  `CIN` varchar(25) DEFAULT NULL,
  `CFI_number` varchar(32) DEFAULT NULL,
  `ins_email_id` varchar(400) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `status_mail` varchar(45) DEFAULT NULL,
  `comp_email_id` varchar(100) DEFAULT NULL,
  `compname` varchar(1000) DEFAULT NULL,
  `roc_name` varchar(128) DEFAULT NULL,
  `rd_name` varchar(45) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `email_body` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `user_info_view`
--
DROP TABLE IF EXISTS `user_info_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cms_user`@`%` SQL SECURITY DEFINER VIEW `user_info_view`  AS  select `mu`.`uID` AS `uid`,`mu`.`firstName` AS `firstName`,`mu`.`middleName` AS `middleName`,`mu`.`lastName` AS `lastName`,`mu`.`emailID` AS `emailID`,`dd`.`dept_name` AS `dept_name`,`dc`.`catName` AS `catName`,`dl`.`location_name` AS `location_name` from (((`master_users` `mu` join `desc_dept` `dd`) join `desc_category` `dc`) join `desc_location` `dl`) where ((`mu`.`depID` = `dd`.`depID`) and (`mu`.`catID` = `dc`.`catID`) and (`mu`.`locID` = `dl`.`uID`)) order by `mu`.`uID` ;

-- --------------------------------------------------------

--
-- Structure for view `v_prov_204`
--
DROP TABLE IF EXISTS `v_prov_204`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_prov_204`  AS  select `a`.`TURNOVER` AS `Turnover`,`a`.`PUC` AS `Puc`,`a`.`Form_Name` AS `form`,`a`.`Fields` AS `field`,`a`.`Alert` AS `Alert`,`a`.`CIN` AS `CIN`,`a`.`YearOfFiling` AS `YearOfFiling`,`a`.`Companyname` AS `CompanyName` from `p_section204_secretarialaudit_latest` `a` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_max_director`
--
ALTER TABLE `a_max_director`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `Compnany Unique ID_idx` (`CID`);

--
-- Indexes for table `category_module_map`
--
ALTER TABLE `category_module_map`
  ADD KEY `catID_idx` (`catID`),
  ADD KEY `mID_idx` (`mID`);

--
-- Indexes for table `chatter_categories`
--
ALTER TABLE `chatter_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatter_discussion`
--
ALTER TABLE `chatter_discussion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chatter_discussion_slug_unique` (`slug`),
  ADD KEY `chatter_discussion_chatter_category_id_foreign` (`chatter_category_id`),
  ADD KEY `chatter_discussion_user_id_foreign` (`user_id`);

--
-- Indexes for table `chatter_post`
--
ALTER TABLE `chatter_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chatter_post_chatter_discussion_id_foreign` (`chatter_discussion_id`),
  ADD KEY `chatter_post_user_id_foreign` (`user_id`);

--
-- Indexes for table `chatter_user_discussion`
--
ALTER TABLE `chatter_user_discussion`
  ADD PRIMARY KEY (`user_id`,`discussion_id`),
  ADD KEY `chatter_user_discussion_user_id_index` (`user_id`),
  ADD KEY `chatter_user_discussion_discussion_id_index` (`discussion_id`);

--
-- Indexes for table `cin_map_director`
--
ALTER TABLE `cin_map_director`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `index2` (`din_pan`,`ID`),
  ADD KEY `index` (`CIN`),
  ADD KEY `cID_dir_idx` (`cID`);

--
-- Indexes for table `cin_map_director_final`
--
ALTER TABLE `cin_map_director_final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`CIN`,`id`),
  ADD KEY `index1` (`DIN`,`PAN`,`DIN_PAN`(767));

--
-- Indexes for table `cin_map_director_final_2018`
--
ALTER TABLE `cin_map_director_final_2018`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ind1` (`CIN`);

--
-- Indexes for table `cin_map_director_final_old`
--
ALTER TABLE `cin_map_director_final_old`
  ADD PRIMARY KEY (`CIN`,`id`),
  ADD KEY `primary_id` (`id`,`CIN`);

--
-- Indexes for table `cms_criteria_table`
--
ALTER TABLE `cms_criteria_table`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Index` (`MGT7_CIN`,`Profit_Before_Tax`,`ID`);

--
-- Indexes for table `cms_otp`
--
ALTER TABLE `cms_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `count_violation`
--
ALTER TABLE `count_violation`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `csr_applicable_1_1`
--
ALTER TABLE `csr_applicable_1_1`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `index1` (`CIN`,`ID`),
  ADD KEY `cID_idx` (`cID`),
  ADD KEY `users ID_idx` (`officerID`);

--
-- Indexes for table `desc_category`
--
ALTER TABLE `desc_category`
  ADD PRIMARY KEY (`catID`),
  ADD KEY `catName` (`catName`),
  ADD KEY `fk_deptID_idx` (`fk_deptID`),
  ADD KEY `fk_locID_idx` (`fk_locID`);

--
-- Indexes for table `desc_dept`
--
ALTER TABLE `desc_dept`
  ADD PRIMARY KEY (`depID`),
  ADD KEY `deptName` (`dept_name`);

--
-- Indexes for table `desc_location`
--
ALTER TABLE `desc_location`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `location` (`location_name`),
  ADD KEY `fk_deptID_idx` (`fk_deptID`);

--
-- Indexes for table `desc_module_1`
--
ALTER TABLE `desc_module_1`
  ADD PRIMARY KEY (`mID`),
  ADD UNIQUE KEY `moduleName_UNIQUE` (`moduleName`);

--
-- Indexes for table `desc_rd`
--
ALTER TABLE `desc_rd`
  ADD PRIMARY KEY (`uID`);

--
-- Indexes for table `desc_roc`
--
ALTER TABLE `desc_roc`
  ADD PRIMARY KEY (`uID`);

--
-- Indexes for table `desc_violation_1`
--
ALTER TABLE `desc_violation_1`
  ADD PRIMARY KEY (`violationID`),
  ADD KEY `dpt_idx` (`deptID`),
  ADD KEY `VID` (`parentID`);

--
-- Indexes for table `email_data`
--
ALTER TABLE `email_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reffNum` (`reff_num`),
  ADD KEY `user Id_idx` (`userID`),
  ADD KEY `cID_idx` (`cuid`),
  ADD KEY `dept Id_idx` (`dept_id`);

--
-- Indexes for table `mailverification`
--
ALTER TABLE `mailverification`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `mailID_UNIQUE` (`mailID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `map_cat_loc`
--
ALTER TABLE `map_cat_loc`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `desig_id_idx` (`catID`),
  ADD KEY `dept_id_idx` (`depID`),
  ADD KEY `loc_id_idx` (`locID`),
  ADD KEY `catName_map_idx` (`cat_name`),
  ADD KEY `locName_mapping_idx` (`loc_name`),
  ADD KEY `deptName_mapping_idx` (`department_name`),
  ADD KEY `reportingID_idx` (`reportingCatID`);

--
-- Indexes for table `map_dept_work_location`
--
ALTER TABLE `map_dept_work_location`
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `work_location_id` (`work_location_id`);

--
-- Indexes for table `map_notice`
--
ALTER TABLE `map_notice`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `officerID1_idx` (`officerID`),
  ADD KEY `cid2_idx` (`cID`),
  ADD KEY `depID2_idx` (`deptID`);

--
-- Indexes for table `map_notice_num`
--
ALTER TABLE `map_notice_num`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `noticeID_idx` (`noticeID`);

--
-- Indexes for table `map_rd_roc`
--
ALTER TABLE `map_rd_roc`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `ROC_idx` (`rocID`),
  ADD KEY `ROC_M_idx` (`rocID`),
  ADD KEY `RD_M_idx` (`rdID`);

--
-- Indexes for table `map_reporting`
--
ALTER TABLE `map_reporting`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `desig_reporting_idx` (`catID`),
  ADD KEY `reporting_reporting_idx` (`reportingID`),
  ADD KEY `dept_reporting_idx` (`deptID`),
  ADD KEY `loc_reporting_idx` (`locID`);

--
-- Indexes for table `map_violation`
--
ALTER TABLE `map_violation`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `vid_map_idx` (`violationID`),
  ADD KEY `CUID` (`cuid`),
  ADD KEY `depID3_idx` (`deptID`);

--
-- Indexes for table `map_violation_attributes`
--
ALTER TABLE `map_violation_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_companies_distinct`
--
ALTER TABLE `master_companies_distinct`
  ADD KEY `primary1` (`CIN`,`ID`);

--
-- Indexes for table `master_companies_distinct_all`
--
ALTER TABLE `master_companies_distinct_all`
  ADD PRIMARY KEY (`SEQ`),
  ADD KEY `i` (`CIN`),
  ADD KEY `CMS_dash` (`CIN`,`COMPANY_STATUS`,`ROC_NAME`,`compname`(255));

--
-- Indexes for table `master_companies_distinct_prod_20_05_2020`
--
ALTER TABLE `master_companies_distinct_prod_20_05_2020`
  ADD PRIMARY KEY (`CIN`);

--
-- Indexes for table `master_companies_distinct_prod_26_5_2020`
--
ALTER TABLE `master_companies_distinct_prod_26_5_2020`
  ADD PRIMARY KEY (`CIN`);

--
-- Indexes for table `master_composite_mailing`
--
ALTER TABLE `master_composite_mailing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_users_prod_20_05_2020`
--
ALTER TABLE `master_users_prod_20_05_2020`
  ADD UNIQUE KEY `emailID_UNIQUE` (`emailID`),
  ADD KEY `EmailID` (`emailID`),
  ADD KEY `desig_user_idx` (`catID`),
  ADD KEY `dep_user_idx` (`depID`),
  ADD KEY `locName_User_idx` (`location_name`),
  ADD KEY `desigName_user_idx` (`catName`),
  ADD KEY `depName_user_idx` (`department_name`),
  ADD KEY `id` (`uID`),
  ADD KEY `reporting_userID_idx` (`reportingUserID`),
  ADD KEY `roleID_idx` (`roleId`);

--
-- Indexes for table `master_v2_2018`
--
ALTER TABLE `master_v2_2018`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `name` (`CompanyName`),
  ADD KEY `CUID` (`CompanyCUID`),
  ADD KEY `srch` (`CIN`,`CompanyName`,`uID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_section77_creationofcharge_prod_26_5_2020`
--
ALTER TABLE `p_section77_creationofcharge_prod_26_5_2020`
  ADD KEY `index` (`CIN`),
  ADD KEY `pk` (`CIN`);

--
-- Indexes for table `p_section96_agm`
--
ALTER TABLE `p_section96_agm`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `index` (`CIN`,`ID`),
  ADD KEY `cfi_number_index` (`cfi_number`(255));

--
-- Indexes for table `p_section204_secretarialaudit_latest_prod_20_05_2020`
--
ALTER TABLE `p_section204_secretarialaudit_latest_prod_20_05_2020`
  ADD KEY `cfi_number` (`cfi_number`(255));

--
-- Indexes for table `p_section204_secretarialaudit_latest_prod_26_5_2020`
--
ALTER TABLE `p_section204_secretarialaudit_latest_prod_26_5_2020`
  ADD KEY `cfi_number` (`cfi_number`(255));

--
-- Indexes for table `replies_section77_loan_details`
--
ALTER TABLE `replies_section77_loan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmsRefNum_idx` (`cmsRefNum`),
  ADD KEY `cfiNum_idx` (`cfiNum`);

--
-- Indexes for table `tble_director_email_sent`
--
ALTER TABLE `tble_director_email_sent`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `tble_email_sent`
--
ALTER TABLE `tble_email_sent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index2` (`cin`,`id`),
  ADD KEY `companyId_idx` (`companyId`);

--
-- Indexes for table `tble_inspector_details_prod_20_05_2020`
--
ALTER TABLE `tble_inspector_details_prod_20_05_2020`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `RD_idx` (`rdID`),
  ADD KEY `ROC_idx` (`rocID`),
  ADD KEY `DEPT_idx` (`deptID`);

--
-- Indexes for table `tble_notesheet_set`
--
ALTER TABLE `tble_notesheet_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tble_provision_master_final_set_1`
--
ALTER TABLE `tble_provision_master_final_set_1`
  ADD PRIMARY KEY (`id`,`CIN`);

--
-- Indexes for table `tble_provision_meta_data`
--
ALTER TABLE `tble_provision_meta_data`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `cID4_idx` (`cfi`);

--
-- Indexes for table `tbl_form_data`
--
ALTER TABLE `tbl_form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_module_map_1`
--
ALTER TABLE `user_module_map_1`
  ADD PRIMARY KEY (`uID`,`mID`),
  ADD KEY `mID` (`mID`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `valid_token_log`
--
ALTER TABLE `valid_token_log`
  ADD PRIMARY KEY (`uID`);

--
-- Indexes for table `v_min_director`
--
ALTER TABLE `v_min_director`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `Company ID_idx` (`CID`);

--
-- Indexes for table `_tble_email_sent`
--
ALTER TABLE `_tble_email_sent`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_max_director`
--
ALTER TABLE `a_max_director`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatter_categories`
--
ALTER TABLE `chatter_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatter_discussion`
--
ALTER TABLE `chatter_discussion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatter_post`
--
ALTER TABLE `chatter_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cin_map_director`
--
ALTER TABLE `cin_map_director`
  MODIFY `ID` int(36) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cin_map_director_final`
--
ALTER TABLE `cin_map_director_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cin_map_director_final_2018`
--
ALTER TABLE `cin_map_director_final_2018`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_criteria_table`
--
ALTER TABLE `cms_criteria_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_otp`
--
ALTER TABLE `cms_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `csr_applicable_1_1`
--
ALTER TABLE `csr_applicable_1_1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desc_category`
--
ALTER TABLE `desc_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desc_location`
--
ALTER TABLE `desc_location`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desc_module_1`
--
ALTER TABLE `desc_module_1`
  MODIFY `mID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desc_violation_1`
--
ALTER TABLE `desc_violation_1`
  MODIFY `violationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_data`
--
ALTER TABLE `email_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailverification`
--
ALTER TABLE `mailverification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_cat_loc`
--
ALTER TABLE `map_cat_loc`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_notice`
--
ALTER TABLE `map_notice`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_notice_num`
--
ALTER TABLE `map_notice_num`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_rd_roc`
--
ALTER TABLE `map_rd_roc`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_reporting`
--
ALTER TABLE `map_reporting`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_violation`
--
ALTER TABLE `map_violation`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_violation_attributes`
--
ALTER TABLE `map_violation_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_composite_mailing`
--
ALTER TABLE `master_composite_mailing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_users_prod_20_05_2020`
--
ALTER TABLE `master_users_prod_20_05_2020`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_v2_2018`
--
ALTER TABLE `master_v2_2018`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_section96_agm`
--
ALTER TABLE `p_section96_agm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies_section77_loan_details`
--
ALTER TABLE `replies_section77_loan_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tble_director_email_sent`
--
ALTER TABLE `tble_director_email_sent`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tble_email_sent`
--
ALTER TABLE `tble_email_sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tble_inspector_details_prod_20_05_2020`
--
ALTER TABLE `tble_inspector_details_prod_20_05_2020`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tble_notesheet_set`
--
ALTER TABLE `tble_notesheet_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tble_provision_master_final_set_1`
--
ALTER TABLE `tble_provision_master_final_set_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_data`
--
ALTER TABLE `tbl_form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `valid_token_log`
--
ALTER TABLE `valid_token_log`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_min_director`
--
ALTER TABLE `v_min_director`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_tble_email_sent`
--
ALTER TABLE `_tble_email_sent`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `a_max_director`
--
ALTER TABLE `a_max_director`
  ADD CONSTRAINT `Compnany Unique ID` FOREIGN KEY (`CID`) REFERENCES `master_v2_2018` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `category_module_map`
--
ALTER TABLE `category_module_map`
  ADD CONSTRAINT `catID` FOREIGN KEY (`catID`) REFERENCES `desc_category` (`catID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mID` FOREIGN KEY (`mID`) REFERENCES `desc_module_1` (`mID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chatter_discussion`
--
ALTER TABLE `chatter_discussion`
  ADD CONSTRAINT `chatter_discussion_chatter_category_id_foreign` FOREIGN KEY (`chatter_category_id`) REFERENCES `chatter_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chatter_discussion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chatter_post`
--
ALTER TABLE `chatter_post`
  ADD CONSTRAINT `chatter_post_chatter_discussion_id_foreign` FOREIGN KEY (`chatter_discussion_id`) REFERENCES `chatter_discussion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chatter_post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chatter_user_discussion`
--
ALTER TABLE `chatter_user_discussion`
  ADD CONSTRAINT `chatter_user_discussion_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `chatter_discussion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chatter_user_discussion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cin_map_director`
--
ALTER TABLE `cin_map_director`
  ADD CONSTRAINT `cID_dir` FOREIGN KEY (`cID`) REFERENCES `master_v2_2018` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `csr_applicable_1_1`
--
ALTER TABLE `csr_applicable_1_1`
  ADD CONSTRAINT `cID_CSR` FOREIGN KEY (`cID`) REFERENCES `master_v2_2018` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `users ID` FOREIGN KEY (`officerID`) REFERENCES `master_users_prod_26_5_2020` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `desc_category`
--
ALTER TABLE `desc_category`
  ADD CONSTRAINT `fk_depID` FOREIGN KEY (`fk_deptID`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_locID` FOREIGN KEY (`fk_locID`) REFERENCES `desc_location` (`uID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `desc_location`
--
ALTER TABLE `desc_location`
  ADD CONSTRAINT `fk_deptID` FOREIGN KEY (`fk_deptID`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `desc_violation_1`
--
ALTER TABLE `desc_violation_1`
  ADD CONSTRAINT `VID_int` FOREIGN KEY (`parentID`) REFERENCES `desc_violation_1` (`violationID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `dpt` FOREIGN KEY (`deptID`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `email_data`
--
ALTER TABLE `email_data`
  ADD CONSTRAINT `cID` FOREIGN KEY (`cuid`) REFERENCES `master_v2_2018` (`uID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dept Id` FOREIGN KEY (`dept_id`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user Id` FOREIGN KEY (`userID`) REFERENCES `master_users_prod_26_5_2020` (`uID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `map_cat_loc`
--
ALTER TABLE `map_cat_loc`
  ADD CONSTRAINT `catName_mapping` FOREIGN KEY (`cat_name`) REFERENCES `desc_category` (`catName`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `deptName_mapping` FOREIGN KEY (`department_name`) REFERENCES `desc_dept` (`dept_name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `dept_id` FOREIGN KEY (`depID`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `desig_id` FOREIGN KEY (`catID`) REFERENCES `desc_category` (`catID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `locName_mapping` FOREIGN KEY (`loc_name`) REFERENCES `desc_location` (`location_name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `loc_id` FOREIGN KEY (`locID`) REFERENCES `desc_location` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reportingCat` FOREIGN KEY (`reportingCatID`) REFERENCES `desc_category` (`catID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `map_dept_work_location`
--
ALTER TABLE `map_dept_work_location`
  ADD CONSTRAINT `depID1` FOREIGN KEY (`dept_id`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `workLocationID1` FOREIGN KEY (`work_location_id`) REFERENCES `desc_location` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `map_notice`
--
ALTER TABLE `map_notice`
  ADD CONSTRAINT `cid2` FOREIGN KEY (`cID`) REFERENCES `master_v2_2018` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `depID2` FOREIGN KEY (`deptID`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `officerID1` FOREIGN KEY (`officerID`) REFERENCES `master_users_prod_26_5_2020` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `map_notice_num`
--
ALTER TABLE `map_notice_num`
  ADD CONSTRAINT `noticeID` FOREIGN KEY (`noticeID`) REFERENCES `map_notice` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `map_rd_roc`
--
ALTER TABLE `map_rd_roc`
  ADD CONSTRAINT `RD_M` FOREIGN KEY (`rdID`) REFERENCES `desc_rd` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ROC_M` FOREIGN KEY (`rocID`) REFERENCES `desc_roc` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `map_reporting`
--
ALTER TABLE `map_reporting`
  ADD CONSTRAINT `dept_reporting` FOREIGN KEY (`deptID`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `desig_reporting` FOREIGN KEY (`catID`) REFERENCES `desc_category` (`catID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `loc_reporting` FOREIGN KEY (`locID`) REFERENCES `desc_location` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `report_reporting` FOREIGN KEY (`reportingID`) REFERENCES `desc_category` (`catID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `map_violation`
--
ALTER TABLE `map_violation`
  ADD CONSTRAINT `cid3` FOREIGN KEY (`cuid`) REFERENCES `master_v2_2018` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `depID3` FOREIGN KEY (`deptID`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `vid_map` FOREIGN KEY (`violationID`) REFERENCES `desc_violation_1` (`violationID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `master_users_prod_20_05_2020`
--
ALTER TABLE `master_users_prod_20_05_2020`
  ADD CONSTRAINT `catName_user` FOREIGN KEY (`catName`) REFERENCES `desc_category` (`catName`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `depName` FOREIGN KEY (`department_name`) REFERENCES `desc_dept` (`dept_name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `desig_user` FOREIGN KEY (`catID`) REFERENCES `desc_category` (`catID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `loc_name` FOREIGN KEY (`location_name`) REFERENCES `desc_location` (`location_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `replies_section77_loan_details`
--
ALTER TABLE `replies_section77_loan_details`
  ADD CONSTRAINT `cms_ref_num` FOREIGN KEY (`cmsRefNum`) REFERENCES `email_reply` (`reff_num`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tble_inspector_details_prod_20_05_2020`
--
ALTER TABLE `tble_inspector_details_prod_20_05_2020`
  ADD CONSTRAINT `DEPT` FOREIGN KEY (`deptID`) REFERENCES `desc_dept` (`depID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `RD` FOREIGN KEY (`rdID`) REFERENCES `desc_rd` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ROC` FOREIGN KEY (`rocID`) REFERENCES `desc_roc` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user_module_map_1`
--
ALTER TABLE `user_module_map_1`
  ADD CONSTRAINT `user_module_map_1_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `master_users_prod_26_5_2020` (`uID`),
  ADD CONSTRAINT `user_module_map_1_ibfk_2` FOREIGN KEY (`mID`) REFERENCES `desc_module_1` (`mID`);

--
-- Constraints for table `v_min_director`
--
ALTER TABLE `v_min_director`
  ADD CONSTRAINT `Company ID` FOREIGN KEY (`CID`) REFERENCES `master_v2_2018` (`uID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
