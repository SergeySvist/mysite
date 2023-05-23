import React, { useContext, useState } from 'react';
import { AuthContextData } from '../../contexts/AuthContext';

const LoginPage = () => {
    const {token, login, logout} = useContext(AuthContextData);
    const [email, setEmail] = useState("");
    const [pass, setPass] = useState("");

    return (
        <div className='loginPage'>
            <div className='login'>
                <h2>Signin to admin account</h2>

                <label htmlFor="">Email: </label>
                <input type="text" value={email} onChange={(e) => setEmail(e.target.value)}/><br />
                <label htmlFor="">Password: </label>
                <input type="password" value={pass} onChange={(e) => setPass(e.target.value)}/> <br />

                <button onClick={()=>login(email, pass)} className='btn btn-primary'>Login</button>
            </div>
        </div>
    );
}

export default LoginPage;
