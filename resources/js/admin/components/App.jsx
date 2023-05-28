import React, { useContext, useState } from 'react';
import ReactDOM from "react-dom/client";
import {BrowserRouter, Route, Routes} from "react-router-dom";
import 'bootstrap/scss/bootstrap.scss';
import  'bootstrap/js/index.esm';
import 'bootstrap-icons/font/bootstrap-icons.css';
import Header from './Header/Header';
import { AuthContext, AuthContextData } from '../contexts/AuthContext';
import ProtectRoute from './ProtectRoute';
import LoginPage from './Login/LoginPage';
import AboutMe from './AboutMe/AboutMe';
import SkillsAndExperience from './Skills/SkillsAndExperience';

const App = () => {
    const {token, login, logout} = useContext(AuthContextData);

    return (
    
        <div className={`main ${ token && "main-padding"}`}>
            <a className="menu-btn open" onClick={()=>document.querySelector("body").classList.toggle("mobileopen")}><i className="bi bi-list"></i></a>

            {token && <Header />}

            <div className="content">
                <Routes>
                    <Route index path='/' element={<LoginPage></LoginPage>}></Route>
                    <Route path='/dashboard' element={<ProtectRoute><h1>Dashboard</h1></ProtectRoute>}></Route>
                    <Route path='/about' element={<ProtectRoute><AboutMe></AboutMe></ProtectRoute>}></Route>
                    <Route path='/skills' element={<ProtectRoute><SkillsAndExperience></SkillsAndExperience></ProtectRoute>}></Route>
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
