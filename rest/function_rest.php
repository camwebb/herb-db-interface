<?php
defined('_REST') or die ('Forbidden Access');

function getSpecimenSchema(){


include 'template.php';
header('Content-Type: text/xml');
$query = "SELECT * FROM $namaTabel";

$result = mysql_query($query);
$jumField = mysql_num_fields($result);

if ($jumField){


    echo "<?xml version='1.0' encoding='UTF-8'?>";
    echo "<table>";
    echo "<".$namaTabel.">";
        for ($i=0; $i<=$jumField-1; $i++){
            $namaField = mysql_field_name($result, $i);
            echo "<".$namaField.">";
            echo "...";
            echo "</".$namaField.">";
        }
    echo "</".$namaTabel.">";
    echo "</table>";

}
}

function getAllSpecimen($data){
include 'template.php';
header('Content-Type: text/xml');


$query = "SELECT * FROM Specimen limit 0,$data[limit]";

$result = mysql_query($query);
$cek = mysql_num_rows($result);
if ($cek){

    $jumField = mysql_num_fields($result);

    echo "<?xml version='1.0'?>";
    echo "<data>";
    while ($data = mysql_fetch_array($result)){
        echo "<".$namaTabel.">";
        for ($i=0; $i<=$jumField-1; $i++){
            $namaField = mysql_field_name($result, $i);
            echo "<".$namaField.">".htmlentities($data[$namaField],
                    ENT_NOQUOTES)."</".$namaField.">";
        }
        echo "</".$namaTabel.">";
    }
    echo "</data>";
}
}

function getCodeSpecimen(){

include 'template.php';
header('Content-Type: text/xml');
$query = "SELECT `$ID_Specimen`, `$Collector_Name`, `$Habit_Detail`, `$Notes`,
`$Distribution_of_Duplicates` FROM $namaTabel WHERE `$ID_Specimen`
='".$_GET['getCodeSpecimen']."'";
//print_r($query);
$result = mysql_query($query);
$cek = mysql_num_rows($result);
if ($cek){

    $jumField = mysql_num_fields($result);

    echo "<?xml version='1.0'?>";
    echo "<data>";
    while ($data = mysql_fetch_array($result)){
        echo "<".$namaTabel.">";
        for ($i=0; $i<=$jumField-1; $i++){
            $namaField = mysql_field_name($result, $i);
            echo "<".$namaField.">".htmlentities($data[$namaField],
                    ENT_NOQUOTES)."</".$namaField.">";
        }
        echo "</".$namaTabel.">";
    }
    echo "</data>";
}
}

function insertDataByRest(){

    $Collector_Field_Number = 'Collector_Field_Number';
    $Collector_Name = 'Collector_Name';
    $Coll_Date_From = 'Coll_Date_From';
    $Coll_Date_To = 'Coll_Date_To';


    if (!$_GET['Coll_Num']==''){
        echo $_GET['Coll_Num'].'<br />';
    }

    if (!$_GET['Coll_Name']==''){
        echo $_GET['Coll_Name'].'<br />';
    }

    if (!$_GET['Coll_Date_From']==''){
        echo $_GET['Coll_Date_From'].'<br />';
    }

    if (!$_GET['Coll_Date_To']==''){
        echo $_GET['Coll_Date_To'].'<br />';
    }

    $table = 'Specimen';
    $query = "INSERT INTO $table (`$Collector_Field_Number`, `$Collector_Name`, `$Coll_Date_From`,
    `$Coll_Date_To`)VALUES ('".$_GET['Coll_Num']."','".$_GET['Coll_Name']."','".$_GET['Coll_Date_From']."',
    '".$_GET['Coll_Date_To']."')";
    print_r($query);
    $result = mysql_query($query);
    

}

function updateDataByRest(){

    $Collector_Field_Number = 'Collector_Field_Number';
    $Collector_Name = 'Collector_Name';
    $Coll_Date_From = 'Coll_Date_From';
    $Coll_Date_To = 'Coll_Date_To';


    if (!$_GET['Coll_Num']==''){
        echo 'ada data coll num <br />';
    }

    if (!$_GET['Coll_Name']==''){
        echo 'ada data coll name <br />';
    }

    if (!$_GET['Coll_Date_From']==''){
        echo 'ada data date from <br />';
    }

    if (!$_GET['Coll_Date_To']==''){
        echo 'ada data date to <br />';
    }

    $table = 'Specimen';
    $query = "INSERT INTO $table (`$Collector_Field_Number`, `$Collector_Name`, `$Coll_Date_From`,
    `$Coll_Date_To`)VALUES ('".$_GET['Coll_Num']."','".$_GET['Coll_Name']."','".$_GET['Coll_Date_From']."',
    '".$_GET['Coll_Date_To']."')";
    print_r($query);
    $result = mysql_query($query);


}


?>
