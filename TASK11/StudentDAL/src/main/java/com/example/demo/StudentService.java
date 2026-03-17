package com.example.demo;

import java.util.List;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

@Service
public class StudentService {

    private final StudentRepo repo;

    public StudentService(StudentRepo repo) {
        this.repo = repo;
    }

    public Student saveStudent(Student student) {
        return repo.save(student);
    }

    public List<Student> getAllStudents() {
        return repo.findAll();
    }

    public List<Student> getByDepartment(String department) {
        return repo.findByDepartment(department);
    }

    public List<Student> getByAge(Integer age) {
        return repo.findByAge(age);
    }

    // ⭐ pagination
    public Page<Student> getDepartmentPage(String dept, Pageable pageable) {
        return repo.findByDepartment(dept, pageable);
    }
}