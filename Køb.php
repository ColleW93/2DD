<!DOCTYPE html>
<html>
    <head>
        <script src="scripts/jquery.js"></script>
        <script src="https://js.stripe.com/v1/"></script>

        <script>
            Stripe.setPublishableKey('pk_test_uWYohL9FRpNOS7XyNJlWBqX9');   // Test key!
        </script>

        <script src="scripts/buy-controller.js"></script>
    </head>
     
    <body>
        <h2>Payment Form</h2>
     
        <form action="/your-server-side-code" method="POST">
          <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_uWYohL9FRpNOS7XyNJlWBqX9"
            data-amount="999"
            data-name="Demo Site"
            data-description="Widget"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-zip-code="true"
            data-currency="dkk">
          </script>
        </form>
    </body>
</html>