package com.example.EmployeeSpringApp;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class EmployeeService {

    @Autowired
    EmployeeRepository repository;

    public void addEmployee(int id, String name) {
        repository.addEmployee(new Employee(id, name));
    }

    public void displayEmployees() {

        for (Employee e : repository.getEmployees()) {
            System.out.println(e);
        }

    }

}