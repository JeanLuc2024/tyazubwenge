<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Tyazubwenge - Admin Profile</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page profile_page">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
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
                              <h2>Profile</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>User profile</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- user profile section --> 
                                    <!-- profile image -->
                                    <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
                                          <div class="profile_img"><img width="180" class="rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /></div>
                                          <div class="profile_contant">
                                             <div class="contact_inner">
                                                <h3>John David</h3>
                                                <p><strong>Role: </strong>System Administrator - Tyazubwenge Laboratory</p>
                                                <ul class="list-unstyled">
                                                   <li><i class="fa fa-envelope-o"></i> : asdf@gmail.com</li>
                                                   <li><i class="fa fa-phone"></i> : +234-801-234-5678</li>
                                                   <li><i class="fa fa-building"></i> : Tyazubwenge Laboratory Products Ltd</li>
                                                </ul>
                                             </div>
                                             <div class="user_progress_bar">
                                                <div class="progress_bar">
                                                   <!-- System Management Skills -->
                                                   <span class="skill" style="width:95%;">Laboratory Management <span class="info_valume">95%</span></span>                   
                                                   <div class="progress skill-bar ">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
                                                      </div>
                                                   </div>
                                                   <span class="skill" style="width:88%;">Inventory Control <span class="info_valume">88%</span></span>   
                                                   <div class="progress skill-bar">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%;">
                                                      </div>
                                                   </div>
                                                   <span class="skill" style="width:92%;">Sales & Billing <span class="info_valume">92%</span></span>
                                                   <div class="progress skill-bar">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%;">
                                                      </div>
                                                   </div>
                                                   <span class="skill" style="width:85%;">Financial Reporting <span class="info_valume">85%</span></span>
                                                   <div class="progress skill-bar">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- profile contant section -->
                                       <div class="full inner_elements margin_top_30">
                                          <div class="tab_style2">
                                             <div class="tabbar">
                                                <nav>
                                                   <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#recent_activity" role="tab" aria-selected="true">Recent Activity</a>
                                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#system_management" role="tab" aria-selected="false">System Management</a>
                                                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#profile_section" role="tab" aria-selected="false">Profile Settings</a>
                                                   </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                   <div class="tab-pane fade show active" id="recent_activity" role="tabpanel" aria-labelledby="nav-home-tab">
                                                      <div class="msg_list_main">
                                                         <ul class="msg_list">
                                                            <li>
                                                               <span><i class="fa fa-shopping-cart text-success"></i></span>
                                                               <span>
                                                               <span class="name_user">Sales Transaction</span>
                                                               <span class="msg_user">New sale: Analytical Balance - ₦185,000</span>
                                                               <span class="time_ago">2 hours ago</span>
                                                               </span>
                                                            </li>
                                                            <li>
                                                               <span><i class="fa fa-warehouse text-warning"></i></span>
                                                               <span>
                                                               <span class="name_user">Inventory Alert</span>
                                                               <span class="msg_user">Low stock alert: Sodium Chloride (500g)</span>
                                                               <span class="time_ago">4 hours ago</span>
                                                               </span>
                                                            </li>
                                                            <li>
                                                               <span><i class="fa fa-truck text-info"></i></span>
                                                               <span>
                                                               <span class="name_user">Delivery Update</span>
                                                               <span class="msg_user">New delivery received from Lab Supplies Ltd</span>
                                                               <span class="time_ago">6 hours ago</span>
                                                               </span>
                                                            </li>
                                                            <li>
                                                               <span><i class="fa fa-chart-line text-primary"></i></span>
                                                               <span>
                                                               <span class="name_user">Report Generated</span>
                                                               <span class="msg_user">Monthly sales report exported successfully</span>
                                                               <span class="time_ago">1 day ago</span>
                                                               </span>
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                   <div class="tab-pane fade" id="system_management" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                      <div class="system_stats">
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <h5>System Overview</h5>
                                                               <ul class="list-unstyled">
                                                                  <li><i class="fa fa-check-circle text-success"></i> Total Products: 1,247</li>
                                                                  <li><i class="fa fa-check-circle text-success"></i> Active Customers: 342</li>
                                                                  <li><i class="fa fa-check-circle text-success"></i> Suppliers: 28</li>
                                                                  <li><i class="fa fa-check-circle text-success"></i> Monthly Sales: ₦2,847,500</li>
                                                               </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <h5>Recent Actions</h5>
                                                               <ul class="list-unstyled">
                                                                  <li><i class="fa fa-plus text-primary"></i> Added 5 new products</li>
                                                                  <li><i class="fa fa-edit text-warning"></i> Updated inventory levels</li>
                                                                  <li><i class="fa fa-download text-info"></i> Generated financial report</li>
                                                                  <li><i class="fa fa-sync text-success"></i> Synced with accounting system</li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="tab-pane fade" id="profile_section" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                      <form class="profile_form" id="profileForm">
                                                         <div class="row">
                                                            <div class="col-md-4">
                                                               <div class="form-group text-center">
                                                                  <label>Profile Photo</label>
                                                                  <div class="profile-photo-container">
                                                                     <img id="profilePhoto" src="images/layout_img/user_img.jpg" alt="Profile Photo" class="img-responsive rounded-circle" style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto 15px; display: block;">
                                                                     <input type="file" id="photoInput" accept="image/*" style="display: none;" onchange="handlePhotoUpload(event)">
                                                                     <button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('photoInput').click()">
                                                                        <i class="fa fa-camera"></i> Change Photo
                                                                     </button>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                               <div class="row">
                                                                  <div class="col-md-6">
                                                                     <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input type="text" class="form-control" id="fullName" value="">
                                                                     </div>
                                                                     <div class="form-group">
                                                                        <label>Email Address</label>
                                                                        <input type="email" class="form-control" id="email" value="">
                                                                     </div>
                                                                     <div class="form-group">
                                                                        <label>Phone Number</label>
                                                                        <input type="tel" class="form-control" id="phone" value="">
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="form-group">
                                                                        <label>Role</label>
                                                                        <input type="text" class="form-control" value="System Administrator" readonly>
                                                                     </div>
                                                                     <div class="form-group">
                                                                        <label>Department</label>
                                                                        <input type="text" class="form-control" value="IT & Operations" readonly>
                                                                     </div>
                                                                     <div class="form-group">
                                                                        <label>Last Login</label>
                                                                        <input type="text" class="form-control" id="lastLogin" value="2024-01-15 14:30" readonly>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <button type="button" class="btn btn-primary" onclick="updateProfile()">Update Profile</button>
                                                            <button type="button" class="btn btn-secondary" onclick="changePassword()">Change Password</button>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end user profile section -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2"></div>
                        </div>
                        <!-- end row -->
                     </div>
                     <!-- footer -->
                     <div class="container-fluid">
                        <div class="footer">
                           <p>Copyright © 2025 Designed by Luc Investment LTD. All rights reserved.
                           </p>
                        </div>
                     </div>
                  </div>
                  <!-- end dashboard inner -->
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         // Check authentication
         if (!localStorage.getItem('adminLoggedIn') && !sessionStorage.getItem('adminLoggedIn')) {
            window.location.href = 'login.php';
         }
         
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
      <script>
         // Profile update functions
         function handlePhotoUpload(event) {
            const file = event.target.files[0];
            if (file) {
               const reader = new FileReader();
               reader.onload = function(e) {
                  document.getElementById('profilePhoto').src = e.target.result;
                  // Update profile photo in header and sidebar
                  updateProfilePhotoInUI(e.target.result);
               };
               reader.readAsDataURL(file);
            }
         }
         
         function updateProfilePhotoInUI(photoSrc) {
            // Update header profile photo
            const headerPhotos = document.querySelectorAll('.user_profile_dd img');
            headerPhotos.forEach(img => {
               img.src = photoSrc;
            });
            
            // Update sidebar profile photo
            const sidebarPhotos = document.querySelectorAll('.user_profle_side img');
            sidebarPhotos.forEach(img => {
               img.src = photoSrc;
            });
         }
         
         function updateProfile() {
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            
            if (!fullName || !email || !phone) {
               alert('Please fill in all required fields');
               return;
            }
            
            // Update profile information in UI
            document.querySelector('.contact_inner h3').textContent = fullName;
            document.querySelector('.contact_inner ul li:nth-child(1)').innerHTML = `<i class="fa fa-envelope-o"></i> : ${email}`;
            document.querySelector('.contact_inner ul li:nth-child(2)').innerHTML = `<i class="fa fa-phone"></i> : ${phone}`;
            
            // Update header and sidebar names
            const nameElements = document.querySelectorAll('.name_user');
            nameElements.forEach(element => {
               element.textContent = fullName;
            });
            
            // Update last login time
            const now = new Date();
            document.getElementById('lastLogin').value = now.toLocaleString();
            
            // Send to API
            const profileData = {
                name: fullName,
                email: email,
                phone: phone
            };
            
            fetch('api/profile/update.php', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(profileData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Store updated profile in localStorage
                    const updatedProfile = {
                       name: fullName,
                       email: email,
                       phone: phone,
                       lastLogin: now.toISOString()
                    };
                    
                    localStorage.setItem('adminUser', JSON.stringify(updatedProfile));
                    sessionStorage.setItem('adminUser', JSON.stringify(updatedProfile));
                    
                    alert('Profile updated successfully!');
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating profile: ' + error.message);
            });
         }
         
         function changePassword() {
            const currentPassword = prompt('Enter current password:');
            if (!currentPassword) return;
            
            const newPassword = prompt('Enter new password:');
            if (!newPassword) return;
            
            const confirmPassword = prompt('Confirm new password:');
            if (newPassword !== confirmPassword) {
               alert('Passwords do not match!');
               return;
            }
            
            if (newPassword.length < 6) {
               alert('Password must be at least 6 characters long!');
               return;
            }
            
            // In a real application, this would make an API call
            alert('Password changed successfully!');
         }
         
         async function logout() {
            if (confirm('Are you sure you want to logout?')) {
               try {
                  await fetch('api/auth/logout', { method: 'POST', credentials: 'include' });
               } catch (e) {}
               // Clear any client-side state
               localStorage.clear();
               sessionStorage.clear();
               // Redirect to login page
               window.location.href = 'login.php';
            }
         }
         
         // Load profile data on page load
         window.addEventListener('load', function() {
            // Load profile data from localStorage
            const adminUser = JSON.parse(localStorage.getItem('adminUser') || '{}');
            
            if (adminUser.name) {
               document.getElementById('fullName').value = adminUser.name;
               document.querySelector('.contact_inner h3').textContent = adminUser.name;
            } else {
               // Set default values if no data
               document.getElementById('fullName').value = 'Admin User';
               document.querySelector('.contact_inner h3').textContent = 'Admin User';
            }
            
            if (adminUser.email) {
               document.getElementById('email').value = adminUser.email;
               document.querySelector('.contact_inner ul li:nth-child(1)').innerHTML = `<i class="fa fa-envelope-o"></i> : ${adminUser.email}`;
            } else {
               document.getElementById('email').value = 'admin@example.com';
               document.querySelector('.contact_inner ul li:nth-child(1)').innerHTML = `<i class="fa fa-envelope-o"></i> : admin@example.com`;
            }
            
            if (adminUser.phone) {
               document.getElementById('phone').value = adminUser.phone;
               document.querySelector('.contact_inner ul li:nth-child(2)').innerHTML = `<i class="fa fa-phone"></i> : ${adminUser.phone}`;
            } else {
               document.getElementById('phone').value = '+250-123-456-789';
               document.querySelector('.contact_inner ul li:nth-child(2)').innerHTML = `<i class="fa fa-phone"></i> : +250-123-456-789`;
            }
            
            // Update header and sidebar names
            const nameElements = document.querySelectorAll('.name_user');
            nameElements.forEach(element => {
               element.textContent = adminUser.name || 'Admin User';
            });
         });
    </script>
</body>
</html>

