<?php

# Sampel code for make connection with Oracle Database and send simple DDL,DML and query commands from oci8 extension.
# Database instance: fuju
# host name :  fuju.exzilla.net 
# lintener port number : 1521
# user : scott
# Password : tiger
# You can connect to database server from this program without setting tnsnames.ora.
# fuju at exizilla dot net, Jan10,2002
# Modifid from original of " http://www.php.net/manual/en/function.ocilogon.php "

print "<HTML><PRE>";
$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = fuju.exzilla.net)(PORT = 1521)))(CONNECT_DATA=(SID=fuju)))";
#$db= "";
$c1 = ocilogon("scott","tiger",$db);
$c2 = ocilogon("scott","tiger",$db);

function create_table($conn)
{ $stmt = ociparse($conn,"create table scott.hellotable (hellocol varchar2(64))");
  ociexecute($stmt);
  echo $conn." created hellotable\n\n";
}

function drop_table($conn)
{ $stmt = ociparse($conn,"drop table scott.hellotable");
  ociexecute($stmt);
  echo $conn." dropped hellotable\n\n";
}

function insert_data($conn)
{ $stmt = ociparse($conn,"insert into scott.hellotable 
  values('$conn' || ' ' || to_char(sysdate,'DD-MON-YY HH24:MI:SS'))");
  ociexecute($stmt,OCI_DEFAULT);
  echo $conn." inserted hellotable\n\n";
}

function delete_data($conn)
{ $stmt = ociparse($conn,"delete from scott.hellotable");
  ociexecute($stmt,OCI_DEFAULT);
  echo $conn." deleted hellotable\n\n";
}

function commit($conn)
{ ocicommit($conn);
  echo $conn." committed\n\n";
}

function rollback($conn)
{ ocirollback($conn);
  echo $conn." rollback\n\n";
}

function select_data($conn)
{ $stmt = ociparse($conn,"select * from scott.hellotable");
  ociexecute($stmt,OCI_DEFAULT);
  echo $conn."----selecting\n\n";
  while (ocifetch($stmt))
  echo $conn." <".ociresult($stmt,"TEST").">\n\n";
  echo $conn."----done\n\n";
}

# start Main program
echo "<h3> Start :: Simple oci8 extension functions test </h3><p><hr><p>";

create_table($c1);
insert_data($c1);   // Insert a row using c1
insert_data($c2);   // Insert a row using c2

select_data($c1);   // Results of both inserts are returned
select_data($c2);   

rollback($c1);      // Rollback using c1

select_data($c1);   // Both inserts have been rolled back
select_data($c2);   

insert_data($c2);   // Insert a row using c2
commit($c2);        // commit using c2

select_data($c1);   // result of c2 insert is returned

delete_data($c1);   // delete all rows in table using c1
select_data($c1);   // no rows returned
select_data($c2);   // no rows returned
commit($c1);        // commit using c1

select_data($c1);   // no rows returned
select_data($c2);   // no rows returned


drop_table($c1);
print "</PRE></HTML>";

echo "<hr><h3> End :: Simple oci8 extension functions test </h3>";

?>