<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
<script>
window.onload = function() {
alert("Hello Good Morning!");
};
function validateForm() {
const name = document.getElementById("name").value;
const email = document.getElementById("email").value;
if (name.trim() === "" || email.trim() === "") {
alert("Please fill in all fields");
return false;
}
alert("Registration successful!");
return true;
}
</script>
</head>
<body>
<h1>Student Registration Form</h1>
<form onsubmit="return validateForm()">
Name: <input type="text" id="name" required><br>
Email: <input type="email" id="email" required><br>
Course:
<select id="course">
<option value="cs">Computer Science</option>
<option value="it">Information Technology</option>
<option value="ece">Electronics</option>
</select><br>
<input type="submit" value="Register">
</form>
</body>
</html>


import numpy as np
import pandas as pd
from mlxtend.frequent_patterns import apriori,
association_rules
transactions =
[['eggs','milk','bread'],['eggs','apple'],['milk','bread'],['apple',
'milk'], ['milk','apple','bread']]
from mlxtend.preprocessing import TransactionEncoder
te = TransactionEncoder()
te_array = te.fit(transactions).transform(transactions)
df = pd.DataFrame(te_array, columns=te.columns_)
df = df.astype(int)
freq_items = apriori(df, min_support=0.5,
use_colnames=True)
print(freq_items)
rules = association_rules(freq_items, metric='support',
min_threshold=0.05)
rules = rules.sort_values(['support', 'confidence'],
ascending=[False, False])
print(rules)
