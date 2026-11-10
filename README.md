# Activity 9 – PHP Mini Information Management System

## Project
**StudentHub – Student Information System**

A small PHP-based application that displays and organizes sample student records. Users can search by student name, ID, or email and filter records by course.

## Features
1. Displays a collection of student records in an HTML table.
2. Stores records in a PHP associative array (`data/students.php`).
3. Uses PHP functions to format names, generate initials, list courses, and filter records (`includes/functions.php`).
4. Uses string functions including `trim()`, `strtolower()`, `ucwords()`, `substr()`, and `strpos()`.
5. Uses HTML and responsive CSS for the interface.
6. Uses organized files and folders.

## Requirements
- PHP 8.0 or later
- XAMPP, WAMP, or another local PHP server
- Web browser

## How to run using XAMPP
1. Extract the ZIP file.
2. Copy the `Activity9_PHP_Student_Information_System` folder into `C:\\xampp\\htdocs\\`.
3. Open the XAMPP Control Panel and start **Apache**.
4. Open Chrome and visit: `http://localhost/Activity9_PHP_Student_Information_System/`
5. Try searching for a name such as `Maria`, or select a course and click **Apply Filters**.

No MySQL database is required. The records are stored in a PHP array as required by the activity.

## How to add records
Open `data/students.php` and add another array item. Follow the same fields: `id`, `name`, `course`, `year`, `email`, and `status`.

## GitHub submission
1. Sign in to GitHub and create a new repository named `Activity9-PHP-Student-Information-System`.
2. Extract this project ZIP.
3. Open the repository and choose **Add file → Upload files**.
4. Upload the project files and folders (you may upload the extracted folder contents).
5. Select **Commit changes**.
6. Copy your repository URL and submit it with your screenshots.

## Short system description
StudentHub is a mini Student Information System developed using PHP, HTML, and CSS. It presents student information in an organized table and allows users to search records by name, student ID, or email address and filter them by course. PHP arrays store the sample records, while reusable PHP functions process and display the information. String functions are used to format names, create initials, and perform case-insensitive searching.

## Screenshot
See `screenshots/studenthub-preview.png`. It is a visual preview of the intended application layout. After running the project in your browser, capture your own screenshot of the live application for submission.
