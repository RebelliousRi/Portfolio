CREATE DATABASE IF NOT EXISTS StudentInfo;

USE StudentInfo;

CREATE TABLE IF NOT EXISTS Students(

	     SId INT PRIMARY KEY,
		 FName VARCHAR(30),
		 LName VARCHAR(30),
		 Gender VARCHAR(10),
		 DOB DATE,
		 Address VARCHAR(100),
		 PhoneNo VARCHAR(15),
		 Email VARCHAR(60)
		 );
		 
		 
		 CREATE TABLE IF NOT EXISTS Lecturers(
	 
	     LId INT PRIMARY KEY,
		 FName VARCHAR(30),
		 LName VARCHAR(30),
		 Gender VARCHAR(10),
		 DOB DATE,
		 Address VARCHAR(100),
		 Email VARCHAR(60)
		 );
		 
		 CREATE TABLE IF NOT EXISTS Courses(
		 
		 CId INT PRIMARY KEY,
		 CName VARCHAR(100),
		 LId INT,
		 SDate DATE,
		 EDate DATE,
		 Credits INT,
		 MaxEnroll INT,
		 CDescription VARCHAR(500),
		 ExamDate DATE,

		 FOREIGN KEY (LId) REFERENCES Lecturers (LId)
		 );
		 
		 CREATE TABLE IF NOT EXISTS Grades(
		 
		 GId INT PRIMARY KEY,
		 SId INT,
		 CId INT,
		 LId INT,
		 Attendance DECIMAL(3, 2),
		 ExameScore DECIMAL(3, 2),
		 HWPer DECIMAL(3, 2),
		 QuizPer DECIMAL(3, 2),
		 ParticipationPer DECIMAL(3, 2),
		 
		 FOREIGN KEY (SId) REFERENCES Students (SId),
		 FOREIGN KEY (CId) REFERENCES Courses (CId),
		 FOREIGN KEY (LId) REFERENCES Lecturers (LId)
		 );
		 
		 CREATE TABLE IF NOT EXISTS Accounts(
		 PId INT PRIMARY KEY,
		 SId INT,
		 PDate DATE,
		 PAmt DECIMAL(5, 2),
		 PMethod VARCHAR(30),
		 FOREIGN KEY (SId) REFERENCES Students (SId)
		 );
		 
		 INSERT INTO Students (SId, FName, LName, Gender, DOB, Address, PhoneNo, Email)
		 VALUES
		 (6, "Michael", "Johnson", "Male", "2000-01-01", "123 Main St.", "123-456-7890", "mj@mail.com"),
		 (7, "Emily", "Davis", "Female", "2000-01-02", "456 Main St.", "123-456-7890", "ed@mail.com"),
		 (8, "Matthew", "Anderson", "Male", "2000-01-03", "789 Main St.", "123-456-7890", "ma@mail.com"),
		 (9, "Olivia", "Wilson", "Female", "2000-01-04", "111 Main St.", "123-456-7890", "ow@mail.com"),
		 (10, "Ethan", "Moore", "Male", "2000-01-05", "222 Main St.", "123-456-7890", "em@mail.com");