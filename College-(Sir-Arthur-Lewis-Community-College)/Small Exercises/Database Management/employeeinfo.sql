CREATE DATABASE IF NOT EXISTS EmployeeInfo;

USE EmployeeInfo;

CREATE TABLE IF NOT EXISTS Employees(

	     EId INT PRIMARY KEY,
		 FName VARCHAR(30),
		 LName VARCHAR(30),
		 DOB DATE,
		 Address VARCHAR(100),
		 Position VARCHAR(100)
		 );
		 
		 
		 CREATE TABLE IF NOT EXISTS JobHistory(
	 
	     JId INT PRIMARY KEY,
		 EId INT,
		 JName VARCHAR(100),
		 Company VARCHAR(30),
		 Address VARCHAR(100),
		 Duration VARCHAR(60),
		 
		 FOREIGN KEY (EId) REFERENCES Employees (EId)
		 );
		 
		 CREATE TABLE IF NOT EXISTS Salary(
		 
		 SId INT PRIMARY KEY,
		 JId INT,
		 EId INT,
		 Date VARCHAR(10),
		 Salary INT,

		 FOREIGN KEY (JId) REFERENCES JobHistory (JId),
		 FOREIGN KEY (EId) REFERENCES Employees (EId)
		 );
		 
		 CREATE TABLE IF NOT EXISTS Children(
		 
		 CId INT PRIMARY KEY,
		 EId INT,
		 Children INT,
		 CName INT,
		 BYear VARCHAR(10),
		 
		 FOREIGN KEY (EId) REFERENCES Employees (EId)
		 );
		 
		 
		 INSERT INTO Employees (EId, FName, LName, DOB, Address, Position)
		 VALUES
		 (789456, "Kaydee", "James", "1992-09-02", "Odsan", "Datasbase Manager"),
(123654, "John", "Doe", "1985-05-10", "123 Main St, Cityville", "Project Manager"),
(123789, "Jane", "Smith", "1990-08-20", "456 Oak St, Townsville", "Data Scientist"),
(987456, "Mike", "Johnson", "1978-12-03", "789 Pine St, Villagetown", "IT Director"),
(159268, "Sarah", "Brown", "1982-06-25", "101 Elm St, Countyville", "HR Manager");

		 
		 		 INSERT INTO JobHistory (JId, EId, JName, Company, Address, Duration)
		 VALUES
(1, 789456, "Database Administrator", "Customs", "Micoud Street Castries", "2014-2017"),
(2, 789456, "Database Administrator", "Family Court", "Clarke Street Castries", "2018-2022"),
(3, 789456, "Database Administrator", "Family Court", "Clarke Street Castries", "2018-2023"),
(4, 123654, "Software Eng.", "ABC Tech", "456 Tech Lane, City", "2016-2022"),
(5, 123789, "Jr Data Analyst", "XYZ Solutions", "789 Data Blvd, Town", "2010-2014"),
(6, 123789, "Data Analyst", "Data Insights Inc", "790 Data Blvd, Town", "2014-2018"),
(7, 123789, "Data Analyst", "Tech Data Solutions", "791 Data Blvd, Town", "2019-2022"),
(8, 987456, "IT Manager", "Global Innovations", "101 Innovation St", "2021"),
(9, 159268, "HR Specialist", "HR Connect", "202 HR Ave, County", "2022");

		 
		 INSERT INTO Salary (SId, JId, EId, Date, Salary)
		 VALUES
(1, 1, 789456, "2014", 6000),
(2, 2, 789456, "2018", 7500),
(3, 3, 789456, "2022", 8000),
(4, 4, 123654, "2023", 80000),
(5, 5, 123789, "2010", 5000),
(6, 6, 123789, "2014", 6000),
(7, 7, 123789, "2019", 7000),
(8, 8, 987456, "2022", 100000),
(9, 9, 159268, "2023", 75000);

		 INSERT INTO Children (CId, EId, Children, CName, BYear)
		 VALUES
(1, 789456, 0, "null", "null"),
(2, 123654, 2, "Emma", "2010"),
(3, 123654, 2, "Michael", "2015"),
(4, 123789, 0, "null", "null"),
(5, 987456, 3, "Sophie", "2005"),
(6, 987456, 3, "Jack", "2012"),
(7, 987456, 3, "Mia", "2018"),
(8, 159268, 1, "Olivia", "2010");


SELECT `FName`, `LName`, `Position`, children.CName, children.BYear
FROM Employees
LEFT JOIN children ON employees.EId = children.EId
WHERE children.CName is not null;


DELIMETER //

CREATE TRIGGER after_product_insert
AFTER INSERT ON products

FOR EACH ROW 

BEGIN

INSERT INT product_log(product_id, action, log_time)
Values (NEW.product_id, 'New Product Added', NOW())
END;
//
		 