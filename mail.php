<?php
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
        $message ='<table style="width:100%">
                <tr>
                    <td>'.$subject.'</td>
                </tr>
                <tr><td>Flight From: ' . $FlightFrom . '</td></tr>
                <tr><td>Flight To: ' . $FlightTo . '</td></tr>
                <tr><td>Flight Adults: ' . $FlightAdults . '</td></tr>                            
                <tr><td>Flight Start: ' . $FlightStart . '</td></tr>                            
                <tr><td>Flight Return: ' . $FlightReturn . '</td></tr>
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

    // $headers = 'MIME-Version: 1.0' . "\r\n";
    // $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    //if (mail($to, $email, $message, $headers))
    if (mail($to, $subject, $message))
    {
        echo 'Your message has been sent.';
    }else{
        echo 'failed';
    }

?>
