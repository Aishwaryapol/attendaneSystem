

````
## Project Structure

```📁 Project Structure
Face-Recognition-Attendance-System/
├── database/
│   ├── attendance-db.sql         # SQL file to set up the database
│   └── database_connection.php   # Database connection script
├── models/
│   └── face-api-models.js        # JavaScript models for Face API
├── resources/
│   ├── assets/
│   │   ├── css/                  # CSS files
│   │   └── javascript/           # JavaScript files
│   ├── images/                   # Images directory
│   ├── labels/                   # Stored images of registered students
│   ├── lib/
│   │   └── global-functions.php  # Global PHP functions
│   ├── pages/
│   │   ├── admin/                # Admin-specific pages
│   │   ├── lecturer/             # Lecturer-specific pages
│   │   └── login.php             # Login page
├── index.php                     # Main entry point for all pages
├── .htaccess                     # Redirect rules
└── README.md                     # Project documentation


````
Attendance Management System 🎓📷
This is a Final Year BCA Project developed as a comprehensive Attendance Management System using Face Recognition Technology. The system automates student attendance and features separate dashboards for admins and lecturers, OTP-based authentication, and a MySQL backend.

🚀 Role in Project:
I worked as the Backend Developer, responsible for building and integrating the PHP backend, database operations, user authentication with PHPMailer, and implementing face recognition logic.

🧩 Features
🎭 Face Recognition-Based Attendance
Students' attendance is marked automatically using facial recognition.

👩‍💼 Role-Based Dashboards

Admin Dashboard: Add/remove lecturers and students, manage system data.

Lecturer Dashboard: View student lists, track attendance, and reset passwords.

🔐 Secure OTP Authentication

Forgot password feature for lecturers using email OTP (via PHPMailer).

🗃️ MySQL Database Integration

Efficient data storage and retrieval for students, lecturers, and attendance logs.

🛠️ Tech Stack
Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL

Email Services: PHPMailer

Face Recognition: [WEBCAME]



⚙️ How to Run
Clone the Repository


git clone https://github.com/yourusername/attendance-management-system.git
Import the Database

Create a MySQL database (e.g., attendance_db)

Import the SQL file located in /sql/.

Update Configurations

Edit /includes/db.php with your database credentials.

Set your SMTP details in the PHPMailer script for OTP mailing.

Launch on Localhost

Run the project using XAMPP or any local PHP server.

Open localhost/attendance-management-system in your browser.




