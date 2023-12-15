package com.daw2.aprende02.auth.payload.request;

import jakarta.validation.constraints.NotBlank;
import lombok.Data;

@Data
public class LoginRequest {
	@NotBlank
  	private String username;

	@NotBlank
	private String password;
}
