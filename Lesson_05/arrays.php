<?php
    $name = "Xander Marcle";

    $BITstudents = array(
        "Eric",
        "Omar",
        "Lise",
        "Aline");

    $BITstudents = [
        "student1" => "Erik",
        "student2" => "Omar",
        "student3" => "Lise",
        "student4" => "Aline"];
    
    print_r($BITstudents);
    #echo $BITstudents["student1"];

    foreach($BITstudents as $key => $student){
        echo "$key is $student \n";
    }
?>

<?php
    print_r($argv);
    echo "Hello $argv[1] \n";
?>

<?php
    $fruits = ["Apple", "Pear", "Banana"];
    
    #Add value to the end of an array
    array_push($fruits, "Mango");
    print_r($fruits);

    #Add value to the beginning of an array
    array_unshift($fruits, "Strayberry");
    print_r($fruits);

    #Remove an item from the end
    array_pop($fruits);
    print_r($fruits);

    #Remove an item from the beginning
    array_shift($fruits);
    print_r($fruits);

    #Remove any item from an array
    unset($fruits[1]);
    print_r($fruits);

?>