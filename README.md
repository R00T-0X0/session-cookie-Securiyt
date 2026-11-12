
# Session & Cookie Security

This project demonstrates how PHP sessions and cookies work, and how to improve their security using built-in PHP security features.

The project includes a simple login system and a practical cookie security test to compare protected and unprotected cookies.

## Technologies Used

- PHP
- HTML
- CSS
- JavaScript
- XAMPP



## Features

- Secure PHP session configuration.
- HttpOnly cookie protection.
- SameSite Strict cookie policy.
- Secure cookie setting when using HTTPS.
- Session ID regeneration after successful login.
- Login authentication.
- Protection against accessing the dashboard without logging in.
- Logout functionality.
- Comparison between protected and unprotected cookies.

## Session Security

The project uses PHP session configuration to improve session security.

Some of the implemented settings include:

- `session.use_strict_mode`
- `session.use_only_cookies`
- `HttpOnly`
- `SameSite=Strict`
- `session_regenerate_id(true)`

These settings help reduce common session-related security risks.

## Cookie Security Test

The project includes a practical test using two cookies:

**Protected Cookie**
- HttpOnly enabled.
- SameSite set to Strict.

**Unprotected Cookie**
- HttpOnly disabled.
- SameSite set to Lax.

The test uses JavaScript `document.cookie` to demonstrate the difference between cookies that are accessible and inaccessible to JavaScript.

## Running the Project

1. Install XAMPP.
2. Start Apache.
3. Copy the project folder into:

   `C:\xampp\htdocs\php assignment\`

4. Open your browser and visit:

   `http://localhost/php%20assignment/session-cookie-security/`

## Login Information

Use the following credentials to test the login system:

```text
Username: admin
Password: Admin@123
```

## Testing

The following tests can be performed:

1. Log in using the correct credentials.
2. Try logging in with incorrect credentials.
3. Check the PHPSESSID cookie before and after login.
4. Open the browser Developer Tools.
5. Go to Application → Cookies.
6. Compare the protected and unprotected cookies.
7. Open the browser Console and run:

   `document.cookie`

8. Verify that the protected HttpOnly cookie cannot be accessed through JavaScript.
9. Log out and try accessing the dashboard again.

## Note

The Secure cookie attribute is enabled when the application runs over HTTPS. When testing through localhost using HTTP, the Secure attribute is disabled.

This project was developed as a practical exercise to understand PHP session management and cookie security.
