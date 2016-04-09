update property set Notes="Condo" where PropertyID="1";
select * from property;
update tenant set BusinessPhone = "505-888-9310", FaxNumber="505-888-9999" where TenantID="2";
select * from tenant;
update lease set PetDeposit=500, Notes="golden retriever" where LeaseID="1";
select * from lease;