package com.example.EmployeeSpringApp;

import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;

@Configuration
@ComponentScan("com.example")

public class App {

    public static void main(String[] args) {

        AnnotationConfigApplicationContext context =
                new AnnotationConfigApplicationContext(App.class);

        EmployeeService service = context.getBean(EmployeeService.class);

        service.addEmployee(1,"Rahul");
        service.addEmployee(2,"Priya");
        service.addEmployee(3,"Arjun");

        service.displayEmployees();

        context.close();
    }

}