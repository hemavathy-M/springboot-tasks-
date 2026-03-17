package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller   // ⚠️ IMPORTANT
public class EmployeeController {

    @GetMapping("/employee")
    public String showEmployee(Model model) {

        model.addAttribute("name", "Arun");
        model.addAttribute("role", "Software Engineer");
        model.addAttribute("salary", 50000);

        return "employee"; // goes to HTML
    }
}