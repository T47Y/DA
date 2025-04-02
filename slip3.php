
<?php
session_start();
// Correct credentials (in real app, store securely)
$valid_username = "admin";5
$valid_password = "password123";
if (!isset($_SESSION['attempts'])) {
$_SESSION['attempts'] = 0;
}
if (isset($_POST['submit'])) {
if ($_POST['username'] == $valid_username && $_POST['password'] ==
$valid_password) {
// Successful login
unset($_SESSION['attempts']);
header("Location: welcome.php");
exit();
} else {
// Failed attempt
$_SESSION['attempts']++;
if ($_SESSION['attempts'] >= 3) {
$error = "Maximum attempts reached. Please try again later.";
session_destroy();
} else {
$remaining = 3 - $_SESSION['attempts'];
$error = "Invalid credentials. You have $remaining attempts remaining.";
}
}
}
if (isset($_SESSION['attempts']) && $_SESSION['attempts'] >= 3) {
echo "<h2>Error</h2>";
echo "<p>You have exceeded the maximum number of login attempts.</p>";
} else {
echo '<form method="post">
<h2>Login</h2>';
if (isset($error)) {
echo "<p style='color:red'>$error</p>";
}
echo '
Username: <input type="text" name="username" required><br>
Password: <input type="password" name="password" required><br>
<input type="submit" name="submit" value="Login">
</form>';
}
?>


<!-- welcome.php -->
<?php
session_start();
echo "<h2>Welcome!</h2>";
echo "<p>You have successfully logged in.</p>";
?>

import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import accuracy_score, classification_report
df = pd.read_csv('User_Data.csv')
df = pd.get_dummies(df, columns=['Gender'], drop_first=True)
X = df[['Gender_Male', 'Age', 'EstimatedSalary']]
y = df['Purchased']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.25, random_state=15)
model = LogisticRegression(max_iter=1000)
model.fit(X_train, y_train)
y_pred = model.predict(X_test)
print("Accuracy:", accuracy_score(y_test, y_pred))
print("\nClassification Report:\n", classification_report(y_test, y_pred))
def predict_purchase(gender, age, salary, model):
gender_num = 1 if gender.lower() == 'male' else 0
input_data = pd.DataFrame([[gender_num, age, salary]], columns=['Gender_Male',
'Age', 'EstimatedSalary'])
prediction = model.predict(input_data)
return "Will Purchase" if prediction[0] == 1 else "Will Not Purchase"
gender = "Male"
age = 42
salary = 149000
result = predict_purchase(gender, age, salary, model)
