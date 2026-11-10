<?php
/**
 * Format a student's name using PHP string functions.
 */
function formatName(string $name): string
{
    return ucwords(strtolower(trim($name)));
}

/**
 * Return initials from a full name.
 */
function getInitials(string $name): string
{
    $parts = preg_split('/\s+/', trim($name));
    $initials = '';
    foreach ($parts as $part) {
        if ($part !== '') {
            $initials .= strtoupper(substr($part, 0, 1));
        }
    }
    return substr($initials, 0, 2);
}

/**
 * Return unique course names from the records array.
 */
function getCourses(array $students): array
{
    $courses = array_column($students, 'course');
    $courses = array_unique($courses);
    sort($courses);
    return array_values($courses);
}

/**
 * Filter student records by keyword and/or course.
 */
function filterStudents(array $students, string $search, string $course): array
{
    return array_values(array_filter($students, function ($student) use ($search, $course) {
        $matchesSearch = true;
        if ($search !== '') {
            $haystack = strtolower($student['name'] . ' ' . $student['id'] . ' ' . $student['email']);
            $matchesSearch = strpos($haystack, strtolower($search)) !== false;
        }

        $matchesCourse = ($course === '' || $student['course'] === $course);
        return $matchesSearch && $matchesCourse;
    }));
}
