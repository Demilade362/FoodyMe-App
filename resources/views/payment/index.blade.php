<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Payment Details
                    </div>
                    <div class="card-body">
                        <form id="payment-form">
                            <div class="form-group">
                                <label for="card-holder-name">Cardholder Name</label>
                                <input type="text" id="card-holder-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="card-number">Card Number</label>
                                <input type="text" id="card-number" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="expiry">Expiry Date</label>
                                    <input type="text" id="expiry" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="cvc">CVC</label>
                                    <input type="text" id="cvc" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="your-stripe-js-code.js"></script>
</body>

</html>
