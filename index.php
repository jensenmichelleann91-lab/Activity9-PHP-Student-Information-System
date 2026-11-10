<?php
require_once __DIR__ . '/includes/functions.php';
$students = require __DIR__ . '/data/students.php';

$search = trim($_GET['search'] ?? '');
$courseFilter = trim($_GET['course'] ?? '');
$filteredStudents = filterStudents($students, $search, $courseFilter);
$courses = getCourses($students);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="topbar">
    <div class="brand"><span class="brand-icon">S</span><div><strong>StudentHub</strong><small>Information Management System</small></div></div>
    <span class="top-label">PHP MINI PROJECT</span>
</header>

<main class="container">
    <section class="welcome">
        <div>
            <p class="eyebrow">DASHBOARD / STUDENTS</p>
            <h1>Student Information</h1>
            <p class="subtitle">View, search, and organize student records in one place.</p>
        </div>
        <div class="welcome-mark">✦</div>
    </section>

    <section class="stats">
        <article class="stat-card"><span class="stat-icon purple">▤</span><div><p>Total Records</p><strong><?= count($students) ?></strong></div></article>
        <article class="stat-card"><span class="stat-icon pink">⌂</span><div><p>Courses</p><strong><?= count($courses) ?></strong></div></article>
        <article class="stat-card"><span class="stat-icon blue">✓</span><div><p>Matching Results</p><strong><?= count($filteredStudents) ?></strong></div></article>
    </section>

    <section class="panel">
        <div class="panel-heading">
            <div><h2>Student Directory</h2><p>Search the sample student collection below.</p></div>
            <span class="record-pill"><?= count($filteredStudents) ?> records</span>
        </div>

        <form class="filters" method="GET" action="index.php">
            <label class="search-box"><span>⌕</span><input type="text" name="search" placeholder="Search name, ID, or email..." value="<?= htmlspecialchars($search) ?>"></label>
            <select name="course" aria-label="Filter by course">
                <option value="">All courses</option>
                <?php foreach ($courses as $course): ?>
                    <option value="<?= htmlspecialchars($course) ?>" <?= $courseFilter === $course ? 'selected' : '' ?>>
                        <?= htmlspecialchars($course) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Apply Filters</button>
            <a class="reset-link" href="index.php">Reset</a>
        </form>

        <div class="table-wrap">
            <table>
                <thead><tr><th>STUDENT</th><th>STUDENT ID</th><th>COURSE</th><th>YEAR</th><th>EMAIL</th><th>STATUS</th></tr></thead>
                <tbody>
                <?php if ($filteredStudents): ?>
                    <?php foreach ($filteredStudents as $student): ?>
                    <tr>
                        <td><div class="student-cell"><span class="avatar"><?= htmlspecialchars(getInitials($student['name'])) ?></span><strong><?= htmlspecialchars(formatName($student['name'])) ?></strong></div></td>
                        <td class="muted"><?= htmlspecialchars($student['id']) ?></td>
                        <td><?= htmlspecialchars($student['course']) ?></td>
                        <td><?= htmlspecialchars($student['year']) ?></td>
                        <td class="muted"><?= htmlspecialchars(strtolower($student['email'])) ?></td>
                        <td><span class="status <?= strtolower($student['status']) === 'active' ? 'active' : 'inactive' ?>"><?= htmlspecialchars($student['status']) ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="empty">No student records match your search.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <p class="table-note">Showing <?= count($filteredStudents) ?> of <?= count($students) ?> student records</p>
    </section>
    <footer>StudentHub · PHP Mini Information Management System · Activity 9</footer>
</main>
</body>
</html>
