<!DOCTYPE html>
<html>
<head>
    <title>Test Sales API</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .test-section { margin: 20px 0; padding: 15px; border: 1px solid #ccc; }
        button { padding: 10px 15px; margin: 5px; }
        .result { margin-top: 10px; padding: 10px; background: #f5f5f5; }
    </style>
</head>
<body>
    <h1>Sales API Test</h1>
    
    <div class="test-section">
        <h3>1. Test Database Connection</h3>
        <button onclick="testDatabase()">Test Database</button>
        <div id="db-result" class="result"></div>
    </div>
    
    <div class="test-section">
        <h3>2. Test Sales Creation</h3>
        <button onclick="testSales()">Test Sales Creation</button>
        <div id="sales-result" class="result"></div>
    </div>
    
    <div class="test-section">
        <h3>3. Test with Real Product</h3>
        <button onclick="testRealProduct()">Test with Product ID 1</button>
        <div id="product-result" class="result"></div>
    </div>

    <script>
        async function testDatabase() {
            try {
                const response = await fetch('api/sales/test.php');
                const data = await response.json();
                document.getElementById('db-result').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            } catch (error) {
                document.getElementById('db-result').innerHTML = 'Error: ' + error.message;
            }
        }
        
        async function testSales() {
            try {
                const testData = {
                    customer_name: 'Test Customer',
                    items: [{
                        product_id: 1,
                        quantity: 1,
                        unit_price: 1000
                    }]
                };
                
                const response = await fetch('api/sales/debug_create.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(testData)
                });
                
                const data = await response.json();
                document.getElementById('sales-result').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            } catch (error) {
                document.getElementById('sales-result').innerHTML = 'Error: ' + error.message;
            }
        }
        
        async function testRealProduct() {
            try {
                const testData = {
                    customer_name: 'Real Test Customer',
                    items: [{
                        product_id: 1, // Analytical Balance
                        quantity: 1,
                        unit_price: 185000
                    }]
                };
                
                const response = await fetch('api/sales/debug_create.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(testData)
                });
                
                const data = await response.json();
                document.getElementById('product-result').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            } catch (error) {
                document.getElementById('product-result').innerHTML = 'Error: ' + error.message;
            }
        }
    </script>
</body>
</html>
