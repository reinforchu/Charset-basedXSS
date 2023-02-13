<?php
header("Content-Type: text/html;charset=Shift_JIS");
if(isset($_POST['message']) && preg_match("/[%&\"'<>:;\/]{1,}/i", urldecode($_POST['message']))) $_POST['message'] = "<b>Error! - Invalid message</b>";
if(!isset($_POST['message'])) $_POST['message'] = "XSS Validation partial PHP source code is <b><pre>" . htmlspecialchars(base64_decode("aWYoaXNzZXQoJF9QT1NUWydtZXNzYWdlJ10pICYmIHByZWdfbWF0Y2goIi9bJSZcIic8Pjo7XC9dezEsfS9pIiwgdXJsZGVjb2RlKCRfUE9TVFsnbWVzc2FnZSddKSkpICRfUE9TVFsnbWVzc2FnZSddID0gIjxiPkVycm9yISAtIEludmFsaWQgbWVzc2FnZTwvYj4iOw=="), ENT_QUOTES, 'Shift_JIS') . "</pre></b>";
?><!DOCTYPE html>
<html lang="ja-JP">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=Shift_JIS">
    <meta http-equiv="cache-control" content="no-cache, no-store">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="expires" content="0">
    <title>Charset-based XSS</title>
  </head>
  <body>
    <h1>Charset-based XSS - PoC</h1>
    <b>Researched by @reinforchu (Tsubasa FUJII)</b>
    <hr>
    <h2>Input your message &gt;</h2>
    <h3>Validation tester: Bypass</h3>
    <form action="./charset-xss.php" method="post" accept-charset="utf-8">
      <input type="text" name="message" value="Game over!" disabled>
      <input type="hidden" name="message" value="Payload has been deleted.">
      <input type="submit" name="button" value="Attack">
    </form>
    <h3>Validation tester: Block</h3>
    <form action="./charset-xss.php" method="post" accept-charset="utf-8">
      <input type="text" name="message" value="&lt;img src=# onerror=alert(1)&gt;">
      <input type="submit" name="button" value="Attack">
    </form>
    <h3>Validation tester: Pass</h3>
    <form action="./charset-xss.php" method="post" accept-charset="utf-8">
      <input type="text" name="message" value="alert(1)">
      <input type="submit" name="button" value="Send">
    </form>
    <h3>Validation tester: Default</h3>
    <form action="./charset-xss.php" method="post" accept-charset="utf-8">
      <input type="text" name="message" value="Dummy" disabled>
      <input type="submit" name="button" value="Clear">
    </form>
    <hr>
    <script>
      document.open();
      document.write("<?php printf("Message: %s", urldecode($_POST['message'])); ?>"); // DOM-based XSS
      document.close();
    </script>
  </body>
</html>