package com.daw2.aprende.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
public class AprendeController {
    @GetMapping("/test01")
    @ResponseBody
    public String test01() {
        return "Mi primer Spring";
    }
}
