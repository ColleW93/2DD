<script src="https://js.stripe.com/v3/"></script>
<body>
  <form>
    <label>
      <span>Name</span>
      <input class="field" placeholder="Jane Doe" />
    </label>
    <label>
      <span>Phone</span>
      <input class="field" placeholder="(123) 456-7890" type="tel" />
    </label>
    <label>
      <span>Card</span>
      <div id="card-element" class="field"></div>
    </label>
    <button type="submit">Pay $25</button>
    <div class="outcome">
      <div class="error"></div>
      <div class="success">
        Success! Your Stripe token is <span class="token"></span>
      </div>
    </div>
  </form>
</body>