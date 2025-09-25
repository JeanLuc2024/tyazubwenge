<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Training Programs Management - Tyazubwenge Training Center</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/custom.css" />
</head>
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            <?php include 'includes/sidebar.php'; ?>

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include 'includes/topbar.php'; ?>

                <!-- Page Content -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Training Programs Management</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="dashboard-card">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4>Manage Training Programs</h4>
                                        <div>
                                            <button class="btn btn-primary btn-modern mr-2" data-toggle="modal" data-target="#addTrainingModal">
                                                <i class="fa fa-plus"></i> Add New Training Program
                                            </button>
                                            <button class="btn btn-success btn-modern mr-2" onclick="printTrainingPrograms()">
                                                <i class="fa fa-print"></i> Print Programs
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Training Programs Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashboard-card">
                                    <div class="table-responsive">
                                        <table class="table table-modern">
                                            <thead>
                                                <tr>
                                                    <th>Program ID</th>
                                                    <th>Program Name</th>
                                                    <th>Category</th>
                                                    <th>Duration</th>
                                                    <th>Price (₦)</th>
                                                    <th>Students Enrolled</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>TRG-001</td>
                                                    <td>Detergent Making (Liquid & Powder)</td>
                                                    <td>Chemical Manufacturing</td>
                                                    <td>3 Days</td>
                                                    <td>25,000</td>
                                                    <td>45</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" onclick="editTrainingProgram(this)">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info" onclick="viewTrainingProgram(this)">View</button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteTrainingProgram(this)">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TRG-002</td>
                                                    <td>Gin Production & Distillation</td>
                                                    <td>Beverage Manufacturing</td>
                                                    <td>5 Days</td>
                                                    <td>35,000</td>
                                                    <td>32</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" onclick="editTrainingProgram(this)">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info" onclick="viewTrainingProgram(this)">View</button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteTrainingProgram(this)">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TRG-003</td>
                                                    <td>Oil Extraction & Production</td>
                                                    <td>Chemical Manufacturing</td>
                                                    <td>4 Days</td>
                                                    <td>30,000</td>
                                                    <td>28</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" onclick="editTrainingProgram(this)">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info" onclick="viewTrainingProgram(this)">View</button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteTrainingProgram(this)">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TRG-004</td>
                                                    <td>Shoe Polish Making</td>
                                                    <td>Chemical Manufacturing</td>
                                                    <td>2 Days</td>
                                                    <td>20,000</td>
                                                    <td>38</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" onclick="editTrainingProgram(this)">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info" onclick="viewTrainingProgram(this)">View</button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteTrainingProgram(this)">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TRG-005</td>
                                                    <td>Air Freshener Manufacturing</td>
                                                    <td>Chemical Manufacturing</td>
                                                    <td>2 Days</td>
                                                    <td>18,000</td>
                                                    <td>25</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" onclick="editTrainingProgram(this)">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info" onclick="viewTrainingProgram(this)">View</button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteTrainingProgram(this)">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TRG-006</td>
                                                    <td>Paint Manufacturing</td>
                                                    <td>Chemical Manufacturing</td>
                                                    <td>6 Days</td>
                                                    <td>40,000</td>
                                                    <td>18</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" onclick="editTrainingProgram(this)">Edit</button>
                                                        <button class="btn btn-sm btn-outline-info" onclick="viewTrainingProgram(this)">View</button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteTrainingProgram(this)">Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Training Program Modal -->
    <div class="modal fade" id="addTrainingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Training Program</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addTrainingForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Program Name *</label>
                                    <input type="text" class="form-control" placeholder="e.g., Detergent Making" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category *</label>
                                    <select class="form-control" required>
                                        <option>Chemical Manufacturing</option>
                                        <option>Beverage Manufacturing</option>
                                        <option>Cosmetics Production</option>
                                        <option>Food Processing</option>
                                        <option>Industrial Chemicals</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Duration (Days) *</label>
                                    <input type="number" class="form-control" placeholder="e.g., 3" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price (₦) *</label>
                                    <input type="number" class="form-control" placeholder="e.g., 25000" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Max Students</label>
                                    <input type="number" class="form-control" placeholder="e.g., 20">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instructor</label>
                                    <input type="text" class="form-control" placeholder="e.g., Dr. John Smith">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                        <option>Coming Soon</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Program Description</label>
                            <textarea class="form-control" rows="4" placeholder="Detailed description of what students will learn..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Learning Objectives</label>
                            <textarea class="form-control" rows="3" placeholder="What students will achieve after completing this program..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Required Materials</label>
                            <textarea class="form-control" rows="3" placeholder="List of materials and equipment needed..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Program Image</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addTrainingProgram()">Add Program</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/calendar.min.js"></script>
    <script src="js/perfect-scrollbar.min.js"></script>
    <script src="js/custom.js"></script>
    
    <script>
        // Check authentication
        if (!localStorage.getItem('adminLoggedIn') && !sessionStorage.getItem('adminLoggedIn')) {
            window.location.href = 'login.php';
        }
        
        // Add training program function
        function addTrainingProgram() {
            // Get form data
            const form = document.getElementById('addTrainingForm');
            const formData = new FormData(form);
            
            // Simple validation
            const programName = form.querySelector('input[placeholder="e.g., Detergent Making"]').value;
            const category = form.querySelector('select').value;
            const duration = form.querySelector('input[placeholder="e.g., 3"]').value;
            const price = form.querySelector('input[placeholder="e.g., 25000"]').value;
            
            if (!programName || !category || !duration || !price) {
                alert('Please fill in all required fields');
                return;
            }
            
            // Add to table (in a real app, this would be sent to server)
            const tableBody = document.querySelector('.table tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>TRG-${Date.now().toString().slice(-3)}</td>
                <td>${programName}</td>
                <td>${category}</td>
                <td>${duration} Days</td>
                <td>${parseInt(price).toLocaleString()}</td>
                <td>0</td>
                <td><span class="badge badge-success">Active</span></td>
                <td>
                    <button class="btn btn-sm btn-outline-primary" onclick="editTrainingProgram(this)">Edit</button>
                    <button class="btn btn-sm btn-outline-info" onclick="viewTrainingProgram(this)">View</button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteTrainingProgram(this)">Delete</button>
                </td>
            `;
            tableBody.appendChild(newRow);
            
            // Close modal and reset form
            $('#addTrainingModal').modal('hide');
            form.reset();
            
            alert('Training program added successfully!');
        }
        
        // Edit training program function
        function editTrainingProgram(button) {
            const row = button.closest('tr');
            const cells = row.querySelectorAll('td');
            
            const programId = cells[0].textContent;
            const programName = cells[1].textContent;
            const category = cells[2].textContent;
            const duration = cells[3].textContent.replace(' Days', '');
            const price = cells[4].textContent.replace(/,/g, '');
            
            // Fill the form with existing data
            const form = document.getElementById('addTrainingForm');
            form.querySelector('input[placeholder="e.g., Detergent Making"]').value = programName;
            form.querySelector('select').value = category;
            form.querySelector('input[placeholder="e.g., 3"]').value = duration;
            form.querySelector('input[placeholder="e.g., 25000"]').value = price;
            
            // Change modal title and button
            document.querySelector('#addTrainingModal .modal-title').textContent = 'Edit Training Program';
            document.querySelector('#addTrainingModal .btn-primary').textContent = 'Update Program';
            document.querySelector('#addTrainingModal .btn-primary').onclick = function() {
                updateTrainingProgram(row, programId);
            };
            
            // Show modal
            $('#addTrainingModal').modal('show');
        }
        
        // Update training program function
        function updateTrainingProgram(row, programId) {
            const form = document.getElementById('addTrainingForm');
            const programName = form.querySelector('input[placeholder="e.g., Detergent Making"]').value;
            const category = form.querySelector('select').value;
            const duration = form.querySelector('input[placeholder="e.g., 3"]').value;
            const price = form.querySelector('input[placeholder="e.g., 25000"]').value;
            
            if (!programName || !category || !duration || !price) {
                alert('Please fill in all required fields');
                return;
            }
            
            // Update the row
            const cells = row.querySelectorAll('td');
            cells[1].textContent = programName;
            cells[2].textContent = category;
            cells[3].textContent = duration + ' Days';
            cells[4].textContent = parseInt(price).toLocaleString();
            
            // Close modal and reset form
            $('#addTrainingModal').modal('hide');
            form.reset();
            
            // Reset modal title and button
            document.querySelector('#addTrainingModal .modal-title').textContent = 'Add New Training Program';
            document.querySelector('#addTrainingModal .btn-primary').textContent = 'Add Program';
            document.querySelector('#addTrainingModal .btn-primary').onclick = addTrainingProgram;
            
            alert('Training program updated successfully!');
        }
        
        // View training program function
        function viewTrainingProgram(button) {
            const row = button.closest('tr');
            const cells = row.querySelectorAll('td');
            
            const programId = cells[0].textContent;
            const programName = cells[1].textContent;
            const category = cells[2].textContent;
            const duration = cells[3].textContent;
            const price = cells[4].textContent;
            const students = cells[5].textContent;
            const status = cells[6].textContent;
            
            alert(`Training Program Details:\n\nID: ${programId}\nName: ${programName}\nCategory: ${category}\nDuration: ${duration}\nPrice: ${price}\nStudents: ${students}\nStatus: ${status}`);
        }
        
        // Delete training program function
        function deleteTrainingProgram(button) {
            if (confirm('Are you sure you want to delete this training program?')) {
                const row = button.closest('tr');
                const programName = row.querySelectorAll('td')[1].textContent;
                
                row.remove();
                alert(`Training program "${programName}" has been deleted successfully!`);
            }
        }
        
        // Print training programs function
        function printTrainingPrograms() {
            const printContent = `
                <html>
                <head>
                    <title>Training Programs Report - Tyazubwenge Training Center</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        h1 { color: #2c5530; text-align: center; }
                        h2 { color: #4a7c59; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                        th { background-color: #f2f2f2; font-weight: bold; }
                        .company-info { text-align: center; margin-bottom: 30px; }
                        .report-date { text-align: right; margin-bottom: 20px; }
                    </style>
                </head>
                <body>
                    <div class="company-info">
                        <h1>Tyazubwenge Training Center</h1>
                        <p>Laboratory Management System</p>
                    </div>
                    <div class="report-date">
                        <p>Report Generated: ${new Date().toLocaleDateString()}</p>
                    </div>
                    <h2>Training Programs Report</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Program ID</th>
                                <th>Program Name</th>
                                <th>Category</th>
                                <th>Duration</th>
                                <th>Price (₦)</th>
                                <th>Students Enrolled</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${document.querySelector('.table tbody').innerHTML.replace(/<button[^>]*>.*?<\/button>/g, '').replace(/<td[^>]*>.*?<button[^>]*>.*?<\/button>.*?<\/td>/g, '<td>N/A</td>')}
                        </tbody>
                    </table>
                </body>
                </html>
            `;
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(printContent);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>
</html>

