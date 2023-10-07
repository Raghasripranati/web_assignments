<?php
  $password = "";
  $smallChecked = false;
  $capitalChecked = false;
  $lengthChecked = false;
  $specialChecked = false;
  $alphaChecked = false;
  $submitDisabled = true;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = test_input($_POST["password"]);

    if (preg_match('/[a-z]/', $password)) {
      $smallChecked = true;
    }

    if (preg_match('/[A-Z]/', $password)) {
      $capitalChecked = true;
    }

    if (preg_match('/^\S{8,}$/', $password)) {
      $lengthChecked = true;
    }

    if (preg_match('/[^\w\s]/', $password)) {
      $specialChecked = true;
    }

    if (preg_match('/\d/', $password)) {
      $alphaChecked = true;
    }

    if ($smallChecked && $capitalChecked && $lengthChecked && $specialChecked && $alphaChecked) {
      $submitDisabled = false;
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Checker</title>
</head>
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="checkbox" class="small" name="small" <?php if ($smallChecked) {echo "checked";} ?> />
    <label>Small</label><br />

    <input type="checkbox" class="capital" name="capital" <?php if ($capitalChecked) {echo "checked";} ?> />
    <label>Capital</label><br />

    <input type="checkbox" class="length" name="length" <?php if ($lengthChecked) {echo "checked";} ?> />
    <label>Length</label><br />

    <input type="checkbox" class="special" name="special" <?php if ($specialChecked) {echo "checked";} ?> />
    <label>Special Character</label><br />

    <input type="checkbox" class="alpha" name="alpha" <?php if ($alphaChecked) {echo "checked";} ?> />
    <label>Numeric</label><br />

    <label>Password</label>
    <input type="text" name="password" onkeyup="
      var small = /[a-z]/.test(this.value);
      var capital = /[A-Z]/.test(this.value);
      var length = /^\S{8,}$/.test(this.value);
      var special = /[^\w\s]/.test(this.value);
      var alpha = /\d/.test(this.value);

      document.querySelector('.small').checked = small;
      document.querySelector('.capital').checked = capital;
      document.querySelector('.length').checked = length;
      document.querySelector('.special').checked = special;
      document.querySelector('.alpha').checked = alpha;

      var submitDisabled = !(small && capital && length && special && alpha);
      document.querySelector('[name=submit]').disabled = submitDisabled;
    " /><br />

    <input type="submit" name="submit" <?php if ($submitDisabled) {echo "disabled";} ?> />
  </form>
</body>
</html>