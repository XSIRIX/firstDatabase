<?php
$db_conn_string = 'host=devdb.intern.ebroot.de dbname=company user=sasanasuwan password=$Ok9i1&7VM';

$conn = pg_connect($db_conn_string);
$stat = pg_connection_status($conn);

