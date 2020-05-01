<!--
  This file is used to show how unit_timestamp works
-->
<?php
    echo "unix timestamp<br><hr><hr>";

	echo "30 November 2016 20 hours ->".strtotime("30 November 2016 20 hours ")."<br><hr>";
	echo "10 September 2000 ->".strtotime("10 September 2000")."<br><hr>";
	echo "-1 day ->".strtotime("-1 day")."<br><hr>";
	echo "now  ->".strtotime("now")."<br><hr>";
	echo "+1 day ->".strtotime("+1 day")."<br><hr>";
	echo "+1 week ->".strtotime("+1 week")."<br><hr>";
	echo "+1 week 2 days 4 hours 2 seconds ->".strtotime("+1 week 2 days 4 hours 2 seconds")."<br><hr>";
	echo "next Thursday ->".strtotime("next Thursday")."<br><hr>";
	echo "last Monday ->".strtotime("last Monday")."<br><hr>";
	echo '1480618330 ->'.date(1480618330)."<br><hr>";
	echo '"1480618330" ->'.date("1480618330")."<br><hr>";
	echo "strtotime(1480618330) ->".strtotime(1480618330)."<br><hr>";
	echo "strtotime('-1 month') ->".strtotime("-1 month")."<br><hr>";
	echo "date ('Y.m.d',1480618330)  ->".date ('Y.m.d',1480618330)."<br><hr>";	
	echo "strtotime('2016-10-05') ->".strtotime("2016-10-05");//converts it to timestamp
	
	// takes the current unix_timestamp and converts it to human readable and prints out the year 
	$yr = date ('Y',strtotime("now"));
	echo "<br>the yr is ".$yr;
	echo "<br> date and time is ".date('d/m/Y H:M:S:3N');
    echo '<br>'.time('now');
/*    echo '<br>'.date('hr:min:s',time('now'));*/
?>
