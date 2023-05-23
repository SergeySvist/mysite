import React, { useContext } from 'react';
import { AuthContextData } from '../../contexts/AuthContext';

const LoginPage = () => {
    const {token, login, logout} = useContext(AuthContextData);

    return (
        <div className='loginPage'>
            <div className='login'>
                <h2>Signin to admin account</h2>

                <label htmlFor="">Email: </label>
                <input type="text" /><br />
                <label htmlFor="">Password: </label>
                <input type="password" /> <br />

                <button onClick={login} className='btn btn-primary'>Login</button>
            </div>
        </div>
    );
}

export default LoginPage;
