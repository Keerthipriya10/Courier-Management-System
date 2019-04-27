-->1)RETRIEVE THE 3rd HIGHEST PAID BOOKING
select distinct camount 
from booking as b1
where 3=(select count(distinct camount) from booking as b2 where b1.camount<=b2.camount);
-->2)RETRIEVE STAFF_ID WHO HAVE NOT GONE FOR DELIVERY
select staff_id,st_name 
from staff
where staff_id not in(select cdel from updatecourier,staff where cdel=staff_id);
-->3)RETRIEVE THE CUSTOMER THAT HAVE NOT DONE ANY BOOKING
select cid 
from customer 
where cid not in (select custid from booking);
-->4)RETRIEVE THE BRANCH ,NO OF BOOKINGS FOR EACH BRANCH BETWEEN JAN AND FEB 
SELECT csource, COUNT(csource) as totalCount 
FROM booking 
where (cdob BETWEEN 01-01-2019 AND 28-02-2019)GROUP BY csource limit 1;
-->5)RETRIEVE THE CUSTOMER THAT HAVE NOT DONE ANY BOOKING FROM KOLKATA AND BANGALORE
select cid 
from customer 
where cid not in (select custid from booking WHERE csource='KOLKATA' AND cdest='BANGALORE');
-->6)RETRIEVE THE BRANCH MANAGER-ID,BRANCH MANAGER NAME WHERE TOTAL NO OF BOOKINGS>10
SELECT bid,bmname,COUNT(bcity) as total_booking
from (branch_mgr join booking on bcity=csource)
where (SELECT COUNT(csource)  from booking) >10
-->7)RETRIEVE THE BRANCH,TOTAL AMOUNT WHERE NO OF BOOKINGS>6
select csource,sum(camount) as totalamount
 from booking
 group by csource asc
 having count(csource)>6;
-->8)RETRIEVE THE CUSTOMER WHO HAS DONE MAX NO OF BOOKINGS FROM BANGALORE
select custid,max(csource) as max_booking 
from booking 
where csource='BANGALORE'; 
-->9)RETRIEVE THE CONSIGNMENT NUMBER,CUSTOMER NAME WHICH ARE NOT DELIVERED
select courid,consgid 
from updatecourier 
where courid not in (select  delid from deliver);