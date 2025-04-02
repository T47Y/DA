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
