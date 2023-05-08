import React from 'react';
import { NavLink } from 'react-router-dom';

const Menu = () => {
    return (
        <div className='menu'>
            <ul>
                <li><NavLink className='menu-items' to='/'>About me</NavLink></li>
                <li><NavLink className='menu-items' to='/blogs'>Blogs</NavLink></li>
                <li><NavLink className='menu-items' to='/projects'>Projects</NavLink></li>
            </ul>
        </div>
    );
}

export default Menu;
