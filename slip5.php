<?xml version="1.0" encoding="UTF-8"?>
<items>
<item>
<item-name>Laptop</item-name>
<item-rate>50000</item-rate>
<item-quantity>10</item-quantity>
</item>
<item>
<item-name>Mobile</item-name>
<item-rate>20000</item-rate>
<item-quantity>20</item-quantity>
</item>
<item>
<item-name>Tablet</item-name>
<item-rate>15000</item-rate>
<item-quantity>15</item-quantity>
</item>
<item>
<item-name>Headphones</item-name>
<item-rate>2000</item-rate>
<item-quantity>30</item-quantity>
</item>
<item>
<item-name>Keyboard</item-name>
<item-rate>1000</item-rate>
<item-quantity>25</item-quantity>
</item>
</items>


import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import accuracy_score
import matplotlib.pyplot as plt
iris_data = pd.read_csv('Iris.csv')
X = iris_data[['SepalLengthCm', 'SepalWidthCm', 'PetalLengthCm', 'PetalWidthCm']]
y = iris_data['Species']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
model = LogisticRegression(max_iter=1000)
model.fit(X_train, y_train)
y_pred = model.predict(X_test)
accuracy = accuracy_score(y_test, y_pred)
print("\nAccuracy of the Logistic Regression model:", accuracy)11
plt.figure(figsize=(10, 6))
plt.scatter(X_test['SepalLengthCm'], y_test, color='green', alpha=0.6, label='Actual')
plt.scatter(X_test['SepalLengthCm'], y_pred, color='red', alpha=0.6, marker='x',
label='Predicted')
plt.title('Logistic Regression (Iris Dataset)')
plt.xlabel('Sepal Length (cm)')
plt.ylabel('Species')
plt.legend()
plt.tight_layout()
plt.show()
