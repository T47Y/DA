<?php
$xml = simplexml_load_file("book.xml");
if ($xml === false) {
echo "Failed to load XML file";
exit;
}
echo "<h2>Book Details</h2>";
echo "<table
border='1'><tr><th>ID</th><th>Title</th><th>Author</th><th>Price</th></tr>";
foreach ($xml->book as $book) {
echo "<tr>";
echo "<td>".$book['id']."</td>";
echo "<td>".$book->title."</td>";
echo "<td>".$book->author."</td>";
echo "<td>".$book->price."</td>";
echo "</tr>";
}
echo "</table>";
?>
<!-- Page 2 name- book.xml -->
<books>
<book id="1">
<title>PHP Basics</title>
<author>John Doe</author>
<price>500</price>
</book>
</books>


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
