<?php
if (!isset($_POST['submit'])) {
echo '<form method="post" action="">
Font Style: <select name="font_style">
<option value="Arial">Arial</option>
<option value="Verdana">Verdana</option>
<option value="Times New Roman">Times New Roman</option>
</select><br>
Font Size: <input type="number" name="font_size" min="10" max="30"><br>
Font Color: <input type="color" name="font_color"><br>
Background Color: <input type="color" name="bg_color"><br>
<input type="submit" name="submit" value="Save Preferences">
</form>';
} else {
setcookie('font_style', $_POST['font_style'], time() + 86400);
setcookie('font_size', $_POST['font_size'], time() + 86400);
setcookie('font_color', $_POST['font_color'], time() + 86400);
setcookie('bg_color', $_POST['bg_color'], time() + 86400);
header("Location: display_preferences.php");
exit();
}
?>
<!-- Page 2 name- display_preferences.php -->
<?php
echo "<h2>Your Selected Settings:</h2>";
echo "Font Style: ".$_COOKIE['font_style']."<br>";
echo "Font Size: ".$_COOKIE['font_size']."<br>";
echo "Font Color: ".$_COOKIE['font_color']."<br>";
echo "Background Color: ".$_COOKIE['bg_color']."<br>";
echo '<a href="apply_settings.php">Apply These Settings</a>';
?>
<!-- Page 3 name - apply_settings.php -->
<?php
// Page 3: Apply the settings
echo '<style>
body {
font-family: '.$_COOKIE['font_style'].';
font-size: '.$_COOKIE['font_size'].'px;
color: '.$_COOKIE['font_color'].';
background-color: '.$_COOKIE['bg_color'].';
}
</style>';
echo "<h2>Your Settings Have Been Applied!</h2>";
echo "<p>This page demonstrates your selected preferences.</p>";
?>


import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error
import matplotlib.pyplot as plt
num_samples = 1000
salary_mean = 50000
salary_std = 10000
purchases_slope = 0.001
purchases_intercept = 10
salary = np.random.normal(salary_mean, salary_std, num_samples)
purchases = salary * purchases_slope + purchases_intercept + np.random.normal(0, 5,
num_samples)
data = pd.DataFrame({'Salary': salary, 'Purchases': purchases})
X = data[['Salary']]
y = data['Purchases']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
model = LinearRegression()
model.fit(X_train, y_train)
train_rmse = np.sqrt(mean_squared_error(y_train, model.predict(X_train)))
test_rmse = np.sqrt(mean_squared_error(y_test, model.predict(X_test)))
print("Training RMSE:", train_rmse)
print("Testing RMSE:", test_rmse)
plt.scatter(X_test, y_test, color='green')
plt.plot(X_train, model.predict(X_train), color='red', linewidth=3)
plt.title('Regression(Salary)')
plt.xlabel('Salary')
plt.ylabel('Purchases')
plt.show()
