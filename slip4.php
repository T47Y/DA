<?php
session_start();
if (!isset($_POST['earnings'])) {
echo '<form method="post">
<h2>Employee Details</h2>
Employee No: <input type="text" name="eno" required><br>
Employee Name: <input type="text" name="ename" required><br>
Address: <textarea name="address" required></textarea><br>
<input type="submit" name="earnings" value="Next">
</form>';
} else {
// Store employee details in session
$_SESSION['eno'] = $_POST['eno'];
$_SESSION['ename'] = $_POST['ename'];
$_SESSION['address'] = $_POST['address'];
header("Location: earnings.php");
exit();
}
?>
<!-- Page 2 name- earnings.php -->
<?php
session_start();
if (!isset($_POST['summary'])) {
echo '<form method="post">
<h2>Earnings Details</h2>
Basic: <input type="number" name="basic" required><br>
DA: <input type="number" name="da" required><br>
HRA: <input type="number" name="hra" required><br>
<input type="submit" name="summary" value="Next">
</form>';
} else {
$_SESSION['basic'] = $_POST['basic'];
$_SESSION['da'] = $_POST['da'];
$_SESSION['hra'] = $_POST['hra'];
header("Location: summary.php");
exit();
}
?>
<!-- Page 3 name- summary.php -->
<?php
session_start();
$total = $_SESSION['basic'] + $_SESSION['da'] + $_SESSION['hra'];
echo "<h2>Employee Information</h2>";
echo "<table border='1'>
<tr><th>Employee No</th><td>".$_SESSION['eno']."</td></tr>
<tr><th>Employee Name</th><td>".$_SESSION['ename']."</td></tr>
<tr><th>Address</th><td>".$_SESSION['address']."</td></tr>
<tr><th>Basic</th><td>".$_SESSION['basic']."</td></tr>
<tr><th>DA</th><td>".$_SESSION['da']."</td></tr>
<tr><th>HRA</th><td>".$_SESSION['hra']."</td></tr>
<tr><th>Total</th><td>$total</td></tr>
</table>";
session_destroy();
?>



import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error, r2_score
import matplotlib.pyplot as plt
fish_data = pd.read_csv('Fish.csv')
X = fish_data[['Width']]
y = fish_data['Weight']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
model = LinearRegression()
model.fit(X_train, y_train)
y_pred = model.predict(X_test)
mse = mean_squared_error(y_test, y_pred)
r2 = r2_score(y_test, y_pred)
print("Mean Squared Error:", mse)
print("R-squared:", r2)
print("\nCoefficients:", model.coef_)
print("Intercept:", model.intercept_)
plt.scatter(X_test, y_test, color='green')
plt.plot(X_train, model.predict(X_train), color='red', linewidth=3)
plt.title('Weight vs Width Regression')
plt.xlabel('Width')
plt.ylabel('Weight')
plt.show()
