<html>
<body>
<div class="container">
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3">
			<form class="form-payment" method="post" action="index3.php">
				<img src="/version2-1/pensopaylogo.png" alt="Simplified payments" style="height:50%;" width="100%"> 
				<h2 class="form-signin-heading" align=center>Online Betaling</h2>

				<label for="inputPrice" class="">Pris: eks. 100.00</label>
				<input type="text" id="inputPrice" class="form-control" required="" name="price" autofocus="">
                
                				<style> 
				select {
				    width: 100%;
				    padding: 16px 20px;
				    border: none;
				    border-radius: 4px;
				    background-color: #fff;
                    color: #000;
				}
				</style>
				<p>Valuta</p>
				  <select id="country" name="currency">
					<option value="DKK">DKK</option>
                    <option value="SEK">SEK</option>
                    <option value="NOK">NOK</option>
					<option value="EUR">EUR</option>
					<option value="GBP">GBP</option>
                    <option value="USD">USD</option>
				  </select>
                
				<label for="inputName" class="">Navn</label>
				<input type="text" id="inputName" class="form-control" required=""  name="name" autofocus="">

				<label for="inputEmail" class="">Email</label>
				<input type="email" id="inputEmail" class="form-control" name="email" required="" autofocus="">

				<label for="inputText" class="">Tekst</label>
				<textarea class="form-control" id="inputText" rows="3" name="text"></textarea>
              	<br>
				<input type="hidden" name="paynow" value="1"/>
				<button class="btn btn-lg btn-success btn-block" type="submit">Betal nu</button>
			</form>
            <p align=center> Powered by PensoPay ApS <br><br><img src="/version2-1/visa.png" alt="Simplified payments" align="center" height="45px"><img src="/version2-1/mastercard.png" alt="Simplified payments" align="center" height="45px"></p>
		</div>
	</div>
</div>
</body>
</html>