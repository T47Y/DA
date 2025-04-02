<!DOCTYPE html>
<html>
<head>
<title>Fibonacci Sequence</title>
<script>
function generateFibonacci() {
const n = parseInt(prompt("How many Fibonacci numbers to generate?", 10));
if (isNaN(n) || n <= 0) {
alert("Please enter a positive number");
return;
}
let fib = [0, 1];
for (let i = 2; i < n; i++) {
fib[i] = fib[i-1] + fib[i-2];
}
// Display first n numbers
fib = fib.slice(0, n);
document.getElementById("result").innerHTML =
`<h3>First ${n} Fibonacci Numbers:</h3><p>${fib.join(', ')}</p>`;
}
</script>
</head>
<body>
<h1>Fibonacci Sequence Generator</h1>
<button onclick="generateFibonacci()">Generate Fibonacci Numbers</button>
<div id="result"></div>
</body>
</html>

import re
import matplotlib.pyplot as plt
from wordcloud import WordCloud
from nltk.tokenize import word_tokenize, sent_tokenize
from nltk.corpus import stopwords
from collections import Counter
text = """Hello world this is 4 and Here to summarize text"""
stop_words = set(stopwords.words('english'))
filtered_text = ' '.join([word for word in re.findall(r'\b\w+\b', text.lower()) if
word not in stop_words])
words = word_tokenize(filtered_text)
sentences = sent_tokenize(text)
word_freq = Counter(words)
plt.figure(figsize=(10, 6))
plt.bar(word_freq.keys(), word_freq.values())
plt.xlabel('Words')
plt.ylabel('Frequency')
plt.title('Word Frequency Distribution')
plt.xticks(rotation=45)
plt.show()
wordcloud = WordCloud(width=800, height=400,
background_color='white').generate(filtered_text) plt.figure(figsize=(10, 6))
plt.imshow(wordcloud, interpolation='bilinear')
plt.axis('off')
plt.title('Wordcloud')
plt.show()
