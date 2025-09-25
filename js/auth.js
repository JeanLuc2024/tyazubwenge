// Authentication and Database Management for Tyazubwenge Management System

// Admin Database (In a real application, this would be stored on a secure server)
const adminDatabase = {
    users: [
        {
            id: 1,
            email: 'asdf@gmail.com',
            password: 'asdf',
            name: 'John David',
            role: 'Administrator',
            department: 'IT & Operations',
            phone: '+234-801-234-5678',
            lastLogin: null,
            isActive: true,
            permissions: ['all']
        }
    ],
    sessions: []
};

// Authentication Functions
class AuthManager {
    constructor() {
        this.currentUser = null;
        this.init();
    }

    init() {
        // Check if user is already logged in
        const storedUser = localStorage.getItem('tyazubwenge_admin_user');
        const sessionUser = sessionStorage.getItem('tyazubwenge_admin_user');
        
        if (storedUser) {
            this.currentUser = JSON.parse(storedUser);
        } else if (sessionUser) {
            this.currentUser = JSON.parse(sessionUser);
        }
    }

    // Login function
    login(email, password, rememberMe = false) {
        return new Promise((resolve, reject) => {
            // Simulate API delay
            setTimeout(() => {
                const user = adminDatabase.users.find(u => 
                    u.email === email && u.password === password && u.isActive
                );

                if (user) {
                    // Update last login
                    user.lastLogin = new Date().toISOString();
                    
                    // Create session
                    const session = {
                        id: this.generateSessionId(),
                        userId: user.id,
                        email: user.email,
                        loginTime: new Date().toISOString(),
                        isActive: true
                    };
                    
                    adminDatabase.sessions.push(session);
                    
                    // Store user data
                    this.currentUser = {
                        id: user.id,
                        email: user.email,
                        name: user.name,
                        role: user.role,
                        department: user.department,
                        phone: user.phone,
                        lastLogin: user.lastLogin,
                        sessionId: session.id
                    };

                    if (rememberMe) {
                        localStorage.setItem('tyazubwenge_admin_user', JSON.stringify(this.currentUser));
                        localStorage.setItem('adminLoggedIn', 'true');
                        localStorage.setItem('adminUser', JSON.stringify(this.currentUser));
                    } else {
                        sessionStorage.setItem('tyazubwenge_admin_user', JSON.stringify(this.currentUser));
                        sessionStorage.setItem('adminLoggedIn', 'true');
                        sessionStorage.setItem('adminUser', JSON.stringify(this.currentUser));
                    }

                    resolve({
                        success: true,
                        user: this.currentUser,
                        message: 'Login successful'
                    });
                } else {
                    reject({
                        success: false,
                        message: 'Invalid email or password'
                    });
                }
            }, 1000);
        });
    }

    // Logout function
    logout() {
        if (this.currentUser) {
            // Remove session
            const sessionIndex = adminDatabase.sessions.findIndex(s => s.id === this.currentUser.sessionId);
            if (sessionIndex > -1) {
                adminDatabase.sessions.splice(sessionIndex, 1);
            }
        }

        // Clear stored data
        localStorage.removeItem('tyazubwenge_admin_user');
        localStorage.removeItem('adminLoggedIn');
        localStorage.removeItem('adminUser');
        sessionStorage.removeItem('tyazubwenge_admin_user');
        sessionStorage.removeItem('adminLoggedIn');
        sessionStorage.removeItem('adminUser');
        
        this.currentUser = null;
        
        return {
            success: true,
            message: 'Logged out successfully'
        };
    }

    // Check if user is logged in
    isLoggedIn() {
        return this.currentUser !== null;
    }

    // Get current user
    getCurrentUser() {
        return this.currentUser;
    }

    // Check authentication and redirect if needed
    requireAuth() {
        if (!this.isLoggedIn()) {
            window.location.href = 'login.php';
            return false;
        }
        return true;
    }

    // Generate session ID
    generateSessionId() {
        return 'session_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
    }

    // Update user profile
    updateProfile(updates) {
        if (!this.currentUser) {
            throw new Error('No user logged in');
        }

        const userIndex = adminDatabase.users.findIndex(u => u.id === this.currentUser.id);
        if (userIndex > -1) {
            // Update in database
            Object.assign(adminDatabase.users[userIndex], updates);
            
            // Update current user
            Object.assign(this.currentUser, updates);
            
            // Update stored data
            const storedUser = localStorage.getItem('tyazubwenge_admin_user');
            const sessionUser = sessionStorage.getItem('tyazubwenge_admin_user');
            
            if (storedUser) {
                localStorage.setItem('tyazubwenge_admin_user', JSON.stringify(this.currentUser));
            }
            if (sessionUser) {
                sessionStorage.setItem('tyazubwenge_admin_user', JSON.stringify(this.currentUser));
            }
            
            return {
                success: true,
                user: this.currentUser,
                message: 'Profile updated successfully'
            };
        }
        
        throw new Error('User not found');
    }

    // Change password
    changePassword(currentPassword, newPassword) {
        if (!this.currentUser) {
            throw new Error('No user logged in');
        }

        const user = adminDatabase.users.find(u => u.id === this.currentUser.id);
        if (user && user.password === currentPassword) {
            user.password = newPassword;
            return {
                success: true,
                message: 'Password changed successfully'
            };
        }
        
        throw new Error('Current password is incorrect');
    }

    // Get user activity logs
    getActivityLogs() {
        return [
            {
                id: 1,
                action: 'Login',
                timestamp: new Date().toISOString(),
                details: 'User logged into the system'
            },
            {
                id: 2,
                action: 'Product Added',
                timestamp: new Date(Date.now() - 3600000).toISOString(),
                details: 'Added new product: Analytical Balance'
            },
            {
                id: 3,
                action: 'Sale Processed',
                timestamp: new Date(Date.now() - 7200000).toISOString(),
                details: 'Processed sale for ₦185,000'
            },
            {
                id: 4,
                action: 'Report Generated',
                timestamp: new Date(Date.now() - 86400000).toISOString(),
                details: 'Generated monthly sales report'
            }
        ];
    }
}

// Initialize global auth manager
window.authManager = new AuthManager();

// Utility functions for easy access
window.login = (email, password, rememberMe) => {
    return window.authManager.login(email, password, rememberMe);
};

window.logout = () => {
    return window.authManager.logout();
};

window.isLoggedIn = () => {
    return window.authManager.isLoggedIn();
};

window.getCurrentUser = () => {
    return window.authManager.getCurrentUser();
};

window.requireAuth = () => {
    return window.authManager.requireAuth();
};

// Auto-check authentication on page load
document.addEventListener('DOMContentLoaded', function() {
    // Skip auth check for login page
    if (window.location.pathname.includes('login.php')) {
        return;
    }
    
    // Skip auth check for index page
    if (window.location.pathname.includes('index.php') || window.location.pathname === '/' || window.location.pathname.endsWith('/ubwenge/')) {
        return;
    }
    
    // Require authentication for all other pages
    if (!window.authManager.requireAuth()) {
        return;
    }
    
    // Update user info in the UI if available
    const currentUser = window.authManager.getCurrentUser();
    if (currentUser) {
        // Update user name in navigation
        const userNameElements = document.querySelectorAll('.name_user');
        userNameElements.forEach(element => {
            element.textContent = currentUser.name;
        });
        
        // Update user email in profile
        const userEmailElements = document.querySelectorAll('input[value*="@"]');
        userEmailElements.forEach(element => {
            if (element.type === 'email') {
                element.value = currentUser.email;
            }
        });
    }
});

// Export for module systems
if (typeof module !== 'undefined' && module.exports) {
    module.exports = AuthManager;
}
