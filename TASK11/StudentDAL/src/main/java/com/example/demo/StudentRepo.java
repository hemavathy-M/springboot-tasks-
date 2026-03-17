package com.example.demo;

import java.util.List;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;

public interface StudentRepo extends JpaRepository<Student, Integer> {

    // get by department
    List<Student> findByDepartment(String department);

    // get by age
    List<Student> findByAge(Integer age);

    // ⭐ pagination + sorting (TASK-11 MAIN)
    Page<Student> findByDepartment(String department, Pageable pageable);
}