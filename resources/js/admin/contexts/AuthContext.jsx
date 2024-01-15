import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { baseURL } from '../config';


const AuthContextData = React.createContext();
const client = axios.create({baseURL});


const AuthContext = ({children})=>{
    const nav = useNavigate();

    const [token, setToken] = useState(null);

    const handleLogin = async (email, pass) => {
        const resp = await client.post('/api/signin', {email: email, password: pass});

        setToken(resp.data.data[0].access_token);
        nav('/dashboard');
    };

    const handleLogout = async () => {
        await client.post('/api/signout', null, {headers: {'Authorization':`Bearer ${token}`}});
        setToken(null);
    };

    return(
        <AuthContextData.Provider value={{token, login: handleLogin, logout: handleLogout}}>
            {children}
        </AuthContextData.Provider>
    );
}

export { AuthContext, AuthContextData};
