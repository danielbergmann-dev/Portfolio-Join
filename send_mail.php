<?php
########### CONFIG ###############

$recipient = $_POST['recipient'];
$redirect = 'https://danielbergmann.dev/Projekte/Join/index.html';

########### CONFIG END ###########
?>


<?php
###############################
#
#        DON'T CHANGE ANYTHING FROM HERE!
#
#        Ab hier nichts mehr ändern!
#
###############################

switch ($_SERVER['REQUEST_METHOD']) {
    case ("OPTIONS"): //Allow preflighting to take place.
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: content-type");
        exit;
    case ("POST"): //Send the email;
        header("Access-Control-Allow-Origin: *");

        $subject = "Contact From " . $_POST['name'];
        $headers = "From:  noreply@danielbergmann.dev";

        $message .= "Hello!\n For changing your password click on the link below! \n 
        https://danielbergmann.dev/Projekte/Join/smallest_backend_ever/change_password.html?${recipient}" . $_POST['message'];

        if (mail($recipient, $subject, $message, $headers)) {
            sleep(1);
            echo "Check your mail for the new password";
        } else {
            echo "Timeout... try again later.";
        }
        break;
    default: //Reject any non POST or OPTIONS requests.
        header("Allow: POST", true, 405);
        exit;
}
?>