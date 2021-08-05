<?php

if (isset($_POST['prix']) && !empty($_POST['prix'])) {
    require_once('vendor/autoload.php');
    $prix = (float)$_POST['prix'];

    // on instancie stripe 
    \Stripe\Stripe::setApiKey('SET YOUR SECRET KEY HERE');

    $intent = \Stripe\PaymentIntent::create([
        'amount'  => $prix * 100,
        'currency'  => 'eur',

    ]);
} else {
    header('Location: /index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style id="stndz-style"></style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Favicon -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Card Details</title>

</head>

<body>
    <div class="container">
        <h3 align="center">Process the payment </h3>
        <div class="row"><br>
            <div class="col-lg-4" style="margin-left: 400px;">

                <!-- card element goes here-->
                <form method="post">
                    <fieldset>
                        <div id="errors"></div>
                        <!--contiendra le message d'erreur de paiement-->
                        <br><br>
                        <div class="field-row">
                            <label>card Holder's name</label> <span id="card-holder-name-info" class="info"></span><br>
                            <input type="text" id="cardholder-name" class="demoInputBox" placeholder="Ex:Patrick ZoeTeam" required>
                        </div><br>
                        <div class="field-row">
                            <label>Email</label> <span id="email-info" class="info"></span><br>
                            <input type="email" id="cardholder-email" class="demoInputBox" placeholder="zeoteam@gmail.com" required>
                        </div><br>
                        <div id="card-elements">
                            <!-- Elements will create input elements here -->
                        </div><br><br>
                        <!-- We'll put the error messages in this element -->
                        <div id="card-errors" role="alert">
                            <!--contiendra les erreurs relatives a la carte-->

                        </div>

                        <button id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Valider le Don</button>
                    </fieldset>
                </form>

                <script src="https://js.stripe.com/v3/"></script>
                <script src="js/scripts.js"></script>
            </div>

        </div>
    </div>
</body>

</html>