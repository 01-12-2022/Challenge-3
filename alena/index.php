<?php
$name = "Welcome";
echo $name;
$name = "User";
echo $name;

$number1 = 20;
$number2 = 3;
$result = $number1 + $number2;
echo "Result: $result"."<br>";

for($i=0; $i < 20; $i++ ) {
    if($i == 13) {
        echo "Ohh dreizehn <br>";
        continue;
    }
}

$weekdays = array("Montag","Dienstag","Mittwoch","Donnerstag","...");
echo $weekdays[3];
for ($i=0; $i < count($weekdays); $i++) {
	echo $weekdays[$i]."<br>";
}

$customer = array("Bob","Martin");
while ($i < count($customer)) {
	echo $customer[$i]."<br>";
	$i++;
}
?>