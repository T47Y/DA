<!DOCTYPE html>
<html>
<head>
<title>jQuery Before and After</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
.added { color: green; font-style: italic; }
</style>
<script>
$(document).ready(function() {
// Insert text before and after paragraph
$("p").before("<p class='added'>This text is inserted BEFORE the
paragraph</p>");
$("p").after("<p class='added'>This text is inserted AFTER the paragraph</p>");
});
</script>
</head>
<body>
<h1>jQuery Before and After Example</h1>
<p>This is the original paragraph.</p>
</body>
</html>


import numpy as np
import pandas as pd
from mlxtend.frequent_patterns import apriori, association_rules
transactions = [['eggs','milk','bread'],['eggs','apple'],['milk','bread'],['apple',
'milk'], ['milk','apple','bread']]
from mlxtend.preprocessing import TransactionEncoder
te=TransactionEncoder()
te_array=te.fit(transactions).transform(transactions)
df=pd.DataFrame(te_array, columns=te.columns_)
df = df.astype(int)
df
freq_items = apriori(df, min_support = 0.5, use_colnames = True)
print(freq_items)
rules = association_rules(freq_items, metric ='support', min_threshold=0.05)
rules = rules.sort_values(['support', 'confidence'], ascending =[False,False])
rules
