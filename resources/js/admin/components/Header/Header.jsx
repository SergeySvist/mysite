import React, { useContext, useEffect, useState } from 'react';
import { NavLink } from 'react-router-dom';
import { baseURL } from '../../config';
import { AuthContextData } from '../../contexts/AuthContext';

const client = axios.create({baseURL});

const Header = () => {
    let [fileUrl, setFileUrl] = useState("");
    const {token, login, logout} = useContext(AuthContextData);

    useEffect(()=> {
        const getLogo = async () => {
            const resp = await client.get('/api/files', {params: {name: "my_new_logo.png"}});
            setFileUrl(resp.data.data[0]);
        }
        getLogo();
    },[]);

    return (
        <menu className='main-menu'>
            <a className="menu-btn close" onClick={()=>document.querySelector("body").classList.toggle("mobileopen")}><i class="bi bi-x-lg"></i></a>
            <div className="menu-top">
                <img src={fileUrl} alt="" width='200px'/>
            </div>
            <div className="menu-nav">
                <ul onClick={()=>document.querySelector("body").classList.toggle("mobileopen")}>
                    <li><NavLink to="/dashboard">Dashboard</NavLink></li>
                    <li><NavLink to="/about">About me</NavLink></li>
                    <li><NavLink to="/skills">Skills</NavLink></li>
                    <li><NavLink to="/projects">Projects</NavLink></li>
                    <li><NavLink to="/blog">Blog</NavLink></li>

                </ul>
            </div>
            <div className="menu-footer">
                <p>Hello, SergeySvist</p>
                <button className='btn btn-dark' onClick={logout}>Log out</button>
            </div>
        </menu>
    );
}

export default Header;
