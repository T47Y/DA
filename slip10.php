<!DOCTYPE html>
<html>
<head>
<title>Student Name Form</title>
<style>
.highlight { color: red; font-size: 18px; }
#studentImage { width: 100px; transition: width 0.5s; }
</style>
<script>
function checkName() {
const name = document.getElementById("studentName").value;
const nameField = document.getElementById("studentName");
if (name.trim() !== "") {
nameField.className = "highlight";
}
}
function resizeImage() {
const img = document.getElementById("studentImage");
img.style.width = (img.width === 200) ? "100px" : "200px";
}
</script>
</head>
<body>
<h1>Student Information</h1>
<form>
Student Name: <input type="text" id="studentName" onblur="checkName()"><br>
<img id="studentImage" src="https://via.placeholder.com/100"
onclick="resizeImage()" alt="Student Image">
</form>
</body>
</html>


import numpy as np
import pandas as pd
from mlxtend.frequent_patterns import apriori,
association_rules
from mlxtend.preprocessing import TransactionEncoder
transactions = [
['Bread', 'Milk'],
['Bread', 'Diaper', 'Beer', 'Eggs'],
['Milk', 'Diaper', 'Beer', 'Coke'],
['Bread', 'Milk', 'Diaper', 'Beer'],
['Bread', 'Milk', 'Diaper', 'Coke']
]
te = TransactionEncoder()
te_array = te.fit(transactions).transform(transactions)
df = pd.DataFrame(te_array, columns=te.columns_)
df = df.astype(int) # Convert boolean to int (1/0)
freq_items = apriori(df, min_support=0.5,
use_colnames=True)
print("Frequent Itemsets:\n", freq_items)
rules = association_rules(freq_items, metric='support',
min_threshold=0.05)
rules = rules.sort_values(['support', 'confidence'],
ascending=[False, False])
print("\nAssociation Rules:\n", rules)
