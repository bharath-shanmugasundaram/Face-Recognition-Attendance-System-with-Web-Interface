📸 Face Recognition Attendance System with Web Interface and MySQL Database

This project is a comprehensive solution for managing attendance through face recognition technology. It includes a Python script for face recognition, a web interface for viewing attendance records, and a MySQL database for storing attendance data.

Features
- Python Face Recognition Script (face_recognition_attendance.py)
  - 🎥 Captures faces through a webcam.
  - 🤖 Recognizes faces based on pre-defined images using the face_recognition library.
  - 📝 Records attendance in a MySQL database.
  - 📊 Displays the number of recognized people in real-time.
- Web Interface (index.php, attendance.php, logout.php, style.css)
  - 🌐 Provides a login page for users.
  - 📅 Displays attendance records fetched from the MySQL database.
  - 🔒 Allows users to log out securely.
- MySQL Database (apo)
  - 🗄 Contains a table named attendance with columns id, NAME, TIME, and reg_num.
  - 💾 Stores attendance records including the name, registration number, and timestamp.

Requirements
- 🐍 Python 3.x
- 🖥 OpenCV (cv2) library
- 🧑‍🔬 face_recognition library
- 🗃 MySQL Connector (mysql.connector) library
- 🌐 Web server with PHP support (e.g., Apache, Nginx)

Installation
- 🔽 Clone or download the repository.
- ⚙️ Install Python and required libraries as mentioned in the Python script section.
- 🛠 Set up a MySQL database named apo with a table named attendance having columns id, NAME, TIME, and reg_num.
- 🖥 Configure your web server to serve the PHP files.
- 📂 Ensure the source_image folder contains images of individuals for face recognition.

Usage
- ▶️ Start the Python script (face_recognition_attendance.py) using Python.
- 🖥 Access the web interface through a web browser by visiting the appropriate URL.

File Structure
- face_recognition_attendance.py: Python script for face recognition attendance system.
- index.php: Login page for the web interface.
- attendance.php: Page to display attendance records.
- logout.php: PHP script to log out users.
- style.css: CSS file for styling the web interface.
- source_image/: Folder containing images of individuals for face recognition.

Contributors
- bharath-shanmugasundaram

License
This project is licensed under the MIT License.
