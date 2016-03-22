DROP database if exists assignment3a;
CREATE database assignment3a;
USE assignment3a;
CREATE table tenant(
  TenantID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  LastName VARCHAR(50) NOT NULL,
  FirstName VARCHAR(50) NOT NULL,
  EmailAddress VARCHAR(50) NOT NULL UNIQUE,
  HomePhone VARCHAR(25) NOT NULL,
  MobilePhone VARCHAR(25) NOT NULL,
  BusinessPhone VARCHAR(25),
  FaxNumber VARCHAR(25),
  Address VARCHAR(255) NOT NULL,
  City VARCHAR(50) NOT NULL,
  State VARCHAR(50) NOT NULL,
  PostalCode VARCHAR(15) NOT NULL,
  Country VARCHAR(50) NOT NULL,
  Company VARCHAR(50),
  JobTitle VARCHAR(50) NOT NULL,
  Notes LONGTEXT,
  INDEX City(City),
  INDEX FirstName(FirstName),
  INDEX LastName(LastName),
  INDEX PostalCode(PostalCode)
);
CREATE table lease(
  LeaseID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  PropertyID INT(11) NOT NULL references property(PropertyID),
  TenantID INT(11) NOT NULL references tenant(TenantID),
  StartDate DATETIME NOT NULL,
  EndDate DATETIME NOT NULL,
  MonthlyLeaseAmount DECIMAL(10,2) NOT NULL,
  PetDeposit DECIMAL(10,2) NOT NULL,
  Notes LONGTEXT
);
CREATE table property(
  PropertyID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Address VARCHAR(255) NOT NULL,
  City VARCHAR(50) NOT NULL,
  State VARCHAR(50) NOT NULL,
  PostalCode VARCHAR(15) NOT NULL,
  SquareFeet FLOAT(9,2) NOT NULL,
  Bedrooms SMALLINT(6) NOT NULL,
  Bathrooms FLOAT(5,2) NOT NULL,
  Garage TINYINT(1) NOT NULL,
  MonthlyMortgage DECIMAL(10,2) NOT NULL,
  HousingDues DECIMAL(10,2) NOT NULL,
  Tax DECIMAL(10,2) NOT NULL,
  Insurance DECIMAL(10,2) NOT NULL,
  DownPayment DECIMAL(10,2) NOT NULL,
  LoanAmount DECIMAL (10,2) NOT NULL,
  AssessedValue DECIMAL(10,2) NOT NULL,
  CurrentValue DECIMAL(10,2) NOT NULL,
  Notes LONGTEXT
);
