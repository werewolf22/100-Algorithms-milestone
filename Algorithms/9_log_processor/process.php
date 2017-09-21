 <?php
 /*
 Log Processor
  */
 $myfile = fopen("example.log", "r") or die("Unable to open file!");
    $warnings = 0;
    $errors = 0;
    $i=0;
    while (!feof($myfile)) {
        // extracting each line into array
        $lines[]=fgets($myfile);
        // extracting each date into array
        preg_match("/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])/", $lines[$i], $match);
        $matches[]=$match;
        $i++;
    }
    var_dump($matches);
    array_pop($matches);
    foreach ($matches as $match) {
        $dates[]=$match[0];
    }
    $dates=array_unique($dates);
    var_dump($dates);
    foreach ($dates as $date) {
        $warnings = 0;
        $errors = 0;
        foreach ($lines as $line) {
            // checking for matching dates in each line
            if (preg_match("/".$date."/", $line)) {

                // counting the numbers of errors or warnings on a particular date
                if (preg_match("/warning/", $line)) {
                    $warnings++;
                } elseif (preg_match("/error/", $line)) {
                    $errors++;
                }
            }
        }
        echo "{$date} warning: {$warnings} error: {$errors} \n";
    }
    fclose($myfile);
?>
