<?php

$rawData="
Chirakahula,Mukwana Joe.0500387482.UGANDA.+256
|Wambua,Doe Mumbua.080023450.KENYA.+254
|Vonbora,Katherina Luther.0600990033.GERMANY.+32
|Boromir,Grommit Wallace.0100873901.IRELAND.+98
|Piepont,Edwards Jonathan.0200983729.AMERICA.+1
|Asaph,Elihu Mose.02990033.ISRAEL.+2
|Otoyo,Wafula Joel.0777799920.KENYA.+254
|Mapete,Mwambingu Simba.0987483292.TANZANIA.+257
|SARATON,DAVID BREINARD.043899292.AMERICA.+1
|POMPI,JOHN OWEN.074749292.ZAMBIA.+267
|MAG,JOHN BUNYAN.09837328.UGANDA.+256
|Vonstaupitz,Johann Gregory.0600984733.GERMANY.+32";

$individualsArray=explode('|',$rawData);

$arragedIndividualInfoArray=array();
$countriesList=array();
$uniqueCountries=array_unique($countriesList);

foreach($individualsArray as $individual)
{
  $firstArray=explode(',',$individual);

  $surname=$firstArray[0];
  $other_info_from_firstArray=$firstArray[1];

  $secondArray=explode(' ',$other_info_from_firstArray);

  $secondName=$secondArray[0];

  $other_info_from_secondArray=$secondArray[1];


  $thirdArray=explode('.',$other_info_from_secondArray);

  $firstName=$thirdArray[0];

  $wholePhone=$thirdArray[1];
  $country=$thirdArray[2];
  $country_code=$thirdArray[3];

  array_push($arragedIndividualInfoArray,$firstName .' '.$secondName.','.$surname.'(#'.$country_code.'(0) '.substr($wholePhone, 1).'['.$country.'])<br>');
  array_push($countriesList,$country);
  // print_r($individualinfoarray);
}

$arraySize=sizeof($arragedIndividualInfoArray);
$counter=0;
for($char='a'; $char<='z';$char++)
{
  echo $char."). ".$arragedIndividualInfoArray[$counter];

  if ( $counter == $arraySize-1 ) {

       break;
   }
  $counter =$counter +1;
}

$uniqueCountries=array_unique($countriesList);
$totalCountries=sizeof($uniqueCountries);
echo "Summary<br>";
echo "-- Total names : ".$arraySize.'<br>';
echo "-- Total unique countries : ".$totalCountries.'(';

$countz=1;
foreach($uniqueCountries as $country)
{
  $countz=$countz+1;
  echo $country;
  if ( $countz == $totalCountries) {

       break;
   }
   echo ",";
}
echo ")";
  // foreach($uniqueCountries as $country){echo 1;}
?>
