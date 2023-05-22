import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";


const AuthContextData = React.createContext();


const AuthContext = ({children})=>{
    const nav = useNavigate();

    const [token, setToken] = useState(null);

    const handleLogin = () => {
        setToken("auth_token");
        nav('/dashboard');
    };

    const handleLogout = () => {
        setToken(null);
    };

    return(
        <AuthContextData.Provider value={{token, login: handleLogin, logout: handleLogout}}>
            {children}
        </AuthContextData.Provider>
    );
}

export { AuthContext, AuthContextData};