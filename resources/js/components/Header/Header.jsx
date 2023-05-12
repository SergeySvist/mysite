import React from 'react';
import { NavLink } from 'react-router-dom';

const Header = () => {
    return (
        <div className="header col-12 col-sm-3 col-xl-2 px-sm-2 px-0 d-flex sticky-top">
            <div className="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                <a href="/" className="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span className="fs-5"><span className="d-none d-sm-inline">Brand</span></span>
                </a>
                <ul className="nav flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                    <li className="nav-item">
                        <NavLink className="nav-link align-middle px-0 text-white" to='/'><i className="fs-4 bi bi-file-person-fill"></i><span className="ms-1 d-none d-sm-inline">About Me</span></NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link align-middle px-0 text-white" to='/projects'><i className="fs-4 bi bi-briefcase-fill"></i><span className="ms-1 d-none d-sm-inline">Projects</span></NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link align-middle px-0 text-white" to='/blogs'><i className="fs-4 bi bi-journal-code"></i><span className="ms-1 d-none d-sm-inline">Blog</span></NavLink>
                    </li>
                </ul>
                <div className="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a className='link text-white' href="https://twitter.com/Sergey_Svist"><i className="fs-4 bi bi-twitter"></i></a>
                    <a className='link text-white' href="https://twitter.com/Sergey_Svist"><i className="fs-4 bi bi-linkedin"></i></a>
                    <a className='link text-white' href="https://twitter.com/Sergey_Svist"><i className="fs-4 bi bi-github"></i></a>
                </div>
            </div>
        </div>
    );
}

export default Header;
