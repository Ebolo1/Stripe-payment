window.onload = () => {
    //Variables
    let stripe = Stripe('SET YOUR PUBLISHING KEY HERE')
    let elements = stripe.elements()
    let redirect1 = "/index.php"


    //objets dela page
    let cardHolderName = document.getElementById("cardholder-name")
    let cardHolderEmail = document.getElementById("cardholder-email")
    let cardButton = document.getElementById("card-button")
    let clientSecret = cardButton.dataset.secret;

    //crée les élément du formulaire de la carte bancaire
    let style = {
        base: {
            color: "green",
        }
    };

    let card = elements.create("card", { style: style })
    card.mount("#card-elements")

    //on gere la saisie
    card.addEventListener("change", (event) => {
        let displayError = document.getElementById("card-errors")
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = "";
        }
    })

    // on gere le paiement
    cardButton.addEventListener("click", () => {
        stripe.handleCardPayment(
                clientSecret, card, {
                    payment_method_data: {
                        billing_details: {
                            name: cardHolderName.value,
                            email: cardHolderEmail.value
                        }
                    }
                })
            .then((result) => {
                if (result.error) {
                    document.getElementById("errors").innerText = result.error.message
                } else {
                    if (result.paymentIntent.status === 'succeeded') {
                        // Show a success message to your customer
                        // There's a risk of the customer closing the window before callback
                        // execution. Set up a webhook or plugin to listen for the
                        // payment_intent.succeeded event that handles any business critical
                        // post-payment actions.
                        alert('The payment has been proccessed');
                        document.location.href = redirect1

                    }

                }
            })
    })
}