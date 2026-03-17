package com.example.EmployeeSpringApp;

import java.util.ArrayList;
import java.util.List;
import org.springframework.stereotype.Component;

@Component
public class EmployeeRepository {

    List<Employee> employees = new ArrayList<>();

    public void addEmployee(Employee e) {
        employees.add(e);
    }

    public List<Employee> getEmployees() {
        return employees;
    }

}