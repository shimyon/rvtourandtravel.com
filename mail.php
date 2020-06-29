<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
    header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
    //ini_set("SMTP","smtp.gmail.com" );
    //ini_set("smtp_port","25");
    // ini_set('sendmail_from', 'shimyonscrumbees@gmail.com');       
    // ini_set('auth_username', 'shimyonscrumbees@gmail.com');       
    // ini_set('auth_password', 'scrumbees123#');       

    $to = 'shimyon.r@gmail.com';
    $email = $_POST["email"];
    $subject = $_POST["subject"];

    if (isset($_POST['action']) && $_POST['action'] == 'search') {
        $FlightFrom = $_POST["FlightFrom"];
        $FlightTo = $_POST["FlightTo"];
        $FlightAdults = $_POST["FlightAdults"];
        $FlightStart = $_POST["FlightStart"];
        $FlightReturn = $_POST["FlightReturn"];
        $Child = isset($_POST["Child"]) ? $_POST["Child"] : '';
        $Place = isset($_POST["Place"]) ? $_POST["Place"] : '';
        $HotelName = isset($_POST["HotelName"]) ? $_POST["HotelName"] : '';
        $message ='<table style="width:100%">
                <tr>
                    <td>Search '.$subject.'</td>
                </tr>
                <tr><td>' . $subject . ' From: ' . $FlightFrom . '</td></tr>
                <tr><td>' . $subject . '  To: ' . $FlightTo . '</td></tr>
                <tr><td>' . $subject . '  Adults: ' . $FlightAdults . '</td></tr>                            
                <tr><td>' . $subject . '  Start: ' . $FlightStart . '</td></tr>                            
                <tr><td>' . $subject . '  Return: ' . $FlightReturn . '</td></tr>
                <tr><td>' . $subject . '  Child: ' . $Child . '</td></tr>
                <tr><td>' . $subject . '  Place: ' . $Place . '</td></tr>
                <tr><td>' . $subject . '  Name: ' . $HotelName . '</td></tr>
            </table>';

    } else {
        $name = $_POST["name"];        
        $text = $_POST["message"];
        $message ='<table style="width:100%">
            <tr>
                <td>'.$name.'  '.$subject.'</td>
            </tr>
            <tr><td>Email: '.$email.'</td></tr>
            <tr><td>phone: '.$subject.'</td></tr>
            <tr><td>Text: '.$text.'</td></tr>
            
        </table>';
    }

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Cc: rvtoursandtravels00@gmail.com' . "\r\n";
    //$headers .= 'Bcc: rvtoursandtravels00@gmail.com' . "\r\n";
    //rvtoursandtravels00@gmail.com

    //if (mail($to, $email, $message, $headers))
    $return = array('ok' => true, 'msg' => '');
    $return['msg'] = mail($to, $subject, $message, $headers);
    if (!$return['msg'])
    {
        $return['ok'] = false;
    } 
    echo json_encode($return);

?>
