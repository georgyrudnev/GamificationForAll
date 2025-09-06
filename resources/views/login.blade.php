<form action="/submit-login" method="POST">
    @csrf <!-- Laravel requires a CSRF token for POST requests -->
    <input type="text" name="user" placeholder="Your Email">
    <input type="text" name="password" placeholder="Your Password">
    <button type="submit">Submit</button>
</form>
