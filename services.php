<?
/*
 *
 * Copyright (c) 2001-2002 Andrey S Pankov <casper@casper.org.ua>
 * services V1.1.0
 * License: GPL v2
 *
 */
?>
<? $date =  gmdate("D, d M Y H:i:s") . " GMT"; ?>
<html><head>
<META HTTP-EQUIV="Refresh" CONTENT="300">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="<? echo $date; ?>">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=koi8-r">
</head><body bgcolor="#CCCCCC">
<table width="100%"><tr>
<td><h2>Services</h2></td>
<td align="right" valign="top"><?echo "$date";?></td>
</tr></table>
<?
    require "services.conf.php";

    echo "<table border=0>\n";
    $n = sizeof($hosts);
    $i = 0;
    while ($i < $n) {
        $host = $hosts[$i][host];
	$desc = $hosts[$i][desc];
        $port = $hosts[$i][port];
        $timeout = $hosts[$i][timeout];

	$fp = fsockopen($host, $port, &$errno, &$errstr, $timeout);
        echo "<tr>";
	echo "<td>$desc ($host:$port)</td>";
	if(!$fp) {
	    echo "<td>&nbsp;FAILED</td>";
	} else {
	    echo "<td><b>&nbsp;OK</b></td>";
	    fclose($fp);
	}
	$i++;
        echo "</tr>\n";
    }
?>
</table>
</body></html>