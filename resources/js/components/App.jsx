import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import Header from './Header/Header';
import { Route, Routes } from 'react-router-dom';
import 'bootstrap/scss/bootstrap.scss';
import  'bootstrap/js/index.esm';
import 'bootstrap-icons/font/bootstrap-icons.css';
import AboutMe from './AboutMe/AboutMe';
const App = () => {
    return (
        <div className="main">
            <a className="menu-btn open" onClick={()=>document.querySelector("body").classList.toggle("mobileopen")}><i class="bi bi-list"></i></a>

            <Header/>

            <div className="content">
                <Routes>
                    <Route path='/' element={<AboutMe></AboutMe>}></Route>
                    <Route path='/blogs' element={<h1 className='ve-100'>Blog</h1>}></Route>
                    <Route path='/projects' element={<h1 className='ve-100'>Project</h1>}></Route>
                </Routes>
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
