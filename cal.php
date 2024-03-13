<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Calculator</title>
</head>
<body>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];
    $result = "";

    if (is_numeric($num1) && is_numeric($num2)) {
      switch ($operator) {
        case "+": $result = $num1 + $num2; break;
        case "-": $result = $num1 - $num2; break;
        case "*": $result = $num1 * $num2; break;
        case "/": $result = $num2 != 0 ? $num1 / $num2 : "Cannot divide by zero"; break;
        default: $result = "Invalid operator";
      }
    } else {
      $result = "Please enter valid numbers";
    }
  }
?>

  <h1>Simple Calculator</h1>
  <form method="post" action="">
    <input type="text" name="num1" placeholder="Number 1" required>
    <input type="text" name="num2" placeholder="Number 2" required>
    <select name="operator" required>
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <button type="submit">Calculate</button>
  </form>

  <?php if ($result !== "") echo "<p>Result: $result</p>"; ?>

</body>
</html>
