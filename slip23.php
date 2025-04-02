<?xml version="1.0" encoding="UTF-8"?>
<Bookstore>
<Yoga>
<Book>
<Book_Title>The Yoga Sutras of Patanjali</Book_Title>
<Book_Author>Patanjali</Book_Author>
<Book_Price>10.99</Book_Price>
</Book>
<Book>
<Book_Title>Light on Yoga</Book_Title>
<Book_Author>B.K.S. Iyengar</Book_Author>
<Book_Price>15.99</Book_Price>
</Book>
<Book>
<Book_Title>The Heart of Yoga</Book_Title>
<Book_Author>T.K.V. Desikachar</Book_Author>
<Book_Price>12.99</Book_Price>
</Book>
</Yoga>
<Story>
<Book>
<Book_Title>The Great Gatsby</Book_Title>
<Book_Author>F. Scott Fitzgerald</Book_Author>
<Book_Price>8.99</Book_Price>
</Book>
<Book>
<Book_Title>To Kill a Mockingbird</Book_Title>
<Book_Author>Harper Lee</Book_Author>
<Book_Price>9.99</Book_Price>
</Book>
<Book>
<Book_Title>1984</Book_Title>
<Book_Author>George Orwell</Book_Author>
<Book_Price>7.99</Book_Price>
</Book>
</Story>
<Technical>
<Book>
<Book_Title>Programming PHP</Book_Title>
<Book_Author>Kevin Tatroe, Peter MacIntyre, Rasmus Lerdorf</Book_Author>
<Book_Price>22.99</Book_Price>
</Book>
<Book>
<Book_Title>Head First Design Patterns</Book_Title>
<Book_Author>Eric Freeman, Elisabeth Robson, Bert Bates, Kathy
Sierra</Book_Author>
<Book_Price>19.99</Book_Price>
</Book>
<Book>
<Book_Title>Clean Code</Book_Title>
<Book_Author>Robert C. Martin</Book_Author>
<Book_Price>16.99</Book_Price>
</Book>
</Technical>
</Bookstore>



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
