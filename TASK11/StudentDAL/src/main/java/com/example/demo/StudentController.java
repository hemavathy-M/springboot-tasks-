package com.example.demo;

import java.util.List;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/student")
public class StudentController {

    private final StudentService service;

    public StudentController(StudentService service) {
        this.service = service;
    }

    // CREATE STUDENT
    @PostMapping
    public Student saveStudent(@RequestBody Student student) {
        return service.saveStudent(student);
    }

    // GET ALL STUDENTS
    @GetMapping
    public List<Student> getAllStudents() {
        return service.getAllStudents();
    }

    // GET BY DEPARTMENT (Sir Requirement)
    @GetMapping("/department/{dept}")
    public List<Student> getByDepartment(@PathVariable String dept) {
        return service.getByDepartment(dept);
    }

    // GET BY AGE
    @GetMapping("/age/{age}")
    public List<Student> getByAge(@PathVariable Integer age) {
        return service.getByAge(age);
    }

    // ⭐ PAGINATION + SORTING (Task-11 Main)
    @GetMapping("/department/page/{dept}")
    public Page<Student> getDepartmentPage(
            @PathVariable String dept,
            Pageable pageable) {

        return service.getDepartmentPage(dept, pageable);
    }
}