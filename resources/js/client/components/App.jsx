import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import Header from './Header/Header';
import { Route, Routes } from 'react-router-dom';
import 'bootstrap/scss/bootstrap.scss';
import  'bootstrap/js/index.esm';
import 'bootstrap-icons/font/bootstrap-icons.css';
import AboutMe from './AboutMe/AboutMe';
import ProjectList from './Projects/ProjectList';
import BlogList from './Blog/BlogList';
import BlogPage from './Blog/BlogPage';
import { BlogContext } from '../contexts/BlogContext';
import SkillsAndExperience from './Skills/SkillsAndExperience';
const App = () => {
    return (
        <div className="main">
            <a className="menu-btn open" onClick={()=>document.querySelector("body").classList.toggle("mobileopen")}><i class="bi bi-list"></i></a>

            <Header/>

            <div className="content">
                <BlogContext>
                    <Routes>
                        <Route path='/' element={<AboutMe></AboutMe>}></Route>
                        <Route path='/skills' element={<SkillsAndExperience></SkillsAndExperience>}></Route>
                        <Route path='/projects' element={<ProjectList />}></Route>
                        <Route path='/blogs' >
                            <Route index element={<BlogList></BlogList>}></Route>
                            <Route path=':id' element={<BlogPage></BlogPage>}></Route>
                        </Route>
                    </Routes>
                </BlogContext>
            </div>
        </div>
    );
}

const root = ReactDOM.createRoot(document.getElementById('root'));

root.render(
    <React.StrictMode>
        <BrowserRouter>
            <App />
        </BrowserRouter>
    </React.StrictMode>
);
