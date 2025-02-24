<?php

function getStudentEnrollmentByStudentId(int $studentId): mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'select
        c.course_id,
        c.course_name,
        c.course_code,
        c.instructor,
        e.enrollment_id,
        e.enrollment_date,
        s.student_id
        from
        enrollment.courses c
        inner join enrollment.enrollment e on
        c.course_id = e.course_id
        inner join enrollment.students s on
        e.student_id = s.student_id where s.student_id = ?
    ';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $studentId);
    $stmt->execute();

    $result = $stmt->get_result();

    return $result;
}

function chkEnrollment(int $studentId, int $courseId): bool
{
    $conn = getConnection();
    $sql = 'select * from enrollment where student_id = ? and course_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $studentId, $courseId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function addEnrollment(int $studentId, int $courseId): mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'insert into enrollment (student_id, course_id, enrollment_date) values (?, ?, now())';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $studentId, $courseId);
    try {
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}

function withdrawEnrollment(int $id): bool
{
    $conn = getConnection();
    $sql = 'delete from enrollment where enrollment_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    try {
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}
