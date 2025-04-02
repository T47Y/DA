<?php
session_start();
if (!isset($_SESSION['access_count'])) {
$_SESSION['access_count'] = 1;
} else {
$_SESSION['access_count']++;
}
echo "This page has been accessed ".$_SESSION['access_count']." times.";
?>



import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import r2_score, mean_squared_error
salary = pd.read_csv('Position_Salaries.csv')
print("Data sample:")
print(salary.sample(5))
X = salary[['Level']].values
y = salary['Salary'].values
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=0)
model = LinearRegression()
model.fit(X_train, y_train)
y_pred = model.predict(X_test)
plt.figure(figsize=(10,6))
plt.scatter(X_test, y_test, color='green', label='Actual')
plt.plot(X_train, model.predict(X_train), color='red', linewidth=3, label='Predicted')
plt.title('Position Level vs Salary (Linear Regression)')
plt.xlabel('Position Level')
plt.ylabel('Salary')
plt.legend()
plt.show()
print("\nModel Evaluation:")
print(f"R-squared: {r2_score(y_test, y_pred):.2f}")
print(f"Mean Squared Error: {mean_squared_error(y_test, y_pred):,.2f}")
print(f"Model Coefficients: {model.coef_[0]:.2f} (slope), {model.intercept_:.2f}
(intercept)")
