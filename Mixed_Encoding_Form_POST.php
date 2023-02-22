<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="cache-control" content="no-cache, no-store">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="expires" content="0">
    <title>Mixed Encoding Form POST</title>
  </head>
  <body>
    <h1>Mixed Encoding Form POST</h1>
    <b>Researched by @reinforchu (Tsubasa FUJII)</b>
    <hr>
    <form action="./Mixed_Encoding_Form_POST.php?value0=%82%B5%82%D3%82%C6%82%B6%82%B7" method="post" accept-charset="utf-8">
      <input type="test" name="value1" value="ゆにこーど">
      <input type="submit" name="button" value="Submit">
    </form>
    <hr>
    <h2>Output: </h2><?php if(isset($_REQUEST['value0']) && (isset($_REQUEST['value1']))) echo "<pre>value0=" . $_REQUEST['value0'] . "value1=" . $_REQUEST['value1'] . "</pre>"; ?>
  </body>
</html>