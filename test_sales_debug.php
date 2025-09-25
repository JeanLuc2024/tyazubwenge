<!DOCTYPE html>
<html>
<head>
    <title>Sales Debug Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .test-section { margin: 20px 0; padding: 15px; border: 1px solid #ccc; }
        button { padding: 10px 15px; margin: 5px; }
        .result { margin-top: 10px; padding: 10px; background: #f5f5f5; white-space: pre-wrap; }
        .error { background: #ffebee; color: #c62828; }
        .success { background: #e8f5e8; color: #2e7d32; }
    </style>
</head>
<body>
    <h1>Sales API Debug Test</h1>
    
    <div class="test-section">
        <h3>1. Test Simple API Connection</h3>
        <button onclick="testSimpleAPI()">Test Simple API</button>
        <div id="simple-result" class="result"></div>
    </div>
    
    <div class="test-section">
        <h3>2. Test Sales API with Sample Data</h3>
        <button onclick="testSalesAPI()">Test Sales API</button>
        <div id="sales-result" class="result"></div>
    </div>
    
    <div class="test-section">
        <h3>3. Test with Real Product Data</h3>
        <button onclick="testWithRealData()">Test with Real Data</button>
        <div id="real-result" class="result"></div>
    </div>

    <script>
        function testSimpleAPI() {
            const resultDiv = document.getElementById('simple-result');
            resultDiv.innerHTML = 'Testing...';
            
            fetch('api/sales/simple_test.php')
            .then(response => {
                console.log('Simple API Response:', response);
                return response.text();
            })
            .then(text => {
                console.log('Simple API Raw Response:', text);
                try {
                    const data = JSON.parse(text);
                    resultDiv.innerHTML = 'SUCCESS:\n' + JSON.stringify(data, null, 2);
                    resultDiv.className = 'result success';
                } catch (e) {
                    resultDiv.innerHTML = 'ERROR - Not JSON:\n' + text;
                    resultDiv.className = 'result error';
                }
            })
            .catch(error => {
                resultDiv.innerHTML = 'ERROR:\n' + error.message;
                resultDiv.className = 'result error';
            });
        }
        
        function testSalesAPI() {
            const resultDiv = document.getElementById('sales-result');
            resultDiv.innerHTML = 'Testing...';
            
            const testData = {
                customer_name: 'Test Customer',
                customer_email: 'test@example.com',
                customer_phone: '1234567890',
                payment_method: 'cash',
                discount: 0,
                tax: 0,
                items: [{
                    product_id: 1,
                    quantity: 1,
                    unit_price: 1000
                }]
            };
            
            console.log('Sending test data:', testData);
            
            fetch('api/sales/create.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(testData)
            })
            .then(response => {
                console.log('Sales API Response:', response);
                return response.text();
            })
            .then(text => {
                console.log('Sales API Raw Response:', text);
                try {
                    const data = JSON.parse(text);
                    resultDiv.innerHTML = 'SUCCESS:\n' + JSON.stringify(data, null, 2);
                    resultDiv.className = 'result success';
                } catch (e) {
                    resultDiv.innerHTML = 'ERROR - Not JSON:\n' + text;
                    resultDiv.className = 'result error';
                }
            })
            .catch(error => {
                resultDiv.innerHTML = 'ERROR:\n' + error.message;
                resultDiv.className = 'result error';
            });
        }
        
        function testWithRealData() {
            const resultDiv = document.getElementById('real-result');
            resultDiv.innerHTML = 'Testing...';
            
            // First get a real product
            fetch('api/products/list.php')
            .then(response => response.json())
            .then(products => {
                console.log('Available products:', products);
                
                if (products.success && products.data.length > 0) {
                    const product = products.data[0];
                    const testData = {
                        customer_name: 'Stockout Sale',
                        items: [{
                            product_id: product.id,
                            quantity: 1,
                            unit_price: product.unit_price
                        }]
                    };
                    
                    console.log('Testing with real product:', testData);
                    
                    return fetch('api/sales/create.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(testData)
                    });
                } else {
                    throw new Error('No products available');
                }
            })
            .then(response => {
                console.log('Real Data Response:', response);
                return response.text();
            })
            .then(text => {
                console.log('Real Data Raw Response:', text);
                try {
                    const data = JSON.parse(text);
                    resultDiv.innerHTML = 'SUCCESS:\n' + JSON.stringify(data, null, 2);
                    resultDiv.className = 'result success';
                } catch (e) {
                    resultDiv.innerHTML = 'ERROR - Not JSON:\n' + text;
                    resultDiv.className = 'result error';
                }
            })
            .catch(error => {
                resultDiv.innerHTML = 'ERROR:\n' + error.message;
                resultDiv.className = 'result error';
            });
        }
    </script>
</body>
</html>
