<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <style type="text/css">
        body {
            margin: 50px auto;
            width: 600px;
        }
        /* CSS for Credit Card Payment form */
        
        .credit-card-box .panel-title {
            display: inline;
            font-weight: bold;
        }
        
        .credit-card-box .form-control.error {
            border-color: red;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
        }
        
        .credit-card-box label.error {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }
        
        .credit-card-box .payment-errors {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }
        
        .credit-card-box label {
            display: block;
        }
        /* The old "center div vertically" hack */
        
        .credit-card-box .display-table {
            display: table;
        }
        
        .credit-card-box .display-tr {
            display: table-row;
        }
        
        .credit-card-box .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 50%;
        }
        /* Just looks nicer */
        
        .credit-card-box .panel-heading img {
            min-width: 180px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <div class="row display-tr">
                            <h3 class="panel-title display-td">Detalles de pago</h3>
                            <div class="display-td">
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<h3><b>Importe: {{ $total }} €</b></h3>
                    </div>
                    <div class="panel-body">                    
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                	<br>
                                    <label for="cardNumber">Nº de tarjeta:</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" name="cardNumber" autocomplete="cc-number" value="4543434211678890">
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                	<div class="input-field col s6">
                                	    <input id="first_name" type="tel" class="validate" value="11">
                                	    <label for="first_name">Mes de caducidad</label>
                                	</div>
                                	<div class="input-field col s6">
      									<input id="last_name" type="tel" class="validate" value="2023">
                                	    <label for="last_name">Año de caducidad</label>
    								</div>   
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">Cód. Seguridad</label>
                                    <input type="tel" class="form-control" name="cardCVC" autocomplete="cc-csc" value="912" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                            	<form method="POST" action="/payment">
                                    @csrf
                            		<input type="hidden" name="order_id" value="{{$order_id}}">
                                	<button class="btn btn-success btn-lg btn-block" type="submit">Realizar Pago</button>
                                </form>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>