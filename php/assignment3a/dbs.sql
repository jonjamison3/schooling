drop table if exists tenant;
drop table if exists lease;
drop table if exists property;
create table tenant(
  TenantID int(11) primary key not null auto_increment,
  LastName varchar(50) not null,
  FirstName varchar(50) not null,
  EmailAddress varchar(50) not null unique,
  HomePhone varchar(25) not null,
  MobilePhone varchar(25) not null,
  BusinessPhone varchar(25) not null,
  FaxNumber varchar(25) not null,
  Address varchar(255) not null,
  City varchar(50) not null,
  State varchar(50) not null,
  PostalCode varchar(15) not null,
  Country varchar(50) not null,
  Company varchar(50) not null,
  JobTitle varchar(50) not null,
  Address varchar(255) not null,
  Notes longtext default null,
  unique index TenantID(TenantID),
  index FirstName(FirstName),
  index LastName(LastName),
  index PostalCode(PostalCode)
);
create table lease(
  LeaseID int(11) not null primary key auto_increment,
  PropertyID int(11) not null,
  TenantID int(11) not null,
  StartDate datetime not null,
  EndDate datetime not null,
  MonthlyLeaseAmount decimal(10,2) not null,
  PetDeposit decimal(10,2) default 0,
  Notes longtext default null,
  index PropertyID(PropertyID),
  index TenantID(TenantID)
);
create table property(
  PropertyID int(11) not null primary key auto_increment,
  Address varchar(255) not null,
  City varchar(50) not null,
);
