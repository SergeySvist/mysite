import React, { useEffect, useState } from 'react';
import { NavLink } from 'react-router-dom';
import { baseURL } from '../../config';


const client = axios.create({baseURL});

const Header = () => {
    let [links, setLinks] = useState([]);
    let [fileUrl, setFileUrl] = useState("");
    useEffect(()=> {
        const getLinks = async () => {
            const resp = await client.get('/api/links');
            setLinks(resp.data.data[0]);
        }
        const getLogo = async () => {
            const resp = await client.get('/api/files', {params: {name: "my_new_logo.png"}});
            setFileUrl(resp.data.data[0]);
        }
        getLinks();
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
                    <li><NavLink to="/">About</NavLink></li>
                    <li><NavLink to="/projects">Projects</NavLink></li>
                    <li><NavLink to="/blogs">Blog</NavLink></li>
                </ul>
            </div>
            <div className="socials">
                {links.map((el)=><a href={el.link}><i className={`fs-4 bi bi-${el.title.toLowerCase()}`}></i></a>)}
            </div>
        </menu>
    );
}

export default Header;
