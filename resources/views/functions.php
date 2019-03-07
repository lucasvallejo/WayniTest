<?php

           



function contacts(){


            $client = new Google_Client();
            $client->setApplicationName('Google Contacts PHP Sample');
            $client->setScopes("http://www.google.com/m8/feeds/");


            if (isset($_GET['code'])) {
              $client->authenticate();
              $_SESSION['token'] = $client->getAccessToken();
              $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
              header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));

            }

            if (isset($_SESSION['token'])) {
             $client->setAccessToken($_SESSION['token']);
            }

            if (isset($_REQUEST['logout'])) {
              unset($_SESSION['token']);
              $client->revokeToken();

            }
            if ($client->getAccessToken()) {

            }else{
                $auth = $client->createAuthUrl();
            }
           

            if ($client->getAccessToken()) {

              
             $access=$client->getAccessToken();
             $tocken = json_decode($access,true);
             $access_token = $tocken['access_token'];

             $url = 'https://www.google.com/m8/feeds/contacts/default/full?alt=json&v=3.0&oauth_token='.$access_token;
             $response =  file_get_contents($url);
            $contacts = json_decode($response,true);
            $resultsCount =count($contacts['feed']['entry']);

            echo "<table align='center'>";
            echo "<tr id='head'><td>Nombre</td><td>Email</td><td>Telefono</td></tr>";

            if ($resultsCount>0) {
                       
                         for ($i=0; $i < $resultsCount; $i++) { 
                            
                                if (isset($contacts['feed']['entry'][$i]['title'])) {
                                   $fullname=$contacts['feed']['entry'][$i]['title']['$t'];
                                }else{
                                    $fullname="-";
                                }

                                if (isset($contacts['feed']['entry'][$i]['gd$email'])) {
                                   $email=$contacts['feed']['entry'][$i]['gd$email'][0]['address'];
                                }else{
                                    $email="-";
                                }

                                if (isset($contacts['feed']['entry'][$i]['gd$phoneNumber'])) {
                                   $phone=$contacts['feed']['entry'][$i]['gd$phoneNumber'][0]['$t'];
                                }else{
                                    $phone="-";
                                }

                                echo "<tr><td>".$fullname."</td><td>".$email."</td><td>".$phone."</td></tr>";


                         }
                        
                    }           
            echo "<table>";




            } 

    }



    function login(){

            

            
            $client = new Google_Client();
            $client->setApplicationName('Google Contacts PHP Sample');
            $client->setScopes("http://www.google.com/m8/feeds/");

            if ($client->getAccessToken()) {

            }else{
                $auth = $client->createAuthUrl();
            }



            if ($_SESSION) {
                 print "<center><a class=logout href='?logout=1'>Logout</a></center>";
              } else {
                print "<center><a class=login href='$auth'>Connect Me!</a></center>";
                
              }

    }       


?>

