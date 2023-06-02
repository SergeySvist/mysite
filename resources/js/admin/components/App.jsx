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
import ProjectList from './Projects/ProjectList';
import BlogList from './Blog/BlogList';
import { BlogContext } from '../contexts/BlogContext';
import BlogPage from './Blog/BlogPage';

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
                    <Route path='/projects' element={<ProtectRoute><ProjectList></ProjectList></ProtectRoute>} />
                    <Route path='/blogs'>
                        <Route index element={<ProtectRoute><BlogList></BlogList></ProtectRoute>}></Route>
                        <Route path=':id' element={<ProtectRoute><BlogPage></BlogPage></ProtectRoute>}></Route>
                    </Route>
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
                <BlogContext>
                    <App />
                </BlogContext>
            </AuthContext>
        </BrowserRouter>
    </React.StrictMode>
);
