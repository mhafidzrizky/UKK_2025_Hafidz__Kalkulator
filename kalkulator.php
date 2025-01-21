<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f3f3;
            margin: 0;
        }

        .calculator {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 320px;
        }

        .display {
            width: 100%;
            height: 50px;
            background: #eee;
            border: none;
            border-radius: 5px;
            font-size: 1.5em;
            text-align: right;
            padding: 1px;
            margin-bottom: 15px;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        button {
            height: 50px;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #f0f0f0;
        }

        button.operation {
            background-color: #ffcc00;
        }

        button:active {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <input type="text" class="display" id="display" readonly>
        <div class="buttons">
            <button onclick="clearDisplay()">CE</button>
            <button onclick="deleteLast()">&#9003;</button>
            <button onclick="appendSymbol('%')">%</button>
            <button class="operation" onclick="appendSymbol('/')">&divide;</button>

            <button onclick="appendNumber(1)">1</button>
            <button onclick="appendNumber(2)">2</button>
            <button onclick="appendNumber(3)">3</button>
            <button class="operation" onclick="appendSymbol('*')">&times;</button>
            
            <button onclick="appendNumber(4)">4</button>
            <button onclick="appendNumber(5)">5</button>
            <button onclick="appendNumber(6)">6</button>
            <button class="operation" onclick="appendSymbol('-')">&minus;</button>
            
            <button onclick="appendNumber(7)">7</button>
            <button onclick="appendNumber(8)">8</button>
            <button onclick="appendNumber(9)">9</button>
            <button class="operation" onclick="appendSymbol('+')">&plus;</button>

            <button onclick="appendSymbol('.')">.</button>
            <button onclick="appendNumber(0)">0</button>
            <button onclick="toggleSign()">+/-</button>
            <button class="operation" onclick="calculateResult()">=</button>
        </div>
    </div>

    <script>
        const display = document.getElementById('display');

        function clearDisplay() {
            display.value = '';
        }

        function deleteLast() {
            display.value = display.value.slice(0, -1);
        }

        function appendNumber(number) {
            display.value += number;
        }

        function appendSymbol(symbol) {
            if (display.value === '') return;
            const lastChar = display.value.slice(-1);
            if (['+', '-', '*', '/','%'].includes(lastChar)) return;
            display.value += symbol;
        }

        function toggleSign() {
            if (display.value) {
                display.value = parseFloat(display.value) * -1;
            }
        }
        
        function calculateResult() {
            try {
                display.value = eval(display.value);
            } catch {
                display.value = 'Error';
            }
        }
        
        
    </script>
</body>
</html>
