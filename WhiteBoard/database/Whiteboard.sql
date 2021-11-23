DROP DATABASE IF EXISTS Whiteboard;
CREATE DATABASE Whiteboard;
USE Whiteboard;

CREATE TABLE IF NOT EXISTS person (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(1000) NOT NULL,
  local varchar(50) NOT NULL,
  cell varchar(50) NOT NULL,
  status varchar(50) NOT NULL,
  comment varchar(1000) NOT NULL,
  updateDate varchar(50) NOT NULL,
  team varchar(1000) NOT NULL,
  isManager varchar(10) NOT NULL,
  isFieldTech varchar(10) NOT NULL
) Engine=InnoDB;

CREATE TABLE IF NOT EXISTS contact (
  contactID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  contactName varchar(1000) NOT NULL,
  contactLocal varchar(50) NOT NULL,
  contactCell varchar(50) NOT NULL,
  updateDate varchar(50) NOT NULL
) Engine=InnoDB;

CREATE TABLE IF NOT EXISTS shift (
  shiftID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  shiftName varchar(1000) NOT NULL,
  fieldTechName varchar(1000) NOT NULL,
  updateShiftDate varchar(50) NOT NULL
) Engine=InnoDB;

-- Shift Table placeholder (do not delete)
INSERT INTO shift (shiftName, fieldTechName) VALUES
('NW Primary Field Tech', '');
INSERT INTO shift (shiftName, fieldTechName) VALUES
('NW Backup Field Tech', '');
INSERT INTO shift (shiftName, fieldTechName) VALUES
('NW Night Field Tech', '');
INSERT INTO shift (shiftName, fieldTechName) VALUES
('COQ Primary Field Tech', '');
INSERT INTO shift (shiftName, fieldTechName) VALUES
('COQ Backup Field Tech', '');
INSERT INTO shift (shiftName, fieldTechName) VALUES
('COQ Night Field Tech', '');