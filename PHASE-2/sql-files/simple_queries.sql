-->Retrieve the branchname,branchid and branch_address where city="bangalore"
select bmname,bid,bcity,bmaddress from branch_mgr where bcity='BANGALORE';
-->Retrieve customer with number of bookings
select custid,count(*) from booking group by custid;
-->update staff salary who are in HYDERABAD
update staff set salary=salary+2000 where st_city='HYDERABAD';
-->update staff availabilty to true whose staff_id are st101 and st108
update staff set avail='true' where staff_id='st101' and staff_id='st108';
-->Retrieve customer-id,delivery date and date of booking which have been delivered  
select custid,deldate,cdob from booking,deliver,customer where custid=cid and delid=cid;
-->Update courier status to 'KHARAGPUR' where consignment-no='DELK31HZpP'
update courier_d set currloc='KHARAGPUR' where consgid='DELK31HZpP';
-->find the total amount from booking
select sum(camount) from booking;
-->delete all delivered couriers
delete from deliver where stdel='DELIVERED';
