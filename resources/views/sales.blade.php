<!DOCTYPE html>
<html>
<head>
    <title>Sales Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select, button {
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sales Transactions</h1>

        <!-- Form to Add New Item -->
        <form id="sales-form">
            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <!-- Options will be populated by JavaScript -->
                </select>
            </div>
            <div class="form-group">
                <label for="item">Item Name:</label>
                <select id="item" name="item" required disabled>
                    <!-- Options will be populated by JavaScript -->
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" readonly>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" required>
            </div>
            <button type="submit">Add Item</button>
        </form>

        <!-- Table to Display Added Items -->
        <table id="sales-table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows will be inserted here by JavaScript -->
            </tbody>
        </table>

        <!-- Total Amount Display -->
        <div id="total-amount">
            <h2>Total Amount: $<span id="total">0.00</span></h2>
        </div>
    </div>

    <script>
        // Sample product data with categories
        const categories = {
            'Food & Beverage': [
                {name: 'Ayam Goreng', price: 15.00},
                {name: 'Nasi Padang', price: 10.00},
                {name: 'Jus Alpukat', price: 5.00},
                {name: 'Es Teh', price: 2.00}
            ],
            'Beauty & Health': [
                {name: 'Cushion Make Over', price: 12.00},
                {name: 'Lipstick Maybelline', price: 10.00},
                {name: 'Facial Wash COSRX', price: 20.00},
                {name: 'Toner Npure', price: 15.00}
            ],
            'Home Care': [
                {name: 'Royale Pewangi', price: 8.00},
                {name: 'So Klin Lantai', price: 6.00},
                {name: 'Ekonomi Sabun Colek', price: 4.00},
                {name: 'Super Pel', price: 5.00}
            ],
            'Baby & Kid': [
                {name: 'Sabun Mandi Zwitsal', price: 7.00},
                {name: 'Cetaphil Baby Daily Lotion', price: 11.00},
                {name: 'QV Baby Moisturising Cream Extra Hydration', price: 14.00},
                {name: 'QV Baby Barrier Cream', price: 12.00}
            ]
        };

        // Populate the category dropdown
        const categorySelect = document.getElementById('category');
        for (const category in categories) {
            const option = document.createElement('option');
            option.value = category;
            option.textContent = category;
            categorySelect.appendChild(option);
        }

        // Populate item dropdown based on selected category
        const itemSelect = document.getElementById('item');
        categorySelect.addEventListener('change', function() {
            const selectedCategory = categorySelect.value;
            const products = categories[selectedCategory] || [];

            itemSelect.innerHTML = ''; // Clear current options
            products.forEach(product => {
                const option = document.createElement('option');
                option.value = product.name;
                option.textContent = `${product.name} - $${product.price.toFixed(2)}`;
                itemSelect.appendChild(option);
            });

            itemSelect.disabled = products.length === 0; // Disable if no products
        });

        // Update price input based on selected item
        itemSelect.addEventListener('change', function() {
            const selectedCategory = categorySelect.value;
            const products = categories[selectedCategory] || [];
            const selectedProduct = products.find(product => product.name === itemSelect.value);
            if (selectedProduct) {
                document.getElementById('price').value = selectedProduct.price.toFixed(2);
            }
        });

        // Handle form submission
        document.getElementById('sales-form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Get form values
            const itemName = document.getElementById('item').value;
            const price = parseFloat(document.getElementById('price').value);
            const quantity = parseInt(document.getElementById('quantity').value);
            const total = price * quantity;

            // Create a new row in the table
            const tableBody = document.getElementById('sales-table').getElementsByTagName('tbody')[0];
            const newRow = tableBody.insertRow();
            newRow.insertCell().textContent = itemName;
            newRow.insertCell().textContent = price.toFixed(2);
            newRow.insertCell().textContent = quantity;
            newRow.insertCell().textContent = total.toFixed(2);

            // Update total amount
            const totalAmountElement = document.getElementById('total');
            const currentTotal = parseFloat(totalAmountElement.textContent);
            totalAmountElement.textContent = (currentTotal + total).toFixed(2);

            // Clear form fields
            document.getElementById('sales-form').reset();
            document.getElementById('price').value = ''; // Clear price field after reset
            itemSelect.disabled = true; // Disable item dropdown after form reset
        });
    </script>
</body>
</html>
