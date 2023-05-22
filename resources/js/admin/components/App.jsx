import React, { useContext, useState } from 'react';
import ReactDOM from "react-dom";
import {BrowserRouter, Route, Routes} from "react-router-dom";
import 'bootstrap/scss/bootstrap.scss';
import  'bootstrap/js/index.esm';
import 'bootstrap-icons/font/bootstrap-icons.css';
import Header from './Header/Header';
import { AuthContext, AuthContextData } from '../contexts/AuthContext';
import ProtectRoute from './ProtectRoute';

const App = () => {
    const {token, login, logout} = useContext(AuthContextData);

    return (
    
        <div className="main">
            <a className="menu-btn open" onClick={()=>document.querySelector("body").classList.toggle("mobileopen")}><i class="bi bi-list"></i></a>

            {token && <Header />}

            <div className="content">
                <Routes>
                    <Route index path='/' element={<div><h1>Login</h1><button onClick={login}>Login</button></div>}></Route>
                    <Route path='/dashboard' element={<ProtectRoute><h1>Dashboard</h1></ProtectRoute>}></Route>
                    <Route path='/about' element={<ProtectRoute><h1>About Me</h1></ProtectRoute>}></Route>
                    <Route path='/skills' element={<ProtectRoute><h1>Skills</h1></ProtectRoute>}></Route>
                    <Route path='/projects' element={<ProtectRoute><h1>Projects</h1></ProtectRoute>} />
                    <Route path='/blogs' element={<ProtectRoute><h1>Blog</h1></ProtectRoute>} />
                </Routes>
            </div>
        </div>
    );
}

const root = ReactDOM.createRoot(document.getElementById('root'));

root.render(
    <React.StrictMode>
        <BrowserRouter>
            <AuthContext>
                <App />
            </AuthContext>
        </BrowserRouter>
    </React.StrictMode>
);
