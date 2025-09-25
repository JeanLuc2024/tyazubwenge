<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Categories - Tyazubwenge Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
</head>
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            <?php include 'includes/sidebar.php'; ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <?php include 'includes/topbar.php'; ?>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Product Categories Management</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Laboratory Product Categories</h2>
                                        </div>
                                        <div class="heading1 margin_0">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                                                <i class="fa fa-plus"></i> Add New Category
                                            </button>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Category ID</th>
                                                        <th>Category Name</th>
                                                        <th>Description</th>
                                                        <th>Products Count</th>
                                                        <th>Default Unit</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>CAT001</td>
                                                        <td>Chemical Reagents</td>
                                                        <td>Laboratory chemicals and reagents</td>
                                                        <td>156</td>
                                                        <td>kg/g/mg</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCategoryModal"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>CAT002</td>
                                                        <td>Glassware</td>
                                                        <td>Laboratory glassware and equipment</td>
                                                        <td>89</td>
                                                        <td>pieces</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCategoryModal"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>CAT003</td>
                                                        <td>Consumables</td>
                                                        <td>Disposable laboratory supplies</td>
                                                        <td>234</td>
                                                        <td>pieces</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCategoryModal"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>CAT004</td>
                                                        <td>Safety Equipment</td>
                                                        <td>Laboratory safety equipment and PPE</td>
                                                        <td>67</td>
                                                        <td>pieces</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCategoryModal"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>CAT005</td>
                                                        <td>Measuring Instruments</td>
                                                        <td>Precision measuring instruments</td>
                                                        <td>45</td>
                                                        <td>pieces</td>
                                                        <td><span class="badge badge-success">Active</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCategoryModal"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" placeholder="e.g., Chemical Reagents">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" placeholder="Category description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Default Unit</label>
                            <select class="form-control">
                                <option value="kg">Kilograms (kg)</option>
                                <option value="g">Grams (g)</option>
                                <option value="mg">Milligrams (mg)</option>
                                <option value="ml">Milliliters (ml)</option>
                                <option value="l">Liters (l)</option>
                                <option value="pieces">Pieces</option>
                                <option value="sets">Sets</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Category</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" value="Chemical Reagents">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3">Laboratory chemicals and reagents</textarea>
                        </div>
                        <div class="form-group">
                            <label>Default Unit</label>
                            <select class="form-control">
                                <option value="kg" selected>Kilograms (kg)</option>
                                <option value="g">Grams (g)</option>
                                <option value="mg">Milligrams (mg)</option>
                                <option value="ml">Milliliters (ml)</option>
                                <option value="l">Liters (l)</option>
                                <option value="pieces">Pieces</option>
                                <option value="sets">Sets</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Update Category</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>


