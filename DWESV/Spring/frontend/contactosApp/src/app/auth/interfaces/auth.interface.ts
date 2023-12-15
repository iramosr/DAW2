export interface LoginUsernameRequest {
    username : string,
    password : string
}

export interface LoginResponse {
    accessToken : string,
    user : {
        username : string,
        id : number
    }
}