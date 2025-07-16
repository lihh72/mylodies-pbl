<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Rental</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        .stage-container {
            width: 100%;
            position: relative;
        }
        
        /* Mobile Stages */
        @media (max-width: 768px) {
            .stage-container {
                height: 100vh;
                overflow-y: scroll;
                scroll-snap-type: y mandatory;
            }
            
            .stage {
                height: 100vh;
                width: 100%;
                scroll-snap-align: start;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem;
            }
            
            .logo-stage {
                background: linear-gradient(135deg, #6366f1, #4f46e5);
                color: white;
                text-align: center;
            }
            
            .logo-container {
                margin-bottom: 2rem;
            }
            
            .logo {
                width: 120px;
                height: 120px;
                background-color: white;
                border-radius: 50%;
                margin: 0 auto 1rem;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .logo-text {
                font-size: 2rem;
                font-weight: bold;
                margin-bottom: 1rem;
            }
            
            .logo-subtext {
                font-size: 1.1rem;
                opacity: 0.9;
                margin-bottom: 2rem;
            }
            
            .scroll-indicator {
                position: absolute;
                bottom: 2rem;
                left: 50%;
                transform: translateX(-50%);
                animation: bounce 2s infinite;
            }
            
            @keyframes bounce {
                0%, 20%, 50%, 80%, 100% {
                    transform: translateY(0) translateX(-50%);
                }
                40% {
                    transform: translateY(-20px) translateX(-50%);
                }
                60% {
                    transform: translateY(-10px) translateX(-50%);
                }
            }
            
            .login-stage {
                background-color: white;
            }
        }
        
        /* Desktop - keep existing style */
        @media (min-width: 769px) {
            .stage-container {
                display: flex;
                flex-direction: row;
                height: 100vh;
            }
            
            .stage {
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .logo-stage {
                background: linear-gradient(135deg, #6366f1, #4f46e5);
                color: white;
                flex: 1;
                text-align: center;
                padding: 2rem;
            }
            
            .login-stage {
                flex: 1;
                background-color: white;
            }
            
            .scroll-indicator {
                display: none;
            }
        }
        
        /* Form Styles */
        .auth-form {
            width: 100%;
            max-width: 400px;
        }
        
        .form-title {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        
        .input-group {
            margin-bottom: 1.5rem;
            width: 100%;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: #4b5563;
        }
        
        .input-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
        }
        
        .button {
            width: 100%;
            padding: 0.75rem;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 0.375rem;
            font-size: 1rem;
            cursor: pointer;
            margin-bottom: 1rem;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .button:hover {
            background-color: #4338ca;
        }
        
        .google-button {
            width: 100%;
            padding: 0.75rem;
            background-color: white;
            color: #333;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            cursor: pointer;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
        }
        
        .google-button svg {
            margin-right: 0.5rem;
        }
        
        .form-footer {
            text-align: center;
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .form-footer a {
            color: #4f46e5;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="stage-container">
        <!-- First Stage - Logo Stage -->
        <div class="stage logo-stage">
            <div class="logo-container">
                <div class="logo">
                    <!-- Your logo could go here -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 18V5l12-2v13"></path>
                        <circle cx="6" cy="18" r="3"></circle>
                        <circle cx="18" cy="16" r="3"></circle>
                    </svg>
                </div>
                <h1 class="logo-text">MusicRent</h1>
                <p class="logo-subtext">Rent your favorite music instruments</p>
            </div>
            
            <!-- Only visible on mobile -->
            <div class="scroll-indicator">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14"></path>
                    <path d="M19 12l-7 7-7-7"></path>
                </svg>
            </div>
        </div>
        
        <!-- Second Stage - Login Form -->
        <div class="stage login-stage">
            <div class="auth-form">
                <h2 class="form-title">Login to your account</h2>
                <form action="/login" method="POST">
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <button type="submit" class="button">Sign In</button>
                    
                    <button type="button" class="google-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Sign In With Google
                    </button>
                    
                    <p class="form-footer">
                        Don't have an account? <a href="/register">Sign Up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Add smooth scrolling for mobile devices
        document.addEventListener('DOMContentLoaded', function() {
            const scrollIndicator = document.querySelector('.scroll-indicator');
            
            if (scrollIndicator) {
                scrollIndicator.addEventListener('click', function() {
                    const loginStage = document.querySelector('.login-stage');
                    loginStage.scrollIntoView({ behavior: 'smooth' });
                });
            }
        });
    </script>
</body>
</html>