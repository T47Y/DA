<!DOCTYPE html>
<html>
<head>
<title>JavaScript Examples</title>
<script>
// Display alert on page load
window.onload = function() {
alert("Exams are near, have you started preparing for?");
// Number addition
let num1 = parseFloat(prompt("Enter first number:"));
let num2 = parseFloat(prompt("Enter second number:"));
if (confirm("Do you want to see the sum?")) {
alert(`The sum is: ${num1 + num2}`);
} else {
alert("Calculation cancelled");
}
};
</script>
</head>
<body>
<h1>JavaScript Examples</h1>
<p>Check the alert, prompt and confirm boxes.</p>
</body>
</html>

import pandas as pd
from mlxtend.frequent_patterns import apriori, association_rules
from mlxtend.preprocessing import TransactionEncoder
df = pd.read_csv('groceries.csv')
df = df.sample(min(50,len(df)), random_state=42)
transactions = []
for i in range(len(df)):
transactions.append([str(df.values[i,j]) for j in range(len(df.columns)) if
str(df.values[i,j]) != 'nan'])
te = TransactionEncoder()
te_array = te.fit_transform(transactions)
te_array = te_array.astype('int')
df1 = pd.DataFrame(te_array, columns=te.columns_)
freq_items = apriori(df1, min_support=0.2, use_colnames=True)
print("Frequent Itemsets:")
print(freq_items)
rules = association_rules(freq_items, metric='support', min_threshold=0.2)
rules = rules.sort_values(['support','confidence'], ascending=[False,False])
print("\nTop Association Rules:")
print(rules.head())
