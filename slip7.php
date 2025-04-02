<?php
$dom = new DOMDocument();
$dom->load('Movie.xml');
$movies = $dom->getElementsByTagName('movie');
echo "<h2>Movie Details</h2>";
echo "<table border='1'><tr><th>Movie Title</th><th>Actor Name</th></tr>";
foreach ($movies as $movie) {
$title = $movie->getElementsByTagName('MovieTitle')->item(0)->nodeValue;
$actor = $movie->getElementsByTagName('ActorName')->item(0)->nodeValue;
echo "<tr><td>$title</td><td>$actor</td></tr>";
}
echo "</table>";
?>
<!-- Page 2 name- Movie.xml -->
<movies>
<movie>
<MovieNo>1</MovieNo>
<MovieTitle>Inception</MovieTitle>
<ActorName>Leonardo DiCaprio</ActorName>
<ReleaseYear>2010</ReleaseYear>
</movie>
... (at least 5 records)
</movies>


import pandas as pd
from mlxtend.frequent_patterns import apriori, association_rules14
df = pd.read_csv('Market_Basket_Optimisation.csv', header=None)
sample_size = min(50, len(df))
df = df.sample(sample_size, random_state=42)
transactions = []
for i in range(len(df)):
transactions.append([str(item) for item in df.iloc[i] if str(item) != 'nan'])
from mlxtend.preprocessing import TransactionEncoder
te = TransactionEncoder()
te_array = te.fit_transform(transactions)
df1 = pd.DataFrame(te_array, columns=te.columns_)
freq_items = apriori(df1, min_support=0.005, use_colnames=True)
print("Frequent Itemsets:\n", freq_items.head())
rules = association_rules(freq_items, metric='support', min_threshold=0.005)
rules = rules.sort_values(['support', 'confidence'], ascending=[False, False])
print("\nTop Association Rules:\n", rules.head())
