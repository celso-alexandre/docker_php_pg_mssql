<?php
  //SQL SERVER
  printf('SQL SERVER');
  $msCon = sqlsrv_connect( "mssql", array("Database"=>"master", "UID"=>"sa", "PWD"=>"docker1234"));

  //var_dump($msCon);

  $msStmt = sqlsrv_query($msCon, "select * from dbo.MSreplication_options");

  //var_dump($msStmt);
  $resultMs = [];
  $i = 0;
  while( $resultMsRow = sqlsrv_fetch_array($msStmt , SQLSRV_FETCH_ASSOC ) ) {
    $resultMs[$i] = $resultMsRow;
    $i++;
  }
  
  var_dump($resultMs);
  sqlsrv_free_stmt($msStmt);
  sqlsrv_close($msCon);

  //POSTGRESQL
  printf('POSTGRESQL');
  $pgCon = pg_connect("host=pg port=5432 dbname=postgres user=postgres password=docker1234");

  //var_dump($pgCon);

  $pgStmt = pg_query($pgCon, "select 
                                  1 as id, 
                                  'test 01' as name 
                              
                              union all 

                              select 
                                  2 as id, 
                                  'test 02' as name
                             ");

  $resultPg = [];
  $i = 0;
  while( $resultPgRow = pg_fetch_assoc($pgStmt ) ) {
    $resultPg[$i] = $resultPgRow;
    $i++;
  }
  
  var_dump($resultPg);
  pg_free_result($pgStmt);
  pg_close($pgCon);
?>